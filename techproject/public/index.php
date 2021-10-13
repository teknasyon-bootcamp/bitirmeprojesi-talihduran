<?php

use App\Database\Static\Mysql;
use App\Routing\Router;


require __DIR__ . '/../vendor/autoload.php';

/*if (isset($_SESSION) && $_SESSION['Authenticated'] == true){
    $routes = require __DIR__ . '/../routes/routes.php';
}else{
    $routes = require __DIR__ . '/../routes/restrictedroutes.php';
}*/
$routes = require __DIR__ . '/../routes/routes.php';
/**
 * Gets Singleton Mysql object
 */

Mysql::getInstance()->init("localhost","root","","teknasyon_haber");

/**
 * Creates Route System
 */

(new Router($routes))();

