@props([
    'href' => '/',
    'click' => null,
    'style' => 'electric',
    'disabled' => false,
    'size' => 'md',
    'fullWidth' => true,
    'loading' => false,
    'class' => '',
    'loadingText' => 'Завантаження...',
]) @php
    $styles = [
        'electric' => [
            'base' => 'text-skoda-emerald-green bg-skoda-electric-green border-skoda-electric-green',
            'hover' => 'hover:bg-skoda-emerald-green hover:text-skoda-electric-green hover:border-skoda-electric-green',
            'active' => 'active:bg-skoda-emerald-green active:text-skoda-electric-green',
            'focus' => 'focus:outline-none focus:ring-2 focus:ring-skoda-electric-green focus:ring-offset-2',
        ],
        'emerald' => [
            'base' => 'text-skoda-electric-green bg-skoda-emerald-green border-skoda-emerald-green',
            'hover' => 'hover:bg-skoda-electric-green hover:text-skoda-emerald-green hover:border-skoda-electric-green',
            'active' => 'active:bg-skoda-electric-green active:text-skoda-emerald-green',
            'focus' => 'focus:outline-none focus:ring-2 focus:ring-skoda-emerald-green focus:ring-offset-2',
        ],
        'emerald-white' => [
            'base' => 'text-skoda-white bg-skoda-emerald-green border-skoda-emerald-green',
            'hover' => 'hover:bg-skoda-white hover:text-skoda-emerald-green hover:border-skoda-electric-green',
            'active' => 'active:bg-skoda-white active:text-skoda-emerald-green',
            'focus' => 'focus:outline-none focus:ring-2 focus:ring-skoda-emerald-green focus:ring-offset-2',
        ],
        'outline' => [
            'base' => 'text-skoda-emerald-green bg-transparent border-skoda-emerald-green',
            'hover' => 'hover:bg-skoda-emerald-green hover:text-white',
            'active' =>
                'active:bg-skoda-electric-green active:text-skoda-emerald-green active:border-skoda-electric-green',
            'focus' => 'focus:outline-none focus:ring-2 focus:ring-skoda-emerald-green focus:ring-offset-2',
        ],
    ];
    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
        'xl' => 'px-8 py-4 text-xl',
    ];
    $currentStyle = $styles[$style] ?? $styles['electric'];
    $sizeClasses = $sizes[$size] ?? $sizes['md'];
    $baseClasses = implode(' ', [
        'inline-flex items-center text-center justify-center',
        'border-2 font-bold rounded-3xl',
        'transition-all duration-200 ease-in-out',
        'transform hover:scale-105 active:scale-95',
        $fullWidth ? 'w-full' : 'w-auto',
    ]);
    $interactiveClasses =
        $disabled || $loading
            ? ''
            : implode(' ', [$currentStyle['hover'], $currentStyle['active'], $currentStyle['focus']]);
    $disabledClasses =
        $disabled || $loading
            ? 'opacity-50 cursor-not-allowed disabled:hover:scale-100 disabled:active:scale-100'
            : 'cursor-pointer';
    $allClasses = implode(
        ' ',
        array_filter([$baseClasses, $sizeClasses, $currentStyle['base'], $interactiveClasses, $disabledClasses]),
    );
@endphp
<a href='{{ $href }}' @if ($click && !$disabled && !$loading) @click="{{ $click }}" @endif
    @if ($disabled || $loading) disabled @endif
    @if ($loading) aria-busy="true" aria-live="polite" @endif
    class="{{ $allClasses }} {{ $class }}" {{ $attributes }}>
    @if ($loading)
        <svg class="animate-spin -ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg> {{ $loadingText }}
    @else
        {{ $slot }}
    @endif
</a>
