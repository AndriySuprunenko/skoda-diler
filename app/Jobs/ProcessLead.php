<?php

namespace App\Jobs;

use App\Mail\ModalFormRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * Delivers a website lead to email and Bitrix24.
 *
 * Each channel is independent: if one fails, the other is still attempted,
 * and every failure is logged together with the lead so it can be recovered.
 */
class ProcessLead implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function __construct(
        public array $data,
        public string $contactMethods,
        public array $utm,
    ) {}

    public function handle(): void
    {
        $this->sendMail();
        $this->sendToBitrix();
    }

    private function sendMail(): void
    {
        $recipient = empty($this->data['model'])
            ? config('services.leads.salon_email')
            : config('services.leads.service_email');

        try {
            Mail::to($recipient)->send(new ModalFormRequest($this->data, $this->contactMethods, $this->utm));
        } catch (\Throwable $e) {
            Log::error('Lead email failed', $this->logContext(['recipient' => $recipient, 'error' => $e->getMessage()]));
        }
    }

    private function sendToBitrix(): void
    {
        $webhook = config('services.bitrix_webhook');

        if (empty($webhook)) {
            Log::warning('Bitrix webhook is not configured; lead not sent to CRM', $this->logContext());
            return;
        }

        $utm = $this->utm;
        $model = $this->data['model'] ?? null;

        try {
            $response = Http::timeout(10)
                ->retry(3, 500, throw: false)
                ->post(rtrim($webhook, '/') . '/crm.lead.add.json', [
                    'fields' => [
                        'TITLE' => 'Заявка з сайту "avtocenter-kremenchuk"',
                        'NAME' => $this->data['name'],
                        'PHONE' => [
                            ['VALUE' => $this->data['phone'], 'VALUE_TYPE' => 'WORK'],
                        ],
                        'SOURCE_ID' => 'WEB',
                        'SOURCE_DESCRIPTION' => "Source: {$utm['utm_source']}/{$utm['utm_medium']}/{$utm['utm_campaign']}/{$utm['utm_content']}\nKW: {$utm['utm_term']}",
                        'COMMENTS' => 'Тип: ' . $this->data['type'] . "\n" .
                            'Спосіб звʼязку: ' . $this->contactMethods . "\n" .
                            (empty($model) ? '' : 'Модель: ' . $model) . "\n" .
                            'UTM: ' . implode(', ', array_filter($utm)),
                    ],
                    'params' => [
                        'REGISTER_SONET_EVENT' => 'Y',
                    ],
                ]);

            if (! $response->successful() || $response->json('error')) {
                Log::error('Bitrix lead rejected', $this->logContext([
                    'status' => $response->status(),
                    'body' => mb_substr($response->body(), 0, 1000),
                ]));
            }
        } catch (\Throwable $e) {
            Log::error('Bitrix lead request failed', $this->logContext(['error' => $e->getMessage()]));
        }
    }

    private function logContext(array $extra = []): array
    {
        return ['lead' => $this->data, 'contact_methods' => $this->contactMethods] + $extra;
    }
}
