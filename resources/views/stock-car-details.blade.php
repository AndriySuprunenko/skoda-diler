@php
    $car = \App\Models\StockCars::find($carId);
    $contacts = \App\Models\Contacts::first();
    if (!$car) {
        abort(404, 'Stock car not found');
    }
    $otherCars = \App\Models\StockCars::where('id', '!=', $carId)->where('status', '!=', 'sold')->get();
    $name = $car->name ?? 'Автомобіль на складі';

    $contentPhoto = $car->gallery[0] ?? '/images/no-car.webp';
@endphp

@section('title')
    Купити нову {{ $car->name }} {{ $car->color }} - ціна {{ number_format($car->price, 0, '', ' ') }} ₴ в наявності у
    Кременчуці.
@endsection

@section('meta')
    @if ($car->condition === 'new')
        <meta property="og:title"
            content="Купити нову {{ $car->name }} {{ $car->color }} - ціна {{ $car->price }} ₴ в наявності у Кременчуці.">
        <meta property="og:description"
            content="Продаємо {{ $car->name }} зі складу у Кременчуці від офіційного дилера. @if (!empty($car->transmission)) "Коробка {{ $car->transmission }}." @endif @if (!empty($car->color)) "Колір – {{ $car->color }}." @endif Актуальна ціна {{ $car->price }} ₴. Можна в кредит">
    @else
        <meta property="og:title"
            content="Купити вживаний {{ $car->name }} - ціна {{ $car->price }} ₴ в наявності у Кременчуці.">
        <meta property="og:description"
            content="За {{ $car->price }} купити перевірене авто з пробігом від офіційного дилера Škoda в м. Кременчук.">
    @endif
    <meta property="og:type" content="product">
    <meta property="product:price:amount" content="{{ $car->price }}">
    <meta property="product:price:currency" content="UAH">
    <meta property="og:image" content="{{ Storage::url($contentPhoto) }}">
@endsection

