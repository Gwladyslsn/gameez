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

    /* CREATE */

    // Ajouter un avis à un jeu
    public function addNewReview($review_note, $review_comment, $review_date, $id_user, $id_game): void
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


    /* READ */

    public function getReviewByUser(int $userId) 
    {
        $sql = "SELECT r.id_review, r.id_user, r.id_game, r.review_note, r.review_comment,
        g.game_name, g.image
        FROM review r
        JOIN game g ON r.id_game = g.id_game
        WHERE r.id_user = :id_user
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_user' => $userId]);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $reviews;
    }
    public function countReviewByUser(int $userId) 
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as nb_review FROM review WHERE id_user = :id_user");
        $stmt->execute([':id_user' => $userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) $row['nb_review'];
    }

    public function getAverageReviewByUser(int $userId): float
{
    $sql = "SELECT ROUND(AVG(review_note), 1) AS average_notes
            FROM review
            WHERE id_user = :id_user";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':id_user' => $userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return (float) $row['average_notes'];
}


    /* UPDATE */



    /* DELETE*/
}
