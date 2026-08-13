@props(['value' => 'Сервіс Škoda'])

<div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:w-full sm:max-w-lg border-4 border-skoda-emerald-green">
    <div class="flex flex-col justify-center px-6 py-6 lg:px-8 z-20 relative">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm z-20"> 
            <h2 id="form-title" class="mt-5 text-center text-3xl font-bold tracking-tight text-skoda-emerald-green">
                Залишіть заявку та отримайте консультацію
            </h2>
        </div>
        <div class="mt-5 md:mt-10 sm:mx-auto sm:w-full sm:max-w-sm z-20 relative">
            <form x-ref="form" 
                x-data="{ name: '', phone: '', model: '', errors: {}, isSubmitting: false }"
                @submit.prevent="
                    errors = {};
                    if (!name.trim()) errors.name = 'Це поле є обовʼязковим';
                    if (!phone.trim()) errors.phone = 'Це поле є обовʼязковим';
                    if (Object.keys(errors).length === 0) $el.submit();
                "
                class="space-y-3 md:space-y-6" action="{{ route('send.modal.form') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="{{ $value }}">

                <!-- Імʼя -->
                <div>
                    <label for="name" class="block text-base font-medium"
                        :class="errors.name ? 'text-red-500' : 'text-skoda-emerald-green'">
                        <span x-text="errors.name ? errors.name : 'Імʼя'"></span>
                    </label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name" x-ref="name" x-model="name"
                            autocomplete="name" :disabled="isSubmitting"
                            @input="if (errors.name) delete errors.name"
                            @blur="if (!name.trim()) errors.name = 'Це поле є обовʼязковим'"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6"
                            :class="errors.name ? 'outline-red-500 focus:outline-red-500' : 'outline-skoda-emerald-green focus:outline-skoda-emerald-green'" />
                    </div>
                </div>

                <!-- Телефон -->
                <div class="mt-4">
                    <label for="phone" class="block text-base font-medium"
                        :class="errors.phone ? 'text-red-500' : 'text-skoda-emerald-green'">
                        <span x-text="errors.phone ? errors.phone : 'Номер телефону'"></span>
                    </label>
                    <div class="mt-2 md:mt-2 mb-4">
                        <input type="tel" name="phone" id="phone" x-model="phone"
                            autocomplete="tel" maxlength="17" minlength="10" :disabled="isSubmitting"
                            @input="if (errors.phone) delete errors.phone"
                            @blur="if (!phone.trim()) errors.phone = 'Це поле є обовʼязковим'"
                            @keydown="
                                if (!['Backspace','Delete','ArrowLeft','ArrowRight','Tab','+','(',')','-'].includes($event.key) && !/\d/.test($event.key)) {
                                    $event.preventDefault();
                                }
                            "
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6"
                            :class="errors.phone ? 'outline-red-500 focus:outline-red-500' : 'outline-skoda-emerald-green focus:outline-skoda-emerald-green'"
                            placeholder="+38(XXX)XXX-XX-XX" />
                    </div>
                </div>

                <!-- Модель -->
                <div>
                    <label for="model" class="block text-base font-medium text-skoda-emerald-green">
                        <span>Модель або марка авто</span>
                    </label>
                    <div class="mt-2">
                        <input type="text" name="model" id="model" x-ref="model" x-model="model"
                            :disabled="isSubmitting"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6" />
                    </div>
                </div>
                
                <div class="space-y-2 text-skoda-emerald-green">
                    <p class="text-base">Оберіть месенджер для отримання інформації: </p>
                    <div class="flex flex-wrap gap-2 justify-around">
                        <x-checkbox name="viber" text="Viber" color="text-skoda-emerald-green" />
                        <x-checkbox name="telegram" text="Telegram" color="text-skoda-emerald-green" />
                        <x-checkbox name="whatsapp" text="WhatsApp" color="text-skoda-emerald-green" />
                    </div>
                </div>
                
                <div class="w-fit mx-auto mb-6 md:mb-0">
                    <x-button type="submit">
                        Відправити
                    </x-button>
                </div>
            </form>
        </div>
    </div> 
    
    {{-- Decorative elements --}} 
    <div class="absolute top-0 left-0 w-[700px] h-50 bg-skoda-electric-green rotate-12 transform -translate-x-1 -translate-y-8 z-10 pointer-events-none"></div>
</div>
