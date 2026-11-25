<?php

use App\Models\Contacts;
use App\Models\Credit;
use App\Models\Models;
use App\Models\StockCars;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// Every public page must render. Also guards against view/component folder casing issues,
// which only show up on case-sensitive (Linux) filesystems.

$modelUrls = ['kodiaq', 'octavia-a8', 'superb', 'fabia', 'scala', 'kamiq-fl', 'karoq', 'enyaq'];

beforeEach(function () use ($modelUrls) {
    Contacts::create([
        'phone' => '+380000000000',
        'email' => 'test@example.test',
        'working_hours' => [],
        'social_medias' => ['facebook' => '#', 'instagram' => '#', 'tiktok' => '#', 'youtube' => '#'],
    ]);
    Credit::create(['description' => '<p>Кредит</p>']);

    foreach ($modelUrls as $i => $url) {
        Models::create(['name' => "Škoda {$url}", 'url' => $url, 'price' => 'x.pdf', 'colors' => [], 'order' => $i]);
    }

    // saveQuietly: skip the sitemap regeneration hook
    (new StockCars(['name' => 'Škoda Octavia', 'status' => 'available', 'condition' => 'new', 'price' => 1000000]))->saveQuietly();
});

it('renders public page', function (string $url) {
    $this->get($url)->assertOk();
})->with(array_merge(
    ['/', '/contact', '/credit', '/trade-in', '/service', '/thank-you', '/stock-cars', '/test-drive-battle'],
    array_map(fn ($u) => "/{$u}", $modelUrls),
));

it('renders a stock car page', function () {
    $this->get('/stock-cars/' . StockCars::first()->id)->assertOk();
});

it('returns 404 for a missing stock car', function () {
    $this->get('/stock-cars/999999')->assertNotFound();
});
