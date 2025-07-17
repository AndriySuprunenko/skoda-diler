<x-layout>
    <x-banner />
    <x-section class="text-center bg-skoda-electric-green">
        <x-Text.title>Наші послуги</x-Text.title>
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
        <x-Text.title color='electric-green'>Наш модельний ряд</x-Text.title>
        <x-model />
    </x-section>
    <x-section class="flex justify-around items-center gap-6 flex-col md:flex-row">
        <div class="max-w-[900px]">
            <x-Text.title>Про нас</x-Text.title>
            <x-Text.subtitle class="mb-4">Офіційний дилер автомобілів ŠKODA в м. Кременчук</x-Text.subtitle>
            <x-Text.text class="mb-4">
                ТОВ«Автоцентр-Кременчук-2012» є сертифікованим дилерським центром ТОВ «Єврокар». Основними видами
                діяльності
                компанії є продаж автомобілів торгової марки Škoda, технічне обслуговування, як в гарантійний, так і в
                післягарантійний період, страхування, сервісне обслуговування, ремонт, а також продаж запасних частин і
                додаткового обладнання. Одним з пріоритетів ТОВ«Автоцентр-Кременчук-2012» є задоволеність наших клієнтів
                -
                саме тому якість продукції та послуг завжди займали перше місце в цінностях нашої компанії. У своїй
                роботі
                наша організація завжди дотримується таких принципів:
            </x-Text.text>
            <x-Text.text class="mb-4"> - Якість продукції та робіт повинна відповідати всім вимогам законів та
                нормативних
                актів,
                міжнародних стандартів якості і стандартам якості «Škoda Auto»;</x-Text.text>
            <x-Text.text class="mb-4">
                - Роботи, пов'язані з обслуговуванням і ремонтом автомобілів, виконуються з дотриманням високих норм
                якості;</x-Text.text>
            <x-Text.text class="mb-4">
                - Кожен співробітник нашої компанії насе відповідальність за виконану ним роботу і прагне до виконання
                поставлених підприємством планових показників. Відповідає за дбайливе ставлення до майна підприємства і
                конфіденційність інформації про підприємство;</x-Text.text>
            <x-Text.text class="mb-4">
                - Керівництво компанії ініціює і підтримує своїх співробітників в їх професійному зростанні, піклується
                про
                сприятливе середовище в компанії, необхідне для результативного виконання поставлених
                завдань;</x-Text.text>
            <x-Text.text class="">
                - Тісна співпраця з компанією ТОВ «Єврокар» дозволяє досягти високих якісних показників в роботі та
                надає
                можливості для подальшого зростання і вдосконалення системи контролю якості.</x-Text.text>
        </div>
        <div>
            <x-image url='about.jpg' ratio='horizontal' size='900' />
        </div>
    </x-section>
    <x-section class="bg-skoda-emerald-green text-center">
        <x-Text.title color='electric-green'>Не знайшли що шукали?</x-Text.title>
        <x-Text.subtitle color='electric-green' class="m-auto">Залиште заявку і ми допоможемо вам!</x-Text.subtitle>
        <x-form value='Склад' />
    </x-section>
</x-layout>
