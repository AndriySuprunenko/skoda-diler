@props(['type' => 'button', 'click' => null])

<div>
    <button type="{{ $type }}" @if ($click) @click="{{ $click }}" @endif
        class="w-full border-2 border-transparent text-base text-skoda-emerald-green font-bold bg-skoda-electric-green rounded-3xl px-4 py-2 cursor-pointer hover:border-skoda-emerald-green active:bg-skoda-emerald-green active:text-skoda-electric-green">{{ $slot }}</button>
</div>
