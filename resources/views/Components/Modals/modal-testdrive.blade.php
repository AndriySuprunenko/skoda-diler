    <div x-show="open" x-cloak x-transition class="relative z-50" aria-labelledby="dialog-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center md:items-end justify-center p-1 md:p-4 text-center sm:items-center">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <button @click="open = false"
                        class="absolute top-4 right-4 text-skoda-emerald-green p-2 cursor-pointer text-2xl font-bold z-50">&times;</button>
                    <div class="flex min-h-full flex-col justify-center px-6 py-8 lg:py-12 lg:px-8">
                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <img class="mx-auto h-7 md:h-10 w-auto"
                                src={{ Storage::url('images/logos/Skoda_Wordmark_RGB_Emerald_Green.svg') }}
                                alt="Your Company">
                            <h2
                                class="mt-5 md:mt-10 text-center text-2xl/9 font-bold tracking-tight text-skoda-emerald-green">
                                Залиште заявку на тест-драйв автомобіля Škoda</h2>
                            </h2>

                        </div>

                        <div class="mt-5 md:mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                            <form class="space-y-3 md:space-y-6" action="#" method="POST">
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
                                        <input type="phone" name="phone" id="phone" autocomplete="phone"
                                            required
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-skoda-emerald-green placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-skoda-emerald-green sm:text-sm/6">
                                    </div>
                                </div>

                                <div class="w-fit mx-auto">
                                    <x-button type='submit'>Відправити</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
