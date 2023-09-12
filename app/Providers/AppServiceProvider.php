<?php

namespace App\Providers;

use App\Models\EventType;
use App\Models\Location;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $view->with('globalLocations', Location::all());
            $view->with('globalEventTypes', EventType::all());
        });
    }
}
