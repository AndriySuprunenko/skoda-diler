@props(['color' => 'black'])

<h2 class="text-3xl {{ 'text-skoda-' . $color }}">{{ $slot }}</h2>
