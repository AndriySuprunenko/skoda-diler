<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\StockCar;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml file';

    public function handle()
    {
        $sitemap = Sitemap::create();

        $staticRoutes = [
            '/',
            '/about',
            '/contact',
            '/kodiaq',
            '/octavia-a8',
            '/superb',
            '/fabia',
            '/scala',
            '/kamiq-fl',
            '/karoq',
            '/credit',
            '/trade-in',
            '/reviews',
            '/thank-you',
            '/stock-cars',
        ];

        foreach ($staticRoutes as $route) {
            $sitemap->add(Url::create($route));
        }

        if (class_exists(StockCar::class)) {
            StockCar::all()->each(function ($car) use ($sitemap) {
                $sitemap->add(
                    Url::create("/stock-cars/{$car->id}")
                        ->setLastModificationDate($car->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(0.8)
                );
            });
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap updated successfully!');
    }
}
