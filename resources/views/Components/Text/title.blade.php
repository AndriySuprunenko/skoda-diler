@props(['color' => 'emerald-green'])

<h2 class="text-4xl font-bold mb-4 {{ 'text-skoda-' . $color }}">{{ $slot }}</h2>
