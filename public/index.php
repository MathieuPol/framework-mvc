<?php

require_once '../vendor/autoload.php';

session_start();



$router = new AltoRouter();


if (array_key_exists('BASE_URI', $_SERVER)) {

    $router->setBasePath($_SERVER['BASE_URI']);

} else {
    $_SERVER['BASE_URI'] = '/';
}

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controllers\MainController'
    ],
    'main-home'
);
//! this is an example to create a root
//! Uncomment if you want to set up acl
            /* $router->map(
                'GET',
                '/user/connection',
                [
                    'method' => 'connection',
                    'controller' => 'App\Controllers\UserController'
                ],
                'user-connection'
            );

            $router->map(
                'POST',
                '/user/connection',
                [
                    'method' => 'login',
                    'controller' => 'App\Controllers\UserController'
                ],
                'user-login'
            );

            $router->map(
                'GET',
                '/user/deconnection',
                [
                    'method' => 'deconnection',
                    'controller' => 'App\Controllers\UserController'
                ],
                'user-deconnection'
            ); */

$match = $router->match();

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');

$dispatcher->dispatch();