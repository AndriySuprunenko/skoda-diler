@props(['color' => 'black'])

<p class="text-base text-left mb-4 {{ 'text-skoda-' . $color }}">{{ $slot }}</p>
