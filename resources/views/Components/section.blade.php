@props(['class' => ''])

<section class="flex justify-center">
    <div class="p-2 lg:px-4 lg:py-8 w-full {{ $class }}">
        {{ $slot }}
    </div>
</section>
