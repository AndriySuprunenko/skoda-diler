@props(['color' => 'black'])

<p class="text-base {{ 'text-skoda-' . $color }}">{{ $slot }}</p>
