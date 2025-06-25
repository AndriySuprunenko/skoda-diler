@props([
    'type' => 'button',
    'click' => null,
    'style' => 'electric',
    'disabled' => false,
    'size' => 'md',
])

@php
    $buttonTypes = ['button', 'submit', 'reset'];
    $type = in_array($type, $buttonTypes) ? $type : 'button';

    $styles = [
        'electric' => [
            'text' => 'text-skoda-emerald-green',
            'bg' => 'bg-skoda-electric-green',
            'hoverBorder' => 'hover:border-skoda-emerald-green',
            'activeBg' => 'active:bg-skoda-emerald-green',
            'activeText' => 'active:text-skoda-electric-green',
        ],
        'emerald' => [
            'text' => 'text-skoda-electric-green',
            'bg' => 'bg-skoda-emerald-green',
            'hoverBorder' => 'hover:border-skoda-electric-green',
            'activeBg' => 'active:bg-skoda-electric-green',
            'activeText' => 'active:text-skoda-emerald-green',
        ],
        'emerald-white' => [
            'text' => 'text-skoda-white',
            'bg' => 'bg-skoda-emerald-green',
            'hoverBorder' => 'hover:border-skoda-electric-green',
            'activeBg' => 'active:bg-skoda-white',
            'activeText' => 'active:text-skoda-emerald-green',
        ],
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];

    $colors = $styles[$style] ?? $styles['electric'];
    $sizeClasses = $sizes[$size] ?? $sizes['md'];

    $baseClasses = 'w-full border-2 border-transparent font-bold rounded-3xl transition-all duration-200 ease-in-out';
    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer';
@endphp

<div>
    <button type="{{ $type }}" @if ($click && !$disabled) @click="{{ $click }}" @endif
        @if ($disabled) disabled @endif
        class="{{ $baseClasses }} {{ $sizeClasses }} {{ $disabledClasses }}
               {{ $colors['text'] }} {{ $colors['bg'] }} 
               {{ $colors['hoverBorder'] }} {{ $colors['activeBg'] }} 
               {{ $colors['activeText'] }}">
        {{ $slot }}
    </button>
</div>
