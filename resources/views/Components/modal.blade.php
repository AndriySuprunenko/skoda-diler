<div x-data="{ open: false, value: '', phone: '', phoneStarted: false, isSubmitting: false, errors: {}, priceUrl: '', phoneValid(phone) { return /^[\+]?[0-9\s\-\(\)]{10,20}$/.test(phone.replace(/\s/g, '')); } }"
    @open-modal.window="if ($event.detail?.type === '{{ $type }}') { open = true; value = $event.detail?.value || ''; priceUrl = $event.detail?.price || ''; }"
    @close-modal.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500/75"
    role="dialog" aria-modal="true" aria-labelledby="modal-title"> @php
        $configs = [
            'price' => [
                'title' => 'Заповніть поля та отримуйте прайс-лист на автомобіль',
                'logo' => Storage::url('images/logos/Skoda_Wordmark_RGB_Electric_Green.svg'),
                'bgColor' => 'bg-skoda-emerald-green',
                'textColor' => 'text-skoda-electric-green',
                'outlineColor' => 'outline-skoda-emerald-green focus:outline-skoda-electric-green',
                'hasDecorations' => true,
                'decorations' => [
                    'bottom' =>
                        'bottom-0 right-0 w-[500px] h-20 bg-skoda-electric-green -rotate-12 translate-x-4 translate-y-12',
                ],
            ],
            'consultation' => [
                'title' => 'Залиште заявку та отримайте консультацію',
                'logo' => Storage::url('images/logos/Skoda_Wordmark_RGB_Emerald_Green.svg'),
                'bgColor' => 'bg-white',
                'textColor' => 'text-skoda-emerald-green',
                'outlineColor' => 'outline-skoda-emerald-green focus:outline-skoda-emerald-green',
                'hasDecorations' => true,
                'decorations' => [
                    'top' =>
                        'top-0 left-0 w-[700px] h-50 bg-skoda-electric-green rotate-12 transform -translate-x-1 -translate-y-8',
                ],
            ],
            'test-drive' => [
                'title' => 'Залиште заявку на тест-драйв автомобіля Škoda',
                'logo' => Storage::url('images/logos/Skoda_Wordmark_RGB_Emerald_Green.svg'),
                'bgColor' => 'bg-white',
                'textColor' => 'text-skoda-emerald-green',
                'outlineColor' => 'outline-skoda-emerald-green focus:outline-skoda-emerald-green',
                'hasDecorations' => false,
            ],
        ];
        $config = $configs[$type] ?? $configs['consultation'];
    @endphp
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center md:items-end justify-center p-1 md:p-4 text-center sm:items-center">
            <div class="relative transform overflow-hidden rounded-lg {{ $config['bgColor'] }} text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                @click.away="open = false">
                <button @click="open = false" @keydown.enter="open = false" aria-label="Закрити модальне вікно"
                    class="absolute top-4 right-4 {{ $config['textColor'] }} p-2 cursor-pointer text-2xl font-bold z-50 hover:opacity-70 focus:outline-none focus:ring-2 focus:ring-offset-2">
                    ×
                </button>
                <div class="flex min-h-full flex-col justify-center px-6 py-8 md:py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm z-20"> <img class="mx-auto h-7 md:h-10 w-auto"
                            src="{{ $config['logo'] }}" alt="Skoda Logo" onerror="this.style.display='none'">
                        <h2 id="modal-title"
                            class="mt-5 md:mt-10 text-center text-2xl/9 font-bold tracking-tight {{ $config['textColor'] }}">
                            {{ $config['title'] }} </h2>
                    </div>
                    <div class="mt-5 md:mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form x-ref="form" x-init="$watch('open', value => { if (value) $nextTick(() => $refs.name.focus()) })" @keydown.escape.window="open = false"
                            @submit.prevent="
                                if (isSubmitting) return;
                                errors = {};
                                if (!name?.trim()) errors.name = true;
                                if (!phone?.trim()) errors.phone = true;
                                else if (!phoneValid(phone)) errors.phone = 'Невірний формат номера';
                                if (Object.keys(errors).length === 0) {
                                    isSubmitting = true;

                                    const formData = new FormData($refs.form);
                                    const newTab = window.open('', '_blank');
                                    fetch($refs.form.action, {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': formData.get('_token')
                                        }
                                    })
                                    .then(res => res.json())
                                    .then(data => {
                                        if (data.price_url && newTab) {
                                            newTab.location.href = data.price_url;
                                        }
                                        if (data.redirect) {
                                            window.location.href = data.redirect;
                                        }
                                    })
                                    .catch(() => isSubmitting = false);
                                }
                            "
                            class="space-y-3 md:space-y-6" action="{{ route('send.modal.form') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" :value="value">
                            <div>
                                <label for="name" class="block text-base font-medium"
                                    :class="errors.name ? 'text-red-500' : '{{ $config['textColor'] }}'"><span
                                        x-text="errors.name ? 'Це поле є обовʼязковим' : 'Імʼя'"></span> </label>
                                <div class="mt-2"> <input type="text" name="name" id="name" x-ref="name"
                                        x-model="name" autocomplete="name" :disabled="isSubmitting"
                                        @input="if (errors.name) delete errors.name"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6 disabled:opacity-50"
                                        :class="errors.name ? 'outline-red-500 focus:outline-red-500' :
                                            '{{ $config['outlineColor'] }}'" />
                                </div>
                            </div>
                            <div> <label for="phone" class="block text-base font-medium"
                                    :class="errors.phone ? 'text-red-500' : '{{ $config['textColor'] }}'"> <span
                                        x-text="errors.phone === true ? 'Це поле є обовʼязковим' : (errors.phone ? errors.phone : 'Номер телефону')"></span>
                                </label>
                                <div class="mt-0 md:mt-2 mb-4">
                                    <input type="tel" name="phone" id="phone" x-model="phone"
                                        autocomplete="tel" :disabled="isSubmitting"
                                        @keydown="
                                            if (!phoneStarted) {
                                                phoneStarted = true;
                                                phone = '+38';
                                                $event.preventDefault();
                                                return;
                                            }
                                            if (!['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'].includes($event.key) && !/\d/.test($event.key)) {
                                                $event.preventDefault();
                                            }
                                        "
                                        @input="
                                            let cleaned = phone.replace(/[^\d]/g, '');
                                            if (!cleaned.startsWith('380')) {
                                                cleaned = '380';
                                            }
                                            phone = '+' + cleaned.slice(0, 12);
                                            if (errors.phone) delete errors.phone
                                        "
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 sm:text-sm/6 disabled:opacity-50"
                                        :class="errors.phone ? 'outline-red-500 focus:outline-red-500' :
                                            '{{ $config['outlineColor'] }}'" />
                                </div>
                                <x-checkbox name="no_call" text="Не телефонуйте мені"
                                    color="{{ $config['textColor'] }}" />
                            </div>
                            <div class="space-y-2 {{ $config['textColor'] }}">
                                <p class="text-base">Оберіть зручний спосіб звʼязку:</p>
                                <div class="flex flex-wrap gap-2 justify-around">
                                    <x-checkbox name="viber" text="Viber" color="{{ $config['textColor'] }}" />
                                    <x-checkbox name="telegram" text="Telegram" color="{{ $config['textColor'] }}" />
                                    <x-checkbox name="whatsapp" text="WhatsApp" color="{{ $config['textColor'] }}" />
                                </div>
                            </div>
                            <input type="hidden" name="price_url" :value="priceUrl">
                            <div class="w-fit mx-auto mb-6 md:mb-0">
                                <x-button type="submit">
                                    <span x-show="!isSubmitting">Відправити</span>
                                    <span x-show="isSubmitting">Відправляю...</span>
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div> {{-- Decorative elements --}} @if ($config['hasDecorations'])
                    @foreach ($config['decorations'] as $position => $classes)
                        <div class="absolute {{ $classes }} z-10"></div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
