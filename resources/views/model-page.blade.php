{{-- Shared template for all model landing pages. Per-model data: config/model-pages.php --}}
@php
    $primaryImage = $model->images->first();

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        '@id' => url($model->url) . '#product',
        'name' => $page['schema']['name'],
        'alternateName' => $page['schema']['alternateName'],
        'description' => $page['schema']['description'],
        'url' => url($model->url),
        'brand' => ['@type' => 'Brand', 'name' => 'Škoda'],
        'manufacturer' => ['@type' => 'Organization', 'name' => 'Škoda Auto'],
        'category' => $page['schema']['category'],
    ];
    // Extra schema fields (e.g. fuelType for Enyaq)
    $schema += array_diff_key($page['schema'], array_flip(['name', 'alternateName', 'description', 'category']));
    $schema['isRelatedTo'] = ['@type' => 'AutoDealer', '@id' => url('/') . '/#autodealer'];
@endphp

@section('title', $page['title'])

@section('meta')
    <meta name="description" content="{{ $page['description'] }}">
    <!-- Open Graph мета-теги -->
    <meta property="og:title" content="{{ $page['title'] }}">
    <meta property="og:description" content="{{ $page['description'] }}">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ $primaryImage ? url(Storage::url($primaryImage->image)) : '' }}">
@endsection

@section('shema')
    <script type="application/ld+json">
{!! json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
    </script>
@endsection

<x-layout>
    <x-information-block :model="$model" />
    {{-- Контент сторінки --}}
    <div class="max-w-4xl mx-auto">
        <x-section class="flex flex-col gap-4">
            @include($page['content'])
        </x-section>
    </div>
    @if (!empty($page['faq']))
        <x-section class="text-center bg-skoda-electric-green">
            <x-text.title>Часті запитання</x-text.title>
            <x-accordion :items="$page['faq']" />
        </x-section>
    @endif
    {{-- Інші моделі --}}
    <x-others-models :models="$models" />
</x-layout>
