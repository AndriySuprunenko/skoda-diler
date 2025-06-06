@props(['id' => ''])

<section id={{ $id }}>
    <div class="container mx-auto px-4 py-8">
        {{ $slot }}
    </div>
</section>
