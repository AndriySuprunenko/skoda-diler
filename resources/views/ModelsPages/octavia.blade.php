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
        content="Škoda Octavia A8 - це новий рівень комфорту та технологій у класі компактних автомобілів.">
    <meta name="keywords" content="Škoda Octavia A8, компактний автомобіль, нові технології, комфорт, Škoda Кременчук">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Octavia A8">
    <meta property="og:description"
        content="Škoda Octavia A8 - це новий рівень комфорту та технологій у класі компактних автомобілів.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Octavia A8",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Škoda Octavia A8 - це новий рівень комфорту та технологій у класі компактних автомобілів.",
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
