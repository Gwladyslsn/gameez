<?php

namespace App\Repository;

use PDO;

class AdminRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getStats(): array
    {
        $stats = [];

        // Comptage des utilisateurs
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total_users FROM user");
        $stmt->execute();
        $stats['total_users'] = (int) $stmt->fetchColumn();

        // Comptage des jeux
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total_games FROM game");
        $stmt->execute();
        $stats['total_games'] = (int) $stmt->fetchColumn();

        // Comptage des avis en attente
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total_review FROM review");
        $stmt->execute();
        $stats['total_reviews'] = (int) $stmt->fetchColumn();

        // calcul moyenne note
        $stmt = $this->pdo->prepare("SELECT AVG(review_note) as avg_review FROM review");
        $stmt->execute();
        $stats['avg_review'] = (int) $stmt->fetchColumn();


        return $stats;
    }

    public function getTopGames(int $limit = 5): array
{

    $topGames = [];

    $sql = "SELECT 
    g.id_game, g.game_name,
    ROUND(AVG(r.review_note), 2) AS average_rating,
    COUNT(r.id_review) AS review_count
    FROM game g
    JOIN review r ON g.id_game = r.id_game
    GROUP BY g.id_game, g.game_name
    ORDER BY average_rating DESC
    LIMIT :limit;
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $topGames =  $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $topGames;
}

    public function getTopWishlistGames(int $limit = 5): array
{

    $topWishlistGames = [];

    $sql = "SELECT 
    g.id_game, g.game_name,
    COUNT(li.id_list) AS list_count
    FROM game g
    JOIN list_items li ON g.id_game = li.id_game
    GROUP BY g.id_game, g.game_name
    ORDER BY list_count DESC
    LIMIT :limit;
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $topWishlistGames =  $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $topWishlistGames;
}

}
