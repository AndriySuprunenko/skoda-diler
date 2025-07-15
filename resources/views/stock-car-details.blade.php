@php
    $car = \App\Models\StockCars::find($carId);
    if (!$car) {
        abort(404, 'Stock car not found');
    }
    $otherCars = \App\Models\StockCars::where('id', '!=', $carId)->where('status', '!=', 'sold')->get();
@endphp

@section('title', '{{ $car->name }}')
@section('meta')
    <meta name="description"
        content="{{ $car->name }} - це автомобіль, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords" content="{{ $car->name }}, автомобіль, стиль, комфорт, технології, Škoda Кременчук">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="{{ $car->name }}">
    <meta property="og:description"
        content="{{ $car->name }} - це автомобіль, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($car->gallery[0]) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "{{ $car->name }}",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "{{ $car->name }} - це автомобіль, який поєднує в собі стиль, комфорт та передові технології.",
    }
    </script>
@endsection

<x-layout>
    <x-section>
        <div class="bg-white shadow hover:shadow-xl transition-shadow duration-200 flex flex-col xl:flex-row">
            @php
                // Безпечне декодування галереї
                $gallery = [];
                if (is_array($car->gallery)) {
                    $gallery = $car->gallery;
                } elseif (is_string($car->gallery)) {
                    $decoded = json_decode($car->gallery, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        $gallery = $decoded;
                    }
                }

                // Безпечне отримання зображення
                $img = asset('images/no-car.jpg'); // значення за замовчуванням
                if (!empty($gallery) && isset($gallery[0]) && !empty($gallery[0])) {
                    $img = Storage::url($gallery[0]);
                }
            @endphp

            {{-- Зображення --}}
            <div class="w-full max-w-[900px] relative m-auto">
                {{-- <x-stock-card-img :car="$car" :img="$img" /> --}}
                <div class="swiper modelSwiper-{{ $car->id }}">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach ($gallery as $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image) }}" alt="Фото автомобіля {{ $car->name }}"
                                    loading="lazy" class="w-full h-[300px] md:h-[630px] object-cover object-center">
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-next after:text-skoda-emerald-green"></div>
                    <div class="swiper-button-prev after:text-skoda-emerald-green"></div>
                    <div class="swiper-pagination"></div>
                </div>
                {{-- Статуси --}}
                <div class="flex items-center gap-2 mb-3 flex-wrap absolute top-2 left-2 z-10">
                    @if ($car->status === 'sold')
                        <span class="px-2 py-1 text-md rounded bg-red-100 text-red-700">Продано</span>
                    @elseif($car->status === 'available')
                        <span class="px-2 py-1 text-md rounded bg-green-100 text-green-700">В
                            наявності</span>
                    @elseif($car->status === 'reserved')
                        <span class="px-2 py-1 text-md rounded bg-yellow-100 text-yellow-700">Заброньовано</span>
                    @elseif($car->status === 'hot_offer')
                        <span class="px-2 py-1 text-md rounded bg-orange-100 text-orange-700">Гаряча
                            пропозиція</span>
                    @endif

                    @if ($car->condition === 'new')
                        <span class="px-2 py-1 text-md rounded bg-blue-100 text-blue-700">Новий</span>
                    @elseif($car->condition === 'used')
                        <span class="px-2 py-1 text-md rounded bg-gray-100 text-gray-700">Вживаний</span>
                    @endif
                </div>
                <div class="flex items-center gap-2 mb-3 flex-wrap absolute top-2 right-2 z-10">
                    <span class="px-2 py-1 text-md rounded bg-gray-100 text-gray-500">Зараз цю модель переглядають:
                        {{ random_int(1, 3) }}</span>
                </div>
            </div>

            {{-- Контент картки --}}
            <div class="p-4 flex flex-col flex-grow md:p-8">

                {{-- Назва моделі --}}
                <x-Text.main-title class="font-bold mb-3">{{ $car->name }}</x-Text.main-title>

                {{-- Основна інформація --}}
                <div class="mb-3 flex-grow text-lg">
                    <div class="space-y-2">
                        @if (!empty($car->color))
                            <div class="flex justify-between items-center border-b-4 border-skoda-emerald-green pb-1">
                                <span class="font-medium text-skoda-emerald-green">Колір</span>
                                <x-Text.text>{{ $car->color }}</x-Text.text>
                            </div>
                        @endif

                        @if (!empty($car->mileage))
                            <div class="flex justify-between items-center border-b-4 border-skoda-emerald-green pb-1">
                                <span class="text-skoda-emerald-green">Пробіг</span>
                                <x-Text.text>{{ number_format($car->mileage, 0, ',', ' ') }}
                                    км</x-Text.text>
                            </div>
                        @endif

                        @if (!empty($car->vin))
                            <div class="flex justify-between items-center border-b-4 border-skoda-emerald-green pb-1">
                                <span class="text-skoda-emerald-green">VIN-код</span>
                                <x-Text.text>{{ $car->vin }}</x-Text.text>
                            </div>
                        @endif

                        @if (!empty($car->engine_power))
                            <div class="flex justify-between items-center border-b-4 border-skoda-emerald-green pb-1">
                                <span class="text-skoda-emerald-green">Потужність</span>
                                <x-Text.text>{{ $car->engine_power }}</x-Text.text>
                            </div>
                        @endif

                        @if (!empty($car->engine_volume))
                            <div class="flex justify-between items-center border-b-4 border-skoda-emerald-green pb-1">
                                <span class="text-skoda-emerald-green">Об'єм</span>
                                <x-Text.text>{{ $car->engine_volume }}</x-Text.text>
                            </div>
                        @endif

                        @if (!empty($car->transmission))
                            <div class="flex justify-between items-center border-b-4 border-skoda-emerald-green pb-1">
                                <span class="text-skoda-emerald-green">Коробка</span>
                                <x-Text.text>{{ ucfirst($car->transmission) }}</x-Text.text>
                            </div>
                        @endif

                        @if (!empty($car->fuel_consumption))
                            <div class="flex justify-between items-center border-b-4 border-skoda-emerald-green pb-1">
                                <span class="text-skoda-emerald-green">Витрата палива</span>
                                <x-Text.text>{{ $car->fuel_consumption }}</x-Text.text>
                            </div>
                        @endif

                        @if (!empty($car->configuration))
                            <div class="flex justify-between items-center border-b-4 border-skoda-emerald-green pb-1">
                                <span class=" text-skoda-emerald-green">Комплектація</span>
                                <x-Text.text>{{ $car->configuration }}</x-Text.text>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Ціна --}}
                <div class="mb-4">
                    <x-price :carPrice="$car->price" />
                </div>

                {{-- Кнопка дії --}}
                <div class=" m-auto flex flex-wrap gap-6 w-full justify-center">
                    <div class="max-w-[300px] w-full">
                        <x-button style="emerald"
                            click="$dispatch('open-modal', { type: 'consultation', value: 'Склад {{ $car->name }}' })">
                            Замовити консультацію
                        </x-button>
                    </div>
                    <div class="max-w-[300px] w-full">
                        <x-link href="tel:+380676208844">Подзвонити</x-link>
                    </div>
                </div>
            </div>
            <div id="fullscreenOverlay"
                class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center hidden z-50">
                <button id="closeFullscreen"
                    class="absolute top-6 right-6 text-white text-4xl font-bold z-60 hover:text-gray-300">×</button>
                <button id="fullscreenPrev"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-5xl z-60 hover:text-gray-300">‹</button>
                <button id="fullscreenNext"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-5xl z-60 hover:text-gray-300">›</button>
                <img id="fullscreenImage" src="" alt="Зображення" class="max-w-full max-h-full">
            </div>
        </div>
    </x-section>

    <x-section class="bg-skoda-electric-green text-center">
        <x-Text.title>Інші моделі на складі</x-Text.subtitle>
            <div class="flex flex-wrap gap-8 mt-8 items-center justify-center">
                {{-- Перебираємо моделі --}}
                @foreach ($otherCars as $modl)
                    <a href="{{ route('stock.car.details', $modl->id) }}"
                        class="block hover:shadow-lg transition rounded-lg overflow-hidden max-w-[350px]">
                        <div class="w-full">
                            <img src="{{ Storage::url($modl->gallery[0]) }}" alt="Фото моделі {{ $modl->name }}"
                                class="w-full h-[250px] object-cover object-center rounded-t-lg">
                        </div>
                        <div class="w-full p-4 bg-skoda-emerald-green">
                            <x-Text.subtitle color='white'>Škoda {{ $modl->name }}</x-Text.subtitle>
                        </div>
                    </a>
                @endforeach
            </div>
    </x-section>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const images = Array.from(document.querySelectorAll('.swiper-slide img'));
        const overlay = document.getElementById('fullscreenOverlay');
        const fullImg = document.getElementById('fullscreenImage');

        const swiper = new Swiper('.modelSwiper-{{ $car->id }}', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            slideToClickedSlide: true,
            watchSlidesProgress: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        images.forEach(img => {
            img.addEventListener('click', () => {
                currentIndex = images.findIndex(i => i === img);
                fullImg.src = img.src;
                overlay.classList.remove('hidden');
            });
        });

        overlay.addEventListener('click', () => {
            overlay.classList.add('hidden');
        });

        document.getElementById('closeFullscreen').addEventListener('click', () => {
            overlay.classList.add('hidden');
        });

        let startX = 0;

        overlay.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        }, {
            passive: true
        });

        overlay.addEventListener('touchend', (e) => {
            const endX = e.changedTouches[0].clientX;
            const diff = endX - startX;
            if (Math.abs(diff) > 50) {
                if (diff < 0 && currentIndex < images.length - 1) {
                    currentIndex++;
                    fullImg.src = images[currentIndex].src;
                } else if (diff > 0 && currentIndex > 0) {
                    currentIndex--;
                    fullImg.src = images[currentIndex].src;
                }
            }
        }, {
            passive: true
        });
        // Додаємо обробники для стрілок навігації у повноекранному режимі
        document.getElementById('fullscreenNext').addEventListener('click', (e) => {
            e.stopPropagation();
            if (currentIndex < images.length - 1) {
                currentIndex++;
                fullImg.src = images[currentIndex].src;
            }
        });
        document.getElementById('fullscreenPrev').addEventListener('click', (e) => {
            e.stopPropagation();
            if (currentIndex > 0) {
                currentIndex--;
                fullImg.src = images[currentIndex].src;
            }
        });
    });
</script>
<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80%;
        cursor: pointer;
    }

    .swiper-pagination-bullet {
        background: #78FAAE;
        opacity: 1;
        width: 12px;
        height: 12px;
    }

    .swiper-pagination-bullet-active {
        background: white;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #0E3A2F;
        width: 40px;
        height: 50px;
        background-color: #78FAAE;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 30px;
        color: #0E3A2F;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: rgba(120, 250, 174, 0.8);
    }

    @media (max-width: 800px) {

        .swiper-button-prev,
        .swiper-button-next {
            display: none;
        }
    }

    #fullscreenOverlay {
        transition: opacity 0.3s ease;
    }
</style>
