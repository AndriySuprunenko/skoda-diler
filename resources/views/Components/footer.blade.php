<footer
    class="bg-skoda-emerald-green px-8 py-4 flex justify-between items-center z-10 flex-col md:flex-row gap-4 text-center md:text-left">
    <x-header.logo />
    <a href="{{ asset('privacy-policy.pdf') }}" target="_blank" class="text-skoda-electric-green cursor-pointer">
        Політика конфіденційності
    </a>
    <x-text color="electric-green">
        &copy; {{ date('Y') }} ТОВ "Автоцентр-Кременчук-2012". Всі права захищені.
    </x-text>
</footer>
