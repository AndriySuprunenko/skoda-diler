@section('title', 'Дякуємо')

@section('meta')
    <meta name="description" content="Дякуємо за заявку">
    <meta name="keywords" content="Дякуємо">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Trade-in на автомобілі Škoda">
    <meta property="og:description" content="Обмін старого автомобіля на новий Škoda в Кременчуці">
    <meta property="og:type" content="financial.product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('main.webp') }}">
@endsection

<x-layout>
    <x-section class="text-center">
        <x-Text.main-title>Дякуємо що залишили заявку</x-Text.main-title>
        <x-Text.subtitle>Ми скоро з вами звʼяжемось</x-Text.subtitle>
        <div class="max-w-[300px] m-auto mt-6">
            <x-link href="/"> Повернутися на головну</x-link>
        </div>
    </x-section>
</x-layout>
