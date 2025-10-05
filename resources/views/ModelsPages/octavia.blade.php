@section('title', 'Octavia A8')

@php
    $model = \App\Models\Models::where('url', 'octavia-a8')->with('images')->first();
    $models = \App\Models\Models::where('url', '!=', 'octavia-a8')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Новий Škoda Octavia – сучасний седан з просторим салоном та інноваційними технологіями. Дізнайтеся більше про комплектації та ціни від офіційного дилера у Кременчуці.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Octavia – стильний седан, купити у Кременчуці">
    <meta property="og:description"
        content="Новий Škoda Octavia – сучасний седан з просторим салоном та інноваційними технологіями. Дізнайтеся більше про комплектації та ціни від офіційного дилера у Кременчуці.">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col">
            <x-text.title>Škoda Octavia — дорога до нових відкриттів</x-text.title>
            <x-text.text class="mb-12 mt-2"><strong>Нова Škoda Octavia</strong> втілила в собі успіх бренду та продовжує
                вражати своєю
                технологічністю та
                практичністю.
                Це автомобіль для тих, хто хоче <strong>щодня отримувати нові враження</strong>, зберігаючи зручність і
                безпеку.</x-text.text>

            <x-text.title>Технології, які полегшують життя</x-text.title>
            <ul class="mb-12 mt-2">
                <li> <x-text.text> - <strong>Віртуальна панель приладів</strong> з 10-дюймовим дисплеєм</x-text.text>
                </li>
                <li> <x-text.text> - 13-дюймовий дисплей мультимедіа Škoda для доступу до важливих опцій</x-text.text>
                </li>
                <li> <x-text.text> - Система паркування останнього покоління</x-text.text></li>
                <li> <x-text.text> - Інтеграція смартфонів, CarPlay та Android Auto</x-text.text></li>
                <li> <x-text.text> - «М’яка» гібридна технологія для економії пального та динаміки на
                        дорозі</x-text.text></li>
            </ul>

            <x-text.title>Лінійка двигунів</x-text.title>
            <ul class="mb-12 mt-2">
                <li><x-text.text> - TDI та TSI з перевіреною надійністю</x-text.text></li>
                <li><x-text.text> - Висока ефективність, низькі витрати пального</x-text.text></li>
            </ul>

            <a href="{{ Storage::url('/images/models/octavia/Katalog_Octavia.pdf') }}" target="_blank"
                class="text-skoda-emerald-green cursor-pointer text-2xl underline mb-16">
                Більше про Octavia
            </a>

            <x-video url="https://www.youtube.com/watch?v=0EIE8yrHN7w" />
        </x-section>
    </div>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Часті запитання</x-text.title>
        <x-accordion :items="[
            [
                'title' => 'Які версії двигунів доступні?',
                'content' => 'TDI, TSI та гібридні варіанти для економії та динаміки.',
            ],
            [
                'title' => 'Чи можна здати старе авто по трейд-ін?',
                'content' =>
                    'Так, приймаємо автомобілі з 2010 року та зараховуємо їхню вартість у ціну нового Octavia.',
            ],
            [
                'title' => 'Що робить салон Octavia технологічним?',
                'content' =>
                    ' Virtual Cockpit, мультимедійний дисплей, система паркування, інтеграція смартфонів та сучасні асистенти водія.',
            ],
        ]" />
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
