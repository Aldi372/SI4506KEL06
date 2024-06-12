<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Mitra;

class ViewServiceProvider extends ServiceProvider
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
        // Compose the view with mitra data
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $mitra = Mitra::where('name', $user->name)->first();
                $view->with('mitra', $mitra);
            }
        });
    }
}