@props(['color' => 'black'])

<p class="text-base text-left {{ 'text-skoda-' . $color }}">{{ $slot }}</p>
