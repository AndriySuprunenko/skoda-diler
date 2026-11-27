<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\StockCars;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml file';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Статичні маршрути з пріоритетами
        $staticRoutes = [
            ['url' => '/', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_DAILY],
            ['url' => '/contact', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/credit', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/trade-in', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/service', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/stock-cars', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_DAILY],
            ['url' => '/test-drive-battle', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
        ];

        // Model landing pages
        foreach (array_keys(config('model-pages')) as $slug) {
            $staticRoutes[] = ['url' => "/{$slug}", 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY];
        }

        foreach ($staticRoutes as $route) {
            $sitemap->add(
                Url::create($route['url'])
                    ->setPriority($route['priority'])
                    ->setChangeFrequency($route['frequency'])
            );
        }

        // Динамічні маршрути для автомобілів
        try {
            if (class_exists(StockCars::class)) {
                StockCars::all()->each(function ($car) use ($sitemap) {
                    $sitemap->add(
                        Url::create("/stock-cars/{$car->id}")
                            ->setLastModificationDate($car->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                            ->setPriority(1.0) // Найвищий пріоритет для авто в наявності
                    );
                });

                $this->info('✅ Added ' . StockCars::count() . ' stock cars to sitemap');
            }
        } catch (\Exception $e) {
            $this->error('❌ Error loading stock cars: ' . $e->getMessage());
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap updated successfully!');
        $this->info('📍 Location: ' . public_path('sitemap.xml'));
    }
}
