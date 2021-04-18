<?php

namespace App\Providers;

use App\Models\AppOption;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $footerWidgetLeft = AppOption::getWigetLinkLeftFromCache('left');
        $footerWidgetCenter = AppOption::getWigetLinkLeftFromCache('center');

        view()->share('footerWidgetLeft', $footerWidgetLeft);
        view()->share('footerWidgetCenter', $footerWidgetCenter);
    }
}
