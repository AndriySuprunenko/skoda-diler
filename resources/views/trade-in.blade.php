@section('title', 'Trade-in')

@php
    $contacts = \App\Models\Contacts::first();
@endphp

@section('meta')
    <meta name="description" content="Обміняйте свій автомобіль на нову Škoda — без зайвих турбот">
    <meta name="keywords" content="trade-in, обмін автомобіля, Škoda, Кременчук, автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Trade-in на автомобілі Škoda">
    <meta property="og:description" content="Обміняйте свій автомобіль на нову Škoda — без зайвих турбот">
    <meta property="og:type" content="financial.product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('images/trade-in/trade-in.webp') }}">
@endsection

<x-layout>
    <img src="{{ Storage::url('images/trade-in/trade-in.webp') }}" alt="Trade-in"
        class="w-full h-[300px] md:h-[800px] object-cover object-center" />
    <div class="flex flex-col justify-center gap-6 max-w-[1200px] text-center mt-10 m-auto">
        <x-Text.main-title>Обміняйте свій автомобіль на нову Škoda — без зайвих
            турбот</x-Text.main-title>
        <x-Text.subtitle>У вас уже є авто, але хочете нову Škoda?
            Не витрачайте час на самостійну продажу — ми викупимо або приймемо ваш автомобіль на комісію, поки ви вже
            катаєтесь на новенькій Škoda з салону.</x-Text.subtitle>
    </div>
    <x-section class="flex flex-col justify-center gap-6 max-w-[800px] text-center">
        <x-Text.title>Чому обмін авто зараз — вигідне рішення</x-Text.title>
        <ul class="w-fit m-auto text-start">
            <li><x-Text.text> - Ринок автомобілів із пробігом перенасичений;</x-Text.text></li>
            <li><x-Text.text> - Продаж займає тижні або навіть місяці;</x-Text.text></li>
            <li><x-Text.text> - Не завжди вдається знайти надійного покупця.</x-Text.text></li>
        </ul>
        <x-Text.text> Але бажання пересісти на нову, безпечну, сучасну Škoda — не чекає. Саме тому все більше
            власників обирають <strong>трейд-ін</strong> або <strong>продаж авто через автосалон.</strong></x-Text.text>

        <x-Text.title>Як це працює — простими словами</x-Text.title>
        <ul class="w-fit m-auto text-start">
            <li><x-Text.text> Ми зробили процес максимально простим та зручним: </strong></x-Text.text></li>
            <li><x-Text.text> - <strong>Безкоштовна оцінка вашого авто</strong> — в нашому дилерському
                    центрі; </x-Text.text></li>
            <li><x-Text.text> - <strong>Прозора пропозиція</strong> — узгоджуємо ціну викупу;</x-Text.text></li>
            <li><x-Text.text> - <strong>Оформлення договору</strong> — ви передаєте нам авто на викуп або
                    комісію;</x-Text.text></li>
            <li><x-Text.text> - <strong>Вартість вашого авто йде в залік</strong> при покупці нової Škoda;</x-Text.text>
            </li>
            <li><x-Text.text> - <strong>Доплата — готівкою, в кредит або в лізинг.</strong></x-Text.text></li>
        </ul>

        <x-Text.title>Якщо ви вже маєте авто — вам буде швидше, вигідніше, зручніше</x-Text.title>
        <ul class="w-fit m-auto text-start">
            <li><x-Text.text> Цей формат — ідеальний, якщо: </strong></x-Text.text></li>
            <li><x-Text.text> - Ви хочете <strong>пересісти на нову Škoda без затримок</strong>; </x-Text.text></li>
            <li><x-Text.text> - Вам важливо <strong>не втрачати час на розміщення оголошень</strong>;</x-Text.text></li>
            <li><x-Text.text> - Ви хочете <strong>отримати максимальну вигоду</strong> без стресу від торгу й
                    переглядів.</x-Text.text>
            </li>
        </ul>
        <x-Text.text> <strong>Рішення про покупку приймається швидше</strong>, бо ми вже враховуємо вартість старого
            авто як частину
            оплати нової Škoda.</x-Text.text>

        <x-Text.title>Обміняй авто на нову Škoda вже сьогодні</x-Text.title>
        <x-Text.text> Залиште заявку, щоб дізнатись скільки коштує твій автомобіль та яку Škoda ти можеш отримати вже
            цього тижня.</x-Text.text>
        <div class="flex gap-6 flex-wrap justify-center mt-6">
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
        <x-Text.title>Часті запитання</x-Text.title>
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
        <x-Text.title color='electric-green'>Залишилися запитання?</x-Text.title>
        <x-Text.text color='electric-green' class="m-auto">Заповніть форму нижче, і наш менеджер
            зв'яжеться з
            вами</x-Text.text>
        <x-form value='Trade-in' />
    </x-section>
</x-layout>
