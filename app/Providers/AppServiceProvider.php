<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('global', 'ToDo Global');
        // view()->composer(['test.demo'], function($view){
        //     $view->with('multi', '多視圖變數');
        // });
        view()->composer(['demo'], function($view){
            $view->with('multi', '多視圖變數');
        });
    }
}
