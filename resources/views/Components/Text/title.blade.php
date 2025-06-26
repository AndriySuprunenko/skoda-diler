@props(['color' => 'emerald-green'])

<h1 class="text-2xl md:text-4xl font-bold mb-4 {{ 'text-skoda-' . $color }}">{{ $slot }}</h1>
