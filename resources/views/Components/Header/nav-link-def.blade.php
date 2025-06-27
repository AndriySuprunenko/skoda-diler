@props(['class' => '', 'active' => false, 'href' => '#'])

@php
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
@endphp

<a href={{ $href }}
    class="relative text-skoda-electric-green p-2 transition-all duration-300 {{ $class }}">
    <span class="z-10 relative flex items-center">{{ $slot }}</span>
    <span
        class="absolute left-1/2 bottom-0 w-0 h-[3px] bg-skoda-electric-green transition-all duration-300 transform -translate-x-1/2 group-hover:w-full {{ $path == $href || str_starts_with($path, $href . '/') ? 'w-full' : '' }}"></span>
</a>
