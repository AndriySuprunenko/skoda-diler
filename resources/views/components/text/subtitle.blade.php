@props(['color' => 'emerald-green', 'class' => ''])

<h3 class=" text-2xl md:text-3xl {{ 'text-skoda-' . $color }} {{ $class }}">{{ $slot }}</h3>
