<?php


namespace App\AppModules\Usuarios\Auth\Services;


use App\Helpers\JsonWebTokenHelper;
use App\Repositories\UsuariosRepository\IUsuariosRepository;

class AuthService
{
    private $repo;
    public function __construct(IUsuariosRepository $repository)
    {
        $this->repo = $repository;
    }

    public function testeService(){
        $token = JsonWebTokenHelper::generateToken(['usuarioId'=>123456]);
        $b = JsonWebTokenHelper::validateToken("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAiLCJpYXQiOiIxNjA3Mzk1NDA3Ljg0NjMwMSIsImV4cCI6IjE2MDczOTU0MjcuODQ2MzAxIn0.1HlKyj5ODykNIPcW7jyYxJQ4bQ3DSLT7K-whWqN0SxQ");
        $c = JsonWebTokenHelper::getDataToken($token);
        print_r($c);
        die;
    }
}
