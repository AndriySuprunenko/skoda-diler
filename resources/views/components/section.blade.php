@props(['class' => ''])

<section class="flex justify-center">
    <div class="px-2 py-6 lg:px-4 lg:py-16 w-full {{ $class }}">
        {{ $slot }}
    </div>
</section>
