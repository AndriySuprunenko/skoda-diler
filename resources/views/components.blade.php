<x-layout>
    <x-banner />
    <x-section>
        <div class="py-6 md:py-11">
            <x-Text.title>Про компанію</x-Text.title>
            <x-Text.subtitle>Офіційний дилер ŠKODA​ в Полтавській області</x-Text.subtitle>
            <x-Text.text>
                ТОВ «Автоцентр-Кременчук-2012» провідний сертифікований дилер. Вже більше 15 років ми представляємо
                інтереси
                SKODA в Кременчуці і займаємо вищу ланку серед інших автомобільних центрів. Працівники мають високий
                кваліфікаційний рівень, відповідно до високих норм міжнародного стандарту, завдяки якому до Автоцентра
                звертаються тисячі клієнтів, які завжди задоволені виконаною роботою.
            </x-Text.text>
            <x-Text.text>
                Автоцентр надає широкий спектр послуг, які включають в себе продаж автомобілів, сервісне обслуговування,
                ремонт та діагностику автомобілів, а також продаж оригінальних запчастин і аксесуарів. Ми прагнемо
                забезпечити найвищий рівень обслуговування клієнтів і гарантуємо якість наших послуг.
            </x-Text.text>
            <x-Text.text>
                Ми пропонуємо широкий вибір автомобілів SKODA, включаючи нові моделі та автомобілі з пробігом. Наші
                консультанти завжди готові допомогти вам вибрати автомобіль, який найкраще відповідає вашим потребам і
                бюджету.
            </x-Text.text>
        </div>

        <x-Text.title>Кнопки</x-Text.title>
        <div
            class="w-full flex justify-around py-6 md:py-11 md:flex-row flex-col gap-4 max-w-[300px] m-auto md:max-w-[800px]">
            <x-Buttons.button-electric>Button Electric</x-Buttons.button-electric>
            <x-Buttons.button-emerald-electric>Button Emerald-Electric</x-Buttons.button-emerald-electric>
            <x-Buttons.button-emerald-white>Button Emerald-White</x-Buttons.button-emerald-white>
        </div>

        <x-Text.title>Модальні вікна</x-Text.title>
    </x-section>
    <x-modals />
    {{-- Models --}}
    <div class="flex justify-around">
        <x-Models.model />
    </div>
</x-layout>
