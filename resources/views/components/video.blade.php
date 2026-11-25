@props(['url'])

@php
    // Витягаємо ID відео з посилання
    preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^\&\?\/]+)/', $url, $matches);
    $videoId = $matches[1] ?? null;
@endphp

@if ($videoId)
    <div class="relative w-full aspect-video">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>
@else
    <p class="text-red-500">Невірне посилання на YouTube відео.</p>
@endif
