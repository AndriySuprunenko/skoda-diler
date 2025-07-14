<!DOCTYPE html>
<html lang="ua">

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
</body>

</html>
