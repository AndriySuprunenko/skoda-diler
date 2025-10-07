@section('title', 'Дякуємо')

@section('meta')
    <meta name="description" content="Дякуємо за заявку">
    <meta property="og:title" content="Дякуємо">
    <meta property="og:description" content="Дякуємо за заявку">
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
