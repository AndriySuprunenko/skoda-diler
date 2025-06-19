@props([
    'url',
    'color' => 'emerald',
    'size' => '400px',
    'logo' => 'Skoda_Wordmark_RGB_Electric_Green.svg',
    'decor' => 'none',
    'ratio' => 'square',
])

@php
    switch ($ratio) {
        case 'vertical':
            $width = $size;
            $height = is_numeric($size) ? $size * 1.5 . 'px' : '600px';
            break;
        case 'horizontal':
            $width = is_numeric($size) ? $size * 1.5 . 'px' : '600px';
            $height = $size;
            break;
        default:
            $width = $size;
            $height = $size;
    }

@endphp

<div
    class="relative border-4 md:border-6 border-solid {{ 'border-skoda-' . $color . '-green' }} rounded-xl overflow-hidden w-full max-w-[{{ $width }}] {{ $ratio === 'vertical' ? 'aspect-[2/3]' : ($ratio === 'horizontal' ? 'aspect-[3/2]' : 'aspect-square') }}">
    <img src="{{ Storage::url('images/' . $url) }}" alt="Зображення"
        class="w-full h-full object-cover object-center rounded-sm">
    <img class="absolute top-2 right-2 w-20 md:w-28 z-20" src="{{ Storage::url('images/logos/' . $logo) }}" alt="Логотип">

    @if ($decor === 'top-right' || $decor === 'double')
        <div class="triangle absolute top-0 right-0 w-0 h-0 z-10" style="border-right-color: #0E3A2F"></div>
    @endif

    @if ($decor === 'bottom-left')
        <div class="triangle-2 absolute bottom-0 left-0 w-0 h-0 z-10" style="border-left-color: #0E3A2F">
        </div>
        <div class="triangle absolute top-0 right-0 w-0 h-0 z-10" style="border-right-color: #0E3A2F"></div>
    @endif

    @if ($decor === 'bottom-right' || $decor === 'double')
        <div class="triangle-3 absolute bottom-0 right-0 w-0 h-0 z-10" style="border-right-color: #0E3A2F">
        </div>
    @endif
</div>

<style>
    @media (max-width: 768px) {
        .triangle {
            border-bottom-width: 100px;
            border-right-width: 75px;
        }

        .triangle-2 {
            border-top-width: 50px;
            border-left-width: 150px;
        }

        .triangle-3 {
            border-top-width: 50px;
            border-right-width: 150px;
        }
    }

    .triangle {
        border-bottom: 200px solid transparent;
        border-right: 150px solid;
    }

    .triangle-2 {
        border-top: 100px solid transparent;
        border-left: 300px solid;
    }

    .triangle-3 {
        border-top: 100px solid transparent;
        border-right: 300px solid;
    }
</style>
