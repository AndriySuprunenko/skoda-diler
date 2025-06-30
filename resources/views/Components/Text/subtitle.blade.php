@props(['color' => 'emerald-green'])

<h3 class="text-3xl mb-4 {{ 'text-skoda-' . $color }}">{{ $slot }}</h3>
