<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        Carbon::setToStringFormat('Y年n月j日');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
}
