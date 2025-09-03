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
        <x-text.main-title>Дякуємо що залишили заявку</x-text.main-title>
        <x-text.subtitle>Ми скоро з вами звʼяжемось</x-text.subtitle>
        <div class="max-w-[300px] m-auto mt-6">
            <x-link href="/"> Повернутися на головну</x-link>
        </div>
        @if (request()->has('price'))
            <div class="max-w-[300px] m-auto mt-4">
                <x-link style="outline" :href="request()->get('price')" target="_blank">
                    Завантажити прайс
                </x-link>
            </div>
        @endif
    </x-section>
</x-layout>
