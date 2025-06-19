<nav class="flex gap-10 flex-col md:flex-row w-full justify-between">
    <ul class="flex flex-col md:flex-row gap-8 md:gap-4 items-center">
        <x-Header.nav-link href="/">Головна</x-nav-link>
            <x-Header.nav-link href="/about">Про нас</x-nav-link>
                <x-Header.nav-link href="/contact">Контакти</x-nav-link>
                    <x-Header.nav-link href="/components">Компоненти</x-nav-link>
    </ul>
    <x-Header.phone-number />
</nav>
