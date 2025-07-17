@section('title', 'Kamiq FL')

@php
    $model = \App\Models\Models::where('name', 'Kamiq FL')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Kamiq FL')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Kamiq FL - це компактний кросовер, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords" content="Škoda Kamiq FL, компактний кросовер, нові технології, комфорт, Škoda Кременчук">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Kamiq FL">
    <meta property="og:description"
        content="Škoda Kamiq FL - це компактний кросовер, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Kamiq FL",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Škoda Kamiq FL - це компактний кросовер, який поєднує в собі стиль, комфорт та передові технології.",
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
