@section('title', 'Škoda Karoq – надійний кросовер, купити у Кременчуці')

@php
    $model = \App\Models\Models::where('url', 'karoq')->with('images')->first();
    $models = \App\Models\Models::where('url', '!=', 'karoq')->with('images')->get();

    if (!$model) {
        abort(404, 'Модель не знайдена');
    }
    $primaryImage = $model->images->first();
@endphp

@section('meta')
    <meta name="description"
        content="Škoda Karoq – сучасний кросовер з комфортною підвіскою та продуманим інтер’єром. Офіційний дилер Škoda у Кременчуці пропонує різні комплектації Karoq за вигідними цінами та спеціальні пропозиції.">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Škoda Karoq – надійний кросовер, купити у Кременчуці">
    <meta property="og:description"
        content="Škoda Karoq – сучасний кросовер з комфортною підвіскою та продуманим інтер’єром. Офіційний дилер Škoda у Кременчуці пропонує різні комплектації Karoq за вигідними цінами та спеціальні пропозиції.">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ Storage::url($primaryImage->image) }}">
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col">
            <x-text.title>Škoda Karoq — універсальний кросовер для міста та подорожей</x-text.title>
            <x-text.text class="mb-12 mt-2"><strong>Будь-яка поїздка може стати початком важливих моментів</strong>.
                З новим <strong>Škoda Karoq</strong> ви отримуєте практичність, стиль і технології, які роблять кожну
                дорогу комфортною
                та безпечною.</x-text.text>

            <x-text.title>Дизайн, який привертає увагу</x-text.title>
            <ul class="mb-12 mt-2">
                <li> <x-text.text> - Виразна решітка радіатора.</x-text.text>
                </li>
                <li> <x-text.text> - Світлодіодна оптика.</x-text.text>
                </li>
                <li> <x-text.text> - Ефектні легкосплавні диски.</x-text.text></li>
                <x-text.text class="mt-2"> Компактні пропорції роблять Karoq ідеальним для міста, але він виглядає
                    по-справжньому
                    солідно
                    і на трасі, і на заміських дорогах.</x-text.text>
            </ul>

            <x-text.title>Салон і технології</x-text.title>
            <ul class="mb-16 mt-2">
                <li><x-text.text> - Просторий салон з фірмовими елементами Simply Clever.</x-text.text>
                </li>
                <li><x-text.text> - Сучасна мультимедіа з інтеграцією смартфона.</x-text.text></li>
                <li><x-text.text> - Асистенти водія для щоденного комфорту та безпеки.</x-text.text>
                </li>
                <li><x-text.text> - Опційний повний привід (4x4) для любителів пригод.</x-text.text></li>
            </ul>

            <x-text.title>Технічні характеристики:</x-text.title>
            <img src="{{ Storage::url('/images/models/karoq/karoq_1.webp') }}" alt="Karoq sizes" class="my-16"
                loading="lazy" />
            <a href="{{ Storage::url('/images/models/karoq/Broshura_Karoq.pdf') }}" target="_blank"
                class="text-skoda-emerald-green cursor-pointer text-2xl underline mb-16">
                Більше про Karoq
            </a>

            <x-video url="https://www.youtube.com/watch?v=T9u8x53r6DI" />
        </x-section>
    </div>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Часті запитання</x-text.title>
        <x-accordion :items="[
            [
                'title' => 'Чи є повний привід у Karoq?',
                'content' => 'Так, доступна опція 4x4.',
            ],
            [
                'title' => 'Яка витрата пального у Karoq?',
                'content' => 'В середньому від 6,2 л/100 км (залежить від двигуна).',
            ],
            [
                'title' => 'Які комплектації доступні?',
                'content' => 'Sportline та Selection.',
            ],
        ]" />
    </x-section>
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
