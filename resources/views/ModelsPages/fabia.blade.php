@section('title', 'Škoda Fabia – компактний хетчбек, купити у Кременчуці')

@php
    $model = \App\Models\Models::where('url', 'fabia')->with('images')->first();
    $models = \App\Models\Models::where('url', '!=', 'fabia')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Fabia – компактний хетчбек з низьким споживанням пального. Дізнайтеся про ціни, комплектації та вигідні пропозиції на Fabia в офіційного дилера Škoda у Кременчуці.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Fabia – компактний хетчбек, купити у Кременчуці">
    <meta property="og:description"
        content="Škoda Fabia – компактний хетчбек з низьким споживанням пального. Дізнайтеся про ціни, комплектації та вигідні пропозиції на Fabia в офіційного дилера Škoda у Кременчуці.">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ url(Storage::url($primaryImage->image)) }}">
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col">
            <x-text.main-title>Купити нову Škoda Fabia</x-text.main-title>
            <x-text.title>Škoda Fabia – ваш стиль у ритмі міста</x-text.title>
            <x-text.text class="mb-12 mt-2">Fabia створена для тих, хто цінує свободу руху й власний ритм життя.
                Це міський хетчбек, який поєднує в собі динаміку, комфорт і сучасні технології.
                Він легко вписується в тісні вулиці мегаполісу, але при цьому дарує відчуття простору всередині.
            </x-text.text>

            <x-text.title>Що робить Fabia особливою:</x-text.title>
            <ul class="mb-12 mt-2">
                <li> <x-text.text> - виразний дизайн з аеродинамічними лініями та LED-оптикою.</x-text.text>
                </li>
                <li> <x-text.text> - потужні й економічні двигуни для активного міського темпу.</x-text.text>
                </li>
                <li> <x-text.text> - просторий салон і місткий багажник у компактному форматі.</x-text.text></li>
                <li> <x-text.text> - сучасні системи безпеки й асистенти водія.</x-text.text></li>
                <li> <x-text.text> - мультимедійні функції, які завжди тримають вас на зв’язку.</x-text.text></li>
            </ul>

            <x-text.text class="mb-6">Fabia — це більше, ніж автомобіль для поїздок на роботу чи зустрічей.
                Це стиль, енергія й свобода бути собою у будь-якій ситуації.</x-text.text>
            <x-text.text class="mb-12"><strong>Škoda Fabia. Міський характер. Ваш характер.</strong></x-text.text>

            <x-text.title>Технічні характеристики:</x-text.title>
            <img src="{{ Storage::url('/images/models/fabia/fabia_1.webp') }}" alt="Fabia sizes" class="my-16"
                loading="lazy" />
            <a href="{{ Storage::url('/images/models/fabia/Broshura_Fabia.pdf') }}" target="_blank"
                class="text-skoda-emerald-green cursor-pointer text-2xl underline mb-16">
                Більше про Fabia
            </a>
        </x-section>
    </div>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
