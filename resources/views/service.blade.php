@section('title', 'Сервіс Škoda у Кременчуці – Автоцентр-Кременчук-2012')
@section('meta')
    <meta name="description"
        content="Автоцентр-Кременчук-2012 пропонує повний комплекс послуг сервісу Škoda у Кременчуці. Гарантійне та післягарантійне обслуговування, ремонт, ТО, оригінальні запчастини. Запис онлайн.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Сервіс Škoda у Кременчуці – Автоцентр-Кременчук-2012">
    <meta property="og:description"
        content="Автоцентр-Кременчук-2012 пропонує повний комплекс послуг сервісу Škoda у Кременчуці. Гарантійне та післягарантійне обслуговування, ремонт, ТО, оригінальні запчастини. Запис онлайн.">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ url(Storage::url('images/main.webp')) }}">
@endsection

<x-layout>
    <!-- Banner with form -->
    <section class="relative w-full min-h-[100dvh] md:min-h-[848px] flex flex-col">
        <img src="{{ Storage::url('images/service/aircon.webp') }}" alt="Сервіс Škoda"
            class="absolute inset-0 w-full h-full object-cover object-center" />
        <div class="absolute inset-0 w-full h-full bg-black/50 md:bg-black/60"></div>
        <div
            class="relative z-10 flex flex-col lg:flex-row items-center lg:items-start justify-around w-full px-4 sm:px-6 py-12 md:py-24 lg:px-12 gap-12 lg:gap-8 my-auto">
            <div class="flex flex-col gap-4 w-full max-w-2xl lg:max-w-4xl text-center lg:text-left">
                <x-text.main-title color="white">Не страждайте від спеки в салоні — подбайте про комфорт вже сьогодні!
                </x-text.main-title>
                <div
                    class="text-skoda-white border-2 border-skoda-electric-green rounded-md flex flex-col  max-w-sm p-4 bg-skoda-emerald-green mt-6 m-auto lg:m-0">
                    <span class="text-lg m-auto">Отримайте</span>
                    <span class="text-skoda-electric-green font-bold text-5xl md:text-8xl m-auto">❄︎ -20%</span>
                    <span class="text-lg m-auto">на заправку кондиціонера</span>
                </div>
            </div>
            <div class="sm:max-w-md lg:max-w-lg w-full flex-shrink-0">
                <x-service-form></x-service-form>
            </div>
        </div>
    </section>
    <!-- End Banner with form -->
    <section class="w-full bg-[#f4f7f6] py-16 md:py-20 px-4 sm:px-6 lg:px-12">
        <div
            class="max-w-7xl mx-auto flex flex-col md:flex-row items-center md:items-start justify-center gap-10 md:gap-16">
            <!-- Icon -->
            <div
                class="flex-shrink-0 w-40 h-40 md:w-56 md:h-56 rounded-full border-[3px] border-skoda-emerald-green flex items-center justify-center bg-transparent">
                <img src="{{ Storage::url('images/car-round-svgrepo-com.svg') }}" alt="Car" class="object-contain">
            </div>

            <!-- Content -->
            <div class="flex flex-col gap-5 text-center md:text-left text-skoda-black mt-2 md:mt-4">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight">
                    Обслуговуємо кондиціонери <br class="hidden xl:block">
                    автомобілів усіх марок
                </h2>
                <p class="text-lg md:text-xl text-skoda-black mt-2 leading-relaxed max-w-2xl">
                    Škoda, Volkswagen, Audi, та інші — працюємо з сучасними системами кондиціонування та фреонами R134a
                    і R1234yf.
                </p>

                <!-- Logos -->
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-8 mt-6">
                    <!-- Skoda -->
                    <div class="flex items-center gap-2">
                        <img src="{{ Storage::url('images/logos/Skoda_Wordmark_RGB_Black.svg') }}" alt="Skoda"
                            class="h-4 object-contain">
                    </div>

                    <!-- VW (Simplified SVG) -->
                    <div class="flex items-center gap-2">
                        <img src="{{ Storage::url('images/logos/volkswagen-1-logo-svgrepo-com.svg') }}" alt="Skoda"
                            class="w-8 object-contain">
                    </div>

                    <!-- Audi (Simplified SVG) -->
                    <div class="flex items-center gap-2">
                        <img src="{{ Storage::url('images/logos/audi-svgrepo-com.svg') }}" alt="Skoda"
                            class="h-16 object-contain">
                    </div>

                    <!-- Seat (Simplified SVG) -->
                    <div class="flex items-center gap-2">
                        <img src="{{ Storage::url('images/logos/seat-svgrepo-com.svg') }}" alt="Skoda"
                            class="h-6 object-contain">
                    </div>

                    <span class="text-xl font-medium ml-2">та інші</span>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-skoda-emerald-green w-full py-16 md:py-24 px-4 sm:px-6 lg:px-12 font-sans">
        <div class="max-w-2xl mx-auto flex flex-col gap-10">
            <!-- Header -->
            <div class="flex flex-col gap-3">
                <h2 class="text-white text-3xl md:text-4xl font-bold tracking-wide">Як отримати послугу?</h2>
                <p class="text-skoda-electric-green text-lg md:text-xl font-light">Зручно, зрозуміло та швидко.</p>
            </div>

            <!-- Steps -->
            <div class="flex flex-col gap-6">
                <!-- Step 1 -->
                <div class="flex items-center gap-6 group cursor-pointer transition-transform hover:-translate-x-1">
                    <!-- Icon Box -->
                    <div
                        class="w-16 h-16 rounded-2xl border border-skoda-electric-green flex items-center justify-center flex-shrink-0 bg-transparent transition-colors group-hover:border-skoda-electric-green/40">
                        <svg class="w-8 h-8 text-skoda-electric-green" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                        </svg>
                    </div>
                    <!-- Number -->
                    <div class="text-skoda-electric-green text-5xl font-black min-w-[36px] text-center">1</div>
                    <!-- Text -->
                    <div class="flex-grow">
                        <p class="text-white text-lg md:text-xl font-normal leading-snug">Залиште заявку<br>у формі на
                            сайті</p>
                    </div>
                    <!-- Arrow -->
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-skoda-electric-green/60 group-hover:text-skoda-electric-green transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>

                <!-- Divider -->
                <div class="w-full h-px bg-skoda-electric-green/50"></div>

                <!-- Step 2 -->
                <div class="flex items-center gap-6 group cursor-pointer transition-transform hover:-translate-x-1">
                    <!-- Icon Box -->
                    <div
                        class="w-16 h-16 rounded-2xl border border-skoda-electric-green flex items-center justify-center flex-shrink-0 bg-transparent transition-colors group-hover:border-skoda-electric-green/40">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-skoda-electric-green">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.896-1.596-5.48-4.18-7.076-7.076l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                    </div>
                    <!-- Number -->
                    <div class="text-skoda-electric-green text-5xl font-black min-w-[36px] text-center">2</div>
                    <!-- Text -->
                    <div class="flex-grow">
                        <p class="text-white text-lg md:text-xl font-normal leading-snug">Очікуйте дзвінка<br>від нашого
                            менеджера</p>
                    </div>
                    <!-- Arrow -->
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-skoda-electric-green/60 group-hover:text-skoda-electric-green transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>

                <!-- Divider -->
                <div class="w-full h-px bg-skoda-electric-green/50"></div>

                <!-- Step 3 -->
                <div class="flex items-center gap-6 group cursor-pointer transition-transform hover:-translate-x-1">
                    <!-- Icon Box -->
                    <div
                        class="w-16 h-16 rounded-2xl border border-skoda-electric-green flex items-center justify-center flex-shrink-0 bg-transparent transition-colors group-hover:border-skoda-electric-green/40">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-skoda-electric-green">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                    </div>
                    <!-- Number -->
                    <div class="text-skoda-electric-green text-5xl font-black min-w-[36px] text-center">3</div>
                    <!-- Text -->
                    <div class="flex-grow">
                        <p class="text-white text-lg md:text-xl font-normal leading-snug">Обирайте зручний час<br>для
                            запису</p>
                    </div>
                    <!-- Arrow -->
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-skoda-electric-green/60 group-hover:text-skoda-electric-green transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>

                <!-- Divider -->
                <div class="w-full h-px bg-skoda-electric-green/50"></div>

                <!-- Step 4 -->
                <div class="flex items-center gap-6 group cursor-pointer transition-transform hover:-translate-x-1">
                    <!-- Icon Box -->
                    <div
                        class="w-16 h-16 rounded-2xl border border-skoda-electric-green flex items-center justify-center flex-shrink-0 bg-transparent transition-colors group-hover:border-skoda-electric-green/40">
                        <svg class="w-8 h-8 text-skoda-electric-green" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm5.495.93A.5.5 0 0 0 6.5 13c0 1.19.644 2.438 1.618 3.375C9.099 17.319 10.469 18 12 18c1.531 0 2.9-.681 3.882-1.625.974-.937 1.618-2.184 1.618-3.375a.5.5 0 0 0-.995-.07.764.764 0 0 1-.156.096c-.214.106-.554.208-1.006.295-.896.173-2.111.262-3.343.262-1.232 0-2.447-.09-3.343-.262-.452-.087-.792-.19-1.005-.295a.762.762 0 0 1-.157-.096ZM8.99 8a1 1 0 0 0 0 2H9a1 1 0 1 0 0-2h-.01Zm6 0a1 1 0 1 0 0 2H15a1 1 0 1 0 0-2h-.01Z"
                                clip-rule="evenodd" />
                        </svg>

                    </div>
                    <!-- Number -->
                    <div class="text-skoda-electric-green text-5xl font-black min-w-[36px] text-center">4</div>
                    <!-- Text -->
                    <div class="flex-grow">
                        <p class="text-white text-lg md:text-xl font-normal leading-snug">Приїжджайте та
                            отримуйте<br>якісний сервіс</p>
                    </div>
                    <!-- Arrow -->
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-skoda-electric-green/60 group-hover:text-skoda-electric-green transition-colors"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Promo Banner -->
            <div
                class="mt-2 border border-skoda-electric-green rounded-[24px] p-6 flex flex-col sm:flex-row items-center justify-between gap-6 transition-colors hover:border-skoda-electric-green/30">
                <div class="flex gap-4">
                    <div class="flex-shrink-0 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-skoda-electric-green">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-white text-lg md:text-xl font-medium">Акція діє до кінця місяця!</p>
                        <div class="flex items-center gap-2 text-skoda-electric-green/80">
                            <span class="text-[17px]">м. Кременчук, вул. Київська, 75</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
