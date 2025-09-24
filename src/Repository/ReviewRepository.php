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

    // Ajouter un avis à un jeu OU extension
    public function addNewReview($review_note, $review_comment, $review_date, $id_user, string $type, $itemId): void
{
    if ($type === 'game') {
        $stmt = $this->pdo->prepare("
            INSERT INTO review (review_note, review_comment, review_date, id_user, id_game, id_extension)
            VALUES (:review_note, :review_comment, :review_date, :id_user, :id_game, NULL)
        ");
        $stmt->execute([
            ':review_note' => $review_note,
            ':review_comment' => $review_comment,
            ':review_date' => $review_date,
            ':id_user' => $id_user,
            ':id_game' => $itemId,
        ]);
    } elseif ($type === 'extension') {
        $stmt = $this->pdo->prepare("
            INSERT INTO review (review_note, review_comment, review_date, id_user, id_game, id_extension)
            VALUES (:review_note, :review_comment, :review_date, :id_user, NULL, :id_extension)
        ");
        $stmt->execute([
            ':review_note' => $review_note,
            ':review_comment' => $review_comment,
            ':review_date' => $review_date,
            ':id_user' => $id_user,
            ':id_extension' => $itemId,
        ]);
    } else {
        throw new \InvalidArgumentException("Type d'item invalide pour la review");
    }
}



    /* READ */

    public function getAllReviews() 
    {
        $sql = "SELECT r.id_review, r.id_user, r.id_game, r.review_note, r.review_comment,
        g.game_name, g.image, u.user_name
        FROM review r
        JOIN game g ON r.id_game = g.id_game
        JOIN user u ON r.id_user = u.id_user
    ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $reviews;
    }

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
