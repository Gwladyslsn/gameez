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
    '/login' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'login'
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
    '/loadMoreGames' => [
        'controller' => App\Controller\GameController::class,
        'method' => 'loadMoreGames'
    ],
    '/searchGame' => [
        'controller' => App\Controller\GameController::class,
        'method' => 'searchGame'
    ],
    '/forum' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'forum'
    ],
    '/extensions' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'extensions'
    ],
    





    // ADMIN
    '/dashboardAdmin' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'dashboardAdmin'
    ],

    '/loginSuccess' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'loginSuccess'
    ],
];
