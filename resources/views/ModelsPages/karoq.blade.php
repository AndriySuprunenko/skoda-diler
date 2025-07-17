@section('title', 'Karoq')

@php
    $model = \App\Models\Models::where('name', 'Karoq')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Karoq')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Karoq - це компактний кросовер від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords"
        content="Karoq, Škoda, SUV, автомобіль, великий автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Karoq">
    <meta property="og:description"
        content="Karoq - це компактний кросовер від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Karoq",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Karoq - це компактний кросовер від Škoda, який поєднує в собі стиль, комфорт та передові технології."
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
