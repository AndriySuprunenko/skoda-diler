@props(['color' => 'black'])

<h1 class="text-4xl font-bold mb-4 {{ 'text-skoda-' . $color }}">{{ $slot }}</h1>
