@php
    $sliders = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();
@endphp

<section class="relative w-full h-[848px]">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('storage/app/public/' . $slider->image) }}" alt="{{ $slider->title }}"
                        class="w-full h-[848px] object-cover object-center" />
                    <div class="text flex flex-col gap-4">
                        <x-title>{{ $slider->title }}</x-title>
                        <x-subtitle>{{ $slider->description }}</x-subtitle>
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
                                    <li> - {{ $item }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div>
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

    .text {
        position: absolute;
        top: 50px;
        left: 50px;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
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
