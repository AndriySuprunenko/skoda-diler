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
            ['url' => '/kodiaq', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/octavia-a8', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/superb', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/fabia', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/scala', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/kamiq-fl', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/karoq', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/credit', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/trade-in', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/service', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/stock-cars', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_DAILY],
            ['url' => '/enyaq', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['url' => '/test-drive-battle', 'priority' => 0.9, 'frequency' => Url::CHANGE_FREQUENCY_MONTHLY],
        ];

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
