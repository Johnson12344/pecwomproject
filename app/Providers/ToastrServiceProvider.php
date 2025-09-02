<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ToastrServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('toastr', function ($app) {
            return new \App\Services\Toastr();
        });
    }

    public function boot()
    {
        //
    }
}
