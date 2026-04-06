<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Купуйте нові автомобілі Škoda в Україні — офіційний автосалон у Кременчуці. Широкий вибір моделей та комплектацій, вигідні акції, кредит та лізинг, обмін за програмою Trade-in.">
    <!-- Open Graph мета-теги -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Офіційний дилер Škoda у Кременчуці — Нові автомобілі та з пробігом">
    <meta property="og:description"
        content="Купуйте нові автомобілі Škoda в Україні — офіційний автосалон у Кременчуці. Широкий вибір моделей та комплектацій, вигідні акції, кредит та лізинг, обмін за програмою Trade-in.">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ url(Storage::url('images/main.webp')) }}">

    <title>Test Drive Battle</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
    {{-- ManyChat Widget --}}
    <script src="//widget.manychat.com/3349735_dc59d.js" defer="defer"></script>
    <script src="https://mccdn.me/assets/js/widget.js" defer="defer"></script>

    @vite('resources/css/app.css')

    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "AutoDealer",
            "@@id": "https://www.avtocenter-kremenchuk.site/#autodealer",
            "name": "Автоцентр-Кременчук — офіційний дилер Škoda",
            "alternateName": [
                "Škoda Кременчук",
                "Офіційний дилер Škoda у Кременчуці",
                "Кременчук Škoda"
            ],
            "url": "https://www.avtocenter-kremenchuk.site/",
            "logo": "https://www.avtocenter-kremenchuk.site/storage/images/logos/Skoda_Wordmark_RGB_Electric_Green.svg",
            "image": "https://www.avtocenter-kremenchuk.site/storage/images/logos/Skoda_Wordmark_RGB_Electric_Green.svg",
            "telephone": "+380676208844",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "вул. Київська, 75",
                "addressLocality": "Кременчук",
                "addressRegion": "Полтавська область",
                "postalCode": "39600",
                "addressCountry": "UA"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "49.067",
                "longitude": "33.420"
            },
            "areaServed": {
                "@type": "AdministrativeArea",
                "name": "Кременчук, Полтавська область"
            },
            "openingHoursSpecification": [
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday"
                    ],
            "opens": "08:45",
            "closes": "18:00"
                }
            ],
            "priceRange": "$$$",
            "brand": {
                "@type": "Brand",
                "name": "Škoda"
            },
            "aggregateRating": {
                "@@type": "AggregateRating",
                "ratingValue": "4.5",
                "reviewCount": "278",
                "bestRating": "5"
            },
            "sameAs": [
                "https://maps.google.com/?q=Автоцентр-Кременчук+Škoda"
            ]
        }
    </script>
</head>

