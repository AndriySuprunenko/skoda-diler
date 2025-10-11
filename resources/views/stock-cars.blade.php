@section('title', 'Автомобілі Škoda в наявності у Кременчуці – широкий вибір')

@section('meta')
    <meta name="description"
        content="У продажу більше 50 нових автомобілів Škoda в наявності на складі у Кременчуці. Ознайомтеся з моделями, фото та актуальними цінами. Запишіться на тест-драйв вже сьогодні!">
    <meta property="og:title" content="Автомобілі Škoda в наявності у Кременчуці – широкий вибір">
    <meta property="og:description"
        content="У продажу більше 50 нових автомобілів Škoda в наявності на складі у Кременчуці. Ознайомтеся з моделями, фото та актуальними цінами. Запишіться на тест-драйв вже сьогодні!">
    <meta property="og:image" content="{{ url(Storage::url('images/main.webp')) }}">
@endsection

@php
    $cars = \App\Models\StockCars::orderBy('updated_at', 'desc')->get();
    $newCars = $cars->where('condition', 'new');
    $usedCars = $cars->where('condition', 'used');
@endphp

<x-layout>
    <div x-data="{ tab: 'new' }">
        <x-section class="text-center">
            <x-text.main-title>Авто Škoda в наявності у Кременчуці</x-text.main-title>

            {{-- Вкладки --}}
            <div class="flex justify-center mt-6">
                <button @click="tab = 'new'"
                    :class="tab === 'new' ? 'bg-skoda-emerald-green text-white shadow-md' :
                        'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100'"
                    class="px-6 py-2 font-medium transition rounded-l-lg border-r-0 cursor-pointer"
                    aria-label="Показати нові автомобілі">
                    Нові авто ({{ $newCars->count() }})
                </button>

                <button @click="tab = 'used'"
                    :class="tab === 'used' ? 'bg-skoda-emerald-green text-white shadow-md' :
                        'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100'"
                    class="px-6 py-2 font-medium transition rounded-r-lg cursor-pointer"
                    aria-label="Показати вживані автомобілі">
                    Вживані авто ({{ $usedCars->count() }})
                </button>
            </div>

            {{-- Списки авто --}}
            <ul class="flex flex-wrap w-full justify-center gap-6 md:gap-12 lg:gap-16 mt-6 md:mt-12">

                {{-- Вживані авто --}}
                <div x-show="tab === 'used'" class="contents">
                    @forelse($usedCars as $car)
                        <li class="w-full max-w-[600px]">
                            <a href="{{ route('stock.car.details', $car->id) }}">
                                <x-stock-card :car="$car" />
                            </a>
                        </li>
                    @empty
                        <div class="w-full text-center text-gray-500 py-12">
                            <div class="max-w-md mx-auto">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Немає авто на складі</h3>
                                <p class="text-gray-500">Наразі немає доступних вживаних автомобілів.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Нові авто --}}
                <div x-show="tab === 'new'" class="contents">
                    @forelse($newCars as $car)
                        <li class="w-full max-w-[600px]">
                            <a href="{{ route('stock.car.details', $car->id) }}">
                                <x-stock-card :car="$car" />
                            </a>
                        </li>
                    @empty
                        <div class="w-full text-center text-gray-500 py-12">
                            <div class="max-w-md mx-auto">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Немає авто на складі</h3>
                                <p class="text-gray-500">Наразі немає доступних нових автомобілів.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

            </ul>
        </x-section>

        <x-section class="bg-skoda-emerald-green text-center">
            <x-text.title color='electric-green'>Не знайшли що шукали?</x-text.title>
            <x-text.subtitle color='electric-green' class="m-auto">
                Залиште заявку і ми підберемо найкраще авто для вас!
            </x-text.subtitle>
            <x-form value='Склад' />
        </x-section>
    </div>
</x-layout>
