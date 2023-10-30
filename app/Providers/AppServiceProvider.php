<?php

namespace App\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;
use App\Support\Parameters;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        // Vite.js config
        $this->app->make(Vite::class)->useHotFile(
            app('env') !== 'production' ? storage_path('app/vite.hot') : false
        );

        // Register query params helper class
        $this->app->singleton(Parameters::class);
    }
}
