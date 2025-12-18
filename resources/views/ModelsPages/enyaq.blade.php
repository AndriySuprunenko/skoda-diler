@section('title', 'Škoda Enyaq – надійний електричний кросовер, купити у Кременчуці')

@php
    $model = \App\Models\Models::where('url', 'enyaq')->with('images')->first();
    $models = \App\Models\Models::where('url', '!=', 'enyaq')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Enyaq – сучасний кросовер з комфортною підвіскою та продуманим інтер’єром. Офіційний дилер Škoda у Кременчуці пропонує різні комплектації Enyaq за вигідними цінами та спеціальні пропозиції.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Enyaq – надійний електричний кросовер, купити у Кременчуці">
    <meta property="og:description"
        content="Škoda Enyaq – сучасний кросовер з комфортною підвіскою та продуманим інтер’єром. Офіційний дилер Škoda у Кременчуці пропонує різні комплектації Enyaq за вигідними цінами та спеціальні пропозиції.">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ url(Storage::url($primaryImage->image)) }}">
@endsection
@section('shema')
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Product",
  "@@id": "https://www.avtocenter-kremenchuk.site/enyaq#product",
  "name": "Škoda Enyaq",
  "alternateName": ["Шкода Еньяк","Enyaq електромобіль"],
  "description": "Škoda Enyaq — електричний SUV з офіційною гарантією. Купівля у Кременчуці.",
  "url": "https://www.avtocenter-kremenchuk.site/enyaq",
  "brand": {"@type": "Brand","name": "Škoda"},
  "manufacturer": {"@type": "Organization","name": "Škoda Auto"},
  "category": "Electric SUV",
  "fuelType": "Electric",
  "isRelatedTo": {"@type": "AutoDealer","@id": "https://www.avtocenter-kremenchuk.site/#autodealer"}
}
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col gap-4">
            <x-text.main-title>Купити новий Škoda Enyaq</x-text.main-title>
            <x-text.title>Відчуйте майбутнє вже сьогодні.</x-text.title>
            <x-text.text>Škoda Enyaq — це сучасний електрокросовер: потужний, стильний і повністю
                екологічний. Без викидів CO₂, із запасом ходу до 582 км і дизайном, який неможливо сплутати з
                іншим.</x-text.text>
            <x-text.text class="mb-8">Під капотом — високовольтна батарея ємністю 82 кВт·год, що забезпечує
                впевнений рух у
                будь-яких умовах. Потужність у 210 кВт і крутний момент 545 Нм перетворюють кожну поїздку на приємне
                прискорення без шуму двигуна.</x-text.text>
            <x-text.title>Швидка зарядка? Так! Від 10 до 80% всього за 28 хвилин — і ви знову в
                дорозі.</x-text.title>
            <x-text.title>Дизайн Modern Solid — нова мова стилю Škoda</x-text.title>
            <x-text.text>Enyaq став першим представником нового дизайну Modern Solid.</x-text.text>
            <ul class="mb-8">
                <li> <x-text.text> - технологічна панель Tech-Deck Face замість класичної решітки.</x-text.text>
                </li>
                <li> <x-text.text> - новий напис Škoda на капоті.</x-text.text>
                </li>
                <li> <x-text.text> - елегантна світлодіодна смуга й анімовані задні ліхтарі.</x-text.text></li>
                <li> <x-text.text> - аеродинамічні колеса та новий колір Olibo металік.</x-text.text></li>
            </ul>

            <x-text.title>Усередині Enyaq — простір і продуманість у кожній деталі.</x-text.title>
            <ul class="mb-8">
                <li><x-text.text> - Тризонний клімат-контроль, підігрів сидінь, великий сенсорний екран мультимедіа,
                        цифрова панель, порти USB-C для всіх пасажирів.</x-text.text>
                </li>
                <li><x-text.text> - Багажник об’ємом 585 л (до 1710 л) дозволяє вирушати в подорожі без
                        компромісів.</x-text.text></li>
                <li><x-text.text> - Зручність у дрібницях — це Škoda: парасолька в дверях, тримач для окулярів,
                        практичні ніші для гаджетів і речей.</x-text.text>
                </li>
            </ul>

            <x-text.title>Enyaq оснащений системами, що реально допомагають на дорозі: </x-text.title>
            <ul class="mb-8">
                <li><x-text.text> - Travel Assist — утримує смугу, контролює дистанцію й швидкість.</x-text.text></li>
                <li><x-text.text> - розпізнавання дорожніх знаків.</x-text.text></li>
                <li><x-text.text> - декілька подушок безпеки.</x-text.text></li>
                <li><x-text.text> - повний набір електронних асистентів.</x-text.text></li>
            </ul>

            <x-text.title>Ви можете зосередитись на дорозі, решту зробить технологія. </x-text.title>
            <x-text.title>Купити нову Škoda Enyaq в Україні</x-text.title>
            <x-text.text class="mb-8">Вартість Škoda Enyaq — від 1 771 890 грн. Офіційно представлений в Україні
                компанією «Єврокар», цей електрокросовер відкриває нову еру руху без бензину й шуму.</x-text.text>

            <x-text.title>Технічні характеристики:</x-text.title>
            <img src="{{ Storage::url('/images/models/enyaq/enyaq_1.webp') }}" alt="Enyaq sizes" class="my-16"
                loading="lazy" />
            <a href="{{ Storage::url('/images/models/enyaq/Broshura_Enyaq.pdf') }}" target="_blank"
                class="text-skoda-emerald-green cursor-pointer text-2xl underline mb-16">
                Більше про Enyaq
            </a>
        </x-section>
    </div>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Часті запитання</x-text.title>
        <x-accordion :items="[
            [
                'title' => 'Який запас ходу у Enyaq?',
                'content' =>
                    'Enyaq оснащений батареєю ємністю 82 кВт·год, що забезпечує запас ходу до 582 км на одному заряді (за циклом WLTP). Це означає, що ви можете подорожувати з Кременчука до Львова без додаткової підзарядки.',
            ],
            [
                'title' => 'Які комплектації доступні для Škoda Enyaq в Україні?',
                'content' => 'В Україні Enyaq доступний у комплектації Basic (Loft) — це збалансована версія з усім необхідним для комфорту:
                                                                                                                                                                                                                                                                                                                                                                        тризонний клімат-контроль,
                                                                                                                                                                                                                                                                                                                                                                        19-дюймові легкосплавні диски,
                                                                                                                                                                                                                                                                                                                                                                        великий мультимедійний екран,
                                                                                                                                                                                                                                                                                                                                                                        асистенти безпеки та додаткові опції, які можна обрати індивідуально під свої потреби.
                                                                                                                                                                                                                                                                                                                                                                        ',
            ],
            [
                'title' => 'Який привід має Škoda Enyaq?',
                'content' =>
                    'Версія Enyaq 85 має задній привід. Це забезпечує стабільну керованість, плавний розгін і комфортне пересування як у місті, так і на трасі.',
            ],
        ]" />
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
