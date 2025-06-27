<div x-data="{ isOpen: false }" class="relative z-50 md:hidden">
    <button @click="isOpen = !isOpen" aria-label="Toggle Menu">
        <div class="flex flex-col gap-1.5 p-2">
            <span class="block h-0.5 w-6 bg-skoda-electric-green transition-transform duration-300"
                :class="{ 'rotate-45 translate-y-2': isOpen }"></span>
            <span class="block h-0.5 w-6 bg-skoda-electric-green transition-opacity duration-300"
                :class="{ 'opacity-0': isOpen }"></span>
            <span class="block h-0.5 w-6 bg-skoda-electric-green transition-transform duration-300"
                :class="{ '-rotate-45 -translate-y-2': isOpen }"></span>
        </div>
    </button>

    <div x-show="isOpen" x-cloak @click.away="isOpen = false" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="absolute top-10 -right-7 w-70 text-center z-0 bg-skoda-emerald-green rounded-lg px-4 py-8">
        <div>
            <nav class="flex flex-col w-full items-center gap-8">
                <ul class="flex flex-col gap-8 w-fit">
                    <!-- Звичайний лінк: Головна (Home) -->
                    <li class="w-full">
                        <x-Header.nav-link href="/">Головна</x-Header.nav-link>
                    </li>

                    <!-- Лінк з підменю/акордеоном: Моделі (Models) -->
                    <!-- x-data="{ open: false }" initializes Alpine.js state for the dropdown -->
                    <!-- x-transition provides a smooth show/hide animation -->
                    <li x-data="{ open: false }" class="w-full ml-2">
                        <button @click="open = !open"
                            class="flex justify-center items-center w-full text-center text-skoda-electric-green hover:text-skoda-white">
                            <span>Моделі</span>
                            <!-- Simple arrow icon that rotates based on 'open' state -->
                            <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                class="w-4 h-4 ml-1 transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <!-- x-show="open" conditionally displays the submenu based on 'open' state -->
                        <ul x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="flex flex-col gap-8 items-end w-full py-8 text-base">
                            <li>
                                <x-Header.nav-link href="/models/octavia">Octavia</x-Header.nav-link>
                            </li>
                            <li>
                                <x-Header.nav-link href="/models/octavia">Kodiaq</x-Header.nav-link>
                            </li>
                            <li>
                                <x-Header.nav-link href="/models/octavia">Karoq</x-Header.nav-link>
                            </li>
                        </ul>
                    </li>

                    <li x-data="{ open: false }" class="w-full ml-2">
                        <button @click="open = !open"
                            class="flex justify-center items-center w-full text-center text-skoda-electric-green hover:text-skoda-white">
                            <span>Послуги</span>
                            <!-- Simple arrow icon that rotates based on 'open' state -->
                            <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                class="w-4 h-4 ml-1 transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <!-- x-show="open" conditionally displays the submenu based on 'open' state -->
                        <ul x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="flex flex-col gap-8 items-end w-full py-8 text-base">
                            <li>
                                <x-Header.nav-link href="/models/octavia">Trade in</x-Header.nav-link>
                            </li>
                            <li>
                                <x-Header.nav-link href="/models/octavia">Кредит/Лізинг</x-Header.nav-link>
                            </li>
                        </ul>
                    </li>

                    <!-- Звичайний лінк: Контакти (Contact) -->
                    <li class="w-full">
                        <x-Header.nav-link href="/contact">Контакти</x-Header.nav-link>
                    </li>
                </ul>

                <!-- Placeholder for x-Header.phone-number -->
                <x-Header.phone-number />
            </nav>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }

    .main-nav-container {
        max-width: 320px;
        /* Max width for mobile-first design */
        width: 100%;
        background-color: #ffffff;
        padding: 24px;
        border-radius: 12px;
        /* Rounded corners */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow */
        margin-top: 50px;
        /* Add some top margin to center vertically */
    }
</style>
