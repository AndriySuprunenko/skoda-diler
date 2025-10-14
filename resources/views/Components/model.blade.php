@php
    $models = \App\Models\Models::orderBy('order')->get();
@endphp

<div class="flex flex-col justify-around lg:p-8 w-full text-start">
    @foreach ($models as $model)
        @php
            $reverse = $model->order % 2 == 0 ? 'flex-col lg:flex-row-reverse' : '';
        @endphp
        <div class="flex flex-col lg:flex-row justify-center p-2 md:p-8 {{ $reverse }} w-full">
            <div class="relative z-20 w-full lg:max-w-[1000px]">
                <!-- Slider main container -->
                <div class="swiper modelSwiper-{{ $model->id }}">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach ($model->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ Storage::url($image->image) }}" alt="Фото моделі {{ $model->name }}"
                                    loading="lazy" class="w-full h-[250px] md:h-[530px] object-cover object-center">
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
                class="flex flex-col gap-4 w-full lg:max-w-[700px] p-4 md:p-7  bg-skoda-white text-skoda-emerald-green relative z-10">
                <x-text.title>{{ $model->name }}</x-text.title>
                <div
                    class="flex md:justify-between border-b-4 border-solid border-skoda-emerald-green flex-col md:flex-row">
                    <span class="text-lg">Потужність двигуна </span>
                    <x-text.text>
                        {{ $model->power }}
                    </x-text.text>
                </div>
                <div
                    class="flex md:justify-between border-b-4 border-solid border-skoda-emerald-green flex-col md:flex-row">
                    <span class="text-lg">Коробка</span>
                    <x-text.text>
                        {{ $model->gear_box }}
                    </x-text.text>
                </div>
                <div
                    class="flex justify-between border-b-4 border-solid border-skoda-emerald-green flex-col md:flex-row ">
                    <span class="text-lg">Об'єм двигуна</span>
                    <x-text.text>
                        {{ $model->engine_capacity }}
                    </x-text.text>
                </div>
                <div
                    class="flex justify-between border-b-4 border-solid border-skoda-emerald-green flex-col md:flex-row ">
                    <span class="text-lg">Середня витрата палива</span>
                    <x-text.text>
                        {{ $model->fuel_consumtion }}
                    </x-text.text>
                </div>
                @if ($model->url === 'enyaq')
                    <div
                        class="flex justify-between border-b-4 border-solid border-skoda-emerald-green flex-col md:flex-row ">
                        <span class="text-lg">Запас ходу</span>
                        <x-text.text>
                            до 582 км (WLTP)
                        </x-text.text>
                    </div>
                @endif
                <div
                    class="flex justify-between border-b-4 border-solid border-skoda-emerald-green flex-col md:flex-row ">
                    <span class="text-lg">Комплектація</span>
                    <x-text.text>
                        {{ $model->complectation }}
                    </x-text.text>
                </div>
                <div
                    class="flex justify-between border-b-4 border-solid border-skoda-emerald-green flex-col md:flex-row ">
                    <span class="text-lg">Кольори</span>
                    <x-colors :colors='$model->colors' />
                </div>
                <div class="flex gap-6 flex-col lg:flex-row text-center lg:text-start mt-6">
                    <x-button
                        click="$dispatch('open-modal', { type: 'price' , value: '{{ $model->name }}', price: '{{ Storage::url($model->price) }}' })">
                        Завантажити прайс
                    </x-button>
                    <x-link style='emerald' href="/{{ $model->url }}">Детальніше про модель</x-link>
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
