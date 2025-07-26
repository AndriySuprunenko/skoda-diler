Імʼя: {{ $data['name'] }}
Телефон: {{ $data['phone'] }}
Тип заявки: {{ $data['type'] }}
Бажаний спосіб звʼязку: {{ $contactMethods }}

@php
    $utmLabels = [
        'utm_source' => 'Джерело',
        'utm_medium' => 'Канал',
        'utm_campaign' => 'Кампанія',
        'utm_term' => 'Ключове слово',
        'utm_content' => 'Контент',
    ];
@endphp

UTM-мітки:
@forelse ($utm as $key => $value)
    @if (!empty($value))
        {{ $utmLabels[$key] ?? strtoupper($key) }}: {{ $value }}
    @endif
@empty
    Не вказано
@endforelse
