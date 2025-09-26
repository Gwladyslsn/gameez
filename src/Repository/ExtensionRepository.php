<?php

namespace App\Repository;

use App\Entity\ExtensionEntity;
use PDO;

class ExtensionRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // CREATE //

    public function addExtension(
    string $extensionName, 
    string $extensionDescription, 
    int $complexity, 
    string $extensionImage, 
    \DateTime $releaseDate, 
    int $idGame
): bool {
    $sql = "INSERT INTO extension (extension_name, extension_description, complexity, extension_image, release_date, id_game) 
            VALUES (:extensionName, :extensionDescription, :complexity, :extensionImage, :releaseDate, :idGame)";
    $query = $this->pdo->prepare($sql);

    $query->bindParam(':extensionName', $extensionName, PDO::PARAM_STR);
    $query->bindParam(':extensionDescription', $extensionDescription, PDO::PARAM_STR);
    $query->bindParam(':complexity', $complexity, PDO::PARAM_INT);
    $query->bindParam(':extensionImage', $extensionImage, PDO::PARAM_STR);

    // ✅ Convertir DateTime en string format SQL
    $releaseDateStr = $releaseDate->format('Y-m-d');
    $query->bindParam(':releaseDate', $releaseDateStr, PDO::PARAM_STR);

    $query->bindParam(':idGame', $idGame, PDO::PARAM_INT);

    return $query->execute();
}



    // READ //

    public function getAllExtensions(): array
{
    $sql = "SELECT e.*, g.game_name
            FROM extension e
            JOIN game g ON e.id_game = g.id_game
            ORDER BY e.id_game ASC";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $extensions = [];

    foreach ($results as $row) {
        $extension = new ExtensionEntity();

        $extension->setIdExtension((int)$row['id_extension']);
        $extension->setExtensionName($row['extension_name']);
        $extension->setExtensionDescription($row['extension_description']);
        $extension->setComplexity((int)$row['complexity']);
        $extension->setImageExtension($row['extension_image']);

        // ✅ Convertir en DateTime si non null
        if (!empty($row['release_date'])) {
            $extension->setReleaseDate(new \DateTime($row['release_date']));
        } else {
            $extension->setReleaseDate(null); // autorisé car tu as ?DateTime dans ton Entity
        }

        $extension->setIdGame((int)$row['id_game']);
        $extension->setNameGame($row['game_name']);

        $extensions[] = $extension;
    }

    return $extensions;
}

public function getFavExtension()
{
    $sql = "SELECT e.*, g.game_name
            FROM extension e
            JOIN game g ON e.id_game = g.id_game
            WHERE e.id_extension = 2";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    $extensionFav = $stmt->fetch(PDO::FETCH_ASSOC);

    return $extensionFav;
}

public function searchExtension(string $extensionName = '', string $filter = 'all'): array
{
    $sql = "SELECT 
                e.id_extension,
                e.extension_name,
                e.extension_description,
                e.complexity,
                e.extension_image,
                e.release_date,
                e.id_game,
                g.game_name,
                ROUND(AVG(r.review_note), 1) AS avg_rating
            FROM extension e
            JOIN game g ON e.id_game = g.id_game
            LEFT JOIN review r ON e.id_extension = r.id_extension
            WHERE 1=1";

    $params = [];

    if ($extensionName) {
        $sql .= " AND e.extension_name LIKE :extensionName";
        $params['extensionName'] = "%$extensionName%";
    }

    // 🔑 GROUP BY avant l'ORDER BY
    $sql .= " GROUP BY 
                e.id_extension,
                e.extension_name,
                e.extension_description,
                e.complexity,
                e.extension_image,
                e.release_date,
                e.id_game,
                g.game_name";

    // 🔑 ORDER BY après le GROUP BY
    switch ($filter) {
        case 'new':
            $sql .= " ORDER BY e.release_date DESC";
            break;
        case 'complex':
            $sql .= " ORDER BY e.complexity DESC";
            break;
        case 'best':
            $sql .= " ORDER BY avg_rating DESC"; // NULLS LAST est spécifique à PostgreSQL, MySQL les met déjà après
            break;
        default:
            $sql .= " ORDER BY e.extension_name ASC";
            break;
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




    // UPDATE //

    //DELETE //
}
