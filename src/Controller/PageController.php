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

        $games = $gameRepository->getAllGames(6, 0); // seulement 3 jeux pour la section home

        $this->render('View/page/home', ['games' => $games]);
    }

    public function register()
    {
        $this->render('View/page/register', []);
    }

    public function logout()
    {
        Auth::logout('/'); // appeler la fonction
    }


    public function login()
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
            $this->render('View/page/register', [
                'error' => 'Identifiants incorrects.'
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
        $this->render('View/page/allGames', ['games' => $games]);
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
