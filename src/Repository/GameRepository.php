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
        string $descriptionGame
    ): bool {
        $query = $this->pdo->prepare("
            INSERT INTO game (game_name, game_duration, nb_gamer, age_gamer, image, game_description)
            VALUES (:nameGame, :durationGame, :nbGamer, :ageGamer, :imageGame, :descriptionGame)
        ");

        $query->bindParam(':nameGame', $nameGame);
        $query->bindParam(':durationGame', $durationGame);
        $query->bindParam(':nbGamer', $nbGamer);
        $query->bindParam(':ageGamer', $ageGamer);
        $query->bindParam(':imageGame', $imageGame);
        $query->bindParam(':descriptionGame', $descriptionGame);

        return $query->execute();
    }

    /* READ */
    /**
     * @return GameEntity[]
     */
    public function getAllGames(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM game");
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


    /* UPDATE */



    /* DELETE */
}
