@props(['models'])

<x-section class="bg-skoda-electric-green text-center">
    <x-Text.title>Інші моделі</x-Text.subtitle>
        <div class="flex flex-wrap gap-8 mt-8 items-center justify-center">
            {{-- Перебираємо моделі --}}
            @foreach ($models as $modl)
                <a href="/{{ Str::slug($modl->name) }}"
                    class="block hover:shadow-lg transition overflow-hidden max-w-[350px]">
                    <div class="w-full relative">
                        <img src="{{ Storage::url($modl->images->first()->image) }}" alt="Фото моделі {{ $modl->name }}"
                            class="w-full h-[250px] object-cover object-center">
                        <div class="w-full bg-black/70 absolute bottom-0">
                            <x-Text.subtitle class="my-2" color='white'>Škoda {{ $modl->name }}</x-Text.subtitle>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
</x-section>
<x-section class="bg-skoda-emerald-green text-center">
    <x-Text.title color='electric-green'>Не знайшли що шукали?</x-Text.title>
    <x-Text.subtitle color='electric-green' class="m-auto">Залиште заявку і ми підберемо найкраще авто для
        вас!</x-Text.subtitle>
    <x-form value='Склад' />
</x-section>
