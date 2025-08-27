@section('title', 'Superb')

@php
    $model = \App\Models\Models::where('url', 'superb')->with('images')->first();
    $models = \App\Models\Models::where('url', '!=', 'superb')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Superb - це великий автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords"
        content="Superb, Škoda, великий автомобіль, стильний автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Superb">
    <meta property="og:description"
        content="Superb - це великий автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Superb",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Superb - це великий автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології."
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col">
            <x-text.title>Škoda Superb — новий рівень комфорту преміум-класу</x-text.title>
            <x-text.text class="mb-12 mt-2">Кожна подорож відкриває нові можливості.
                З новим <strong>Škoda Superb</strong> ви отримуєте <strong> простір, сучасні технології та динаміку
                </strong>, які роблять поїздки
                комфортними як для водія, так і для всієї родини.</x-text.text>

            <x-text.title>Дизайн, який підкреслює статус</x-text.title>
            <ul class="mb-12 mt-2">
                <li> <x-text.text> - Вишуканий силует і впізнаваний фірмовий стиль</x-text.text>
                </li>
                <li> <x-text.text> - Матрична оптика та виразна решітка радіатора</x-text.text>
                </li>
                <li> <x-text.text> - Стиль, що підходить і для бізнесу, і для сімейних подорожей</x-text.text></li>
            </ul>

            <x-text.title>Салон і технології</x-text.title>
            <ul class="mb-16 mt-2">
                <li><x-text.text> - Просторий салон із преміальними матеріалами оздоблення</strong></x-text.text>
                </li>
                <li><x-text.text> - Дуже зручні <strong>Ergo-сидіння</strong> для максимального комфорту</x-text.text>
                </li>
                <li><x-text.text> - Асистенти водія нового покоління для щоденної безпеки</x-text.text>
                </li>
                <li><x-text.text> - Кліматична система Climatronic для індивідуального мікроклімату</x-text.text></li>
            </ul>

            <x-text.title>Чому варто обрати Škoda Superb у Кременчуці</x-text.title>
            <ul class="mb-16 mt-2">
                <li><x-text.text> - Наявність індивідуальних комплектацій</strong></x-text.text>
                </li>
                <li><x-text.text> - Преміальні технології при оптимальній ціні</x-text.text>
                </li>
                <li><x-text.text> - Вигідні умови покупки: трейд-ін, кредит, лізинг</x-text.text>
                </li>
                <li><x-text.text> - Офіційний сервіс Škoda у місті для техобслуговування та ремонту</x-text.text></li>
            </ul>

            <x-video url="https://www.youtube.com/watch?v=9qFS9z30ITw" />
        </x-section>
    </div>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Часті запитання</x-text.title>
        <x-accordion :items="[
            [
                'title' => 'Які комплектації доступні у Superb?',
                'content' => 'Selection, Laurin & Klement та Sportline.',
            ],
            [
                'title' => 'Яка витрата пального у Superb?',
                'content' => 'В середньому від 6,0 л/100 км (залежить від двигуна та трансмісії).',
            ],
            [
                'title' => 'Чи є повний привід у Superb?',
                'content' => ' Так, доступні версії з повним приводом (4x4).',
            ],
        ]" />
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
