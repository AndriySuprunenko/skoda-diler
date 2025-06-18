@props(['type' => 'button', 'click' => null])

<div>
    <button type="{{ $type }}" @if ($click) @click="{{ $click }}" @endif
        class="w-full border-2 border-transparent text-base text-skoda-white font-bold bg-skoda-emerald-green rounded-3xl px-4 py-2 cursor-pointer hover:border-skoda-electric-green active:bg-skoda-white active:text-skoda-emerald-green">{{ $slot }}</button>
</div>
