<?php

namespace App\Providers;

use App\Models\Keranjang;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        
        View::composer('*', function ($view) {
            $product_keranjang = Keranjang::where('status', 'pending')->where('user_id',Auth::id())->count();
            $view->with('product_keranjang', $product_keranjang);
        });
    }
}
