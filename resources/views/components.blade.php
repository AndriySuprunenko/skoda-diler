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

        <x-Text.title>Кнопки та Модалки</x-Text.title>
        <div
            class="w-full flex justify-around py-6 md:py-11 md:flex-row flex-col gap-4 max-w-[300px] m-auto md:max-w-[800px]">
            <div x-data="{ open: false }">
                <x-buttons.button-electric click="open = true">Button Electric</x-buttons.button-electric>
                <x-Modals.modal-price />
            </div>
            <div x-data="{ open: false }">
                <x-buttons.button-emerald-electric click="open = true">Button
                    Emerald-Electric</x-buttons.button-emerald-electric>
                <x-Modals.modal-contacts />
            </div>
            <div x-data="{ open: false }">
                <x-buttons.button-emerald-white click="open = true">Button
                    Emerald-White</x-buttons.button-emerald-white>
                <x-Modals.modal-testdrive />
            </div>
        </div>
    </x-section>
    <x-modals />
    {{-- Models --}}
    <x-Models.model />
    {{-- Image Block --}}
    <div class="p-6 md:p-11 text-center">
        <x-Text.title>Галерея</x-Text.title>
        <x-Text.subtitle>Відображення зображень</x-Text.subtitle>
    </div>
    <div class="flex justify-center items-center p-6 md:p-11 flex-col md:flex-row gap-4 md:gap-11">
        <x-Images.image url="01JX661VXFVW2YNVHDJM3H5N5Y.jpg" />
        <x-Images.image url="01JX661VXFVW2YNVHDJM3H5N5Y.jpg" ratio='vertical' />
        <x-Images.image url="01JX661VXFVW2YNVHDJM3H5N5Y.jpg" ratio='horizontal' />
    </div>
    <div class="p-6 md:p-11 text-center">
        <x-Text.title>Галерея з декораціями</x-Text.title>
    </div>
    <div class="flex justify-center items-center p-6 md:p-11 flex-col md:flex-row gap-4 md:gap-11">
        <x-Images.image url="01JX661VXFVW2YNVHDJM3H5N5Y.jpg" decor='bottom-right' />
        <x-Images.image url="01JX661VXFVW2YNVHDJM3H5N5Y.jpg" ratio='vertical' decor='bottom-left' />
        <x-Images.image url="01JX661VXFVW2YNVHDJM3H5N5Y.jpg" ratio='horizontal' decor='double' />
    </div>
</x-layout>
