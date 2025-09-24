<?php
namespace App\Controller;

use App\Repository\ListRepository;
use App\Entity\ListEntity;
use App\Database\Database;

class ListController
{
    private ListRepository $listRepository;

    public function __construct()
    {
        $database = new Database();
        $this->listRepository = new ListRepository($database->getConnection());

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Ajouter une extension et/ou un jeu à une liste
    public function add(): void
{
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data || !isset($_SESSION['user'])) {
        echo json_encode(['status' => 'error', 'message' => 'Données invalides ou utilisateur non connecté']);
        exit;
    }

    $listId = $data['id_list'] ?? null;
    $newListName = $data['new_list_name'] ?? null;
    $itemId = isset($data['id_item']) ? (int) $data['id_item'] : null;
    $itemType = $data['type'] ?? null;

    if (!$itemId || !$itemType) {
        echo json_encode(['status' => 'error', 'message' => 'Aucun élément spécifié']);
        exit;
    }

    // Si nouvelle liste
    if ($newListName) {
        $list = new ListEntity(null, $newListName, $_SESSION['user']);
        $listId = $this->listRepository->addList($list);
    }

    // Ajouter dans la liste
    $this->listRepository->addItemToList($listId, $itemType, $itemId);

    echo json_encode(['status' => 'success']);
}


    // Récupérer les listes de l'utilisateur
    public function getUserLists(): void
    {
        header('Content-Type: application/json');

        if(!isset($_SESSION['user'])){
            echo json_encode([]);
            exit;
        }

        $lists = $this->listRepository->getListsByUser($_SESSION['user']);
        echo json_encode($lists);
    }

// Jeu d'une liste
    public function getGamesOfList(int $listId): void
    {
        header('Content-Type: application/json');
        $games = $this->listRepository->getGamesByList($listId);
        echo json_encode($games);
    }
}
