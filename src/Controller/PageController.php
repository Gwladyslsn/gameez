<?php

namespace App\Controller;

use App\Services\Auth;
use App\Repository\GameRepository;
use App\Database\Database;



class PageController extends Controller
{

    
    public function home()
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $gameRepository = new GameRepository($pdo);

        $popularGames = $gameRepository->getPopularGames(6, 0); // seulement 3 jeux pour la section home
        $newGames = $gameRepository->getNewGames(); // 3 jeux en cours de sortie
        $nbGames = count($gameRepository->getGames());

        $this->render('View/page/home', [
            'popularGames' => $popularGames,
            'newGames' => $newGames,
            'nbGames' => $nbGames
        ]);
    }

    public function register()
    {
        $this->render('View/page/register', []);
    }

    public function logout()
    {
        Auth::logout('/'); // appeler la fonction
    }


    public function login():void
{
    $auth = new Auth;
    $result = $auth->login();

    if ($result === 'admin') {
        $this->render('View/page/admin/loginSuccess', [
            'redirectUrl' => '/dashboardAdmin'
        ]);
        exit;
    } elseif ($result === 'user') {
        header('Location: /dashboardUser');
        exit;
    } else {
        // ICI on utilise le message d'erreur retourné par Auth::login()
        $this->render('View/page/register', [
            'error' => $result
        ]);
    }
}


    public function dashboardUser()
    {
        $this->render('View/page/dashboardUser', []);
    }


    public function games()
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $gameRepository = new GameRepository($pdo);

        
        $games = $gameRepository->getAllGames();
        $nbGames = $gameRepository->countGames();
        $this->render('View/page/allGames', [
            'games' => $games,
            'nbGames' => $nbGames
    ]);
    }

    public function searchGame()
    {
        $this->render('View/page/allGames', []);
    }

    public function forum()
    {
        $this->render('View/page/forum', []);
    }

    public function extensions()
    {
        $this->render('View/page/extensions', []);
    }

    public function addNewReview()
    {
        $this->render('View/page/addNewReview', []);
    }

    public function showExtensions()
    {
        $this->render('View/page/extensions', []);
    }

    








    // ADMIN
    public function dashboardAdmin()
    {
        $this->render('View/page/admin/dashboardAdmin', []);
    }

    public function loginSuccess()
    {
        $this->render('View/page/admin/loginSuccess', [
            'redirectUrl' => '/dashboardAdmin'
        ]);
    }

    

}
