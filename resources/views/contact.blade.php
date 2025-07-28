@section('title', 'Контакти')
@section('meta')
    <meta name="description" content="ТОВ Автоцентр-Кременчук-2012">
    <meta name="keywords" content="Škoda, Автоцентр, Автомобілі">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="ТОВ Автоцентр-Кременчук-2012 Контакти">
    <meta property="og:description" content="ТОВ Автоцентр-Кременчук-2012 Офіційний дилер автомобілів ŠKODA в м. Кременчук">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('main.webp') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "ТОВ Автоцентр-Кременчук-2012",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "ТОВ Автоцентр-Кременчук-2012 Офіційний дилер автомобілів ŠKODA в м. Кременчук",
    }
    </script>
@endsection

@php
    $contacts = \App\Models\Contacts::first();
@endphp

<x-layout>
    <x-section class="flex flex-col items-center">
        <x-Text.title>Контакти</x-Text.title>
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
                <div class="flex flex-col gap-6 max-w-[200px] m-auto md:m-0 pt-4">
                    <x-send-message-button>Написати нам</x-send-message-button>
                    <x-button style="emerald-white"
                        click="$dispatch('open-modal', { type: 'consultation' , value: 'Контакти' })">
                        Залишити заявку
                    </x-button>
                </div>
                <div class="flex flex-col mt-8 w-fit m-auto md:w-full">
                    <span class="font-bold"> Наші соціальні мережі: </span>
                    <div class="flex gap-6 mt-2">
                        <a href="{{ $contacts->social_medias['instagram'] }}" target="_blank">
                            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/instagram.png') }}"
                                alt="Instagram" />
                        </a>
                        <a href="{{ $contacts->social_medias['facebook'] }}" target="_blank">
                            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/facebook.png') }}"
                                alt="Facebook" />
                        </a>
                        <a href="{{ $contacts->social_medias['youtube'] }}" target="_blank">
                            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/youtube.png') }}"
                                alt="Youtube" />
                        </a>
                        <a href="{{ $contacts->social_medias['tiktok'] }}" target="_blank">
                            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/tiktok.png') }}"
                                alt="TikTok" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-section>
</x-layout>
