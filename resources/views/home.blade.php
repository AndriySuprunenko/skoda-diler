@section('title', 'Головна')
@section('meta')
    <meta name="description" content="ТОВ Автоцентр-Кременчук-2012">
    <meta name="keywords" content="Škoda, Автоцентр, Автомобілі">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="ТОВ Автоцентр-Кременчук-2012">
    <meta property="og:description" content="ТОВ Автоцентр-Кременчук-2012 Офіційний дилер автомобілів ŠKODA в м. Кременчук">
    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('main.webp') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "ТОВ Автоцентр-Кременчук-2012",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "SUV",
        "description": "ТОВ Автоцентр-Кременчук-2012 Офіційний дилер автомобілів ŠKODA в м. Кременчук",
    }
    </script>
@endsection
<x-layout>
    <x-banner />
    <x-section class=" flex flex-col items-center gap-6">
        <x-text.title>Про нас</x-text.title>
        <div class="flex justify-around items-center gap-6 flex-col md:flex-row">
            <div class="max-w-[900px]">
                <x-text.subtitle class="mb-4">Офіційний дилер автомобілів ŠKODA в м. Кременчук</x-text.subtitle>
                <x-text.text class="mb-4">
                    ТОВ«Автоцентр-Кременчук-2012» є сертифікованим дилерським центром ТОВ «Єврокар». Основними видами
                    діяльності
                    компанії є продаж автомобілів торгової марки Škoda, технічне обслуговування, як в гарантійний, так і
                    в
                    післягарантійний період, страхування, сервісне обслуговування, ремонт, а також продаж запасних
                    частин і
                    додаткового обладнання. Одним з пріоритетів ТОВ«Автоцентр-Кременчук-2012» є задоволеність наших
                    клієнтів
                    -
                    саме тому якість продукції та послуг завжди займали перше місце в цінностях нашої компанії. У своїй
                    роботі
                    наша організація завжди дотримується таких принципів:
                </x-text.text>
                <x-text.text class="mb-4"> - Якість продукції та робіт повинна відповідати всім вимогам законів та
                    нормативних
                    актів,
                    міжнародних стандартів якості і стандартам якості «Škoda Auto»;</x-text.text>
                <x-text.text class="mb-4">
                    - Роботи, пов'язані з обслуговуванням і ремонтом автомобілів, виконуються з дотриманням високих норм
                    якості;</x-text.text>
                <x-text.text class="mb-4">
                    - Кожен співробітник нашої компанії насе відповідальність за виконану ним роботу і прагне до
                    виконання
                    поставлених підприємством планових показників. Відповідає за дбайливе ставлення до майна
                    підприємства і
                    конфіденційність інформації про підприємство;</x-text.text>
                <x-text.text class="mb-4">
                    - Керівництво компанії ініціює і підтримує своїх співробітників в їх професійному зростанні,
                    піклується
                    про
                    сприятливе середовище в компанії, необхідне для результативного виконання поставлених
                    завдань;</x-text.text>
                <x-text.text class="">
                    - Тісна співпраця з компанією ТОВ «Єврокар» дозволяє досягти високих якісних показників в роботі та
                    надає
                    можливості для подальшого зростання і вдосконалення системи контролю якості.</x-text.text>
            </div>
            <div>
                <x-image url='images/about.jpg' ratio='horizontal' />
            </div>
        </div>
    </x-section>
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Наші послуги</x-text.title>
        <ul class="flex flex-wrap w-full justify-center gap-6 md:gap-12 lg:gap-16 mt-6 md:mt-12">
            <li class="w-full max-w-[600px]">
                <x-service-card title="Продаж автомобілів"
                    description="Широкий вибір нових та вживаних автомобілів ŠKODA." />
            </li>
            <li class="w-full max-w-[600px]">
                <x-service-card title="Оригінальні запчастини"
                    description="Продаж оригінальних запчастин та аксесуарів ŠKODA." />
            </li>
            <li class="w-full max-w-[600px]">
                <x-service-card title="Кредитування"
                    description="Консультації з питань фінансування та кредитування автомобілів." link='credit' />
            </li>
            <li class="w-full max-w-[600px]">
                <x-service-card title="Тест-драйв"
                    description="Запишіться на тест-драйв та відчуйте переваги автомобілів ŠKODA." type='test-drive' />
            </li>
            <li class="w-full max-w-[600px]">
                <x-service-card title="Консультації"
                    description="Отримайте професійну консультацію щодо вибору автомобіля." />
            </li>
            <li class="w-full max-w-[600px]">
                <x-service-card title="Trade-in" description="Обміняй старе авто на нову ŠKODA" link='trade-in' />
            </li>
        </ul>
    </x-section>
    <x-section class="bg-skoda-emerald-green text-center">
        <x-text.title color='electric-green'>Наш модельний ряд</x-text.title>
        <x-model />
    </x-section>
    <x-section class="bg-skoda-emerald-green text-center">
        <x-text.title color='electric-green'>Залишились запитання?</x-text.title>
        <x-text.subtitle color='electric-green' class="m-auto">Залиште заявку і ми допоможемо вам!</x-text.subtitle>
        <x-form value="Головна сторінка Потрібна допомога" />
    </x-section>
</x-layout>
