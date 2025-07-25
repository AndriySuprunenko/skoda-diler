<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <title>@yield('title', 'Головна')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite('resources/css/app.css')
</head>

<body class="font-sans w-full min-h-screen flex flex-col" x-data="{ open: false }">
    <x-Header.header />
    <main class="flex-1">
        {{ $slot }}
    </main>
    <x-footer />

    <x-modal type='test-drive' />
    <x-modal type='consultation' />
    <x-modal type='price' />
    <script>
        (function() {
            const params = new URLSearchParams(window.location.search);
            const utms = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];

            utms.forEach(key => {
                const value = params.get(key);
                if (value) {
                    document.cookie =
                    `${key}=${encodeURIComponent(value)}; path=/; max-age=${60 * 60 * 24 * 7}`;
                }
            });
        })();
    </script>
</body>

</html>
