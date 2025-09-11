<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use App\Database\Database;

class ReviewController
{

    private ReviewRepository $reviewRepository;

    public function __construct()
    {
        $pdo = (new Database())->getConnection();
        $this->reviewRepository = new ReviewRepository($pdo);
    }
    public function addReview(): void
    {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents('php://input'), true);

        if(!$data || !isset($_SESSION['user'])){
            echo json_encode(['status' => 'error', 'message' => 'Données invalides ou utilisateur non connecté']);
            exit;
        }

        $review_note = $data['review_note'] ?? null;
        $review_comment = $data['review_comment'] ?? null;
        $gameId = isset($data['id_game']) ? (int) $data['id_game'] : null;
        $review_date = date('Y-m-d H:i:s');
        $id_user = $_SESSION['user'];
        $id_game = isset($data['id_game']) ? (int) $data['id_game'] : null;

        if(!$gameId){
            echo json_encode(['status' => 'error', 'message' => 'Aucun jeu spécifié']);
            exit;
        }


        // Ajouter avis
        $this->reviewRepository->addNewReview($review_note, $review_comment, $review_date, $id_user, $id_game);

        echo json_encode(['status' => 'success']);
    }

    /*public function loadMoreGames()
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
    }*/
}