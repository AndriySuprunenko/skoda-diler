@section('title', 'Kodiaq')
@section('meta')
    <meta name="description" content="Kodiaq - великий SUV від Škoda, який поєднує простір, комфорт та технології.">
    <meta name="keywords" content="Kodiaq, Škoda, SUV, автомобіль, великий автомобіль, комфорт, технології">
@endsection

@php
    $model = \App\Models\Models::where('name', 'Kodiaq')->first();
@endphp

<x-layout>
    <x-section>
        <div class="relative z-20 w-full overflow-hidden">
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
    </x-section>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.modelSwiper-{{ $model->id }}', {
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
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
