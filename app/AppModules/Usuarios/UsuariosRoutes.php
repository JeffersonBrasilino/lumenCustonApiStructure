<?php
/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'usuarios'], function () use ($router) {
    include 'app/AppModules/Usuarios/Auth/Routes/AuthRoutes.php';
});
