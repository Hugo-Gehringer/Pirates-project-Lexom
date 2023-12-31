<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::if('captain', function () {
            return auth()?->user()?->hasRole('captain') === true;
        });

        Blade::if('isCook', function () {
            return auth()?->user()?->isCook();
        });
    }
}
