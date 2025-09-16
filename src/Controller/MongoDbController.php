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
        
        $userId = $_SESSION['user'] ;
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_comment'])) {
            $postId = $_POST['post_id'];
            $content = $_POST['comment_content'];
            $userId = $_SESSION['id_user'];
            $username = $_SESSION['username'];

            $this->mongoRepository->addComment($postId, $content, $userId, $username);
            header("Location: /forum");
            exit;
        }
    }

    // Like un post
    public function likePost(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like_post'])) {
            $postId = $_POST['post_id'];
            $this->mongoRepository->likePost($postId);
            header("Location: /forum");
            exit;
        }
    }
}

