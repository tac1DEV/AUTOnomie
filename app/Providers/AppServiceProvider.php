<?php

namespace App\Providers;
use App\Models\Trajet;
use App\Observers\TrajetObserver;

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
        Trajet::observe(TrajetObserver::class);
    }
}
