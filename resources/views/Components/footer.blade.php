<footer
    class="bg-skoda-emerald-green px-2 md:px-8 py-4 flex justify-between items-center z-10 flex-col md:flex-row gap-4">
    <x-Header.logo />
    <a href="{{ asset('privacy-policy.pdf') }}" target="_blank" class="text-skoda-electric-green cursor-pointer">
        Політика конфіденційності
    </a>
    <x-text color="electric-green">
        &copy; {{ date('Y') }} Škoda. Всі права захищені.
    </x-text>
</footer>
