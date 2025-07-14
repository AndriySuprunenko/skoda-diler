<x-layout>
    <x-banner />
    <x-section class="text-center">
        <x-Text.title>Про нас</x-Text.title>
        <x-Text.subtitle>Офіційний дилер автомобілів ŠKODA в м. Кременчук</x-Text.subtitle>
        <x-Text.text class="m-auto">
            Ми є офіційним дилером автомобілів ŠKODA в м. Кременчук, що надає широкий спектр послуг, включаючи продаж
            нових
            та вживаних автомобілів, сервісне обслуговування, ремонт та продаж оригінальних запчастин. Наша мета -
            забезпечити найвищу якість обслуговування та задоволення потреб наших клієнтів. Ми прагнемо стати вашим
            надійним партнером у світі автомобілів ŠKODA, пропонуючи
            професійний підхід, індивідуальний сервіс та конкурентні ціни.
        </x-Text.text>
    </x-section>
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
    <x-model />
</x-layout>
