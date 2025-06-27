<nav class="flex gap-10 flex-col md:flex-row w-full justify-end items-center">
    <ul class="flex flex-col md:flex-row gap-8 md:gap-4 items-center">
        <!-- Звичайний лінк -->
        <li class="group">
            <x-Header.nav-link href="/">Головна</x-Header.nav-link>
        </li>
        <!-- Лінк з підменю -->
        <li class="relative dropdown">
            <button
                class="dropdown-toggle text-skoda-electric-green transition-colors flex items-center gap-1 p-2 cursor-pointer group">
                Послуги
                <svg class="w-4 h-4 dropdown-arrow transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <!-- Підменю -->
            <ul class="dropdown-menu absolute top-full left-0 mt-2 w-48 bg-skoda-emerald-green rounded-md z-50 hidden">
                <li class="group">
                    <x-Header.nav-link href="/about/history"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Trade in</x-Header.nav-link>
                </li>
                <li class="group">
                    <x-Header.nav-link href="/about/team"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Кредит/Лізинг</x-Header.nav-link>
                </li>
            </ul>
        </li>
        <li class="relative dropdown">
            <button
                class="dropdown-toggle text-skoda-electric-green transition-colors flex items-center gap-1 p-2 cursor-pointer">
                Моделі
                <svg class="w-4 h-4 dropdown-arrow transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <!-- Підменю -->
            <ul
                class="dropdown-menu absolute top-full left-0 mt-2 w-48 bg-skoda-emerald-green rounded-md shadow-lg z-50 hidden">
                <li class="group">
                    <x-Header.nav-link href="/about/history"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Octavia</x-Header.nav-link>
                </li>
                <li class="group">
                    <x-Header.nav-link href="/about/team"
                        class="block px-4 py-3 text-base hover:bg-skoda-electric-green/10">Kodiaq</x-Header.nav-link>
                </li>
            </ul>
        </li>

        <li class="group">
            <x-Header.nav-link href="/contact">Контакти</x-Header.nav-link>
        </li>
    </ul>
    <x-Header.phone-number />
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
