@section('title', 'New Kodiaq')

@php
    $model = \App\Models\Models::where('name', 'Kodiaq')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Kodiaq')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Kodiaq - великий SUV від Škoda, який поєднує простір, комфорт та технології. Досконалий вибір для сім'ї.">
    <meta name="keywords"
        content="Kodiaq, Škoda, SUV, автомобіль, великий автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Kodiaq - Великий SUV від офіційного дилера">
    <meta property="og:description" content="Kodiaq - великий SUV від Škoda, який поєднує простір, комфорт та технології">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Kodiaq",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Великий SUV від Škoda, який поєднує простір, комфорт та технології"
    }
    </script>
@endsection

<x-layout>
    {{-- Модель --}}
    <x-section>
        <x-information-block :model="$model" />
        <x-Text.title>Опис моделі</x-Text.subtitle>
            <x-Text.text class="mb-6">
                Škoda Kodiaq - це великий SUV, який поєднує в собі простір, комфорт та передові технології. Цей
                автомобіль ідеально підходить для сімейних подорожей та активного відпочинку. Просторий інтер'єр
                забезпечує комфорт для всіх пасажирів, а потужний двигун гарантує відмінну динаміку та керованість
                на
                будь-яких дорогах. Kodiaq також оснащений сучасними системами безпеки та мультимедіа, що робить його
                ідеальним вибором для тих, хто цінує якість та надійність.

            </x-Text.text>
            <x-Text.text>
                Незважаючи на свій великий розмір, Kodiaq легко маневрує в міських умовах, а його елегантний дизайн
                привертає увагу. Цей автомобіль створений для тих, хто шукає поєднання стилю, функціональності та
                технологічних інновацій. Завдяки різноманітним варіантам комплектацій та кольорів, кожен може знайти
                свій ідеальний Kodiaq.
            </x-Text.text>
            {{-- Інші моделі --}}
            <x-others-models :models="$models" />
    </x-section>
    <x </x-layout>
