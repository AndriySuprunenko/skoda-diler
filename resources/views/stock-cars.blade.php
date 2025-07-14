@section('title', 'Авто на складі')

@section('meta')
    <meta name="description" content="Авто на складі Škoda в Кременчуці. Широкий вибір моделей та вигідні умови покупки.">
    <meta name="keywords" content="авто на складі, Škoda, Кременчук, автомобілі, продаж">
    <meta property="og:title" content="Авто на складі Škoda">
    <meta property="og:description"
        content="Авто на складі Škoda в Кременчуці. Широкий вибір моделей та вигідні умови покупки.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('kredit/') }}">
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
    $cars = \App\Models\StockCars::get();
@endphp

<x-layout>
    <x-section>
        <x-Text.main-title>Авто на складі</x-Text.main-title>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($cars as $car)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col">
                    @php
                        $gallery = is_array($car->gallery) ? $car->gallery : json_decode($car->gallery, true) ?? [];
                        $img = count($gallery) ? Storage::url($gallery[0]) : asset('images/no-car.jpg');
                    @endphp
                    <img src="{{ $img }}" alt="{{ $car->name }}"
                        class="rounded-t-lg w-full h-48 object-cover">
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="flex items-center gap-2 mb-2">
                            @if ($car->status === 'sold')
                                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">Продано</span>
                            @elseif($car->status === 'available')
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">В наявності</span>
                            @elseif($car->status === 'reserved')
                                <span
                                    class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">Заброньовано</span>
                            @elseif($car->status === 'hot_offer')
                                <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">Гаряча
                                    пропозиція</span>
                            @endif

                            @if ($car->condition === 'new')
                                <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-700">Новий</span>
                            @elseif($car->condition === 'used')
                                <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-700">Вживаний</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $car->name }}</h3>
                        <div class="text-sm text-gray-500 mb-2 flex flex-wrap gap-2">
                            @if ($car->color)
                                <span>Колір: {{ $car->color }}</span>
                            @endif
                            @if ($car->mileage)
                                <span>Пробіг: {{ number_format($car->mileage, 0, ',', ' ') }} км</span>
                            @endif
                            @if ($car->vin)
                                <span>VIN: {{ $car->vin }}</span>
                            @endif
                        </div>
                        <div class="text-sm text-gray-500 mb-2 flex flex-wrap gap-2">
                            @if ($car->engine_power)
                                <span>Потужність: {{ $car->engine_power }}</span>
                            @endif
                            @if ($car->engine_volume)
                                <span>Обʼєм: {{ $car->engine_volume }}</span>
                            @endif
                            @if ($car->transmission)
                                <span>Коробка: {{ ucfirst($car->transmission) }}</span>
                            @endif
                            @if ($car->fuel_consumption)
                                <span>Витрата: {{ $car->fuel_consumption }}</span>
                            @endif
                        </div>
                        @if ($car->configuration)
                            <div class="text-xs text-gray-700 mb-2">Комплектація: {{ $car->configuration }}</div>
                        @endif
                        <div class="text-xl font-semibold text-skoda-emerald-green mb-2">
                            {{ number_format($car->price, 0, ',', ' ') }} ₴</div>
                        <a href="tel:+380000000000"
                            class="mt-auto block text-center px-4 py-2 bg-skoda-electric-green text-white rounded hover:bg-skoda-emerald-green transition">Зателефонувати</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-12">Немає авто за обраними параметрами.</div>
            @endforelse
        </div>
    </x-section>
</x-layout>
