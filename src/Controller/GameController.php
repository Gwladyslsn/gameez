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

    public function addGame(): void
{
    header('Content-Type: application/json');

    // Récupération des données envoyées via FormData
    $nameGame = $_POST['nameGame'] ?? '';
    $durationGame = $_POST['durationGame'] ?? '';
    $nbGamer = $_POST['nbGamer'] ?? '';
    $ageGamer = $_POST['ageGamer'] ?? '';
    $descriptionGame = $_POST['descriptionGame'] ?? '';
    $idCategory = isset($_POST['categoryGame']) ? (int) $_POST['categoryGame'] : null;

    // ✅ Gestion de l'image uploadée (via FormData)
    $imageGame = null;
    if (isset($_FILES['fileGame']) && $_FILES['fileGame']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = ROOTPATH . 'asset/image/jeux/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = basename($_FILES['fileGame']['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['fileGame']['tmp_name'], $filePath)) {
            $imageGame = 'image/jeux/' . $fileName; // Chemin que tu stockeras en BDD
        }
    }

    try {
        $newGame = $this->gameRepository->addGame(
            $nameGame,
            $durationGame,
            $nbGamer,
            $ageGamer,
            $imageGame,
            $idCategory,
            $descriptionGame
        );

        echo json_encode(['status' => 'success', 'message' => 'Jeu ajouté avec succès', 'data' => $newGame]);
    } catch (\Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
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

        $gamesSearch = $this->gameRepository->searchGame($nameGame, $idCategory, $nbPlayer, $agePlayer, $durationGame);

        echo json_encode($gamesSearch);
    }

}
