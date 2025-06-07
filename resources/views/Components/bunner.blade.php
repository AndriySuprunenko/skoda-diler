@php
    $sliders = \App\Models\Banner::where('is_active', true)->orderBy('order')->get();
@endphp

<section class="slider">
    @foreach ($sliders as $slide)
        <div class="slide">
            <img src="{{ Vite::asset('storage/app/public/' . $slide->image) }}" alt="{{ $slide->title }}">
            <h2>{{ $slide->title }}</h2>
            <p>{{ $slide->description }}</p>
        </div>
    @endforeach
</section>
