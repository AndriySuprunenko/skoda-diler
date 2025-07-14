@section('title', 'Авто на складі')

@section('meta')
    <meta name="description" content="Авто на складі Škoda в Кременчуці. Широкий вибір моделей та вигідні умови покупки.">
    <meta name="keywords" content="авто на складі, Škoda, Кременчук, автомобілі, продаж">
    <meta property="og:title" content="Авто на складі Škoda">
    <meta property="og:description"
        content="Авто на складі Škoda в Кременчуці. Широкий вибір моделей та вигідні умови покупки.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ asset('images/stock-cars-og.jpg') }}">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Авто на складі Škoda",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "Product",
        "description": "Авто на складі Škoda в Кременчуці. Широкий вибір моделей та вигідні умови покупки."
    }
    </script>
@endsection

@php
    $cars = \App\Models\StockCars::orderBy('created_at', 'desc')->get();
@endphp

<x-layout>
    {{-- <x-Text.main-title>Авто на складі</x-Text.main-title> --}}
    <x-section>
        <ul class="flex flex-wrap w-full justify-center gap-6">
            @forelse($cars as $car)
                <li class="w-full max-w-[600px]">
                    <x-stock-card :car="$car" />
                </li>
            @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <div class="max-w-md mx-auto">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Немає авто на складі</h3>
                        <p class="text-gray-500">Наразі немає доступних автомобілів за обраними параметрами.</p>
                    </div>
                </div>
            @endforelse
        </ul>
    </x-section>
</x-layout>
