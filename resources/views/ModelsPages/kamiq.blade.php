@section('title', 'Kamiq FL')

@php
    $model = \App\Models\Models::where('url', 'kamiq-fl')->with('images')->first();
    $models = \App\Models\Models::where('url', '!=', 'kamiq-fl')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Kamiq – стильний компактний кросовер із передовими технологіями та ергономічним інтер’єром. Зверніться до офіційного дилера Škoda у Кременчуці щоб дізнатися ціну та для покупки нового Kamiq з гарантією.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Kamiq – компактний кросовер у Кременчуці">
    <meta property="og:description"
        content="Škoda Kamiq – стильний компактний кросовер із передовими технологіями та ергономічним інтер’єром. Зверніться до офіційного дилера Škoda у Кременчуці щоб дізнатися ціну та для покупки нового Kamiq з гарантією.">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col">
            <x-text.title>Škoda Kamiq — міський кросовер для великих відкриттів</x-text.title>
            <x-text.text class="mb-12 mt-2"><strong>Досліджувати світ легко, коли поруч надійний супутник.</strong>
                Новий <strong>Škoda Kamiq</strong> поєднує стильний дизайн, компактні розміри та сучасні технології, щоб
                кожна поїздка
                була комфортною та безпечною.</x-text.text>

            <x-text.title>Дизайн і зовнішність</x-text.title>
            <ul class="mb-12 mt-2">
                <li> <x-text.text> - Компактні пропорції — ідеально для міста.</x-text.text>
                </li>
                <li> <x-text.text> - Світлодіодні фари для яскравого і безпечного освітлення.</x-text.text>
                </li>
                <li> <x-text.text> - Легкосплавні диски та захисні елементи кузова.</x-text.text></li>
            </ul>

            <x-text.title>Салон та технології</x-text.title>
            <ul class="mb-16 mt-2">
                <li><x-text.text> - Просторий і функціональний салон для щоденного комфорту.</x-text.text>
                </li>
                <li><x-text.text> - Віртуальна панель приладів і сучасна <strong>інформаційно-розважальна
                            система</strong>.</x-text.text>
                </li>
                <li><x-text.text> - Інтеграція смартфонів, CarPlay та Android Auto.</x-text.text>
                </li>
                <li><x-text.text> - Надійні системи безпеки та асистенти водія для паркування.</x-text.text></li>
            </ul>

            <x-text.title>Чому Kamiq — розумний вибір для активного життя</x-text.title>
            <ul class="mb-16 mt-2">
                <li><x-text.text> - Компактний, але функціональний кросовер для міста та подорожей.</x-text.text>
                </li>
                <li><x-text.text> - Легко паркувати, зручно їздити навіть у щільному трафіку.</x-text.text>
                </li>
                <li><x-text.text> - Можливість придбання по <strong>трейд-ін</strong>, в кредит або
                        лізинг.</x-text.text>
                </li>
            </ul>

            <x-text.title>Технічні характеристики:</x-text.title>
            <img src="{{ Storage::url('/images/models/kamiq/kamiq_1.webp') }}" alt="Kamiq sizes" class="my-16"
                loading="lazy" />
            <a href="{{ Storage::url('/images/models/kamiq/Broshura_Kamiq.pdf') }}" target="_blank"
                class="text-skoda-emerald-green cursor-pointer text-2xl underline mb-16">
                Більше про Kamiq
            </a>

            <x-video url="https://www.youtube.com/watch?v=W-Fi929SmHU" />
        </x-section>
    </div>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Часті запитання</x-text.title>
        <x-accordion :items="[
            [
                'title' => 'Які двигуни є на Kamiq?',
                'content' =>
                    'Для Kamiq доступні 1.0 TSI (115 к.с.) та 1.5 TSI (110 к.с.) з роботизованою коробкою передач 7DSG та 1.0 TSI (95 к.с.) з механічною коробкою передач.',
            ],
            [
                'title' => 'Чи можна здати старе авто по трейд-ін?',
                'content' => ' Так, авто будь-якого бренду з 2010 року враховується у вартості нового Kamiq.',
            ],
            [
                'title' => 'Які технології роблять поїздку комфортною?',
                'content' =>
                    ' Climatronic, віртуальна панель, мультимедіа з інтеграцією смартфонів, світлодіодні фари та численні асистенти водія.',
            ],
        ]" />
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
