<?php


namespace App\AppModules\Usuarios\Auth\Services;


use App\Repositories\UsuariosRepository\IUsuariosRepository;

class AuthService
{
    private $repo;
    public function __construct(IUsuariosRepository $repository)
    {
        $this->repo = $repository;
    }

    public function testeService(){
        return $this->repo->teste();
    }
}
