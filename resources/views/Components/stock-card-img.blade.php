@props(['car', 'img'])

<div class="aspect-video w-full rounded-t-lg overflow-hidden flex-shrink-0 relative">
    <img src="{{ $img }}" alt="Фото моделі {{ $car->name }}" loading="lazy"
        class="w-full h-full object-cover object-center" />
    {{-- Статуси --}}
    <div class="flex items-center gap-2 mb-3 flex-wrap absolute top-2 left-2">
        @if ($car->status === 'sold')
            <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">Продано</span>
        @elseif($car->status === 'available')
            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">В
                наявності</span>
        @elseif($car->status === 'reserved')
            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">Заброньовано</span>
        @elseif($car->status === 'hot_offer')
            <span class="px-2 py-1 text-xs rounded bg-orange-100 text-orange-700">Гаряча
                пропозиція</span>
        @endif

        @if ($car->condition === 'new')
            <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">Новий</span>
        @elseif($car->condition === 'used')
            <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-700">Вживаний</span>
        @endif
    </div>
</div>
