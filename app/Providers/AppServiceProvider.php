<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['client.*', 'layouts.*', 'components.*', 'administrator.*'], function ($view) {
            $view->with([
                'user'  =>  \App\Models\User::where('id', auth()->id())->first()
            ]);
        });
    }
}
