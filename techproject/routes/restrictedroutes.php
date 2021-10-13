<?php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

//Pages Route
$routes->add(
    'home',
    new Route('/home', ['controller' => \App\Controller\HomeController::class, 'method' => 'index'])
);

//Posts Route
$routes->add(
    'post',
    new Route('news/{id}/{postName}', ['controller' => \App\Controller\PostController::class, 'method' => 'index'])
);

//Login Route
$routes->add(
    'login',
    new Route('/login', ['controller' => \App\Controller\UserLoginController::class, 'method' => 'login'])
);

$routes->add(
    'register',
    new Route('/register', ['controller' => \App\Controller\UserLoginController::class, 'method' => 'register'])
);
$routes->add(
    'register',
    new Route('/login/validation', ['controller' => \App\Controller\UserLoginController::class, 'method' => 'loginValidation'])
);



//API Routes for News
$routes->add(
    'rest/news',
    new Route('/rest/news', ['controller' => \App\Controller\Rest\NewsAPIController::class,'method' => 'requestHandler']),

);

$routes->add(
    'rest/news/id',
    new Route('/rest/news/{id}', ['controller' => \App\Controller\Rest\NewsAPIController::class, 'method' => 'singleRequestHandler'])
);

//API Routes for Users
$routes->add(
    'rest/users',
    new Route('/rest/users', ['controller' => \App\Controller\Rest\UserAPIController::class,'method' => 'requestHandler'])

);

$routes->add(
    'rest/users/id',
    new Route('/rest/users/{id}', ['controller' => \App\Controller\Rest\UserAPIController::class, 'method' => 'singleRequestHandler'])
);


return $routes;