<x-layout>
    <x-section>
        <div class="bg-white flex flex-col xl:flex-row">
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
                $img = Storage::url('/images/no-car.webp'); // значення за замовчуванням
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
                        @if (empty($gallery))
                            <div class="swiper-slide">
                                <img src="{{ Storage::url('/images/no-car.webp') }}"
                                    alt="Фото автомобіля {{ $car->name }}" loading="lazy"
                                    class="w-full h-[300px] md:h-[630px] object-cover object-center">
                            </div>
                        @else
                            @foreach ($gallery as $image)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::url($image) }}" alt="Фото автомобіля {{ $car->name }}"
                                        loading="lazy" class="w-full h-[300px] md:h-[630px] object-cover object-center">
                                </div>
                            @endforeach
                        @endif
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
                    @elseif($car->status === 'in_delivery')
                        <span class="px-2 py-1 text-md rounded bg-purple-100 text-purple-700">Очікується в салоні</span>
                    @endif

                    @if ($car->condition === 'new')
                        <span class="px-2 py-1 text-md rounded bg-blue-100 text-blue-700">Новий</span>
                    @elseif($car->condition === 'used')
                        <span class="px-2 py-1 text-md rounded bg-gray-100 text-gray-700">Вживаний</span>
                    @endif
                </div>
                <div class="flex items-center gap-2 mb-3 flex-wrap absolute top-12 left-2 z-10">
                    <span class="px-2 py-1 text-md rounded bg-gray-100 text-gray-500">Зараз переглядають:
                        {{ random_int(1, 3) }}</span>
                </div>
            </div>

            {{-- Контент картки --}}
            <div class="p-4 flex flex-col flex-grow md:p-8">

                {{-- Назва моделі --}}
                <x-text.main-title class="font-bold mb-3">{{ $car->name }}</x-text.main-title>

                {{-- Основна інформація --}}
                <div class="mb-3 flex-grow text-lg">
                    <div class="space-y-2">
                        @if (!empty($car->color))
                            <div
                                class="flex justify-between border-b-4 border-skoda-emerald-green pb-1  flex-col md:flex-row">
                                <span class="font-medium text-skoda-emerald-green">Колір</span>
                                <x-text.text>{{ $car->color }}</x-text.text>
                            </div>
                        @endif

                        @if (!empty($car->mileage))
                            <div
                                class="flex justify-between border-b-4 border-skoda-emerald-green pb-1 flex-col md:flex-row">
                                <span class="text-skoda-emerald-green">Пробіг</span>
                                <x-text.text>{{ number_format($car->mileage, 0, ',', ' ') }}
                                    км</x-text.text>
                            </div>
                        @endif

                        @if (!empty($car->vin))
                            <div
                                class="flex justify-between border-b-4 border-skoda-emerald-green pb-1 flex-col md:flex-row">
                                <span class="text-skoda-emerald-green">VIN-код</span>
                                <x-text.text>{{ $car->vin }}</x-text.text>
                            </div>
                        @endif

                        @if (!empty($car->engine_power))
                            <div
                                class="flex justify-between border-b-4 border-skoda-emerald-green pb-1 flex-col md:flex-row">
                                <span class="text-skoda-emerald-green">Потужність</span>
                                <x-text.text>{{ $car->engine_power }}</x-text.text>
                            </div>
                        @endif

                        @if (!empty($car->engine_volume))
                            <div
                                class="flex justify-between border-b-4 border-skoda-emerald-green pb-1 flex-col md:flex-row">
                                <span class="text-skoda-emerald-green">Об'єм</span>
                                <x-text.text>{{ $car->engine_volume }}</x-text.text>
                            </div>
                        @endif

                        @if (!empty($car->transmission))
                            <div
                                class="flex justify-between border-b-4 border-skoda-emerald-green pb-1 flex-col md:flex-row">
                                <span class="text-skoda-emerald-green">Коробка</span>
                                <x-text.text>{{ ucfirst($car->transmission) }}</x-text.text>
                            </div>
                        @endif

                        @if (!empty($car->fuel_consumption))
                            <div
                                class="flex justify-between border-b-4 border-skoda-emerald-green pb-1 flex-col md:flex-row">
                                <span class="text-skoda-emerald-green">Витрата палива</span>
                                <x-text.text>{{ $car->fuel_consumption }}</x-text.text>
                            </div>
                        @endif

                        @if (!empty($car->configuration))
                            <div
                                class="flex justify-between border-b-4 border-skoda-emerald-green pb-1 flex-col md:flex-row mb-4">
                                <span class=" text-skoda-emerald-green">Комплектація</span>
                                <x-text.text>{{ $car->configuration }}</x-text.text>
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
                    @if (!empty($car->specification_file))
                        <div class="max-w-[300px] w-full">
                            <x-link href="{{ Storage::url($car->specification_file) }}" target="_blank"
                                style="outline">Файл з
                                характеристиками</x-link>
                        </div>
                    @endif
                    <div class="max-w-[300px] w-full">
                        <x-button style="emerald"
                            click="$dispatch('open-modal', { type: 'consultation', value: 'Склад {{ $car->name }}' })">
                            Замовити консультацію
                        </x-button>
                    </div>
                    <div class="max-w-[300px] w-full">
                        <x-link href="tel:{{ $contacts->phone }}" style="emerald-white">Зателефонуйте нам</x-link>
                    </div>
                    <div class="max-w-[300px] w-full">
                        <x-send-message-button>Написати нам</x-send-message-button>
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

    @if (!empty($car->description))
        <div class="bg-skoda-white p-4 md:p-12 flex flex-col gap-8 items-center">
            <x-text.title color="emerald-green">Опис автомобіля</x-text.title>
            <div class="prose w-full max-w-5xl m-auto p-8 rounded-2xl bg-skoda-white border-4 border-skoda-emerald-green text-skoda-emerald-green"
                id="car-description">
                {!! $car->description !!}
            </div>
        </div>
    @endif

    <x-other-models-stock :otherCars="$otherCars" />
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const images = Array.from(document.querySelectorAll('.swiper-slide img'));
        const overlay = document.getElementById('fullscreenOverlay');
        const fullImg = document.getElementById('fullscreenImage');

        const swiper = new Swiper('.modelSwiper-{{ $car->id }}', {
            loop: true,
            slideToClickedSlide: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
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
        width: 18px;
        height: 18px;
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

    #car-description table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    #car-description table th,
    #car-description table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #car-description table th {
        background-color: #f4f4f4;
        text-align: left;
    }

    #car-description a {
        color: #0e3a2f;
        text-decoration: underline;
    }

    #car-description a:hover {
        color: #078a57;
    }

    #car-description ul,
    #car-description ol {
        padding-left: 20px;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    #car-description blockquote {
        border-left: 4px solid #ddd;
        padding-left: 16px;
        color: #666;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    #car-description pre {
        background-color: #f4f4f4;
        padding: 16px;
        border-radius: 8px;
        overflow-x: auto;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    #car-description h2 {
        font-size: 36px;
        margin-bottom: 1rem;
    }

    #car-description h3 {
        font-size: 32px;
    }

    #car-description p {
        margin-top: 1rem;
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    #car-description li {
        margin-bottom: 0.5rem;
        list-style: disc;
    }
</style>
