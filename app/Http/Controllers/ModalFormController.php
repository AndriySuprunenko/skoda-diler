<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ModalFormRequest;

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

        Mail::to('suprunenko.andriy@gmail.com')->send(new ModalFormRequest($validated, $contactMethods));

        return back()->with('success', 'Дякуємо! Вашу заявку надіслано.');
    }
}
