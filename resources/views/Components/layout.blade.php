<!DOCTYPE html>
<html lang="ua">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Головна</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-gray-800 p-4">
        <ul class="flex space-x-4">
            <li><a href="/" class="text-white">Головна</a></li>
            <li><a href="/about" class="text-white">Про нас</a></li>
            <li><a href="/contact" class="text-white">Контакти</a></li>
        </ul>
    </nav>

    {{ $slot }}
</body>

</html>
