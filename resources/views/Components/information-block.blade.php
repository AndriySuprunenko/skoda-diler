<x-section>
    <div class="relative w-full overflow-hidden flex flex-col lg:flex-row">
        <!-- Slider main container -->
        <div class="swiper modelSwiper-{{ $model->id }}">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($model->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ Storage::url($image->image) }}" alt="Фото моделі {{ $model->name }}" loading="lazy"
                            class="w-full h-[300px] md:h-[630px] object-cover object-center">
                    </div>
                @endforeach
            </div>
            <!-- Navigation buttons -->
            <div class="swiper-button-next after:text-skoda-emerald-green"></div>
            <div class="swiper-button-prev after:text-skoda-emerald-green"></div>
            <div class="swiper-pagination"></div>
        </div>

        {{--  Model details section --}}
        <div class="flex flex-col gap-4 w-full p-4 md:p-8 bg-skoda-white text-skoda-emerald-green relative">
            <x-Text.main-title>Škoda {{ $model->name }}</x-Text.main-title>
            <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                <span class="text-lg">Потужність двигуна </span>
                <x-Text.text>
                    {{ $model->power }} кВт
                </x-Text.text>
            </div>
            <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                <span class="text-lg">Коробка</span>
                <x-Text.text>
                    {{ $model->gear_box }}
                </x-Text.text>
            </div>
            <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                <span class="text-lg">Об'єм двигуна</span>
                <x-Text.text>
                    {{ $model->engine_capacity }}
                </x-Text.text>
            </div>
            <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                <span class="text-lg">Середня витрата палива</span>
                <x-Text.text>
                    {{ $model->fuel_consumtion }}
                </x-Text.text>
            </div>
            <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                <span class="text-lg">Комплектація</span>
                <x-Text.text>
                    {{ $model->complectation }}
                </x-Text.text>
            </div>
            <div class="flex justify-between border-b-4 border-solid border-skoda-emerald-green ">
                <span class="text-lg">Кольори</span>
                <x-colors :colors='$model->colors' />
            </div>
            <div class="flex gap-6 flex-wrap justify-center mt-6">
                <div class="w-full max-w-[300px]">
                    <x-send-message-button>Написати нам</x-send-message-button>
                </div>
                <div class="w-full max-w-[300px]">
                    <x-link href="tel:+380676208844" style="emerald-white">Зателефонуйте нам</x-link>
                </div>
                <div class="w-full max-w-[300px]">
                    <x-button style="emerald"
                        click="$dispatch('open-modal', { type: 'price', value: '{{ $model->name }}' })">
                        Завантажити прайс
                    </x-button>
                </div>
                <div class="w-full max-w-[300px]">
                    <x-button style="emerald-white"
                        click="$dispatch('open-modal', { type: 'test-drive' , value: '{{ $model->name }}' })">
                        Залишити заявку на тест-драйв
                    </x-button>
                </div>
            </div>
            <div
                class="triangle-up absolute top-0 left-0 w-0 h-0 {{ $model->id % 2 == 0 ? 'lg:rounded-tl-lg' : '' }} -z-10">
            </div>
        </div>
    </div>
    <div id="fullscreenOverlay"
        class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center hidden z-50">
        <button id="closeFullscreen"
            class="absolute top-6 right-6 text-white text-4xl font-bold z-60 hover:text-gray-300">×</button>
        <button id="fullscreenPrev"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-5xl z-60 hover:text-gray-300">‹</button>
        <button id="fullscreenNext"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-5xl z-60 hover:text-gray-300">›</button>
        <img id="fullscreenImage" src="" alt="Зображення" class="max-w-full max-h-full">
    </div>
</x-section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const images = Array.from(document.querySelectorAll('.swiper-slide img'));
        const overlay = document.getElementById('fullscreenOverlay');
        const fullImg = document.getElementById('fullscreenImage');

        const swiper = new Swiper('.modelSwiper-{{ $model->id }}', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            slideToClickedSlide: true,
            watchSlidesProgress: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        images.forEach(img => {
            img.addEventListener('click', () => {
                currentIndex = images.findIndex(i => i === img);
                fullImg.src = img.src;
                overlay.classList.remove('hidden');
            });
        });

        overlay.addEventListener('click', () => {
            overlay.classList.add('hidden');
        });

        document.getElementById('closeFullscreen').addEventListener('click', () => {
            overlay.classList.add('hidden');
        });

        let startX = 0;

        overlay.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        }, {
            passive: true
        });

        overlay.addEventListener('touchend', (e) => {
            const endX = e.changedTouches[0].clientX;
            const diff = endX - startX;
            if (Math.abs(diff) > 50) {
                if (diff < 0 && currentIndex < images.length - 1) {
                    currentIndex++;
                    fullImg.src = images[currentIndex].src;
                } else if (diff > 0 && currentIndex > 0) {
                    currentIndex--;
                    fullImg.src = images[currentIndex].src;
                }
            }
        }, {
            passive: true
        });
        // Додаємо обробники для стрілок навігації у повноекранному режимі
        document.getElementById('fullscreenNext').addEventListener('click', (e) => {
            e.stopPropagation();
            if (currentIndex < images.length - 1) {
                currentIndex++;
                fullImg.src = images[currentIndex].src;
            }
        });
        document.getElementById('fullscreenPrev').addEventListener('click', (e) => {
            e.stopPropagation();
            if (currentIndex > 0) {
                currentIndex--;
                fullImg.src = images[currentIndex].src;
            }
        });
    });
</script>

<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 80%;
        cursor: pointer;
    }

    .swiper-pagination-bullet {
        background: #78FAAE;
        opacity: 1;
        width: 12px;
        height: 12px;
    }

    .swiper-pagination-bullet-active {
        background: white;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #0E3A2F;
        width: 40px;
        height: 50px;
        background-color: #78FAAE;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 30px;
        color: #0E3A2F;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: rgba(120, 250, 174, 0.8);
    }

    @media (max-width: 800px) {

        .swiper-button-prev,
        .swiper-button-next {
            display: none;
        }
    }

    #fullscreenOverlay {
        transition: opacity 0.3s ease;
    }
</style>
