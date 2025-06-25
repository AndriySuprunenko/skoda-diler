    <div x-show="open" x-cloak x-transition class="relative z-50" aria-labelledby="dialog-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center md:items-end justify-center p-1 md:p-4 text-center sm:items-center">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-skoda-emerald-green text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <button @click="open = false"
                        class="absolute top-0 md:top-4 right-4 text-skoda-emerald-green p-2 cursor-pointer text-2xl font-bold z-50">&times;</button>
                    <div
                        class="flex
                        min-h-full flex-col justify-center px-6 py-8 md:py-12 lg:px-8">
                        <div class="sm:mx-auto sm:w-full sm:max-w-sm z-20">
                            <img class="mx-auto h-7 md:h-10 w-auto"
                                src={{ Storage::url('images/logos/Skoda_Wordmark_RGB_Electric_Green.svg') }}
                                alt="Skoda Logo">
                            <h2
                                class="mt-5 md:mt-10 text-center text-2xl/9 font-bold tracking-tight text-skoda-electric-green">
                                Заповніть поля та отримуйте прайс-лист на автомобіль</h2>
                            </h2>

                        </div>

                        <div class="mt-5 md:mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                            <form x-data="{ name: '', phone: '', errors: {} }" x-ref="form" x-init="$watch('open', value => { if (value) $nextTick(() => $refs.name.focus()) })"
                                @keydown.escape.window="open = false"
                                @submit.prevent="errors = {}; if (!name) errors.name = true; if (!phone) errors.phone = true; if (Object.keys(errors).length === 0) $refs.form.submit()"
                                class="space-y-3 md:space-y-6" action="#" method="POST">
                                <div>
                                    <label for="name" class="block text-base font-medium"
                                        :class="errors.name ? 'text-red-500' : 'text-skoda-electric-green'">
                                        <span x-text="errors.name ? 'Це поле є обовʼязковим' : 'Імʼя'"></span>
                                    </label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" x-ref="name"
                                            x-model="name" autocomplete="name"
                                            @input="if (errors.name) delete errors.name"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6"
                                            :class="errors.name ? 'outline-red-500 focus:outline-red-500' :
                                                'outline-skoda-emerald-green focus:outline-skoda-electric-green'" />
                                    </div>
                                </div>

                                <div>
                                    <label for="phone" class="block text-base font-medium"
                                        :class="errors.phone ? 'text-red-500' : 'text-skoda-electric-green'">
                                        <span
                                            x-text="errors.phone ? 'Це поле є обовʼязковим' : 'Номер телефону'"></span>
                                    </label>
                                    <div class="mt-0 md:mt-2">
                                        <input type="text" name="phone" id="phone" x-model="phone"
                                            autocomplete="phone" @input="if (errors.phone) delete errors.phone"
                                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6"
                                            :class="errors.phone ? 'outline-red-500 focus:outline-red-500' :
                                                'outline-skoda-emerald-green focus:outline-skoda-electric-green'" />
                                    </div>
                                </div>

                                <div class="w-fit mx-auto z-50 mb-5 md:mb-0">
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
