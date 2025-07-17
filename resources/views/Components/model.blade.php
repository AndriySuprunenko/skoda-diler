@php
    $models = \App\Models\Models::get();
@endphp

<div class="flex flex-col justify-around lg:p-8 w-full text-start">
    @foreach ($models as $model)
        @php
            $reverse = $model->id % 2 == 0 ? 'flex-col lg:flex-row-reverse' : '';
            $roundedBl =
                $model->id % 2 == 0
                    ? 'rounded-b-xl lg:rounded-br-none lg:rounded-l-xl'
                    : 'rounded-b-xl lg:rounded-bl-none lg:rounded-r-xl';
            $roundedImg =
                $model->id % 2 == 0
                    ? 'rounded-t-xl lg:rounded-tl-none lg:rounded-r-xl '
                    : 'rounded-t-xl lg:rounded-tr-none lg:rounded-l-xl ';
        @endphp
        <div class="flex flex-col lg:flex-row justify-center p-2 md:p-8 {{ $reverse }}">
            <div
                class="relative z-20 max-w-[900px] w-full lg:max-w-[1000px]  p-1 bg-skoda-electric-green  {{ $roundedImg }} overflow-hidden">
                <!-- Slider main container -->
                <div class="swiper modelSwiper-{{ $model->id }}">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach ($model->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image->image) }}" alt="Фото моделі {{ $model->name }}"
                                    loading="lazy"
                                    class="w-full h-[250px] md:h-[530px] object-cover object-center rounded-lg">
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-next after:text-skoda-emerald-green"></div>
                    <div class="swiper-button-prev after:text-skoda-emerald-green"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div
                class="flex flex-col gap-4 w-full max-w-[900px] lg:max-w-[700px] border-4 border-solid border-skoda-electric-green p-4 md:p-8  {{ $roundedBl }}  bg-skoda-white text-skoda-emerald-green relative z-10">
                <x-Text.title>Škoda {{ $model->name }}</x-Text.title>
                <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                    <span class="text-lg">Потужність двигуна </span>
                    <x-Text.text>
                        {{ $model->power }} кВт
                    </x-Text.text>
                </div>
                <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                    <span class="text-lg">Коробка</span>
                    <x-Text.text>
                        {{ $model->gear_box }}
                    </x-Text.text>
                </div>
                <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                    <span class="text-lg">Об'єм двигуна</span>
                    <x-Text.text>
                        {{ $model->engine_capacity }}
                    </x-Text.text>
                </div>
                <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                    <span class="text-lg">Середня витрата палива</span>
                    <x-Text.text>
                        {{ $model->fuel_consumtion }}
                    </x-Text.text>
                </div>
                <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                    <span class="text-lg">Комплектація</span>
                    <x-Text.text>
                        {{ $model->complectation }}
                    </x-Text.text>
                </div>
                <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                    <span class="text-lg">Кольори</span>
                    <x-colors :colors='$model->colors' />
                </div>
                <div
                    class="flex gap-2 flex-col lg:flex-row text-center lg:text-start max-w-[400px] lg:max-w-[500px] m-auto">
                    <x-button click="$dispatch('open-modal', { type: 'price' , value: '{{ $model->name }}' })">
                        Завантажити прайс
                    </x-button>
                    <x-link style='emerald' href="/{{ Str::slug($model->name) }}">Детальніше про модель</x-link>
                </div>
                <div
                    class="triangle-up absolute top-0 left-0 w-0 h-0 {{ $model->id % 2 == 0 ? 'lg:rounded-tl-lg' : '' }} -z-10">
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach ($models as $model)
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
        @endforeach
    });
</script>

<style>
    .triangle-up {
        border-bottom: 150px solid transparent;
        border-right: 50px solid transparent;
        border-left: 650px solid #78FAAE;
    }

    @media (max-width: 1280px) {
        .triangle-up {
            border-left: 500px solid #78FAAE;
        }
    }

    @media (max-width: 1024px) {
        .triangle-up {
            border-left: 450px solid #78FAAE;
        }
    }

    @media (max-width: 768px) {
        .triangle-up {
            border-left: 300px solid #78FAAE;
        }
    }
</style>
