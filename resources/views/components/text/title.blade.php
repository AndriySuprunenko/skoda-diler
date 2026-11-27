@props(['color' => 'emerald-green'])

<h2 class="text-3xl md:text-4xl font-bold {{ 'text-skoda-' . $color }}">{{ $slot }}</h2>
