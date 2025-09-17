<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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
        \Illuminate\Pagination\Paginator::viewFactoryResolver(function () {
            return app('view');
        });

        \Illuminate\Pagination\Paginator::currentPathResolver(function () {
            return request()->url();
        });

        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return (int) request()->input($pageName, 1);
        });

        // Share cart count with all views (prevents Undefined $count)
        View::composer('*', function ($view) {
            $count = Auth::check()
                ? Cart::where('user_id', Auth::id())->count()
                : '';
            $view->with('count', $count);
        });
    }
}
