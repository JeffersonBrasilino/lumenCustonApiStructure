<?php
/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'auth', 'namespace' => 'App\AppModules\Usuarios\Auth\Controllers'], function () use ($router) {
    $router->get('/teste', 'AuthController@testeController');
});
