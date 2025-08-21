<?php 

namespace App\Controller;

use App\Repository\GameRepository;
use App\Database\Database;

class GameController
{
    public function showGames()
    {
        $database = new Database();
        $pdo = $database->getConnection();

        $gameRepository = new GameRepository($pdo);
        $games = $gameRepository->getAllGames();

        require_once ROOTPATH . 'src/View/page/allGames.php';
    }
}