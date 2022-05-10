<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Muetra en el sidebar los botones segun el permiso

        Gate::define('administracion', function ($user){
            return leerJson(auth()->user()->permisos, 'administracion.eventos') == true ||
                    leerJson(auth()->user()->permisos, 'administracion.inscritos') == true
                    || auth()->user()->role == 1 || auth()->user()->role == 100;
        });

        Gate::define('eventos', function ($user){
            return leerJson(auth()->user()->permisos, 'administracion.eventos') == true
                || auth()->user()->role == 1 || auth()->user()->role == 100;
        });

        Gate::define('inscritos', function ($user){
            return leerJson(auth()->user()->permisos, 'administracion.inscritos') == true
                || auth()->user()->role == 1 || auth()->user()->role == 100;
        });

        Gate::define('usuarios', function ($user){
            return leerJson(auth()->user()->permisos, 'usuarios.index') == true || auth()->user()->role == 1 || auth()->user()->role == 100;
        });

        Gate::define('parametros', function ($user){
            return $user->role == 100;
        });

        Gate::define('prueba', function ($user){
            return true;
        });

    }
}