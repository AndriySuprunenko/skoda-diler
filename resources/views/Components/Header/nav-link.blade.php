@props(['class' => ''])

<li><a {{ $attributes }}
        class="text-skoda-electric-green hover:text-skoda-white {{ $class }}">{{ $slot }}</a></li>
