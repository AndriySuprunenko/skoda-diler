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
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse($cars as $car)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col">
                    @php
                        $gallery = is_array($car->gallery) ? $car->gallery : json_decode($car->gallery, true) ?? [];
                        $img = count($gallery) ? Storage::url($gallery[0]) : asset('images/no-car.jpg');
                    @endphp
                    <div class="swiper modelSwiper-{{ $car->id }} rounded-t-lg w-full object-cover">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach ($car->gallery as $image)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::url($image) }}" alt="Фото моделі {{ $car->name }}"
                                        loading="lazy" class="w-full h-full object-cover object-center rounded-lg">
                                </div>
                            @endforeach
                        </div>
                        <!-- Navigation buttons -->
                        <div class="swiper-button-next after:text-skoda-emerald-green"></div>
                        <div class="swiper-button-prev after:text-skoda-emerald-green"></div>
                        <div class="swiper-pagination"></div>
                    </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const images = Array.from(document.querySelectorAll('.swiper-slide img'));
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
