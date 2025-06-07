@props(['type' => 'button'])

<div>
    <button type={{ $type }}
        class="border-2 border-transparent text-base text-skoda-emerald-green font-bold bg-skoda-electric-green rounded-3xl px-4 py-2 cursor-pointer hover:border-skoda-emerald-green active:bg-skoda-emerald-green">{{ $slot }}</button>
</div>
