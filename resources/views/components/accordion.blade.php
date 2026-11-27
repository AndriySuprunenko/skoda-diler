@props(['items'])

<div class="w-full max-w-[800px] m-auto p-2 divide-y divide-gray-200" x-data="{ openItem: null }">
    @foreach ($items as $index => $item)
        <div class="py-2">
            <button type="button"
                class="flex justify-between items-center w-full text-left px-4 py-2 bg-skoda-white rounded-md transition cursor-pointer"
                @click="openItem === {{ $index }} ? openItem = null : openItem = {{ $index }}">
                <span class="font-medium text-skoda-black">{{ $item['title'] }}</span>
                <svg :class="{ 'rotate-180': openItem === {{ $index }} }"
                    class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="openItem === {{ $index }}" x-collapse
                class="m-2 p-4 text-skoda-black text-start bg-skoda-white rounded-md">
                {{ $item['content'] }}
            </div>
        </div>
    @endforeach
</div>
