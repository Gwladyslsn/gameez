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
        $games = $gameRepository->getAllGames(10,0);

        require_once ROOTPATH . 'src/View/page/allGames.php';
    }

    public function loadMoreGames()
{

    $database = new Database();
    $pdo = $database->getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
        $gameRepo = new GameRepository($pdo);
        $games = $gameRepo->getAllGames(10, $offset);

        require_once ROOTPATH . 'src/View/template/game_list.php'; // Vue partielle
    }
}
}