@props(['models'])

<x-section>
    <x-Text.title>Інші моделі</x-Text.subtitle>
        <div class="flex flex-wrap gap-8 mt-8 justify-around items-center">
            {{-- Перебираємо моделі --}}
            @foreach ($models as $modl)
                <div class="relative">
                    <div class="w-full max-w-[400px] border-4 border-skoda-electric-green">
                        <img src="{{ Storage::url($modl->images->first()->image) }}" alt="Фото моделі {{ $modl->name }}"
                            class="w-full h-[300px] object-cover object-center">
                    </div>
                    <div class="absolute bottom-0 left-0 w-full max-w-[300px] p-4 rounded-lg">
                        <x-Text.subtitle color='electric-green'>{{ $modl->name }}</x-Text.subtitle>
                        <x-link href="/{{ Str::slug($modl->name) }}">Детальніше</x-link>
                    </div>
                </div>
            @endforeach
        </div>
</x-section>
