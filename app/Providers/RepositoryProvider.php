<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    private $pathRoot = 'App\Repositories';
    public function register()
    {
        $this->app->singleton(
            $this->pathRoot.'\UsuariosRepository\IUsuariosRepository',
            $this->pathRoot.'\UsuariosRepository\UsuariosRepository',
        );
    }
}
