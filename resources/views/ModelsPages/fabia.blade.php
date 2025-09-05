@section('title', 'Fabia')

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
        content="Fabia - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords"
        content="Fabia, Škoda, компактний автомобіль, стильний автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Fabia">
    <meta property="og:description"
        content="Fabia - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Fabia",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Fabia - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології."
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col">
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
