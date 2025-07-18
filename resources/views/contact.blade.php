@section('title', 'Контакти')
@section('meta')
    <meta name="description" content="ТОВ Автоцентр-Кременчук-2012">
    <meta name="keywords" content="Škoda, Автоцентр, Автомобілі">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="ТОВ Автоцентр-Кременчук-2012">
    <meta property="og:description" content="ТОВ Автоцентр-Кременчук-2012 Офіційний дилер автомобілів ŠKODA в м. Кременчук">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('main.webp') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "ТОВ Автоцентр-Кременчук-2012",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "ТОВ Автоцентр-Кременчук-2012 Офіційний дилер автомобілів ŠKODA в м. Кременчук",
    }
    </script>
@endsection

<x-layout>
</x-layout>
