@php
    $clients = \App\Models\Clients::get();
    $photo = \App\Models\Clients::first();
@endphp

@section('title', 'Наші клієнти')
@section('meta')
    <meta name="description" content="Фото наших клієнтів">
    <meta name="keywords" content="Фото, наші, клієнти">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Наші клієнти">
    <meta property="og:description" content="Фото наших клієнтів">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($photo->photo) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Наші клієнти",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Фото наших клієнтів",
    }
    </script>
@endsection

<x-layout>
    <x-section class="text-center">
        <x-Text.main-title>Наші клієнти</x-Text.main-title>
        <ul class="flex flex-wrap items-center justify-center gap-8 mt-10">
            @foreach ($clients as $client)
                <li>
                    <img src="{{ Storage::url($client->photo) }}"
                        class="w-[200px] h-[200px] object-cover object-center cursor-pointer" />
                </li>
            @endforeach
        </ul>
        <div id="fullscreenOverlay"
            class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center hidden z-50">
            <button id="closeFullscreen"
                class="absolute top-6 right-6 text-white text-4xl font-bold z-60 hover:text-gray-300">×</button>
            <img id="fullscreenImage" src="" alt="Зображення" class="max-w-full max-h-full">
        </div>
    </x-section>
</x-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const images = Array.from(document.querySelectorAll('ul img'));
        let currentIndex = 0;
        const overlay = document.getElementById('fullscreenOverlay');
        const fullImg = document.getElementById('fullscreenImage');

        images.forEach(img => {
            img.addEventListener('click', () => {
                currentIndex = images.findIndex(i => i === img);
                fullImg.src = img.src;
                overlay.classList.remove('hidden');
            });
        });

        overlay.addEventListener('click', () => {
            overlay.classList.add('hidden');
        });

        document.getElementById('closeFullscreen').addEventListener('click', () => {
            overlay.classList.add('hidden');
        });

        let startX = 0;

        overlay.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        }, {
            passive: true
        });

        overlay.addEventListener('touchend', (e) => {
            const endX = e.changedTouches[0].clientX;
            const diff = endX - startX;
            if (Math.abs(diff) > 50) {
                if (diff < 0 && currentIndex < images.length - 1) {
                    currentIndex++;
                    fullImg.src = images[currentIndex].src;
                } else if (diff > 0 && currentIndex > 0) {
                    currentIndex--;
                    fullImg.src = images[currentIndex].src;
                }
            }
        }, {
            passive: true
        });
        // Додаємо обробники для стрілок навігації у повноекранному режимі
        document.getElementById('fullscreenNext').addEventListener('click', (e) => {
            e.stopPropagation();
            if (currentIndex < images.length - 1) {
                currentIndex++;
                fullImg.src = images[currentIndex].src;
            }
        });
        document.getElementById('fullscreenPrev').addEventListener('click', (e) => {
            e.stopPropagation();
            if (currentIndex > 0) {
                currentIndex--;
                fullImg.src = images[currentIndex].src;
            }
        });
    });
</script>
<style>
    #fullscreenOverlay {
        transition: opacity 0.3s ease;
    }
</style>
