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
            const UTMManager = {
                // Конфігурація
                config: {
                    maxAge: 60 * 60 * 24 * 30, // 30 днів
                    domain: window.location.hostname,
                    sameSite: 'Lax',
                    secure: window.location.protocol === 'https:'
                },

                // UTM параметри для відстеження
                utmParams: ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'],

                // Додаткові параметри (якщо потрібно)
                additionalParams: ['gclid', 'fbclid', 'yclid'],

                // Встановлення cookie
                setCookie(name, value) {
                    const cookieString = [
                        `${name}=${encodeURIComponent(value)}`,
                        'path=/',
                        `max-age=${this.config.maxAge}`,
                        `SameSite=${this.config.sameSite}`,
                        this.config.secure ? 'Secure' : ''
                    ].filter(Boolean).join('; ');

                    document.cookie = cookieString;
                },

                // Отримання cookie
                getCookie(name) {
                    const value = `; ${document.cookie}`;
                    const parts = value.split(`; ${name}=`);
                    if (parts.length === 2) {
                        return decodeURIComponent(parts.pop().split(';').shift());
                    }
                    return null;
                },

                // Перевірка чи параметр уже збережений
                isAlreadyStored(name, value) {
                    return this.getCookie(name) === value;
                },

                // Основна функція
                saveUtmParams() {
                    const params = new URLSearchParams(window.location.search);
                    const allParams = [...this.utmParams, ...this.additionalParams];
                    let savedCount = 0;

                    allParams.forEach(key => {
                        const value = params.get(key);
                        if (value && !this.isAlreadyStored(key, value)) {
                            this.setCookie(key, value);
                            console.log(`Параметр збережено: ${key} = ${value}`);
                            savedCount++;
                        }
                    });

                    if (savedCount > 0) {
                        console.log(`Збережено ${savedCount} нових параметрів у cookies`);
                    }

                    // Зберігаємо час першого візиту
                    if (!this.getCookie('first_visit')) {
                        this.setCookie('first_visit', new Date().toISOString());
                    }
                },

                // Отладка - показати всі UTM cookies
                debug() {
                    console.log('=== UTM Cookies Debug ===');
                    [...this.utmParams, ...this.additionalParams, 'first_visit'].forEach(key => {
                        const value = this.getCookie(key);
                        console.log(`${key}: ${value || 'не встановлено'}`);
                    });
                }
            };

            // Запуск
            UTMManager.saveUtmParams();

            // Для тестування (можна видалити в продакшні)
            // UTMManager.debug();
        })();
    </script>
</body>

</html>
