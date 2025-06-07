@props(['color' => 'black'])

<h1 class="text-4xl {{ 'text-skoda-' . $color }}">{{ $slot }}</h1>
