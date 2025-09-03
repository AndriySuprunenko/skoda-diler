@php
    $contacts = \App\Models\Contacts::first();
@endphp

@props(['color' => 'black'])

<div class="flex flex-col w-fit m-auto md:w-full">
    <span class="font-bold text-skoda-{{ $color }}"> Наші соціальні мережі: </span>
    <div class="flex gap-6 mt-2">
        <a href="{{ $contacts->social_medias['instagram'] }}" target="_blank">
            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/instagram.png') }}" alt="Instagram" />
        </a>
        <a href="{{ $contacts->social_medias['facebook'] }}" target="_blank">
            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/facebook.png') }}" alt="Facebook" />
        </a>
        <a href="{{ $contacts->social_medias['youtube'] }}" target="_blank">
            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/youtube.png') }}" alt="Youtube" />
        </a>
        <a href="{{ $contacts->social_medias['tiktok'] }}" target="_blank">
            <img class="w-[24px] h-[24px]" src="{{ Storage::url('images/icons/tiktok.png') }}" alt="TikTok" />
        </a>
    </div>
</div>
