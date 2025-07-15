@section('title', 'Scala')

@php
    $model = \App\Models\Models::where('name', 'Scala')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Scala')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Scala - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords"
        content="Scala, Škoda, компактний автомобіль, стильний автомобіль, комфорт, технології, сімейний автомобіль">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Scala">
    <meta property="og:description"
        content="Scala - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Scala",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Scala - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології."
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    <x-section>
        <x-Text.title>Опис моделі</x-Text.subtitle>
            <x-Text.text class="mb-6">
                Scala - це компактний автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.
                Цей
                автомобіль ідеально підходить для міських умов, забезпечуючи високу маневреність та зручність
                використання.
                Scala пропонує широкий вибір двигунів, включаючи гібридні варіанти, що забезпечують високу ефективність
                пального та зниження викидів CO2. Інтер'єр автомобіля виконаний з використанням високоякісних
                матеріалів,
                що створює атмосферу розкоші та комфорту.
            </x-Text.text>
            <x-Text.text>
                Scala також оснащений найсучаснішими системами безпеки та допомоги водієві, такими як адаптивний
                круїз-контроль, система утримання в смузі руху та автоматичне екстрене гальмування. Цей
                автомобіль забезпечує не лише комфорт, але й впевненість на дорозі, роблячи кожну поїздку приємною та
                безпечною.
            </x-Text.text>
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
