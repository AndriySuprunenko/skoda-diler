@props(['carPrice'])

<div class="relative mt-6 flex">
    <div class="mb-6 bg-skoda-emerald-green w-fit p-4 flex items-center justify-between z-10 h-[72px]">
        <x-text.title color="electric-green">
            {{ number_format($carPrice, 0, ',', ' ') }} ₴
        </x-text.title>
    </div>
    <div class="triangle-up  w-0 h-0 z-0" />
</div>

<style>
    .triangle-up {
        border-top: 72px solid transparent;
        border-right: 50px solid transparent;
        border-left: 50px solid #0E3A2F;
    }
</style>