<body class="font-sans w-full min-h-screen flex flex-col bg-skoda-white">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7N9V7SF" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="relative w-full h-[600px] md:h-[848px]"">
        <img src="{{ Storage::url('images/test-drive-battle/test-drive-battle.webp') }}" alt="Karoq and Kodiaq"
            class="w-full h-[600px] md:h-[848px] object-cover object-center" />
        <div class="w-full h-[600px] md:h-[848px] absolute top-0 left-0 bg-black/30"></div>
        <div
            class="absolute top-16 left-1 md:top-12 md:left-15 flex flex-col gap-4 max-w-sm lg:max-w-4xl text-center md:text-left">
            <h1 class="text-4xl md:text-6xl font-bold text-skoda-white">
                Karoq чи Kodiaq?
            </h1>
            <h2 class="text-xl md:text-3xl font-bold text-skoda-white">
                Не обирайте наосліп — протестуйте обидва у Кременчуці
            </h2>
        </div>
        <div
            class="absolute bottom-6 left-1 md:bottom-12 md:left-15 flex flex-col gap-6 items-center md:items-start w-full max-w-sm md:max-w-[1200px] md:w-auto">
            <div class="text-skoda-white text-2xl md:text-4xl flex flex-col md:flex-row items-center">
                <span class="mr-0 md:mr-2">
                    🎁 Подарунок кожному після
                </span>
                <span>
                    тест-драйву
                </span>
            </div>
            <div class="w-fit m-auto md:m-0">
                <a href="https://t.me/SkodaSales_Kremenchuk_Bot?start=w51557820" target="_blank"
                    rel="noopener noreferrer" aria-label="Telegram чат-бот"
                    class="text-skoda-emerald-green bg-skoda-electric-green border-skoda-white hover:bg-skoda-emerald-green hover:text-skoda-electric-green hover:border-skoda-electric-green active:bg-skoda-emerald-green active:text-skoda-electric-green focus:outline-none focus:ring-2 focus:ring-skoda-electric-green focus:ring-offset-2 px-4 py-2 text-3xl border-4 rounded-2xl flex">
                    <svg aria-hidden="true" viewBox="0 0 24 24" class="w-10 h-10">
                        <path fill="currentColor"
                            d="M4.5 11.5l13.5-6.5-1.5 12.5-4.75-3.5-2.75 2.5-1.5-2.75 6.75-4.25z" />
                        <path fill="currentColor" d="M4.5 11.5l11 7.5" />
                    </svg>
                    <span>Зареєструватися → </span>
                </a>
            </div>
        </div>
    </header>

    <main class="flex-1">
        <div class="m-auto md:w-4xl p-6 md:p-12">
            <h3 class="text-2xl font-bold">Протестуйте одразу 2 авто: </h3>
            <div class="flex flex-col md:flex-row mt-4 gap-4 justify-between">
                <div class="flex flex-col">
                    <span><strong>Karoq</strong> Sportline</span>
                    <span><strong>Kodiaq</strong> Sportline</span>
                </div>
                <div class="hidden md:block h-20 w-[1px] bg-skoda-black"></div>
                <div class="block md:hidden w-50 h-[1px] bg-skoda-black"></div>
                <div class="flex flex-col">
                    <span>🚗 2 маршрути: місто та траса</span>
                    <span>⚙️ реальні відчуття на дорозі</span>
                    <span>🎁 <strong>гарантований подарунок</strong>(оригінальний аксесуар або мийка кузова)</span>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-skoda-emerald-green text-center p-6">
        <h2 class="text-2xl font-bold text-skoda-white">Запишіться за 30 секунд у Telegram</h2>
        <h3 class="text-xl text-skoda-white">Ми підготуємо авто та підтвердимо запис на зручний для вас час</h3>
        <div class="max-w-sm m-auto mt-6">
            <a href="https://t.me/SkodaSales_Kremenchuk_Bot?start=w51557820" target="_blank" rel="noopener noreferrer"
                aria-label="Telegram чат-бот"
                class="w-full h-14 rounded-2xl bg-[#0088cc] text-white shadow-2xl border-4 border-white flex items-center justify-center transition transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#0088cc]">
                <svg aria-hidden="true" viewBox="0 0 24 24" class="w-10 h-10">
                    <path fill="currentColor" d="M4.5 11.5l13.5-6.5-1.5 12.5-4.75-3.5-2.75 2.5-1.5-2.75 6.75-4.25z" />
                    <path fill="currentColor" d="M4.5 11.5l11 7.5" />
                </svg>
                <span>Перейти в Telegram →</span>
            </a>
        </div>
        <p class="text-skoda-white text-[12px] mt-6 max-w-[1200px] m-auto">Умови акції: Акція “Битва кросоверів” діє з
            _.04.2026 по _.05.2026
            у ТОВ
            «Автоцентр-Кременчук-2012» (м.
            Кременчук, вул. Київська, 75). Участь беруть особи, які зареєструвалися через Telegram-бот та пройшли
            тест-драйв. Кожен учасник отримує один подарунок у безпрограшній лотереї. Подарунок визначається випадково,
            не підлягає обміну на грошовий еквівалент. Кількість подарунків обмежена. Організатор може змінювати умови
            акції або завершити її достроково.</p>
    </footer>
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
</body>

</html>
