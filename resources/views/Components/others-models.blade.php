@props(['models'])

<x-section class="bg-skoda-electric-green text-center">
    <x-text.title>Інші моделі</x-text.subtitle>
        <div class="flex flex-wrap gap-8 mt-8 items-center justify-center">
            {{-- Перебираємо моделі --}}
            @if (count($models) > 4)
                @php
                    $models = $models->random(4);
                @endphp
            @endif
            @foreach ($models as $modl)
                <a href="/{{ $modl->url }}" class="block hover:shadow-lg transition overflow-hidden max-w-[350px]">
                    <div class="w-full relative">
                        <img src="{{ Storage::url($modl->images->first()->image) }}" alt="Фото моделі {{ $modl->name }}"
                            class="w-full h-[250px] object-cover object-center">
                        <div class="w-full bg-black/70 absolute bottom-0">
                            <x-text.subtitle class="my-2" color='white'>{{ $modl->name }}</x-text.subtitle>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
</x-section>
<x-section class="bg-skoda-emerald-green text-center">
    <x-text.title color='electric-green'>Не знайшли що шукали?</x-text.title>
    <x-text.subtitle color='electric-green' class="m-auto">Залиште заявку і ми підберемо найкраще авто для
        вас!</x-text.subtitle>
    <x-form value='Склад' />
</x-section>
