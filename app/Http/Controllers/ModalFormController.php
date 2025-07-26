<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ModalFormRequest;
use Illuminate\Support\Facades\Http;

class ModalFormController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'type' => 'required|string',
        ]);

        // Збираємо зручні способи звʼязку
        $preferences = [];
        if ($request->has('no_call')) $preferences[] = 'Не телефонувати';
        if ($request->has('whatsapp')) $preferences[] = 'WhatsApp';
        if ($request->has('viber')) $preferences[] = 'Viber';
        if ($request->has('telegram')) $preferences[] = 'Telegram';

        $contactMethods = count($preferences) ? implode(', ', $preferences) : 'Не вказано';

        $utm = [
            'utm_source' => $request->cookie('utm_source') ?? '',
            'utm_medium' => $request->cookie('utm_medium') ?? '',
            'utm_campaign' => $request->cookie('utm_campaign') ?? '',
            'utm_term' => $request->cookie('utm_term') ?? '',
            'utm_content' => $request->cookie('utm_content') ?? '',
        ];

        Mail::to('suprunenko.andriy@gmail.com')->send(new ModalFormRequest($validated, $contactMethods, $utm));

        // Підготовка UTM-даних для Bitrix24
        $utm_source = $utm['utm_source'] ?? '';
        $utm_medium = $utm['utm_medium'] ?? '';
        $utm_campaign = $utm['utm_campaign'] ?? '';
        $utm_content = $utm['utm_content'] ?? '';
        $utm_term = $utm['utm_term'] ?? '';

        $full_data = "Source: $utm_source/$utm_medium/$utm_campaign/$utm_content\nKW: $utm_term";

        // Відправка у Bitrix24
        $response = Http::post(env('BITRIX_WEBHOOK') . 'crm.lead.add.json', [
            'fields' => [
                'TITLE' => 'Заявка з сайту "skoda-diler"',
                'NAME' => $validated['name'],
                'PHONE' => [
                    ['VALUE' => $validated['phone'], 'VALUE_TYPE' => 'WORK']
                ],
                'SOURCE_ID' => 'WEB',
                'SOURCE_DESCRIPTION' => $full_data,
                'COMMENTS' => 'Тип: ' . $validated['type'] . "\n" .
                    'Спосіб звʼязку: ' . $contactMethods . "\n" .
                    'UTM: ' . implode(', ', array_filter($utm)),
            ],
            'params' => [
                'REGISTER_SONET_EVENT' => 'Y'
            ]
        ]);

        return back()->with('success', 'Дякуємо! Вашу заявку надіслано.');
    }
}
