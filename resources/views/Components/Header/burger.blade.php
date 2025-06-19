    <button x-data="{ isOpen: false }" @click="isOpen = !isOpen" class="relative z-50 md:hidden" aria-label="Toggle Menu">
        <div class="flex flex-col gap-1.5 p-2">
            <span class="block h-0.5 w-6 bg-skoda-electric-green transition-transform duration-300"
                :class="{ 'rotate-45 translate-y-2': isOpen }"></span>
            <span class="block h-0.5 w-6 bg-skoda-electric-green transition-opacity duration-300"
                :class="{ 'opacity-0': isOpen }"></span>
            <span class="block h-0.5 w-6 bg-skoda-electric-green transition-transform duration-300"
                :class="{ '-rotate-45 -translate-y-2': isOpen }"></span>
        </div>

        <div x-show="isOpen" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="absolute top-10 -right-7 w-70 text-center z-0 bg-skoda-emerald-green rounded-lg px-4 py-8"
            @click.away="isOpen = false">
            <x-Header.navigation />
        </div>
    </button>

    <script src="//unpkg.com/alpinejs" defer></script>
