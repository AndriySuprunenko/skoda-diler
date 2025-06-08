@props(['color' => 'black'])

<h2 class="text-3xl mb-4 {{ 'text-skoda-' . $color }}">{{ $slot }}</h2>
