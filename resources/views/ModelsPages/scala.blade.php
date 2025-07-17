@section('title', 'Scala')

@php
    $model = \App\Models\Models::where('name', 'Scala')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Scala')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Scala - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords"
        content="Scala, Škoda, компактний автомобіль, стильний автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Scala">
    <meta property="og:description"
        content="Scala - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Scala",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Scala - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології."
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
