<?php

namespace App\Controller;

use App\Repository\ExtensionRepository;
use App\Database\Database;


class ExtensionController
{
    private ExtensionRepository $extensionRepo;

    public function __construct()
    {
        $pdo = (new Database())->getConnection();
        $this->extensionRepo = new ExtensionRepository($pdo);
    }

    //CREATE

public function addExtension(): void
{
    header('Content-Type: application/json');

    // Récupération des données envoyées via FormData
    $extensionName = $_POST['extensionName'] ?? '';
    $extensionDescription = $_POST['extensionDescription'] ?? '';
    $complexity = (int) $_POST['complexityExtension'];
    $extensionImage = $_POST['extensionImage'] ?? '';
    $releaseDate = new \DateTime($_POST['releaseDate']) ?? '';
    $idGame = isset($_POST['idGame']) ? (int) $_POST['idGame'] : null;

    // ✅ Gestion de l'image uploadée (via FormData)
    $extensionImage = null;
    if (isset($_FILES['extensionImage']) && $_FILES['extensionImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = ROOTPATH . 'public/asset/image/extensions/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = basename($_FILES['extensionImage']['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['extensionImage']['tmp_name'], $filePath)) {
            $extensionImage = $fileName; // Chemin que tu stockeras en BDD
        }
    }

    try {
        $newGame = $this->extensionRepo->addExtension(
            $extensionName,
            $extensionDescription,
            $complexity,
            $extensionImage,
            $releaseDate,
            $idGame,
        );

        echo json_encode(['status' => 'success', 'message' => 'Jeu ajouté avec succès', 'data' => $newGame]);
    } catch (\Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}


    // READ
    public function showExtensions()
    {
        
        $extensions = $this->extensionRepo->getAllExtensions();
        $extensionFav = $this->extensionRepo->getFavExtension();
        require_once ROOTPATH . 'src/View/page/extensions.php';
    }

}
