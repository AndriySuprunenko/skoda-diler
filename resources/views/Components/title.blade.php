@props(['color' => 'black'])

<h1 class="text-3xl {{ 'text-skoda-' . $color }}">{{ $slot }}</h1>
