<?php

namespace App\Providers;

use App\Entities\Project;
use App\Support\URLGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton('url.generator', function () {
            return new URLGenerator(new Project);
        });
    }
}
