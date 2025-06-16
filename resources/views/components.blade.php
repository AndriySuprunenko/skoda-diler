<x-layout>
    <x-banner />
    <x-section>
        <div class="py-11">
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
        <div class="flex justify-around mt-8 py-11">
            <x-Buttons.button-electric>Button Electric</x-Buttons.button-electric>
            <x-Buttons.button-emerald-electric>Button Emerald-Electric</x-Buttons.button-emerald-electric>
            <x-Buttons.button-emerald-white>Button Emerald-White</x-Buttons.button-emerald-white>
        </div>

        <x-Text.title>Модальні вікна</x-Text.title>
    </x-section>
    {{-- Modals
    <div class="flex justify-between items-center mt-8 bg-skoda-chrome-400 transition-opacity p-4">
        <div class="flex h-full w-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <img class="mx-auto h-10 w-auto"
                            src={{ Vite::asset('resources/assets/images/logos/Skoda_Wordmark_RGB_Emerald_Green.svg') }}
                            alt="Your Company">
                        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-skoda-emerald-green">
                            Залиште заявку на тест-драйв
                        </h2>

                    </div>

                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form class="space-y-6" action="#" method="POST">
                            <div>
                                <label for="name"
                                    class="block text-base font-medium text-skoda-emerald-green">Імʼя</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="name" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-skoda-emerald-green placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-skoda-emerald-green sm:text-sm/6">
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="phone"
                                        class="block text-base font-medium text-skoda-emerald-green">Номер
                                        телефону</label>
                                </div>
                                <div class="mt-2">
                                    <input type="phone" name="phone" id="phone" autocomplete="phone" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-skoda-emerald-green placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-skoda-emerald-green sm:text-sm/6">
                                </div>
                            </div>

                            <div class="w-fit mx-auto">
                                <x-Buttons.button-emerald-white
                                    type='submit'>Відправити</x-Buttons.button-emerald-white>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex h-full w-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-skoda-emerald-green text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div
                    class="flex
                                    min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm z-20">
                        <img class="mx-auto h-10 w-auto"
                            src={{ Vite::asset('resources/assets/images/logos/Skoda_Wordmark_RGB_Electric_Green.svg') }}
                            alt="Your Company">
                        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-skoda-electric-green">
                            Заповніть поля та отримуйте прайс-лист на автомобіль</h2>
                        </h2>

                    </div>

                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form class="space-y-6" action="#" method="POST">
                            <div>
                                <label for="name"
                                    class="block text-base font-medium text-skoda-electric-green">Імʼя</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="name" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-skoda-emerald-green placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-skoda-electric-green sm:text-sm/6">
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="phone"
                                        class="block text-base font-medium text-skoda-electric-green">Номер
                                        телефону</label>
                                </div>
                                <div class="mt-2">
                                    <input type="phone" name="phone" id="phone" autocomplete="phone" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-skoda-emerald-green placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-skoda-electric-green sm:text-sm/6">
                                </div>
                            </div>

                            <div class="w-fit mx-auto">
                                <x-button type='submit'>Відправити</x-button>
                            </div>
                        </form>
                    </div>
                </div>
                <div
                    class="absolute top-0 left-0 w-[500px] h-20 bg-skoda-electric-green rotate-12 translate-x-7 -translate-y-12 z-10">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-[500px] h-20 bg-skoda-electric-green -rotate-12 translate-x-4 translate-y-12 z-10">
                </div>
            </div>
        </div>

        <div class="flex full w-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div
                    class="flex
                                        min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm z-20">
                        <img class="mx-auto h-10 w-auto"
                            src={{ Vite::asset('resources/assets/images/logos/Skoda_Wordmark_RGB_Emerald_Green.svg') }}
                            alt="Your Company">
                        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-skoda-emerald-green">
                            Залиште заявку та отримайте консультацію
                        </h2>

                    </div>

                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form class="space-y-6" action="#" method="POST">
                            <div>
                                <label for="name"
                                    class="block text-base font-medium text-skoda-emerald-green">Імʼя</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="name" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-skoda-emerald-green placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-skoda-emerald-green sm:text-sm/6">
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="phone"
                                        class="block text-base font-medium text-skoda-emerald-green">Номер
                                        телефону</label>
                                </div>
                                <div class="mt-2">
                                    <input type="phone" name="phone" id="phone" autocomplete="phone" required
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-skoda-emerald-green placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-skoda-emerald-green sm:text-sm/6">
                                </div>
                            </div>

                            <div class="w-fit mx-auto">
                                <x-Buttons.button-emerald-electric
                                    type='submit'>Відправити</x-Buttons.button-emerald-electric>
                            </div>
                        </form>
                    </div>
                </div>
                <div
                    class="absolute top-0 left-0 w-[700px] h-50 bg-skoda-electric-green rotate-12 transform -translate-x-1 -translate-y-8 z-10">
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Models --}}
    <div class="flex justify-around">
        <x-Models.model />
    </div>
</x-layout>
