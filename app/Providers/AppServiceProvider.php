<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Se requiere para los flash message
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

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
        Inertia::share('flash', function(){
            return [
                'status' => Session::get('status'),
                // 'errors' => Session::get('errors'),
            ];
        });
    }
}
