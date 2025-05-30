@props(['color' => 'black'])

<h2 class="text-xl {{ 'text-skoda-' . $color }}">{{ slot }}</h2>
