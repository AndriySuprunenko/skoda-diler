@props(['color' => 'emerald-green'])

<h2 class="text-2xl md:text-4xl font-bold {{ 'text-skoda-' . $color }}">{{ $slot }}</h2>
