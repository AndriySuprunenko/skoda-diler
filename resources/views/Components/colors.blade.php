@props(['colors' => []])

<div class="flex gap-2 mb-4">
    @foreach ($colors ?? [] as $color)
        <div
            class="w-5 h-5 rounded-4xl
            @if ($color === 'white') border-2 border-solid border-skoda-black @endif
            @if ($color === 'gray') bg-skoda-gray @endif
            @if ($color === 'black') bg-skoda-black @endif
            @if ($color === 'blue') bg-skoda-blue @endif
            @if ($color === 'red') bg-skoda-red @endif
            @if ($color === 'bronze') bg-skoda-bronze @endif
            @if ($color === 'orange') bg-skoda-orange @endif
            @if ($color === 'green') bg-skoda-green @endif
            @if ($color === 'gold') bg-skoda-gold @endif">
        </div>
    @endforeach
</div>
