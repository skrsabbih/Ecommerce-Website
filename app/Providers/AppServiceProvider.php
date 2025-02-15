<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Config;
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
         /** set time zone */
         $generalSetting = GeneralSetting::first();
         Config::set('app.timezone', $generalSetting->time_zone);

        Paginator::useBootstrap();

        
        /** Share variable at all view */
        View::composer('*', function($view) use ($generalSetting, ){
            $view->with(['settings' => $generalSetting, ]);
        });
    }
    
}
