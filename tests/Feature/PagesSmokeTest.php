<?php

use App\Models\Banner;
use App\Models\Contacts;
use App\Models\Credit;
use App\Models\Models;
use App\Models\StockCars;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

// Every public page must render. Also guards against view/component folder casing issues,
// which only show up on case-sensitive (Linux) filesystems.

$modelUrls = ['kodiaq', 'octavia-a8', 'superb', 'fabia', 'scala', 'kamiq-fl', 'karoq', 'enyaq'];

beforeEach(function () use ($modelUrls) {
    Contacts::create([
        'phone' => '+380671112233',
        'email' => 'test@example.test',
        'working_hours' => [],
        'social_medias' => ['facebook' => '#', 'instagram' => '#', 'tiktok' => '#', 'youtube' => '#'],
    ]);
    Credit::create(['description' => '<p>Кредит</p>']);
    Banner::create(['title' => 'Тестовий банер', 'image' => 'banners/a.webp', 'is_active' => true]);
    Banner::create(['title' => 'Вимкнений банер', 'image' => 'banners/b.webp', 'is_active' => false]);

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

it('shows database content on the home page', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Тестовий банер')
        ->assertDontSee('Вимкнений банер')
        ->assertSee('Škoda karoq')
        ->assertSee('+380671112233'); // header/footer contacts
});

it('shows the model and the other models on a model page', function () {
    $this->get('/karoq')
        ->assertOk()
        ->assertSee('Škoda karoq')
        ->assertSee('Škoda kodiaq');
});

it('returns 404 when a model page has no model in the database', function () {
    Models::where('url', 'fabia')->delete();

    $this->get('/fabia')->assertNotFound();
});

it('loads contacts only once per page', function () {
    $queries = 0;
    DB::listen(function ($q) use (&$queries) {
        if (str_contains($q->sql, 'from "contacts"')) {
            $queries++;
        }
    });

    $this->get('/stock-cars/' . StockCars::first()->id)->assertOk()->assertSee('+380671112233');

    expect($queries)->toBe(1);
});

it('has a content partial and a database-backed route for every configured model page', function () use ($modelUrls) {
    expect(array_keys(config('model-pages')))->toEqualCanonicalizing($modelUrls);

    foreach (config('model-pages') as $slug => $page) {
        expect(view()->exists($page['content']))->toBeTrue("missing content view for {$slug}");
    }
});

it('renders model page SEO data from config', function () {
    $this->get('/enyaq')
        ->assertOk()
        ->assertSee('<title>Škoda Enyaq – надійний електричний кросовер, купити у Кременчуці</title>', false)
        ->assertSee('"fuelType": "Electric"', false)
        ->assertSee('"@id": "' . url('/enyaq') . '#product"', false)
        ->assertSee('Часті запитання');

    $this->get('/fabia')
        ->assertOk()
        ->assertDontSee('Часті запитання')
        ->assertDontSee('fuelType');
});

it('does not treat unknown slugs as model pages', function () {
    $this->get('/not-a-model')->assertNotFound();
});
