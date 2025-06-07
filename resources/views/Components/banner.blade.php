@php
    $sliders = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();
@endphp

<section class="banner">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('storage/app/public/' . $slider->image) }}" alt="{{ $slider->title }}"
                        class="w-full h-[848px] object-cover object-center" />
                    <div class="text">
                        <h2>{{ $slider->title }}</h2>
                        <p>{{ $slider->description }}</p>
                    </div>
                    @if ($slider->button_text)
                        <div class="absolute bottom-10 left-10">
                            <x-button>
                                {{ $slider->button_text }}
                            </x-button>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <!-- Навігація -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<script>
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        speed: 1000,
    });
</script>

<style>
    .banner {
        position: relative;
        width: 100%;
        height: 848px;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .text {
        position: absolute;
        top: 20px;
        left: 20px;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .text h2 {
        font-size: 36px;
        margin-bottom: 10px;
    }

    .text p {
        font-size: 18px;
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
        color: white;
        width: 40px;
        height: 50px;
        background-color: #0E3A2F;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 30px;
        color: white;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .swiper-button-next:after {}

    .swiper-button-prev:after {}
</style>
