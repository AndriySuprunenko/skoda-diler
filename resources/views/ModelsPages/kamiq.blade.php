@section('title', 'Kamiq FL')

@php
    $model = \App\Models\Models::where('name', 'Kamiq FL')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Kamiq FL')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Kamiq FL - це компактний кросовер, який поєднує в собі стиль, комфорт та передові технології.">
    <meta name="keywords" content="Škoda Kamiq FL, компактний кросовер, нові технології, комфорт, Škoda Кременчук">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Kamiq FL">
    <meta property="og:description"
        content="Škoda Kamiq FL - це компактний кросовер, який поєднує в собі стиль, комфорт та передові технології.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Kamiq FL",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Škoda Kamiq FL - це компактний кросовер, який поєднує в собі стиль, комфорт та передові технології.",
    }
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    <x-section>
        <x-Text.title>Опис моделі</x-Text.title>
        <x-Text.text class="py-6">
            Kamiq FL - це компактний кросовер, який поєднує в собі стиль, комфорт та передові технології. Цей
            автомобіль ідеально підходить для міських умов, забезпечуючи високу маневреність та зручність
            використання. Kamiq FL пропонує широкий вибір двигунів, включаючи гібридні варіанти, що
            забезпечують високу ефективність пального та зниження викидів CO2. Інтер'єр автомобіля
            виконаний з використанням високоякісних матеріалів, що створює атмосферу розкоші та
            комфорту.
        </x-Text.text>
        <x-Text.text>
            Kamiq FL також оснащений найсучаснішими системами безпеки та допомоги водієві, такими як адаптивний
            круїз-контроль, система утримання в смузі руху та автоматичне екстрене гальмування. Цей автомобіль
            забезпечує не лише комфорт, але й впевненість на дорозі, роблячи кожну поїздку приємною та
            безпечною.
        </x-Text.text>
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
