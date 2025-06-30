@section('title', 'Octavia A8')

@php
    $model = \App\Models\Models::where('name', 'Octavia A8')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Octavia A8')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Octavia A8 - це новий рівень комфорту та технологій у класі компактних автомобілів.">
    <meta name="keywords" content="Škoda Octavia A8, компактний автомобіль, нові технології, комфорт, Škoda Кременчук">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Octavia A8">
    <meta property="og:description"
        content="Škoda Octavia A8 - це новий рівень комфорту та технологій у класі компактних автомобілів.">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Škoda Octavia A8",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "Škoda Octavia A8 - це новий рівень комфорту та технологій у класі компактних автомобілів.",
    }
    </script>
@endsection

<x-layout>
    @include('ModelsPages.information-block', ['model' => $model])
    <x-section>
        <x-Text.title>Опис моделі</x-Text.subtitle>
            <x-Text.text class="mb-6">
                Octavia A8 - це новий рівень комфорту та технологій у класі компактних автомобілів. Цей автомобіль
                поєднує в собі елегантний дизайн, просторий інтер'єр та передові технології, що робить його
                ідеальним вибором
                для щоденних поїздок та подорожей. Octavia A8 пропонує широкий вибір двигунів, включаючи
                гібридні
                варіанти, що забезпечують високу ефективність пального та зниження викидів CO2. Інтер'єр
                автомобіля
                виконаний з використанням високоякісних матеріалів, що створює атмосферу розкоші та
                комфорту.
            </x-Text.text>
            <x-Text.text>
                Octavia A8 також оснащена найсучаснішими системами безпеки та допомоги водієві, такими як адаптивний
                круїз-контроль, система утримання в смузі руху та автоматичне екстрене гальмування. Цей автомобіль
                забезпечує не лише комфорт, але й впевненість на дорозі, роблячи кожну поїздку приємною та
                безпечною.
            </x-Text.text>
    </x-section>
    {{-- Інші моделі --}}
    @include('ModelsPages.others-models', ['models' => $models])
</x-layout>
