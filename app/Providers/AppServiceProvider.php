<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Force use of cert
        if (\App::environment() == 'production') {
            \URL::forceSchema('https');
        }

        // Make view name available -- want this for conditional includes for fb pixel in head
        view()->composer('*', function($view) {
            $view_name = str_replace('.', '-', $view->getName());
            view()->share('view_name', $view_name);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Allcops\Billing\BillingInterface', 'App\Allcops\Billing\StripeBilling');
    }
}
