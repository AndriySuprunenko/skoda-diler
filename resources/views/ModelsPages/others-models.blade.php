@props(['models'])

<x-section class="bg-skoda-electric-green text-center">
    <x-Text.title>Інші моделі</x-Text.subtitle>
        <div class="flex flex-wrap gap-8 mt-8 items-center justify-center">
            {{-- Перебираємо моделі --}}
            @foreach ($models as $modl)
                <a href="/{{ Str::slug($modl->name) }}"
                    class="block hover:shadow-lg transition rounded-lg overflow-hidden max-w-[350px]">
                    <div class="w-full">
                        <img src="{{ Storage::url($modl->images->first()->image) }}" alt="Фото моделі {{ $modl->name }}"
                            class="w-full h-[250px] object-cover object-center rounded-t-lg">
                    </div>
                    <div class="w-full p-4 bg-skoda-emerald-green">
                        <x-Text.subtitle color='white'>Škoda {{ $modl->name }}</x-Text.subtitle>
                    </div>
                </a>
            @endforeach
        </div>
</x-section>
