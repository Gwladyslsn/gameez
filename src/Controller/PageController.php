<?php

namespace App\Controller;

use App\Services\Auth;
use App\Repository\GameRepository;
use App\Database\Database;



class PageController extends Controller
{
    public function home()
    {
        $this->render('View/page/home', []);
    }

    public function register()
    {
        $this->render('View/page/register', []);
    }

    public function dashboardUser()
    {
        $this->render('View/page/dashboardUser', []);
    }
    public function logout()
    {
        Auth::logout('/'); // appeler la fonction
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
}
