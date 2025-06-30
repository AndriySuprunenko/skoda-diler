@section('title', 'Škoda Kodiaq')
@section('meta')
    <meta name="description"
        content="Kodiaq - великий SUV від Škoda, який поєднує простір, комфорт та технології. Досконалий вибір для сім'ї.">
    <meta name="keywords"
        content="Kodiaq, Škoda, SUV, автомобіль, великий автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Kodiaq - Великий SUV від офіційного дилера">
    <meta property="og:description" content="Kodiaq - великий SUV від Škoda, який поєднує простір, комфорт та технології">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Kodiaq",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Великий SUV від Škoda, який поєднує простір, комфорт та технології"
    }
    </script>
@endsection

@php
    $model = \App\Models\Models::where('name', 'Kodiaq')->with('images')->first();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }

    if ($model->images->isEmpty()) {
        $model->images = collect([(object) ['image' => 'default/kodiaq-placeholder.jpg']]);
    }

    $primaryImage = $model->images->first();
@endphp

<x-layout>
    <x-section>
        <div class="relative z-20 w-full overflow-hidden">
            @if ($primaryImage)
                <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">
            @endif
            <!-- Slider main container -->
            <div class="swiper modelSwiper-{{ $model->id }}">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach ($model->images as $image)
                        <div class="swiper-slide">
                            <img src="{{ Storage::url($image->image) }}" alt="Фото моделі {{ $model->name }}"
                                loading="lazy" class="w-full h-[630px] object-cover object-center">
                        </div>
                    @endforeach
                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-next after:text-skoda-emerald-green"></div>
                <div class="swiper-button-prev after:text-skoda-emerald-green"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="absolute top-8 left-8 z-30">
                <x-Text.title color='white'>
                    Škoda {{ $model->name }}
                </x-Text.title>
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
    </x-section>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const images = Array.from(document.querySelectorAll('.swiper-slide img'));
        const overlay = document.getElementById('fullscreenOverlay');
        const fullImg = document.getElementById('fullscreenImage');

        const swiper = new Swiper('.modelSwiper-{{ $model->id }}', {
            loop: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            spaceBetween: 20,
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
        /* головний слайд ширший */
        max-width: 800px;
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
