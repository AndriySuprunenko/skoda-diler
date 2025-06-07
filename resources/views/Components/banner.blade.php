@php
    $sliders = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();
@endphp

<section class="banner">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{ Vite::asset('storage/app/public/' . $slider->image) }}" alt="{{ $slider->title }}"
                        class="w-full h-[848px] object-cover object-center" />
                    <div class="text">
                        <h2>{{ $slider->title }}</h2>
                        <p>{{ $slider->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Навігація -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<script>
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
