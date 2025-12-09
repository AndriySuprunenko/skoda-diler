<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>@yield('title', 'Головна')</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W7N9V7SF');
    </script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "AutoDealer",
        "name": "ТОВ 'Автоцентр-Кременчук-2012'",
        "url": "https://www.avtocenter-kremenchuk.site",
        "image": "https://www.avtocenter-kremenchuk.site/storage/images/main.webp",
        "logo": "https://www.avtocenter-kremenchuk.site/storage/images/logos/Skoda_Wordmark_RGB_Electric_Green.svg",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "вулиця Київська, 75",
            "addressLocality": "Кременчук",
            "addressRegion": "Полтавська область",
            "postalCode": "39600",
            "addressCountry": "UA"
        },
        "telephone": "+380676208844",
        "email": "salon@skoda-kremen.com.ua",
        "openingHours": "Mo-Fr 08:45-19:00 Sa 08:45-18:00 Su closed",
        "priceRange": "₴₴",
        "description": "Офіційний автосалон Škoda у Кременчуці. Продаж нових авто та авто з пробігом, сервіс, кредитування та лізинг."
    }
    </script>
    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans w-full min-h-screen flex flex-col bg-skoda-white" x-data="{ open: false }">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7N9V7SF" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <x-header.header />
    <main class="flex-1">
        {{ $slot }}
    </main>
    <x-footer />

    <x-modal type='test-drive' x-cloak />
    <x-modal type='consultation' x-cloak />
    <x-modal type='price' x-cloak />

    {{-- UTM мітки --}}
    <script>
        (function() {
            const UTMManager = {
                // Конфігурація
                config: {
                    maxAge: 60 * 60 * 24 * 7, // 30 днів
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
        })();
    </script>

    {{-- Повідомлення про збирання cookies --}}
    <div id="cookie-banner"
        class="hidden fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-skoda-emerald-green text-white text-sm md:text-base px-6 py-4 shadow-lg flex flex-col md:flex-row items-center justify-between gap-6 z-50 w-full md:w-auto max-w-7xl rounded-xl border-2 border-skoda-electric-green">
        <span>Ми використовуємо cookie для покращення роботи сайту. Продовжуючи, ви погоджуєтесь.</span>
        <button id="accept-cookies"
            class="bg-skoda-electric-green border-2 border-skoda-emerald-green hover:border-skoda-white text-skoda-emerald-green px-4 py-2 rounded-3xl cursor-pointer">
            Зрозуміло
        </button>
    </div>

    <script>
        (function() {
            const banner = document.getElementById('cookie-banner');
            const button = document.getElementById('accept-cookies');

            if (!localStorage.getItem('cookiesAccepted')) {
                banner.classList.remove('hidden');
            }

            button.addEventListener('click', () => {
                localStorage.setItem('cookiesAccepted', 'true');
                banner.classList.add('hidden');
            });
        })();
    </script>
</body>

</html>
