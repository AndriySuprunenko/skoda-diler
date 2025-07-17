@section('title', 'Superb')

@php
    $model = \App\Models\Models::where('name', 'Superb')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Superb')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Superb - це великий автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords"
        content="Superb, Škoda, великий автомобіль, стильний автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Superb">
    <meta property="og:description"
        content="Superb - це великий автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Superb",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Superb - це великий автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології."
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
