<?php

use App\Jobs\ProcessLead;
use App\Mail\ModalFormRequest;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

$lead = ['name' => 'Іван', 'phone' => '+380501234567', 'type' => 'test-drive'];

beforeEach(function () {
    $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class);
    config(['services.bitrix_webhook' => 'https://crm.example.test/rest/1/abc/']);
});

it('sends a sales lead to the salon email and to Bitrix', function () use ($lead) {
    Mail::fake();
    Http::fake(['crm.example.test/*' => Http::response(['result' => 42])]);

    $this->post('/send-form', $lead)->assertRedirect('/thank-you');

    Mail::assertSent(ModalFormRequest::class, fn ($m) => $m->hasTo('salon@skoda-kremen.com.ua'));
    Http::assertSent(fn ($r) => str_ends_with($r->url(), '/crm.lead.add.json')
        && $r['fields']['NAME'] === 'Іван');
});

it('sends a service lead (with model) to the service email', function () use ($lead) {
    Mail::fake();
    Http::fake();

    $this->post('/send-form', $lead + ['model' => 'Octavia 2019'])->assertRedirect('/thank-you');

    Mail::assertSent(ModalFormRequest::class, fn ($m) => $m->hasTo('service@skoda-kremen.com.ua'));
});

it('returns JSON with the redirect target for fetch requests', function () use ($lead) {
    Bus::fake();

    $this->postJson('/send-form', $lead + ['price_url' => '/storage/models/prices/a.pdf'])
        ->assertOk()
        ->assertJson(['redirect' => '/thank-you?price=' . urlencode('/storage/models/prices/a.pdf')]);

    Bus::assertDispatchedAfterResponse(ProcessLead::class);
});

it('returns 422 with field errors for invalid fetch requests', function () {
    Bus::fake();

    $this->postJson('/send-form', ['type' => 'test-drive'])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'phone']);

    Bus::assertNothingDispatched();
});

it('silently drops honeypot submissions', function () use ($lead) {
    Bus::fake();

    $this->post('/send-form', $lead + ['website' => 'http://spam.test'])->assertRedirect('/thank-you');

    Bus::assertNothingDispatched();
});

it('still sends to Bitrix and logs when email fails', function () use ($lead) {
    Mail::shouldReceive('to')->andThrow(new RuntimeException('SMTP down'));
    Http::fake();
    Log::spy();

    $this->post('/send-form', $lead)->assertRedirect('/thank-you');

    Http::assertSentCount(1);
    Log::shouldHaveReceived('error')->withArgs(fn ($msg, $ctx) => $msg === 'Lead email failed'
        && $ctx['lead']['phone'] === '+380501234567');
});

it('logs when Bitrix rejects the lead', function () use ($lead) {
    Mail::fake();
    Http::fake(['*' => Http::response(['error' => 'INVALID'], 400)]);
    Log::spy();

    $this->post('/send-form', $lead)->assertRedirect('/thank-you');

    Log::shouldHaveReceived('error')->withArgs(fn ($msg) => $msg === 'Bitrix lead rejected');
});

it('rate limits the form endpoint', function () use ($lead) {
    Bus::fake();

    foreach (range(1, 10) as $i) {
        $this->postJson('/send-form', $lead)->assertOk();
    }

    $this->postJson('/send-form', $lead)->assertStatus(429);
});
