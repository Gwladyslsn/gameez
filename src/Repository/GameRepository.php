<?php

namespace App\Repository;

use App\Entity\GameEntity;
use PDO;

class GameRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /* CREATE */
    public function addGame(
        string $nameGame,
        string $durationGame,
        string $nbGamer,
        string $ageGamer,
        string $imageGame,
        int $idCategory,
        string $descriptionGame
    ): bool {
        $query = $this->pdo->prepare("
            INSERT INTO game (game_name, game_duration, nb_gamer, age_gamer, image, id_category, game_description)
            VALUES (:nameGame, :durationGame, :nbGamer, :ageGamer, :imageGame, :idCategory, :descriptionGame)
        ");

        $query->bindParam(':nameGame', $nameGame);
        $query->bindParam(':durationGame', $durationGame);
        $query->bindParam(':nbGamer', $nbGamer);
        $query->bindParam(':ageGamer', $ageGamer);
        $query->bindParam(':imageGame', $imageGame);
        $query->bindParam(':idCategory', $idCategory, PDO::PARAM_INT);
        $query->bindParam(':descriptionGame', $descriptionGame);

        return $query->execute();
    }

    /* READ */
    /**
     * @return GameEntity[]
     */
    public function getAllGames(int $limit = 10, int $offset = 0): array
    {
        $limit = (int) $limit;
        $offset = (int) $offset;

        $sql = "SELECT * FROM game ORDER BY id_game ASC LIMIT $limit OFFSET $offset";
        $stmt = $this->pdo->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $games = [];
        foreach ($results as $row) {
            $game = new GameEntity();
            $game->setIdGame((int)$row['id_game']);
            $game->setNameGame($row['game_name']);
            $game->setDurationGame((int)$row['game_duration']);
            $game->setNbGamer($row['nb_gamer']);
            $game->setAgeGamer((int)$row['age_gamer']);
            $game->setImageGame($row['image']);
            $game->setDescriptionGame($row['game_description'] ?? "");

            $games[] = $game;
        }

        return $games;
    }

    public function getGames(): array
{
    // On ajoute la jointure pour récupérer le nom de la catégorie
    $sql = "
        SELECT g.*, c.category_name
        FROM game g
        LEFT JOIN category c ON g.id_category = c.id_category
        ORDER BY g.id_game ASC
    ";
    $stmt = $this->pdo->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $games = [];
    foreach ($results as $row) {
        $game = new GameEntity();
        $game->setIdGame((int)$row['id_game']);
        $game->setNameGame($row['game_name']);
        $game->setDurationGame((int)$row['game_duration']);
        $game->setNbGamer($row['nb_gamer']);
        $game->setAgeGamer((int)$row['age_gamer']);
        $game->setImageGame($row['image']);
        $game->setDescriptionGame($row['game_description'] ?? "");

        // ➕ On ajoute la catégorie
        if (method_exists($game, 'setCategoryName')) {
            $game->setCategoryName($row['category_name'] ?? null);
        }

        $games[] = $game;
    }

    return $games;
}


    public function getPopularGames(int $limit = 10, int $offset = 0): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM game ORDER BY id_game ASC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $popularGames = [];
        foreach ($results as $row) {
            $popularGame = new GameEntity();
            $popularGame->setIdGame((int)$row['id_game']);
            $popularGame->setNameGame($row['game_name']);
            $popularGame->setDurationGame((int)$row['game_duration']);
            $popularGame->setNbGamer($row['nb_gamer']);
            $popularGame->setAgeGamer((int)$row['age_gamer']);
            $popularGame->setImageGame($row['image']);
            $popularGame->setDescriptionGame($row['game_description'] ?? "");

            $popularGames[] = $popularGame;
        }

        return $popularGames;
    }

    public function getNewGames(int $limit = 3, int $offset = 0): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM game ORDER BY id_game DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $newGames = [];
        foreach ($results as $row) {
            $newGame = new GameEntity();
            $newGame->setIdGame((int)$row['id_game']);
            $newGame->setNameGame($row['game_name']);
            $newGame->setDurationGame((int)$row['game_duration']);
            $newGame->setNbGamer($row['nb_gamer']);
            $newGame->setAgeGamer((int)$row['age_gamer']);
            $newGame->setImageGame($row['image']);
            $newGame->setDescriptionGame($row['game_description'] ?? "");

            $newGames[] = $newGame;
        }

        return $newGames;
    }

    public function countGames(
        string $nameGame = '',
        int $idCategory = 0,
        string $nbPlayer = '',
        string $agePlayer = '',
        string $durationGame = ''
    ): int {
        $sql = "SELECT COUNT(*) FROM game WHERE 1=1";
        $params = [];

        if ($nameGame) {
            $sql .= " AND game_name LIKE :nameGame";
            $params['nameGame'] = "%$nameGame%";
        }

        if ($idCategory > 0) {
            $sql .= " AND id_category = :idCategory";
            $params['idCategory'] = $idCategory;
        }

        if ($nbPlayer) {
            $sql .= " AND nb_gamer = :nbPlayer";
            $params['nbPlayer'] = $nbPlayer;
        }

        if ($agePlayer) {
            $sql .= " AND age_gamer = :agePlayer";
            $params['agePlayer'] = $agePlayer;
        }

        if ($durationGame) {
            $sql .= " AND game_duration = :durationGame";
            $params['durationGame'] = $durationGame;
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return (int) $stmt->fetchColumn();
    }


    public function searchGame(string $nameGame = '', int $idCategory = 0, string $nbPlayer = '', string $agePlayer = '', string $durationGame = ''): array
    {

        $sql = "SELECT * FROM game WHERE 1=1";
        $params = [];

        if ($nameGame) {
            $sql .= " AND (game_name LIKE :nameGame)";
            $params['nameGame'] = "%$nameGame%";
        }

        if ($idCategory > 0) {
            $sql .= " AND id_category = :idCategory";
            $params['idCategory'] = $idCategory;
        }

        if ($nbPlayer) {
            $sql .= " AND nb_gamer = :nbPlayer";
            $params['nbPlayer'] = $nbPlayer;
        }

        if ($agePlayer) {
            $sql .= " AND age_gamer = :agePlayer";
            $params['agePlayer'] = $agePlayer;
        }

        if ($durationGame) {
            $sql .= " AND game_duration = :durationGame";
            $params['durationGame'] = $durationGame;
        }


        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /* UPDATE */



    /* DELETE */
}
