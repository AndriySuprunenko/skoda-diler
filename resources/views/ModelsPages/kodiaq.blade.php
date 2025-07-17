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
    <x-information-block :model="$model" />
    <x-others-models :models="$models" />
</x-layout>
