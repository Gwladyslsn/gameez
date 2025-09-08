<?php

namespace App\Controller;

use App\Repository\GameRepository;
use App\Database\Database;

class GameController
{

    private GameRepository $gameRepository;

    public function __construct()
    {
        $pdo = (new Database())->getConnection();
        $this->gameRepository = new GameRepository($pdo);
    }
    public function showGames()
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $games = $this->gameRepository->getAllGames(10, 0);

        require_once ROOTPATH . 'src/View/page/allGames.php';
    }

    public function loadMoreGames()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
            $games = $this->gameRepository->getAllGames(10, $offset);

            require_once ROOTPATH . 'src/View/template/game_list.php'; // Vue partielle
        }
    }

    public function searchGame(): void
    {
        header('Content-Type: application/json');

        $nameGame = $_GET['nameGame'] ?? '';
        $idCategory = isset($_GET['idCategory']) ? (int) $_GET['idCategory'] : 0;
        $nbPlayer = $_GET['nbPlayer'] ?? '';
        $agePlayer = $_GET['agePlayer'] ?? '';
        $durationGame = $_GET['durationGame'] ?? '';

        $gamesSearch = $this->gameRepository->searchGames($nameGame, $idCategory, $nbPlayer, $agePlayer, $durationGame);

        echo json_encode($gamesSearch);
    }
}
