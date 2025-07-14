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
                    <div class="rounded-t-lg w-full object-cover">
                        <img src="{{ $img }}" alt="Фото моделі {{ $car->name }}" loading="lazy"
                            class="w-full h-full object-cover object-center rounded-lg">
                    </div>
                    <div class="p-4 flex-1 flex flex-col">
                        <div class="flex items-center gap-2 mb-2">
                            @if ($car->status === 'sold')
                                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">Продано</span>
                            @elseif($car->status === 'available')
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">В
                                    наявності</span>
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
                        <x-Text.subtitle class="font-bold">{{ $car->name }}</x-Text.subtitle>
                        <div class="mb-2 flex flex-col gap-2">
                            @if ($car->color)
                                <div class="flex justify-between border-b-2 border-solid border-skoda-emerald-green ">
                                    <span class="text-lg text-skoda-emerald-green font-bold">Колір</span>
                                    <x-Text.text>
                                        {{ $car->color }}
                                    </x-Text.text>
                                </div>
                            @endif
                            @if ($car->mileage)
                                <div class="flex justify-between border-b-2 border-solid border-skoda-emerald-green ">
                                    <span class="text-lg text-skoda-emerald-green font-bold">Пробіг</span>
                                    <x-Text.text>
                                        {{ number_format($car->mileage, 0, ',', ' ') }} км
                                    </x-Text.text>
                                </div>
                            @endif
                            @if ($car->vin)
                                <div class="flex justify-between border-b-2 border-solid border-skoda-emerald-green ">
                                    <span class="text-lg text-skoda-emerald-green font-bold">VIN-код</span>
                                    <x-Text.text>
                                        {{ $car->vin }}
                                    </x-Text.text>
                                </div>
                            @endif
                        </div>
                        <div class="mb-2 flex flex-col gap-2">
                            @if ($car->engine_power)
                                <div class="flex justify-between border-b-2 border-solid border-skoda-emerald-green ">
                                    <span class="text-lg text-skoda-emerald-green font-bold">Потужність</span>
                                    <x-Text.text>
                                        {{ $car->engine_power }}
                                    </x-Text.text>
                                </div>
                            @endif
                            @if ($car->engine_volume)
                                <div class="flex justify-between border-b-2 border-solid border-skoda-emerald-green ">
                                    <span class="text-lg text-skoda-emerald-green font-bold">Обʼєм</span>
                                    <x-Text.text>
                                        {{ $car->engine_volume }}
                                    </x-Text.text>
                                </div>
                            @endif
                            @if ($car->transmission)
                                <div class="flex justify-between border-b-2 border-solid border-skoda-emerald-green ">
                                    <span class="text-lg text-skoda-emerald-green font-bold">Коробка</span>
                                    <x-Text.text>
                                        {{ ucfirst($car->transmission) }}
                                    </x-Text.text>
                                </div>
                            @endif
                            @if ($car->fuel_consumption)
                                <div class="flex justify-between border-b-2 border-solid border-skoda-emerald-green ">
                                    <span class="text-lg text-skoda-emerald-green font-bold">Витрата</span>
                                    <x-Text.text>
                                        {{ $car->fuel_consumption }}
                                    </x-Text.text>
                                </div>
                            @endif
                        </div>
                        @if ($car->configuration)
                            <div class="flex justify-between border-b-2 border-solid border-skoda-emerald-green ">
                                <span class="text-lg text-skoda-emerald-green font-bold">Комплектація</span>
                                <x-Text.text>
                                    {{ $car->configuration }}
                                </x-Text.text>
                            </div>
                        @endif
                        <x-price :carPrice="$car->price" />
                        <x-button style="emerald"
                            click="$dispatch('open-modal', { type: 'consultation', value: 'Склад {{ $car->name }}' })">
                            Дізнати більше
                        </x-button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-12">Немає авто за обраними параметрами.</div>
            @endforelse
        </div>
    </x-section>
</x-layout>
