@props(['color' => 'black'])

<h1 class="text-2xl {{ 'text-skoda-' . $color }}">{{ $slot }}</h1>
