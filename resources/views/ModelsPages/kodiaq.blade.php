@section('title', 'Škoda Kodiaq – просторий кросовер, купити у Кременчуці')

@php
    $model = \App\Models\Models::where('url', 'kodiaq')->with('images')->first();
    $models = \App\Models\Models::where('url', '!=', 'kodiaq')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Kodiaq – потужний кросовер з містким салоном. Ціни від офіційного дилера Škoda у Кременчуці. Пропонуємо покупку, тест-драйви, акційні пропозиції та сервісні програми на Kodiaq.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Kodiaq – просторий кросовер, купити у Кременчуці">
    <meta property="og:description"
        content="Škoda Kodiaq – потужний кросовер з містким салоном. Ціни від офіційного дилера Škoda у Кременчуці. Пропонуємо покупку, тест-драйви, акційні пропозиції та сервісні програми на Kodiaq.">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ url(Storage::url($primaryImage->image)) }}">
@endsection
@section('shema')
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Product",
  "@@id": "https://www.avtocenter-kremenchuk.site/kodiaq#product",
  "name": "Škoda Kodiaq",
  "alternateName": ["Шкода Кодіак","Škoda Kodiaq 2025","Кодіак Кременчук"],
  "description": "Новий Škoda Kodiaq — повнорозмірний сімейний SUV з можливістю придбання у кредит, лізинг або трейд-ін у Кременчуці.",
  "url": "https://www.avtocenter-kremenchuk.site/kodiaq",
  "brand": {"@type": "Brand","name": "Škoda"},
  "manufacturer": {"@type": "Organization","name": "Škoda Auto"},
  "category": "SUV",
  "isRelatedTo": {"@type": "AutoDealer","@id": "https://www.avtocenter-kremenchuk.site/#autodealer"}
}
    </script>
@endsection
<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col gap-4">
            <x-text.main-title>Купити новий Škoda Kodiaq</x-text.main-title>
            <x-text.title>Новий Škoda Kodiaq — простір для сім’ї та відкриттів</x-text.title>
            <x-text.text class="mb-8">Škoda Kodiaq — це більше, ніж автомобіль. Це <strong>сімейний простір,
                    компаньйон у
                    подорожах і технологічний помічник</strong> у щоденному житті.</x-text.text>

            <x-text.title>Що змінилося в новому Kodiaq</x-text.title>
            <ul class="mb-8">
                <li> <x-text.text> - <strong>Більше простору</strong>: збільшені габарити та <strong>3 ряди
                            сидінь</strong> для всієї родини.</x-text.text>
                </li>
                <li> <x-text.text> - <strong>Комфорт преміум-рівня</strong>: сидіння Ergo з функцією масажу, продумане
                        керування,
                        інтелектуальні системи безпекти.</x-text.text>
                </li>
                <li> <x-text.text> - <strong>Сучасні технології</strong>: мультимедіа до 13’’, до 9 USB-C портів, повна
                        інтеграція смартфонів.</x-text.text></li>
                <li> <x-text.text> - <strong>Оновлена лінійка двигунів</strong>: динаміка + економічність +
                        інтелектуальні асистенти для
                        безпечного водіння.</x-text.text></li>
            </ul>

            <x-text.title>Чому Kodiaq — це «розумний вибір» для сім’ї</x-text.title>
            <ul class="mb-8">
                <li><x-text.text> - Просторий салон для <strong>подорожей з дітьми та друзями</strong></x-text.text>
                </li>
                <li><x-text.text> - Системи безпеки, що піклуються про вашу безпечну поїздку</x-text.text></li>
                <li><x-text.text> - Simply Clever — опції, що здивують найвибагливіших пасажирів та водіїв</x-text.text>
                </li>
                <li><x-text.text> - Технології, що роблять поїздку приємною та легкою</x-text.text></li>
            </ul>

            <x-text.title>Технічні характеристики:</x-text.title>
            <img src="{{ Storage::url('/images/models/kodiaq/kodiaq-1.webp') }}" alt="Kodiaq sizes" class="my-16"
                loading="lazy" />
            <a href="{{ Storage::url('/images/models/kodiaq/Katalog_Kodiaq.pdf') }}" target="_blank"
                class="text-skoda-emerald-green cursor-pointer text-2xl underline mb-16">
                Більше про Kodiaq
            </a>

            <x-video url="https://www.youtube.com/watch?v=wdYbPZuq7YA" />
        </x-section>
    </div>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Часті запитання</x-text.title>
        <x-accordion :items="[
            [
                'title' => 'Яка витрата палива в місті?',
                'content' => 'від 7,8–8,1 л/100 км.',
            ],
            [
                'title' => 'Чи можна обміняти авто по трейд-ін?',
                'content' =>
                    'Так, ми розглядаємо автомобілі від 2010 року і враховуємо його вартість у ціну нового Kodiaq.',
            ],
            [
                'title' => 'Яку комплектацію обирають найчастіше?',
                'content' => 'Найпопулярніша — Sportline: стильний дизайн, матрична оптика, багато опцій у базі.',
            ],
        ]" />
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
