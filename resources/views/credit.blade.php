@section('title', 'Автокредит та лізинг на автомобілі Škoda у Кременчуці – вигідні умови')

@section('meta')
    <meta name="description"
        content="Оформлення кредиту або лізингу на автомобіль Škoda в Кременчуці. Вигідні умови та швидке оформлення.">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Автокредит та лізинг на автомобілі Škoda у Кременчуці – вигідні умови">
    <meta property="og:description"
        content="Купуйте авто Škoda у Кременчуці в кредит, лізинг або розстрочку. Офіційний дилер пропонує прозорі умови, вигідні програми та допомогу у виборі фінансування для вашої нової машини.">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ Storage::url('images/kredit/kredit.jpg') }}">
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
        <x-text.main-title>Кредитування Škoda — вигідні програми для фізичних та юридичних осіб</x-text.main-title>
    </div>
    <div class="max-w-4xl mx-auto">
        <x-section>
            <div id="car-description" class="text-skoda-emerald-green">
                {!! $credit->description !!}
            </div>
        </x-section>
    </div>
    <div class="bg-skoda-electric-green">
        <div class="max-w-3xl mx-auto text-center">
            <x-section>
                <x-text.title class="mb-4">Кредитний калькулятор</x-text.title>
                <x-text.text class="mb-4">Ви можете скористатися нашим кредитним калькулятором, щоб розрахувати
                    приблизні щомісячні платежі за кредитом на автомобіль Škoda.</x-text.text>
                <x-calculator />
            </x-section>
        </div>
    </div>
    <div class="bg-skoda-emerald-green text-center">
        <x-section>
            <x-text.title color='electric-green'>Хочеш точний прорахунок?</x-text.title>
            <x-text.text color='electric-green' class="m-auto">Заповніть форму нижче, і наш менеджер
                зв'яжеться з
                вами для точного прорахунку з найвигіднішими для вас умовами</x-text.text>
            <x-form value='Кредит' />
        </x-section>
    </div>
</x-layout>
