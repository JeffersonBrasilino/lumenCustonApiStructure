<?php


namespace App\AppModules\Usuarios\Auth\Controllers;


use App\AppModules\Usuarios\Auth\Services\AuthService;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    private $service;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function testeController(){
        $a = $this->service->testeService();
        return response()->json(['msg'=>$a]);
    }

}
