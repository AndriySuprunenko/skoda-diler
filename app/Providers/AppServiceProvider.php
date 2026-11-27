<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Layout components that show the dealership's contacts (one query per request).
        \Illuminate\Support\Facades\View::composer([
            'components.footer',
            'components.social-medias',
            'components.information-block',
            'components.header.navigation',
            'components.header.burger',
        ], fn ($view) => $view->with('contacts', \App\Models\Contacts::current()));

        \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
        if (str_starts_with(config('app.url'), 'https://')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
