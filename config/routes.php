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





    // ADMIN
    '/dashboardAdmin' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'dashboardAdmin'
    ],
];
