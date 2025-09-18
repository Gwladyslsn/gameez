<?php

return [
    '/' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'home'
    ],
    '/register' => [
        'controller' => App\Controller\AuthController::class,
        'method' => 'register'
    ],
    '/login' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'login'
    ],
    '/dashboardUser' => [
        'controller' => App\Controller\UserController::class,
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
        'controller' => App\Controller\MongoDbController::class,
        'method' => 'showForum'
    ],
    '/extensions' => [
        'controller' => App\Controller\PageController::class,
        'method' => 'extensions'
    ],
    '/getUserLists' => [
        'controller' => App\Controller\ListController::class,
        'method' => 'getUserLists'
    ],
    '/add' => [
        'controller' => App\Controller\ListController::class,
        'method' => 'add'
    ],
    '/addReview' => [
        'controller' => App\Controller\ReviewController::class,
        'method' => 'addReview'
    ],
    '/createPost' => [
        'controller' => App\Controller\MongoDbController::class,
        'method' => 'createPost'
    ],
    '/addComment' => [
        'controller' => App\Controller\MongoDbController::class,
        'method' => 'addComment'
    ],
    '/likePost' => [
        'controller' => App\Controller\MongoDbController::class,
        'method' => 'likePost'
    ],
    '/unlikePost' => [
        'controller' => App\Controller\MongoDbController::class,
        'method' => 'unlikePost'
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
