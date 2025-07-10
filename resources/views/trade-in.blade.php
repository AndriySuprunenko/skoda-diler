@section('title', 'Trade-in')

@section('meta')
    <meta name="description" content="Обмін старого автомобіля на новий Škoda в Кременчуці">
    <meta name="keywords" content="trade-in, обмін автомобіля, Škoda, Кременчук, автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Trade-in на автомобілі Škoda">
    <meta property="og:description" content="Обмін старого автомобіля на новий Škoda в Кременчуці">
    <meta property="og:type" content="financial.product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('trade-in/') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Kредит/Лізинг",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "FinancialProduct",
        "description": "Обмін старого автомобіля на новий Škoda в Кременчуці",
    }
    </script>
@endsection

<x-layout>

</x-layout>
