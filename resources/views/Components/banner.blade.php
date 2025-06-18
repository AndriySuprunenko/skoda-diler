@php
    $sliders = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();
@endphp

<section class="relative w-full h-[500px] md:h-[848px]">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}"
                        class="w-full h-[500px] md:h-[848px] object-cover object-center" />
                    <div
                        class="absolute top-6 left-6 md:top-12 md:left-12 text-skoda-white flex flex-col gap-4 max-w-2xl lg:max-w-4xl text-center md:text-left">
                        <x-Text.title>{{ $slider->title }}</x-Text.title>
                        <x-Text.subtitle>{{ $slider->description }}</x-Text.subtitle>
                        @php
                            $items = [
                                $slider->item_one,
                                $slider->item_two,
                                $slider->item_three,
                                $slider->item_four,
                                $slider->item_five,
                                $slider->item_six,
                            ];
                        @endphp
                        <ul>
                            @foreach ($items as $item)
                                @if (!empty($item))
                                    <li class="text-base"> - {{ $item }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="w-full max-w-[300px] m-auto md:m-0">
                            @if ($slider->button_text)
                                <x-Buttons.button-electric>
                                    {{ $slider->button_text }}
                                </x-Buttons.button-electric>
                            @endif
                        </div>
                    </div>
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
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
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
</style>
