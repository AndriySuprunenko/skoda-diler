@section('title', 'Fabia')

@php
    $model = \App\Models\Models::where('name', 'Fabia')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Fabia')->with('images')->get();

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
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
