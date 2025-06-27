<div class="main-nav-container">
    <nav class="flex flex-col w-full items-center gap-8">
        <ul class="flex flex-col gap-8 items-center w-full">
            <!-- Звичайний лінк: Головна (Home) -->
            <li class="group w-full">
                <a href="/"
                    class="block w-full md:w-auto text-center md:text-left text-gray-700 hover:text-blue-600 font-semibold transition-colors duration-200 py-2 px-4 rounded-md">Головна</a>
            </li>

            <!-- Лінк з підменю/акордеоном: Моделі (Models) -->
            <!-- x-data="{ open: false }" initializes Alpine.js state for the dropdown -->
            <!-- x-transition provides a smooth show/hide animation -->
            <li x-data="{ open: false }" class="group w-full">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full text-center md:text-left font-semibold focus:outline-none text-gray-700 hover:text-blue-600 transition-colors duration-200 py-2 px-4 rounded-md">
                    <span>Моделі</span>
                    <!-- Simple arrow icon that rotates based on 'open' state -->
                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                        class="w-4 h-4 ml-2 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- x-show="open" conditionally displays the submenu based on 'open' state -->
                <ul x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                    class="mt-2 flex flex-col gap-4 items-center md:items-start w-full pl-4 text-sm bg-gray-50 rounded-md py-2 shadow-inner">
                    <li>
                        <a href="/models/octavia"
                            class="block w-full text-center md:text-left text-gray-600 hover:text-blue-500 transition-colors duration-200 py-1 px-3 rounded-md">Octavia</a>
                    </li>
                    <li>
                        <a href="/models/kodiaq"
                            class="block w-full text-center md:text-left text-gray-600 hover:text-blue-500 transition-colors duration-200 py-1 px-3 rounded-md">Kodiaq</a>
                    </li>
                    <li>
                        <a href="/models/fabia"
                            class="block w-full text-center md:text-left text-gray-600 hover:text-blue-500 transition-colors duration-200 py-1 px-3 rounded-md">Fabia</a>
                    </li>
                </ul>
            </li>

            <!-- Звичайний лінк: Контакти (Contact) -->
            <li class="group w-full">
                <a href="/contact"
                    class="block w-full text-center md:text-left text-gray-700 hover:text-blue-600 font-semibold transition-colors duration-200 py-2 px-4 rounded-md">Контакти</a>
            </li>
        </ul>

        <!-- Placeholder for x-Header.phone-number -->
        <div class="mt-8 pt-4 border-t border-gray-200 w-full text-center md:text-left text-lg font-bold text-gray-800">
            Телефон: +380 12 345 6789
        </div>
    </nav>
</div>

<style>
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
