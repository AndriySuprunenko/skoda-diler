@section('title', 'Дякуємо')

@section('meta')
    <meta name="description" content="Дякуємо за заявку">
    <meta name="keywords" content="Дякуємо">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Trade-in на автомобілі Škoda">
    <meta property="og:description" content="Обмін старого автомобіля на новий Škoda в Кременчуці">
    <meta property="og:type" content="financial.product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('/images/main.webp') }}">
@endsection

<x-layout>
    <x-section class="text-center">
        <x-text.main-title>Дякуємо що залишили заявку</x-text.main-title>
        <x-text.subtitle>Ми скоро з вами звʼяжемось</x-text.subtitle>
        @if (request()->has('price'))
            <div class="max-w-[300px] m-auto mt-4">
                <x-link :href="request()->get('price')" target="_blank">
                    Завантажити прайс
                </x-link>
            </div>
        @endif
        <div class="max-w-[300px] m-auto mt-6">
            <x-link style="outline" href="/"> Повернутися на головну</x-link>
        </div>
    </x-section>
</x-layout>
