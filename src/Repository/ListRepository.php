<?php

namespace App\Repository;

use App\Entity\ListEntity;
use PDO;

class ListRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Ajouter une nouvelle liste
    public function addList(ListEntity $list): int
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO list (list_name, create_at, id_user) 
            VALUES (:list_name, :created_at, :id_user)
        ");
        $stmt->execute([
            ':list_name' => $list->getNameList(),
            ':created_at' => $list->getCreatedAt(),
            ':id_user' => $list->getUserId()
        ]);

        return (int)$this->pdo->lastInsertId();
    }

    // Ajouter un jeu OU extension à une liste
    public function addItemToList(int $listId, string $type, int $itemId): void
{
    if ($type === 'game') {
        $stmt = $this->pdo->prepare("
            INSERT INTO list_items (id_list, id_game, id_extension)
            VALUES (:id_list, :id_game, NULL)
        ");
        $stmt->execute([
            ':id_list' => $listId,
            ':id_game' => $itemId
        ]);
    } elseif ($type === 'extension') {
        $stmt = $this->pdo->prepare("
            INSERT INTO list_items (id_list, id_game, id_extension)
            VALUES (:id_list, NULL, :id_extension)
        ");
        $stmt->execute([
            ':id_list' => $listId,
            ':id_extension' => $itemId
        ]);
    } else {
        throw new \InvalidArgumentException("Type d'item invalide");
    }
}


    // Récupérer toutes les listes d'un utilisateur
    public function getListsByUser(int $userId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM list WHERE id_user = :id_user");
        $stmt->execute([':id_user' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // récupérer tous les jeux d'une liste
    public function getItemsByList(int $listId): array
{
    $sql = "
        SELECT 
            li.id_list_item,
            li.id_list,
            g.id_game,
            g.game_name,
            g.image AS game_image,
            e.id_extension,
            e.extension_name,
            e.extension_image
        FROM list_items li
        LEFT JOIN game g ON li.id_game = g.id_game
        LEFT JOIN extension e ON li.id_extension = e.id_extension
        WHERE li.id_list = :id_list
        ORDER BY li.id_list_item ASC
    ";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':id_list' => $listId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function countListByUser(int $userId)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as nb_list FROM list WHERE id_user = :id_user");
        $stmt->execute([':id_user' => $userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) $row['nb_list'];
    }

    public function countGamesByUser(int $userId): int
    {
        $sql = "SELECT COUNT(*) AS nb_games
        FROM list_items li
        JOIN list l ON li.id_list = l.id_list
        WHERE l.id_user = :id_user";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_user' => $userId]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) $row['nb_games'];
    }
}
