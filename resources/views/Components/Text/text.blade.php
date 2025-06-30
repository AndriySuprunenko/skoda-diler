@props(['color' => 'emerald-green', 'class' => ''])

<p class="text-base text-left {{ $class }} {{ 'text-skoda-' . $color }}">{{ $slot }}</p>
