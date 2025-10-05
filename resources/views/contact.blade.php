@section('title', 'Контакти')
@section('meta')
    <meta name="description"
        content="Зв'яжіться з офіційним дилером Škoda у Кременчуці: адреса салону, телефони та графік роботи. Отримайте консультацію, дізнайтеся про наявність авто та запишіться на тест-драйв.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Контакти офіційного дилера Škoda у Кременчуці – адреса та телефон">
    <meta property="og:description"
        content="Зв'яжіться з офіційним дилером Škoda у Кременчуці: адреса салону, телефони та графік роботи. Отримайте консультацію, дізнайтеся про наявність авто та запишіться на тест-драйв.">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ Storage::url('/images/main.webp') }}">
@endsection

@php
    $contacts = \App\Models\Contacts::first();
@endphp

<x-layout>
    <x-section class="flex flex-col items-center">
        <x-text.main-title>Контакти</x-text.main-title>
        <div class="flex gap-6 mt-5 flex-col md:flex-row justify-center w-full items-center">
            <x-map />
            <div class="w-full max-w-[300px] md:max-w-[500px] h-full p-10 bg-skoda-white rounded-xl">
                <div class="flex flex-col">
                    <span class="font-bold">Адреса: </span>
                    <a href="https://maps.app.goo.gl/VBhCJBRkU8pzisDLA?g_st=ipc" target="_blank">вулиця
                        Київська, 75, Кременчук, Полтавська область, 39600</a>
                </div>
                <div class="flex flex-col mt-4">
                    <span class="font-bold">Номер телефону: </span>
                    <a href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</a>
                </div>
                <div class="flex flex-col mt-4">
                    <span class="font-bold"> Електронна пошта: </span>
                    <a href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                </div>
                <div class="flex flex-col pt-4">
                    <span class="font-bold"> Графік роботи компанії: </span>
                    <div class="w-full max-w-[200px] pt-2 m-auto md:m-0">
                        {{-- Перебираємо робочі години --}}
                        @foreach (array_reverse($contacts->working_hours) as $day => $hours)
                            <div class="flex justify-between">
                                <span>{{ $day }}</span>
                                <span>{{ $hours }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col gap-6 max-w-[200px] m-auto md:m-0 py-8">
                    <x-send-message-button>Написати нам</x-send-message-button>
                    <x-button style="emerald-white"
                        click="$dispatch('open-modal', { type: 'consultation' , value: 'Контакти' })">
                        Залишити заявку
                    </x-button>
                </div>
                <x-social-medias />
            </div>
        </div>
    </x-section>
</x-layout>
