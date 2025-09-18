<?php

namespace App\Controller;

use App\Repository\MongoRepository;
use App\Repository\UserRepository;
use App\Database\Database;

class MongoDbController
{
    private MongoRepository $mongoRepository;

    public function __construct()
    {
        $this->mongoRepository = new MongoRepository();
    }

    // Afficher le forum
    public function showForum(): void
    {
        $posts = $this->mongoRepository->getAllPosts();
        require ROOTPATH . "src/View/page/forum.php";
    }

    // Créer un nouveau post
    public function createPost(): void
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $userRepo = new UserRepository($pdo);
        $user = $userRepo->getDataUser($_SESSION['user']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            $userId = $_SESSION['user'];
            $username = $user['user_name'];

            $this->mongoRepository->createPost($title, $content, $userId, $username);

            // Si c'est un appel AJAX, on répond en JSON
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                header('Content-Type: application/json');
                echo json_encode([
                    'title' => $title,
                    'content' => $content,
                    'username' => $username,
                    'avatar' => strtoupper(substr($username, 0, 2)),
                    'created_at' => (new \DateTime())->format('d/m/Y H:i'),
                    'likes' => 0,
                    'comments' => []
                ]);
                exit;
            }

            // Sinon on fait comme avant
            header("Location: /forum");
            exit;
        }
    }


    // Ajouter un commentaire
    public function addComment(): void
{
    header('Content-Type: application/json');

    try {
        $database = new Database();
        $pdo = $database->getConnection();
        $userRepo = new UserRepository($pdo);
        $user = $userRepo->getDataUser($_SESSION['user']);

        $data = json_decode(file_get_contents('php://input'), true);

        $postId = $data['post_id'] ?? null;
        $content_comment = $data['comment_content'] ?? null;
        $userId = $_SESSION['user'];
        $username = $user['user_name'];

        if (!$postId || !$content_comment) {
            echo json_encode(['success' => false, 'message' => 'données manquantes']);
            exit;
        }

        // Insérer le commentaire dans MongoDB
        $newComment = $this->mongoRepository->addComment($postId, $content_comment, $userId, $username);

        // Renvoyer le commentaire créé côté JS
        echo json_encode(['success' => true, 'replies' => $newComment]);

    } catch (\Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}


    // Like un post
    public function likePost(): void
{
    header('Content-Type: application/json');

    try {
        // Récupérer le JSON envoyé par fetch
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['post_id'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Post ID manquant']);
            return;
        }

        $postId = $data['post_id'];
        $newLikeCount = $this->mongoRepository->likePost($postId); // ← Retourne le nb de likes mis à jour

        http_response_code(200);
        echo json_encode([
            'success' => true,
            'likes' => $newLikeCount
        ]);

    } catch (\Exception $e) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Erreur lors de l\'ajout du like',
            'error' => $e->getMessage()
        ]);
    }
}

}
