@section('title', 'Офіційний дилер Škoda у Кременчуці — Нові автомобілі та з пробігом')
@section('meta')
    <meta name="description"
        content="Купуйте нові автомобілі Škoda в Україні — офіційний автосалон у Кременчуці. Широкий вибір моделей та комплектацій, вигідні акції, кредит та лізинг, обмін за програмою Trade-in.">
    <!-- Open Graph мета-теги -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Офіційний дилер Škoda у Кременчуці — Нові автомобілі та з пробігом">
    <meta property="og:description"
        content="Купуйте нові автомобілі Škoda в Україні — офіційний автосалон у Кременчуці. Широкий вибір моделей та комплектацій, вигідні акції, кредит та лізинг, обмін за програмою Trade-in.">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ url(Storage::url('images/main.webp')) }}">
@endsection
<x-layout>
    <x-banner />
    <x-section class="text-center bg-skoda-electric-green">
        <x-text.title>Наші послуги</x-text.title>
        <ul class="flex flex-wrap w-full justify-center gap-6 md:gap-12 lg:gap-16 mt-6 md:mt-12">
            <li class="w-full max-w-[600px]">
                <x-service-card title="Продаж автомобілів"
                    description="Широкий модельний ряд Škoda та пропозиції авто з пробігом на різний бюджет."
                    link='stock-cars' />
            </li>
            <li class="w-full max-w-[600px]">
                <x-service-card title="Кредитування"
                    description="Отримайте консультацію з питань фінансування для фізичних та юридичних осіб."
                    link='credit' />
            </li>
            <li class="w-full max-w-[600px]">
                <x-service-card title="Тест-драйв"
                    description="Дізнайтесь можливості бажаної моделі в реальних умовах. Запис в один клік!"
                    type='test-drive' />
            </li>
            <li class="w-full max-w-[600px]">
                <x-service-card title="Trade-in"
                    description="Програма обміну вашого автомобіля на нову Škoda з доплатою." link='trade-in' />
            </li>
        </ul>
    </x-section>
    <x-section class="bg-skoda-emerald-green text-center">
        <x-text.title color='electric-green'>Наш модельний ряд</x-text.title>
        <x-model />
    </x-section>
    <x-section class=" flex flex-col items-center gap-6">
        <x-text.main-title>Škoda Автоцентр Кременчук - Офіційний сайт</x-text.main-title>
        <x-text.title>Про нас</x-text.title>
        <div class="flex justify-around items-center gap-6 flex-col lg:flex-row">
            <div class="max-w-[900px]">
                <x-text.subtitle class="mb-4">Офіційний дилер Škoda в Кременчуці –
                    <br />Автоцентр-Кременчук-2012</x-text.subtitle>
                <x-text.text class="mb-4">
                    ТОВ «Автоцентр-Кременчук-2012» — <strong>офіційний сертифікований дилер Škoda в м.
                        Кременчук</strong> та партнер ТОВ
                    «Єврокар». Ми працюємо вже понад 16 років і пропонуємо повний спектр послуг для власників та
                    майбутніх покупців автомобілів <strong>Škoda</strong>.
                </x-text.text>
                <x-text.text class="mb-2">
                    <strong>Наші основні напрями діяльності:</strong>
                </x-text.text>
                <ul class="max-w-[700px] pl-2 mb-4">
                    <li class="mb-2">
                        <x-text.text> - <strong>Продаж нових автомобілів Škoda</strong> – популярні моделі <strong>Škoda
                                Octavia, Kodiaq,
                                Karoq,Superb, Kamiq, Scala, Fabia</strong> завжди у наявності та під
                            замовлення</x-text.text>
                    </li>
                    <li class="mb-2">
                        <x-text.text> - <strong>Офіційний сервіс Škoda у Кременчуці</strong> – популярні моделі
                            сервісне обслуговування в гарантійний та післягарантійний період</x-text.text>
                    </li>
                    <li class="mb-2">
                        <x-text.text> - <strong>Професійний ремонт Škoda, Volkswagen, Audi</strong> із використанням
                            оригінальних деталей з гарантією на запчастини 2 роки</x-text.text>
                    </li>
                    <li class="mb-2">
                        <x-text.text> - <strong>Страхування та кредитування</strong> – вигідні програми придбання авто
                            для фізичних та юридичних осіб</x-text.text>
                    </li>
                    <li class="mb-2">
                        <x-text.text> - <strong>Запасні частини та аксесуари Škoda</strong> - великий вибір оригінальних
                            комплектуючих і додаткового обладнання.</x-text.text>
                    </li>
                </ul>
                <x-text.text class="mb-2">
                    <strong>Чому обирають нас?</strong>
                </x-text.text>
                <ul class="max-w-[700px] pl-2 mb-4">
                    <li class="mb-2">
                        <x-text.text> - <strong>Європейська якість</strong> – усі роботи виконуються відповідно до
                            стандартів <strong>Škoda Auto</strong> та міжнародних норм</x-text.text>
                    </li>
                    <li class="mb-2">
                        <x-text.text> - <strong>Кваліфіковані спеціалісти</strong> – наші майстри проходять регулярне
                            навчання та сертифікацію</x-text.text>
                    </li>
                    <li class="mb-2">
                        <x-text.text> - <strong>Гарантія на роботи та деталі</strong> ми відповідаємо за якість і
                            довговічність кожної послуги</x-text.text>
                    </li>
                    <li class="mb-2">
                        <x-text.text> - <strong>Турбота про клієнта</strong> – для нас головне задоволення і комфорт
                            кожного власника автомобіля <strong>Škoda</strong></x-text.text>
                    </li>
                    <li class="mb-2">
                        <x-text.text> - <strong>Сучасне обладнання</strong> - офіційна сервісна станція укомплектована
                            новітньою технікою для точної діагностики та ремонту.</x-text.text>
                    </li>
                </ul>
                <x-text.text class="mb-4">
                    Ми пишаємося тим, що є надійним партнером для тих, хто хоче <strong>купити Škoda у
                        Кременчуці</strong> чи отримати
                    якісний сервіс для свого авто.
                </x-text.text>
                <x-text.text class="mb-2">
                    <strong>Адреса автосалону Škoda в Кременчуці:</strong>
                </x-text.text>
                <x-text.text>
                    ТОВ «Автоцентр-Кременчук-2012»<br />
                    вулиця Київська, 75, Кременчук, Полтавська область, 39600<br />
                    Офіційний дилер Škoda | Продаж авто та сервіс у Кременчуці
                </x-text.text>
            </div>
            <div>
                <x-image url='images/about.webp' ratio='horizontal' />
            </div>
        </div>
    </x-section>
    <x-section class="bg-skoda-emerald-green text-center">
        <x-text.title color='electric-green'>Залишились запитання?</x-text.title>
        <x-text.subtitle color='electric-green' class="m-auto">Залиште заявку і ми допоможемо вам!</x-text.subtitle>
        <x-form value="Головна сторінка Потрібна допомога" />
    </x-section>
</x-layout>
