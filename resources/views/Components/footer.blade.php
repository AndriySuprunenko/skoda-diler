@php
    $contacts = \App\Models\Contacts::first();
@endphp

<footer class="bg-skoda-emerald-green px-8 py-4 flex flex-col gap-4 md:gap-8">
    <div class="w-full flex justify-between items-center z-10 flex-col md:flex-row gap-4 text-center md:text-left">
        <x-header.logo />
        <div class="flex flex-col text-skoda-electric-green w-full max-w-[200px] justify-center">
            <span class="font-bold">Номер телефону: </span>
            <a href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</a>
        </div>
        <div class="flex flex-col text-skoda-electric-green w-full max-w-[400px] justify-center">
            <span class="font-bold"> Електронна пошта: </span>
            <a href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
        </div>
        <div class="w-full max-w-[200px]">
            <x-social-medias color="electric-green" />
        </div>
    </div>
    <div class="flex justify-between items-center z-10 flex-col md:flex-row gap-4 text-center md:text-left">
        <a href="{{ asset('privacy-policy.pdf') }}" target="_blank" class="text-skoda-electric-green cursor-pointer">
            Політика конфіденційності
        </a>
        <x-text color="electric-green">
            &copy; {{ date('Y') }} ТОВ "Автоцентр-Кременчук-2012". Всі права захищені.
        </x-text>
    </div>
</footer>
