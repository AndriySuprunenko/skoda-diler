@php
    $contacts = \App\Models\Contacts::first();
@endphp

<nav class="flex gap-10 flex-col md:flex-row w-full justify-end items-center">
    <ul class="flex flex-col md:flex-row gap-8 md:gap-4 items-center">
        <!-- Звичайний лінк -->
        <li class="group">
            <x-header.nav-link href="/">Головна</x-header.nav-link>
        </li>
        <li class="group">
            <x-header.nav-link href="/trade-in" class="block px-4 py-3 text-base">Trade
                in</x-header.nav-link>
        </li>
        <li class="group">
            <x-header.nav-link href="/credit" class="block px-4 py-3 text-base">Кредитування</x-header.nav-link>
        </li>
        <li class="relative dropdown">
            <x-header.nav-link-def href="#" class="dropdown-toggle group flex">
                Моделі
                <svg class="w-4 h-4 dropdown-arrow transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </x-header.nav-link-def>
            <!-- Підменю -->
            <ul
                class="dropdown-menu absolute top-full left-0 mt-2 w-48 bg-skoda-emerald-green rounded-md shadow-lg z-50 hidden">
                <li class="group">
                    <x-header.nav-link href="/octavia-a8"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Octavia</x-header.nav-link>
                </li>
                <li class="group">
                    <x-header.nav-link href="/kodiaq"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Kodiaq</x-header.nav-link>
                </li>
                <li class="group">
                    <x-header.nav-link href="/kamiq-fl"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Kamiq</x-header.nav-link>
                </li>
                <li class="group">
                    <x-header.nav-link href="/karoq"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Karoq</x-header.nav-link>
                </li>
                <li class="group">
                    <x-header.nav-link href="/superb"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Superb</x-header.nav-link>
                </li>
                <li class="group">
                    <x-header.nav-link href="/fabia"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Fabia</x-header.nav-link>
                </li>
                <li class="group">
                    <x-header.nav-link href="/scala"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Scala</x-header.nav-link>
                </li>
                <li class="group">
                    <x-header.nav-link href="/enyaq"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Enyaq</x-header.nav-link>
                </li>
            </ul>
        </li>

        <li class="group">
            <x-header.nav-link href="/stock-cars">Авто на складі</x-header.nav-link>
        </li>
        <li class="group">
            <x-header.nav-link href="/reviews">Клієнти</x-header.nav-link>
        </li>
        <li class="group">
            <x-header.nav-link href="/contact">Контакти</x-header.nav-link>
        </li>
    </ul>
    <div>
        <x-link href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</x-link>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Знаходимо всі dropdown елементи
        const dropdowns = document.querySelectorAll('.dropdown');

        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.dropdown-toggle');
            const menu = dropdown.querySelector('.dropdown-menu');
            const arrow = dropdown.querySelector('.dropdown-arrow');

            // Клік по кнопці
            toggle.addEventListener('click', function(e) {
                e.preventDefault();

                // Закриваємо всі інші dropdown
                dropdowns.forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        otherDropdown.querySelector('.dropdown-menu').classList.add(
                            'hidden');
                        otherDropdown.querySelector('.dropdown-arrow').classList.remove(
                            'rotate-180');
                    }
                });

                // Переключаємо поточний dropdown
                menu.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });
        });

        // Закриваємо dropdown при кліку поза ним
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                dropdowns.forEach(dropdown => {
                    dropdown.querySelector('.dropdown-menu').classList.add('hidden');
                    dropdown.querySelector('.dropdown-arrow').classList.remove('rotate-180');
                });
            }
        });
    });
</script>

<style>
    .dropdown-arrow {
        transition: transform 0.2s ease;
    }

    /* Плавне відкриття підменю */
    .dropdown-menu {
        transition: opacity 0.2s ease, transform 0.2s ease;
        transform: translateY(-10px);
        opacity: 0;
    }

    .dropdown-menu:not(.hidden) {
        transform: translateY(0);
        opacity: 1;
    }
</style>
