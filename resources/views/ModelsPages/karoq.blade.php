@section('title', 'Karoq')

@php
    $model = \App\Models\Models::where('name', 'Karoq')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Karoq')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Karoq - це компактний кросовер від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords"
        content="Karoq, Škoda, SUV, автомобіль, великий автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Karoq">
    <meta property="og:description"
        content="Karoq - це компактний кросовер від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Karoq",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Karoq - це компактний кросовер від Škoda, який поєднує в собі стиль, комфорт та передові технології."
    }
    </script>
@endsection

<x-layout>
    @include('ModelsPages.information-block', ['model' => $model])
    <x-section>
        <x-Text.title>Опис моделі</x-Text.subtitle>
            <x-Text.text class="mb-6">
                Karoq - це компактний кросовер від Škoda, який поєднує в собі стиль, комфорт та передові технології. Цей
                автомобіль ідеально підходить для міських умов, забезпечуючи високу маневреність та зручність
                використання. Karoq пропонує широкий вибір двигунів, включаючи гібридні варіанти, що забезпечують
                високу ефективність пального та зниження викидів CO2. Інтер'єр автомобіля виконаний з використанням
                високоякісних матеріалів, що створює атмосферу розкоші та комфорту.
            </x-Text.text>
            <x-Text.text>
                Karoq також оснащений найсучаснішими системами безпеки та допомоги водієві, такими як адаптивний
                круїз-контроль,
                система утримання в смузі руху та автоматичне екстрене гальмування. Цей автомобіль забезпечує не лише
                комфорт, але й впевненість на дорозі, роблячи кожну поїздку приємною та безпечною.
            </x-Text.text>
    </x-section>
    {{-- Інші моделі --}}
    @include('ModelsPages.others-models', ['models' => $models])
</x-layout>
