<?php


namespace App\AppModules\Usuarios\Auth\Controllers;


use App\AppModules\Usuarios\Auth\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    private $service;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function testeController(){
        $this->service->testeService();
        return response()->json(['msg'=>'teste']);
    }

}
