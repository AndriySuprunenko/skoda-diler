@php
    $models = \App\Models\Models::get();
@endphp

<div class="flex flex-col justify-around lg:p-8 w-full bg-skoda-emerald-green">
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
                                    loading="lazy" class="w-full h-[530px] object-cover object-center rounded-lg">
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-next after:text-skoda-emerald-green"></div>
                    <div class="swiper-button-prev after:text-skoda-emerald-green"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="absolute bottom-10 right-10 z-20 text-skoda-electric-green">
                    <x-Text.title>{{ $model->name }}</x-Text.title>
                </div>
                <div class="absolute top-10 left-10 z-20">
                    <x-Header.logo />
                </div>
            </div>

            <div
                class="relative flex flex-col gap-4 w-full max-w-[900px] lg:max-w-[700px] border-2 border-solid border-skoda-electric-green p-4 md:p-8  {{ $roundedBl }}  bg-skoda-white text-skoda-emerald-green z-10">
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
                    <div class="flex gap-2 mb-4">
                        <div class="w-5 h-5 rounded-4xl bg-skoda-black"></div>
                        <div class="w-5 h-5 rounded-4xl bg-skoda-white border-2 border-solid border-skoda-black"></div>
                        <div class="w-5 h-5 rounded-4xl bg-skoda-red"></div>
                        <div class="w-5 h-5 rounded-4xl bg-skoda-blue"></div>
                        <div class="w-5 h-5 rounded-4xl bg-skoda-orange"></div>
                    </div>
                </div>
                <div
                    class="flex gap-2 flex-col lg:flex-row text-center lg:text-start max-w-[400px] lg:max-w-[500px] m-auto">
                    <x-Buttons.button-electric>
                        Завантажити прайс
                    </x-Buttons.button-electric>
                    <x-Buttons.button-emerald-electric>
                        Детальніше про модель
                    </x-Buttons.button-emerald-electric>
                </div>
                {{-- <div
                    class="absolute -z-10 top-0 left-0 w-[700px] h-[200px] bg-skoda-electric-green -rotate-12 -translate-x-8 -translate-y-24 ">
                </div> --}}
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
