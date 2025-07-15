@props(['car'])

{{-- Компонент картки автомобіля --}}
{{-- Використовується для відображення інформації про автомобіль у списку на складі --}}
{{-- Параметри: --}}
{{-- $car - об'єкт автомобіля з усіма необхідними властивостями --}}

<div class="bg-white rounded-lg shadow hover:shadow-xl transition-shadow duration-200">
    @php
        // Безпечне декодування галереї
        $gallery = [];
        if (is_array($car->gallery)) {
            $gallery = $car->gallery;
        } elseif (is_string($car->gallery)) {
            $decoded = json_decode($car->gallery, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $gallery = $decoded;
            }
        }

        // Безпечне отримання зображення
        $img = asset('images/no-car.jpg'); // значення за замовчуванням
        if (!empty($gallery) && isset($gallery[0]) && !empty($gallery[0])) {
            $img = Storage::url($gallery[0]);
        }
    @endphp

    {{-- Зображення --}}
    <x-stock-card-img :car="$car" :img="$img" />

    {{-- Контент картки --}}
    <div class="p-4 flex flex-col flex-grow">

        {{-- Назва моделі --}}
        <x-Text.subtitle class="font-bold mb-3">{{ $car->name }}</x-Text.subtitle>

        {{-- Основна інформація --}}
        <div class="mb-3 flex-grow">
            <div class="space-y-2">
                @if (!empty($car->color))
                    <div class="flex justify-between items-center border-b border-gray-200 pb-1">
                        <span class="text-sm font-medium text-skoda-emerald-green">Колір</span>
                        <x-Text.text class="text-sm">{{ $car->color }}</x-Text.text>
                    </div>
                @endif

                @if (!empty($car->mileage))
                    <div class="flex justify-between items-center border-b border-gray-200 pb-1">
                        <span class="text-sm font-medium text-skoda-emerald-green">Пробіг</span>
                        <x-Text.text class="text-sm">{{ number_format($car->mileage, 0, ',', ' ') }}
                            км</x-Text.text>
                    </div>
                @endif

                @if (!empty($car->vin))
                    <div class="flex justify-between items-center border-b border-gray-200 pb-1">
                        <span class="text-sm font-medium text-skoda-emerald-green">VIN-код</span>
                        <x-Text.text class="text-sm font-mono">{{ $car->vin }}</x-Text.text>
                    </div>
                @endif

                @if (!empty($car->engine_power))
                    <div class="flex justify-between items-center border-b border-gray-200 pb-1">
                        <span class="text-sm font-medium text-skoda-emerald-green">Потужність</span>
                        <x-Text.text class="text-sm">{{ $car->engine_power }}</x-Text.text>
                    </div>
                @endif

                @if (!empty($car->engine_volume))
                    <div class="flex justify-between items-center border-b border-gray-200 pb-1">
                        <span class="text-sm font-medium text-skoda-emerald-green">Об'єм</span>
                        <x-Text.text class="text-sm">{{ $car->engine_volume }}</x-Text.text>
                    </div>
                @endif

                @if (!empty($car->transmission))
                    <div class="flex justify-between items-center border-b border-gray-200 pb-1">
                        <span class="text-sm font-medium text-skoda-emerald-green">Коробка</span>
                        <x-Text.text class="text-sm">{{ ucfirst($car->transmission) }}</x-Text.text>
                    </div>
                @endif

                @if (!empty($car->fuel_consumption))
                    <div class="flex justify-between items-center border-b border-gray-200 pb-1">
                        <span class="text-sm font-medium text-skoda-emerald-green">Витрата</span>
                        <x-Text.text class="text-sm">{{ $car->fuel_consumption }}</x-Text.text>
                    </div>
                @endif

                @if (!empty($car->configuration))
                    <div class="flex justify-between items-center border-b border-gray-200 pb-1">
                        <span class="text-sm font-medium text-skoda-emerald-green">Комплектація</span>
                        <x-Text.text class="text-sm">{{ $car->configuration }}</x-Text.text>
                    </div>
                @endif
            </div>
        </div>

        {{-- Ціна --}}
        <div>
            <x-price :carPrice="$car->price" />
        </div>

        {{-- Кнопка дії --}}
        {{-- <div class="m-auto">
            <x-button style="emerald"
                click="$dispatch('open-modal', { type: 'consultation', value: 'Склад {{ $car->name }}' })">
                Замовити консультацію
            </x-button>
        </div>
        <div class="mt-2">
            <x-link class="inline-block mt-2 text-sm text-skoda-emerald-green hover:underline"
                href="{{ route('stock.car.details', $car->id) }}">
                Детальніше про модель
            </x-link>
        </div> --}}
    </div>
</div>
</div>
