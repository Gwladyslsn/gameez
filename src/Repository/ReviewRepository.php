<?php

namespace App\Repository;

use App\Entity\ReviewEntity;
use PDO;

class ReviewRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Ajouter un avis à un jeu
    public function addNewReview($review_note, $review_comment, $review_date, $id_user, $id_game):void 
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO review (review_note, review_comment, review_date, id_user, id_game) 
            VALUES (:review_note, :review_comment, :review_date, :id_user, :id_game)
        ");
        $stmt->execute([
            ':review_note' => $review_note,
            ':review_comment' => $review_comment,
            ':review_date' => $review_date,
            ':id_user' => $id_user,
            ':id_game' => $id_game,
        ]);

    }
/*
// Ajouter un jeu à une liste
    public function addGameToList(int $listId, int $gameId): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO list_items (id_list, id_game) 
            VALUES (:id_list, :id_game)
        ");
        $stmt->execute([
            ':id_list' => $listId,
            ':id_game' => $gameId
        ]);
    }

// Récupérer toutes les listes d'un utilisateur
    public function getListsByUser(int $userId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM list WHERE id_user = :id_user");
        $stmt->execute([':id_user' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// récupérer tous les jeux d'une liste
    public function getGamesByList(int $listId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT g.* 
            FROM game g
            JOIN list_items li ON g.id_game = li.id_game
            WHERE li.id_list = :id_list
        ");
        $stmt->execute([':id_list' => $listId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/
}
