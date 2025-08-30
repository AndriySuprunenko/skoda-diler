    @props(['otherCars'])

    @if (!$otherCars->isEmpty())
        <x-section class="bg-skoda-electric-green text-center">
            <x-text.title>Інші моделі на складі</x-text.subtitle>
                <div class="flex flex-wrap gap-8 mt-8 items-center justify-center">
                    {{-- Перебираємо моделі --}}
                    @if (count($otherCars) > 4)
                        @php
                            $otherCars = $otherCars->random(4);
                        @endphp
                    @endif
                    @foreach ($otherCars as $modl)
                        <a href="{{ route('stock.car.details', $modl->id) }}"
                            class="block hover:shadow-lg transition overflow-hidden max-w-[350px]">
                            <div class="w-full relative">
                                <div class="w-full">
                                    <img src="{{ Storage::url($modl->gallery[0]) }}" alt="Фото моделі {{ $modl->name }}"
                                        class="w-full h-[250px] object-cover object-center">
                                </div>
                                <div class="w-full bg-black/70 absolute bottom-0">
                                    <x-text.subtitle class="my-2" color='white'>
                                        {{ $modl->name }}</x-text.subtitle>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
        </x-section>
    @endif
