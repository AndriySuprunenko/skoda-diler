@section('title', 'Škoda Trade-in – обмін старого авто на новий автомобіль Škoda у Кременчуці')

@php
    $contacts = \App\Models\Contacts::first();
@endphp

@section('meta')
    <meta name="description"
        content="Офіційний дилер Škoda у Кременчуці пропонує зручний обмін Trade-in. Обміняйте свій старий автомобіль на новий Škoda за вигідною ціною. Швидка оцінка та оформлення.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Trade-in – обмін старого авто на новий автомобіль Škoda у Кременчуці">
    <meta property="og:description"
        content="Офіційний дилер Škoda у Кременчуці пропонує зручний обмін Trade-in. Обміняйте свій старий автомобіль на новий Škoda за вигідною ціною. Швидка оцінка та оформлення.">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ url(Storage::url('images/trade-in/trade-in.webp')) }}">
@endsection

<x-layout>
    <img src="{{ Storage::url('images/trade-in/trade-in.webp') }}" alt="Trade-in"
        class="w-full h-[300px] md:h-[800px] object-cover object-center" />
    <div class="flex flex-col gap-6 max-w-[1200px] text-center mt-10 m-auto">
        <x-text.main-title>Обмін Škoda за програмою Trade-in</x-text.main-title>
        <x-text.subtitle>У вас уже є авто, але хочете нову Škoda?
            Не витрачайте час на самостійну продажу — ми викупимо або приймемо ваш автомобіль на комісію, поки ви вже
            катаєтесь на новенькій Škoda з салону.</x-text.subtitle>
    </div>
    <x-section class="flex flex-col justify-center gap-6 max-w-[800px]">
        <x-text.title>Чому обмін авто зараз — вигідне рішення</x-text.title>
        <ul class="text-start">
            <li><x-text.text> - Ринок автомобілів із пробігом перенасичений;</x-text.text></li>
            <li><x-text.text> - Продаж займає тижні або навіть місяці;</x-text.text></li>
            <li><x-text.text> - Не завжди вдається знайти надійного покупця.</x-text.text></li>
        </ul>
        <x-text.text> Але бажання пересісти на нову, безпечну, сучасну Škoda — не чекає. Саме тому все більше
            власників обирають <strong>трейд-ін</strong> або <strong>продаж авто через автосалон.</strong></x-text.text>

        <x-text.title>Як це працює — простими словами</x-text.title>
        <ul class="text-start">
            <li><x-text.text> Ми зробили процес максимально простим та зручним: </strong></x-text.text></li>
            <li><x-text.text> - <strong>Безкоштовна оцінка вашого авто</strong> — в нашому дилерському
                    центрі; </x-text.text></li>
            <li><x-text.text> - <strong>Прозора пропозиція</strong> — узгоджуємо ціну викупу;</x-text.text></li>
            <li><x-text.text> - <strong>Оформлення договору</strong> — ви передаєте нам авто на викуп або
                    комісію;</x-text.text></li>
            <li><x-text.text> - <strong>Вартість вашого авто йде в залік</strong> при покупці нової Škoda;</x-text.text>
            </li>
            <li><x-text.text> - <strong>Доплата — готівкою, в кредит або в лізинг.</strong></x-text.text></li>
        </ul>

        <x-text.title>Якщо ви вже маєте авто — вам буде швидше, вигідніше, зручніше</x-text.title>
        <ul class="text-start">
            <li><x-text.text> Цей формат — ідеальний, якщо: </strong></x-text.text></li>
            <li><x-text.text> - Ви хочете <strong>пересісти на нову Škoda без затримок</strong>; </x-text.text></li>
            <li><x-text.text> - Вам важливо <strong>не втрачати час на розміщення оголошень</strong>;</x-text.text></li>
            <li><x-text.text> - Ви хочете <strong>отримати максимальну вигоду</strong> без стресу від торгу й
                    переглядів.</x-text.text>
            </li>
        </ul>
        <x-text.text> <strong>Рішення про покупку приймається швидше</strong>, бо ми вже враховуємо вартість старого
            авто як частину
            оплати нової Škoda.</x-text.text>

        <x-text.title>Обміняй авто на нову Škoda вже сьогодні</x-text.title>
        <x-text.text> Залиште заявку, щоб дізнатись скільки коштує твій автомобіль та яку Škoda ти можеш отримати вже
            цього тижня.</x-text.text>
        <div class="flex gap-6 flex-wrap justify-center mt-6">
            <div class="w-full max-w-[300px]">
                <x-link href="/stock-cars">
                    Переглянути авто в наявності
                </x-link>
            </div>
            <div class="w-full max-w-[300px]">
                <x-send-message-button>Написати нам</x-send-message-button>
            </div>
            <div class="w-full max-w-[300px]">
                <x-link href="tel:{{ $contacts->phone }}" style="emerald-white">Зателефонуйте нам</x-link>
            </div>
            <div class="w-full max-w-[300px]">
                <x-button style="emerald" click="$dispatch('open-modal', { type: 'consultation', value: 'Trade-in' })">
                    Залишити заявку
                </x-button>
            </div>
        </div>
    </x-section>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Часті запитання</x-text.title>
        <x-accordion :items="[
            ['title' => 'Яке авто можна здати?', 'content' => 'Будь-яке легкове авто з 2010 року. Будь-якої марки.'],
            [
                'title' => 'Що таке трейд-ін?',
                'content' => 'Це коли ви віддаєте своє авто нам, а ми зараховуємо його вартість у рахунок нової Škoda.',
            ],
            [
                'title' => 'Можу їздити на новій Škoda, поки ви продаєте мою стару?',
                'content' => 'Так, це можливо! Ми гнучко налаштовуємо процес під кожного клієнта.',
            ],
        ]" />
    </x-section>
    <x-section class="bg-skoda-emerald-green text-center">
        <x-text.title color='electric-green'>Залишилися запитання?</x-text.title>
        <x-text.text color='electric-green' class="m-auto">Заповніть форму нижче, і наш менеджер
            зв'яжеться з
            вами</x-text.text>
        <x-form value='Trade-in' />
    </x-section>
</x-layout>
