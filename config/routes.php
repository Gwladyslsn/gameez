<?php

return [
    '/' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'home'
    ],
    '/register' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'register'
    ],
    '/dashboardUser' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'dashboardUser'
    ],
    '/logout' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'logout'
    ],
    '/games' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'games'
    ],





    // ADMIN
    '/dashboardAdmin' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'dashboardAdmin'
    ],
];
