@props(['type' => 'button'])

<div>
    <button type={{ $type }}
        class="text-base text-skoda-emerald-green font-bold bg-skoda-electric-green rounded-3xl px-4 py-2 cursor-pointer">{{ $slot }}</button>
</div>
