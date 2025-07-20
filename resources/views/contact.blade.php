@section('title', 'Контакти')
@section('meta')
    <meta name="description" content="ТОВ Автоцентр-Кременчук-2012">
    <meta name="keywords" content="Škoda, Автоцентр, Автомобілі">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="ТОВ Автоцентр-Кременчук-2012 Контакти">
    <meta property="og:description" content="ТОВ Автоцентр-Кременчук-2012 Офіційний дилер автомобілів ŠKODA в м. Кременчук">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('main.webp') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "ТОВ Автоцентр-Кременчук-2012",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "ТОВ Автоцентр-Кременчук-2012 Офіційний дилер автомобілів ŠKODA в м. Кременчук",
    }
    </script>
@endsection

<x-layout>
    <x-section class="flex flex-col items-center">
        <x-Text.title>Контакти</x-Text.title>
        <div class="flex gap-6 mt-5 flex-col md:flex-row justify-center w-full items-center">
            <x-map />
            <div class="w-full max-w-[500px] h-full p-10 bg-skoda-white rounded-xl">
                <div class="flex flex-col">
                    <span class="font-bold">Адреса: </span>
                    <a
                        href="https://www.google.com/maps/dir/%D0%90%D0%B2%D1%82%D0%BE%D1%86%D0%B5%D0%BD%D1%82%D1%80-%D0%9A%D1%80%D0%B5%D0%BC%D0%B5%D0%BD%D1%87%D1%83%D0%BA+%C5%A0koda,+%D0%B2%D1%83%D0%BB%D0%B8%D1%86%D1%8F+%D0%9A%D0%B8%D1%97%D0%B2%D1%81%D1%8C%D0%BA%D0%B0,+%D0%9A%D1%80%D0%B5%D0%BC%D0%B5%D0%BD%D1%87%D1%83%D0%BA,+%D0%9F%D0%BE%D0%BB%D1%82%D0%B0%D0%B2%D1%81%D1%8C%D0%BA%D0%B0+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C/%D0%B2%D1%83%D0%BB%D0%B8%D1%86%D1%8F+%D0%9A%D0%B8%D1%97%D0%B2%D1%81%D1%8C%D0%BA%D0%B0,+75,+%D0%9A%D1%80%D0%B5%D0%BC%D0%B5%D0%BD%D1%87%D1%83%D0%BA,+%D0%9F%D0%BE%D0%BB%D1%82%D0%B0%D0%B2%D1%81%D1%8C%D0%BA%D0%B0+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+39600/@49.1048222,33.3700565,13z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x40d752675c6d1e7b:0xb8a52fdd3c7301c8!2m2!1d33.4112558!2d49.1048295!1m5!1m1!1s0x40d752675c6d1e7b:0xb8a52fdd3c7301c8!2m2!1d33.4112558!2d49.1048295?entry=ttu&g_ep=EgoyMDI1MDcxNi4wIKXMDSoASAFQAw%3D%3D">вулиця
                        Київська, 75, Кременчук, Полтавська область, 39600</a>
                </div>
                <div class="flex flex-col mt-4">
                    <span class="font-bold">Номер телефону: </span>
                    <a href="tel:+380676208844">+380676208844</a>
                </div>
                <div class="flex flex-col mt-4">
                    <span class="font-bold"> Електронна пошта: </span>
                    <a href="mailto:salon@skoda-kremen.com.ua">salon@skoda-kremen.com.ua</a>
                </div>
                <div class="flex flex-col mt-4">
                    <span class="font-bold"> Графік роботи компанії: </span>
                    <div class="w-full max-w-[200px] mt-2">
                        <div class="flex justify-between">
                            <span>Пн-Пт </span>
                            <span>08:45-19:00 </span>
                        </div>
                        <div class="flex justify-between">
                            <span>Сб </span>
                            <span>08:45-18:00 </span>
                        </div>
                        <div class="flex justify-between">
                            <span>Нд </span>
                            <span>Вихідний </span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mt-4 max-w-[200px]">
                    <x-send-message-button>Написати нам</x-send-message-button>
                </div>
                <div class="flex flex-col mt-4 max-w-[200px]">
                    <x-button style="emerald-white"
                        click="$dispatch('open-modal', { type: 'consultation' , value: 'Контакти' })">
                        Залишити заявку
                    </x-button>
                </div>
                <div class="flex flex-col mt-8">
                    <span class="font-bold"> Наші соціальні мережі: </span>
                    <div class="flex gap-6 mt-2">
                        <a href="https://www.instagram.com/avtocenter_skoda">
                            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/instagram.png') }}"
                                alt="Instagram" />
                        </a>
                        <a href="https://www.facebook.com/skodakremen">
                            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/facebook.png') }}"
                                alt="Facebook" />
                        </a>
                        <a href="https://www.youtube.com/channel/UCZS5dJnXeUlw32AXUDniuHg">
                            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/youtube.png') }}"
                                alt="Youtube" />
                        </a>
                        <a href="https://www.tiktok.com/@skoda_kremen">
                            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/tiktok.png') }}"
                                alt="TikTok" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-section>
</x-layout>
