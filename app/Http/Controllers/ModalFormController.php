<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModalFormController extends Controller
{
    public function send(Request $request)
    {
        // Validation errors are handled by Laravel: 422 JSON for fetch requests,
        // redirect back with errors for regular form posts.
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'model' => 'nullable|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $redirect = '/thank-you' . ($request->filled('price_url')
            ? '?price=' . urlencode($request->input('price_url'))
            : '');

        // Honeypot: real users never see or fill this field. Pretend success so bots don't adapt.
        if ($request->filled('website')) {
            Log::info('Lead form honeypot triggered', ['ip' => $request->ip()]);

            return $this->respond($request, $redirect);
        }

        // Збір способів зв'язку
        $preferences = [];
        if ($request->has('no_call')) $preferences[] = 'Не телефонувати';
        if ($request->has('whatsapp')) $preferences[] = 'WhatsApp';
        if ($request->has('viber')) $preferences[] = 'Viber';
        if ($request->has('telegram')) $preferences[] = 'Telegram';

        $contactMethods = count($preferences) ? implode(', ', $preferences) : 'Не вказано';

        $utm = [];
        foreach (['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'] as $key) {
            $utm[$key] = (string) $request->cookie($key, '');
        }

        // Email + Bitrix are sent after the response reaches the user, so a slow
        // SMTP server or CRM no longer delays the "thank you" page.
        ProcessLead::dispatchAfterResponse($validated, $contactMethods, $utm);

        return $this->respond($request, $redirect);
    }

    private function respond(Request $request, string $redirect)
    {
        return $request->expectsJson()
            ? response()->json(['redirect' => $redirect])
            : redirect()->to($redirect);
    }
}
