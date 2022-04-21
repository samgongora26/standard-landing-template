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
            $errors = '';
            if (Session::get('errors')) {
                //En caso de que hayan errores aqui son guardados
                $errors = [];
                foreach (Session::get('errors')->getBags() as $bag => $error) {
                    $errors[$bag] = $error->getMessages();
                }
            }
            return [
                'status' => Session::get('status'),
                //Toma el primer mensaje de error
                // 'errors' => $errors['default']['title'][0]
                'errors' => $errors
                // 'errors' => Session::get('errors'),
            ];
        });
    }
}
