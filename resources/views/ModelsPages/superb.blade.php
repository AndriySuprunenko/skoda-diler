@section('title', 'Superb')

@php
    $model = \App\Models\Models::where('name', 'Superb')->with('images')->first();
    $models = \App\Models\Models::where('name', '!=', 'Superb')->with('images')->get();

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
    @include('ModelsPages.information-block', ['model' => $model])
    <x-section>
        <x-Text.title>Опис моделі</x-Text.subtitle>
            <x-Text.text class="mb-6">
                Superb - це великий автомобіль від Škoda, який поєднує в собі стиль, комфорт та передові технології.
                Цей автомобіль ідеально підходить для сімейних подорожей та ділових поїздок, забезпечуючи просторий
                інтер'єр та високий рівень комфорту для всіх пасажирів. Superb пропонує широкий вибір двигунів,
                включаючи
                гібридні варіанти, що забезпечують високу ефективність пального та зниження викидів CO2.
            </x-Text.text>
            <x-Text.text>
                Інтер'єр автомобіля виконаний з використанням високоякісних матеріалів, що створює атмосферу розкоші та
                комфорту. Superb також оснащений найсучаснішими системами безпеки та допомоги водієві, такими як
                адаптивний круїз-контроль, система утримання в смузі руху та автоматичне екстрене гальмування. Цей
                автомобіль забезпечує не лише комфорт, але й впевненість на дорозі, роблячи кожну поїздку приємною та
                безпечною.
            </x-Text.text>
    </x-section>
    {{-- Інші моделі --}}
    @include('ModelsPages.others-models', ['models' => $models])
</x-layout>
