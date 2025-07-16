@props([
    'type' => 'button',
    'click' => null,
    'style' => 'electric',
    'disabled' => false,
    'size' => 'md',
    'fullWidth' => true,
    'loading' => false,
    'loadingText' => 'Завантаження...',
]) @php
    $buttonTypes = ['button', 'submit', 'reset'];
    $type = in_array($type, $buttonTypes) ? $type : 'button';
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
        'inline-flex items-center justify-center',
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
<div x-data="{ open: false }" class="relative">
    <button type="button" @click="open = !open" :aria-expanded="open.toString()" class="{{ $allClasses }}">
        {{ $slot }}
    </button>

    <div x-show="open" @click.away="open = false"
        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50 p-2 space-y-2">
        <a href="https://t.me/YOUR_USERNAME" target="_blank"
            class="flex items-center gap-2 text-blue-500 hover:text-blue-700">
            <!-- Telegram Icon -->
            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/telegram.png') }}" alt="Telegram">
            Telegram
        </a>
        <a href="viber://chat?number=%2B380674000167"
            class="flex items-center gap-2 text-purple-500 hover:text-purple-700">
            <!-- Viber Icon -->
            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/viber.png') }}" alt="Telegram">
            Viber
        </a>
        <a href="https://wa.me/380674000167" target="_blank"
            class="flex items-center gap-2 text-green-500 hover:text-green-700">
            <!-- WhatsApp Icon -->
            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/whatsapp.png') }}" alt="Telegram">
            WhatsApp
        </a>
    </div>
</div>
