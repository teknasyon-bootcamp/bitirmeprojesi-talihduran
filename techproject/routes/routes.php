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
    'loginValidation',
    new Route('/login/validation', ['controller' => \App\Controller\UserLoginController::class, 'method' => 'loginValidation'])
);
$routes->add(
    'register',
    new Route('/register', ['controller' => \App\Controller\UserLoginController::class, 'method' => 'register'])
);

$routes->add(
    'logout',
    new Route('/logout', ['controller' => \App\Controller\UserLoginController::class, 'method' => 'logout'])
);
$routes->add(
    'my_profile',
    new Route('/my-profile', ['controller' => \App\Controller\AdminController::class, 'method' => 'myProfile'])
);
$routes->add(
    'delete_my_profile',
    new Route('/delete-my-profile', ['controller' => \App\Controller\AdminController::class, 'method' => 'deleteRequest'])
);
//Admin Routes
$routes->add(
    'admin',
    new Route('/admin', ['controller' => \App\Controller\AdminController::class, 'method' => 'index'])
);

$routes->add(
    'admin_pages',
    new Route('/admin-pages', ['controller' => \App\Controller\AdminController::class, 'method' => 'pages'])
);

$routes->add(
    'admin_news',
    new Route('/admin-posts', ['controller' => \App\Controller\AdminController::class, 'method' => 'posts'])
);
$routes->add(
    'admin_news_add',
    new Route('/admin-post-add', ['controller' => \App\Controller\AdminController::class, 'method' => 'postAdd'])
);
$routes->add(
    'admin_news_post_controller',
    new Route('/admin-post-handler', ['controller' => \App\Controller\AdminController::class, 'method' => 'handler'])
);
$routes->add(
    'admin_news_edit',
    new Route('/admin-post-edit', ['controller' => \App\Controller\AdminController::class, 'method' => 'postEdit'])
);
$routes->add(
    'admin_news_delete',
    new Route('/admin-post-delete', ['controller' => \App\Controller\AdminController::class, 'method' => 'postDelete'])
);


$routes->add(
    'admin_users',
    new Route('/admin-users', ['controller' => \App\Controller\AdminController::class, 'method' => 'users'])
);
$routes->add(
    'admin_users_edit',
    new Route('/admin-users-edit', ['controller' => \App\Controller\AdminController::class, 'method' => 'usersEdit'])
);
$routes->add(
    'admin_users_delete',
    new Route('/admin-users-delete', ['controller' => \App\Controller\AdminController::class, 'method' => 'usersDelete'])
);
//Editor Routes
$routes->add(
    'editor',
    new Route('/editor', ['controller' => \App\Controller\EditorController::class, 'method' => 'index'])
);

$routes->add(
    'editor_pages',
    new Route('/editor-pages', ['controller' => \App\Controller\EditorController::class, 'method' => 'pages'])
);

$routes->add(
    'editor_news',
    new Route('/editor-posts', ['controller' => \App\Controller\EditorController::class, 'method' => 'posts'])
);

$routes->add(
    'editor_users',
    new Route('/editor-users', ['controller' => \App\Controller\EditorController::class, 'method' => 'users'])
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
