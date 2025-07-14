@props(['title', 'description', 'button' => 'Детальніше', 'type' => 'consultation', 'link' => ''])

<div class="bg-skoda-emerald-green text-white p-4 rounded-lg shadow-md flex flex-col items-center gap-6">
    <span class="text-3xl">{{ $title }}</span>
    <span>{{ $description }}</span>
    <div>
        @if ($link)
            <x-link href="{{ $link }}">
                {{ $button }}
            </x-link>
        @else
            <x-button click="$dispatch('open-modal', { type: '{{ $type }}', value: '{{ $title }}' })">
                {{ $button }}
            </x-button>
        @endif
    </div>
</div>
