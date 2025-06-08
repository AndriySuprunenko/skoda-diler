    <div class="hidden relative z-50" aria-labelledby="dialog-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-skoda-emerald-green text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="flex
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
                                        <input type="phone" name="phone" id="phone" autocomplete="phone"
                                            required
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
        </div>
    </div>
