@section('title', 'Škoda Scala – модний хетчбек, купити у Кременчуці')

@php
    $model = \App\Models\Models::where('url', 'scala')->with('images')->first();
    $models = \App\Models\Models::where('url', '!=', 'scala')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Scala – стильний хетчбек з просторим салоном і передовими технологіями. Офіційний дилер Škoda у Кременчуці пропонує актуальні ціни, комплектації та спеціальні пропозиції на Scala.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Scala – модний хетчбек, купити у Кременчуці">
    <meta property="og:description"
        content="Škoda Scala – стильний хетчбек з просторим салоном і передовими технологіями. Офіційний дилер Škoda у Кременчуці пропонує актуальні ціни, комплектації та спеціальні пропозиції на Scala.">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ url(Storage::url($primaryImage->image)) }}">
@endsection
@section('shema')
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Product",
  "@@id": "https://www.avtocenter-kremenchuk.site/scala#product",
  "name": "Škoda Scala",
  "alternateName": ["Шкода Скала","Scala Кременчук"],
  "description": "Škoda Scala — сучасний хетчбек для міста. Купівля у Кременчуці.",
  "url": "https://www.avtocenter-kremenchuk.site/scala",
  "brand": {"@type": "Brand","name": "Škoda"},
  "manufacturer": {"@type": "Organization","name": "Škoda Auto"},
  "category": "Hatchback",
  "isRelatedTo": {"@type": "AutoDealer","@id": "https://www.avtocenter-kremenchuk.site/#autodealer"}
}
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col gap-4">
            <x-text.main-title>Купити нову Škoda Scala</x-text.main-title>
            <x-text.title>Škoda Scala — універсальний хетчбек для міста та подорожей</x-text.title>
            <x-text.text class="mb-8">Будь-яка поїздка може стати початком важливих моментів.
                З новою <strong>Škoda Scala</strong> ви отримуєте <strong>універсальність, стиль і сучасні
                    технології</strong>, які
                роблять кожну дорогу
                комфортною та безпечною.</x-text.text>

            <x-text.title>Дизайн, який привертає увагу</x-text.title>
            <ul class="mb-8">
                <li> <x-text.text> - Виразні світлодіодні фари та динамічна решітка радіатора.</x-text.text>
                </li>
                <li> <x-text.text> - Ефектний дизайн кузова та сучасні легкосплавні диски.</x-text.text>
                </li>
                <li> <x-text.text> - Компактні пропорції роблять Scala ідеальною для міста, але вона виглядає солідно на
                        трасі та заміських дорогах.</x-text.text></li>
            </ul>

            <x-text.title>Салон і технології</x-text.title>
            <ul class="mb-8">
                <li><x-text.text> - Просторий салон із фірмовими елементами <strong>Simply
                            Clever</strong>.</x-text.text>
                </li>
                <li><x-text.text> - Сучасна мультимедійна система з інтеграцією смартфона.</x-text.text></li>
            </ul>

            <x-text.title>Технічні характеристики:</x-text.title>
            <img src="{{ Storage::url('/images/models/scala/scala_1.webp') }}" alt="Scala sizes" class="my-16"
                loading="lazy" />
            <a href="{{ Storage::url('/images/models/scala/Broshura_Scala.pdf') }}" target="_blank"
                class="text-skoda-emerald-green cursor-pointer text-2xl underline mb-16">
                Більше про Scala
            </a>
        </x-section>
    </div>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Часті запитання</x-text.title>
        <x-accordion :items="[
            [
                'title' => 'Яка витрата пального у Scala?',
                'content' => 'В середньому від 5,9 л/100 км (залежить від двигуна та комплектації).',
            ],
            [
                'title' => 'Які комплектації доступні?',
                'content' => 'Essence, Selection.',
            ],
            [
                'title' => 'Які двигуни є на Scala?',
                'content' =>
                    'Доступні 1.0 TSI (115 к.с.) та 1.5 TSI (110 к.с.) з роботизованою коробкою передач 7DSG та 1.0 TSI (95 к.с.) з механічною коробкою передач.',
            ],
        ]" />
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
