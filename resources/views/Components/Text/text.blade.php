@props(['color' => 'emerald-green', 'class' => ''])

<p class="text-base text-left {{ $class }} {{ 'text-skoda-' . $color }} max-w-[1200px]">{{ $slot }}</p>
