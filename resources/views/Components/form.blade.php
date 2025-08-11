@props(['value'])

<div class="mt-5 md:mt-10 bg-skoda-emerald-green p-6 text-start max-w-[900px] mx-auto">
    <form x-data="{ name: '', phone: '', errors: {}, isSubmitting: false, phoneStarted: false, phoneValid(phone) { return /^[\+]?[0-9\s\-\(\)]{10,20}$/.test(phone.replace(/\s/g, '')); } }" x-ref="form" x-init="$watch('open', value => { if (value) $nextTick(() => $refs.name.focus()) })" @keydown.escape.window="open = false"
        @submit.prevent="
                                if (isSubmitting) return;
                                errors = {};
                                if (!name?.trim()) errors.name = true;
                                if (!phone?.trim()) errors.phone = true;
                                else if (!phoneValid(phone)) errors.phone = 'Невірний формат номера';
                                if (Object.keys(errors).length === 0) {
                                    isSubmitting = true;

                                    const formData = new FormData($refs.form);
                                    fetch($refs.form.action, {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': formData.get('_token')
                                        }
                                    })
                                    .then(() => {
                                        window.location.href = '/thank-you';
                                    })
                                    .catch(() => isSubmitting = false);
                                }
                            "
        class="space-y-3 md:space-y-6 flex flex-col" action="{{ route('send.modal.form') }}" method="POST">
        @csrf <input type="hidden" name="type" value="{{ $value }}">

        <div class="flex flex-col md:flex-row w-full gap-4 items-center">
            <div class="w-full">
                <label for="name" class="block text-base font-medium"
                    :class="errors.name ? 'text-red-500' : 'text-skoda-electric-green'"> <span
                        x-text="errors.name ? 'Це поле є обовʼязковим' : 'Імʼя'"></span> </label>
                <div> <input type="text" name="name" id="name" x-ref="name" x-model="name"
                        autocomplete="name" :disabled="isSubmitting" @input="if (errors.name) delete errors.name"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6 disabled:opacity-50"
                        :class="errors.name ? 'outline-red-500 focus:outline-red-500' :
                            'outline-skoda-electric-green'" />
                </div>
            </div>
            <div class="w-full">
                <label for="phone" class="block text-base font-medium"
                    :class="errors.phone ? 'text-red-500' : 'text-skoda-electric-green'"> <span
                        x-text="errors.phone === true ? 'Це поле є обовʼязковим' : (errors.phone ? errors.phone : 'Номер телефону')"></span>
                </label>
                <div>
                    <input type="tel" name="phone" id="phone" x-model="phone" autocomplete="tel"
                        :disabled="isSubmitting"
                        @keydown="
        // Дозволяємо лише цифри, керуючі клавіші та навігацію
        if (!['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'].includes($event.key) && !/\d/.test($event.key)) {
            $event.preventDefault();
        }
        // Забороняємо стирати префікс +38(
        if ($event.key === 'Backspace' && phone.length <= 4) {
            $event.preventDefault();
        }
    "
                        @paste.prevent="
        let pasted = ($event.clipboardData || window.clipboardData).getData('text') || '';
        let digits = pasted.replace(/\D/g, '');

        // При вставці з +380 видаляємо зайвий 0 після коду
        if (digits.startsWith('380')) {
            digits = digits.slice(2); // прибираємо '38', далі працюємо з оператором
        }

        // Максимум 10 цифр
        digits = digits.slice(0, 10);

        let p1 = digits.slice(0, 3); // оператор
        let p2 = digits.slice(3, 6);
        let p3 = digits.slice(6, 8);
        let p4 = digits.slice(8, 10);

        phone = '+38'
            + (p1 ? '(' + p1 : '')
            + (p1.length === 3 ? ')' : '')
            + (p2 ? p2 : '')
            + (p3 ? '-' + p3 : '')
            + (p4 ? '-' + p4 : '');

        if (errors.phone) delete errors.phone;
    "
                        @input="
        let digits = phone.replace(/\D/g, '');

        // При випадковому наборі +380 видаляємо 0 після 38
        if (digits.startsWith('380')) {
            digits = digits.slice(2);
        }

        // Максимум 10 цифр
        digits = digits.slice(0, 10);

        let p1 = digits.slice(0, 3);
        let p2 = digits.slice(3, 6);
        let p3 = digits.slice(6, 8);
        let p4 = digits.slice(8, 10);

        phone = '+38'
            + (p1 ? '(' + p1 : '')
            + (p1.length === 3 ? ')' : '')
            + (p2 ? p2 : '')
            + (p3 ? '-' + p3 : '')
            + (p4 ? '-' + p4 : '');

        if (errors.phone) delete errors.phone;
    "
                        x-init="phone = '+38('"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6 disabled:opacity-50"
                        :class="errors.phone ? 'outline-red-500 focus:outline-red-500' : 'outline-skoda-electric-green'" />
                </div>
            </div>
            <div class="w-fit mt-5 hidden md:block">
                <x-button type="submit">
                    <span x-show="!isSubmitting">Відправити</span>
                    <span x-show="isSubmitting">Відправляю...</span>
                </x-button>
            </div>
        </div>

        <div class="flex gap-8 items-start md:items-center flex-col md:flex-row mt-6 md:mt-0">
            <x-checkbox name="no_call" text="Не телефонуйте мені" color="text-skoda-electric-green" />
            <div class="space-y-2 text-skoda-electric-green flex flex-col md:flex-row gap-8">
                <p class="text-base">Оберіть зручний спосіб звʼязку:</p>
                <div class="flex flex-col md:flex-row gap-4 justify-start">
                    <x-checkbox name="viber" text="Viber" color="text-skoda-electric-green" />
                    <x-checkbox name="telegram" text="Telegram" color="text-skoda-electric-green" />
                    <x-checkbox name="whatsapp" text="WhatsApp" color="text-skoda-electric-green" />
                </div>
            </div>
        </div>
        <div class="w-fit mt-5 m-auto md:hidden block">
            <x-button type="submit">
                <span x-show="!isSubmitting">Відправити</span>
                <span x-show="isSubmitting">Відправляю...</span>
            </x-button>
        </div>
    </form>
</div>
