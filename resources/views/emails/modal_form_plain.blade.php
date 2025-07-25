Імʼя: {{ $data['name'] }}
Телефон: {{ $data['phone'] }}
Тип заявки: {{ $data['type'] }}
Бажаний спосіб звʼязку: {{ $contactMethods }}

UTM-мітки:
@foreach ($utm as $key => $value)
    @if (!empty($value))
        {{ strtoupper($key) }}: {{ $value }}
    @endif
@endforeach
