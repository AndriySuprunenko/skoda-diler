@section('title', 'Автокредит та лізинг на автомобілі Škoda у Кременчуці – вигідні умови')

@section('meta')
    <meta name="description"
        content="Оформлення кредиту або лізингу на автомобіль Škoda в Кременчуці. Вигідні умови та швидке оформлення.">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Автокредит та лізинг на автомобілі Škoda у Кременчуці – вигідні умови">
    <meta property="og:description"
        content="Купуйте авто Škoda у Кременчуці в кредит, лізинг або розстрочку. Офіційний дилер пропонує прозорі умови, вигідні програми та допомогу у виборі фінансування для вашої нової машини.">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ url(Storage::url('images/kredit/credit.webp')) }}">
@endsection

@php
    $credit = \App\Models\Credit::first();
@endphp

<x-layout>
    <div>
        <img src="{{ Storage::url('images/kredit/credit.webp') }}" alt="Кредитна програми Škoda"
            class="w-full h-auto" />
    </div>
    <div class="text-center my-4 md:my-8">
        <x-text.main-title>Škoda - авто в кредит, розстрочку</x-text.main-title>
    </div>
    <div class="max-w-4xl mx-auto">
        <x-section>
            <div id="car-description" class="text-skoda-emerald-green">
                {!! $credit->description !!}
            </div>
        </x-section>
    </div>
    <div class="bg-skoda-emerald-green" id="calculator">
        <div class="max-w-3xl mx-auto text-center">
            <x-section>
                <x-text.title color="electric-green">Кредитний калькулятор</x-text.title>
                <x-text.subtitle class="my-4" color="electric-green">Розрахуйте покупку авто в кредит дізнайтеся
                    орієнтовну суму щомісячного платежу на нову Škoda.</x-text.subtitle>
                <x-calculator />
            </x-section>
        </div>
    </div>
    <div class="bg-skoda-emerald-green text-center" id="form-credit">
        <x-section>
            <div id="result" class="mb-6 text-center text-3xl text-skoda-electric-green font-medium"></div>
            <x-text.title color='electric-green'>Хочете знати точну вартість?</x-text.title>
            <x-text.subtitle color='electric-green' class="m-auto">Заповніть форму — ми розрахуємо все індивідуально для
                вас!</x-text.subtitle>
            <x-form value='Кредит' />
            <p class="text-sm mt-2 text-skoda-electric-green">Наведені вище розрахунки несуть виключно інформаційний
                характер. Надішліть заявку та
                отримайте персональний розрахунок у зручний для вас месенджер протягом 30 хвилин у робочий час.</p>
        </x-section>
    </div>
</x-layout>
