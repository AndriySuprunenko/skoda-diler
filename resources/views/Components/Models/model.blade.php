@php
    $models = \App\Models\Models::get();
@endphp

<div class="flex flex-col justify-around items-center p-8 w-full bg-skoda-emerald-green">
    @foreach ($models as $model)
        <div class="flex justify-around items-center p-8 w-full {{ $model->id % 2 == 0 ? 'flex-row-reverse' : '' }}">
            <div class="relative z-20 w-full md:w-fit p-4 bg-skoda-electric-green rounded-xl">
                <img loading="lazy" class="w-[900px] h-[500px] object-cover object-center"
                    src="{{ Vite::asset('storage/app/public/' . $model->image) }}"
                    alt="Škoda {{ $model->name }} - Full vehicle view" role="img" />
                <div class="absolute bottom-10 right-10 z-20 text-skoda-electric-green">
                    <x-Text.title>{{ $model->name }}</x-Text.title>
                </div>
                <div class="absolute top-10 left-10 z-20">
                    <x-Header.logo />
                </div>
            </div>
            <div
                class="relative flex flex-col gap-4 w-[600px] border border-solid border-skoda-emerald-green p-8 rounded-xl bg-skoda-white text-skoda-emerald-green z-10">
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
                <div class="flex gap-2">
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
