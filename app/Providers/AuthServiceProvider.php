<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Administrador;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate as FacadesGate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        FacadesGate::define('acesso-autorizado', function(Administrador $adm) {
            return $adm->tipo_adm === 'admin';
        });
    }
}
