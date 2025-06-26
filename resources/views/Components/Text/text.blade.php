@props(['color' => 'emerald-green'])

<p class="text-base text-left {{ 'text-skoda-' . $color }}">{{ $slot }}</p>
