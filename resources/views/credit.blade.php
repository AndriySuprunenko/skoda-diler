@section('title', 'Kредит/Лізинг')

@section('meta')
    <meta name="description"
        content="Оформлення кредиту або лізингу на автомобіль Škoda в Кременчуці. Вигідні умови та швидке оформлення.">
    <meta name="keywords" content="кредит, лізинг, Škoda, Кременчук, автомобіль, фінансування">

    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="Kредит/Лізинг на автомобілі Škoda">
    <meta property="og:description"
        content="Оформлення кредиту або лізингу на автомобіль Škoda в Кременчуці. Вигідні умови та швидке оформлення.">
    <meta property="og:type" content="financial.product">
    <meta property="og:site_name" content="Škoda Кременчук">
    <meta property="og:image" content="{{ Storage::url('images/kredit/kredit.jpg') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "Kредит/Лізинг",
        "brand": {
            "@type": "Brand",
            "name": "Škoda"
        },
        "category": "FinancialProduct",
        "description": "Оформлення кредиту або лізингу на автомобіль Škoda в Кременчуці. Вигідні умови та швидке оформлення.",
    }
    </script>
@endsection

<x-layout>
    <div>
        <img src="{{ Storage::url('images/kredit/kredit.jpg') }}" alt="Зображення кредитної програми Škoda"
            class="w-full h-auto" />
    </div>
    <div class="text-center my-4 md:my-8">
        <x-text.title>Основні переваги кредитної програми Škoda</x-text.title>
    </div>
    <div class="max-w-4xl mx-auto">
        <x-section>
            <x-text.subtitle>Для фізичних осіб: </x-text.subtitle>
            <x-text.text class="mb-4">Економія на щомісячних платежах - програма «Акція Škoda»:</x-text.text>
            <x-text.text class="mb-2"> - Мінімальна відсоткова ставка: </x-text.text>
            <x-text.text>
                по кредиту на один рік з авансом від 20%,
            </x-text.text>
            <x-text.text> по кредиту на два роки з авансом від 50%,</x-text.text>
            <x-text.text> по кредиту на три роки з авансом від 60%,</x-text.text>
            <x-text.text class="mb-4"> по кредиту на сім років з авансом від 70%</x-text.text>
            <x-text.text class="mb-4"> - Строк кредитування від 1 до 7 років</x-text.text>
            <x-text.text class="mb-4"> Можливість вигідно придбати автомобіль у кредит – програма «З пільговим
                періодом»</x-text.text>
            <x-text.text> - Пільговий період з мінімальною відсотковою ставкою у перші два або три роки</x-text.text>
            <x-text.text class="mb-4"> - Загальний строк кредитування – 5 років</x-text.text>
            <x-text.text> Для обох програм також вірно: </x-text.text>
            <x-text.text> - Мінімальний авансовий платіж 20% </x-text.text>
            <x-text.text> - Можливість включити в тіло кредиту разову комісію або платіж КАСКО на перший рік
            </x-text.text>
            <x-text.text> - Відсутня щомісячна комісія</x-text.text>
            <x-text.text> - Відсутнє страхування життя</x-text.text>
            <x-text.text> - Відсутні штрафні санкції за дострокове погашення кредиту</x-text.text>
        </x-section>
        <x-section>
            <x-text.subtitle>Для юридичних осіб: </x-text.subtitle>
            <x-text.text class="mb-4">Економія на щомісячних платежах - програма «Акція Škoda»:</x-text.text>
            <x-text.text class="mb-2"> - Мінімальна відсоткова ставка: </x-text.text>
            <x-text.text>
                по кредиту на один рік з авансом від 30%,
            </x-text.text>
            <x-text.text> по кредиту на два роки з авансом від 60%,</x-text.text>
            <x-text.text> по кредиту на три роки з авансом від 70%,</x-text.text>
            <x-text.text> - Строк кредитування від 1 до 7 років</x-text.text>
            <x-text.text> - Мінімальний авансовий платіж - 20%</x-text.text>
            <x-text.text> - Відсутня щомісячна комісія</x-text.text>
            <x-text.text class="mb-4"> - Відсутні штрафні санкції за дострокове погашення кредиту</x-text.text>
        </x-section>
    </div>
    <div class="bg-skoda-electric-green">
        <div class="max-w-3xl mx-auto text-center">
            <x-section>
                <x-text.title class="mb-4">Кредитний калькулятор</x-text.title>
                <x-text.text class="mb-4">Ви можете скористатися нашим кредитним калькулятором, щоб розрахувати
                    приблизні щомісячні платежі за кредитом на автомобіль Škoda.</x-text.text>
                <x-calculator />
            </x-section>
        </div>
    </div>
    <div class="bg-skoda-emerald-green text-center">
        <x-section>
            <x-text.title color='electric-green'>Хочеш точний прорахунок?</x-text.title>
            <x-text.text color='electric-green' class="m-auto">Заповніть форму нижче, і наш менеджер
                зв'яжеться з
                вами для точного прорахунку з найвигіднішими для вас умовами</x-text.text>
            <x-form value='Кредит' />
        </x-section>
    </div>
</x-layout>
