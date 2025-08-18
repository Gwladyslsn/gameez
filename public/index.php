<?php

define("ROOTPATH", __DIR__ . '/../');
require ROOTPATH . '/vendor/autoload.php';

use App\Core\Router;

$router = new Router();

// chargement des routes via config/routes.php
$routes = require ROOTPATH . 'config/routes.php';

foreach ($routes as $path => $routeInfo) {
    $router->addRoute($path, $routeInfo['controller'], $routeInfo['method']);
}

$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace('/index.php', '', $uri); // Corrige l’URI
$router->dispatch($uri);
?>