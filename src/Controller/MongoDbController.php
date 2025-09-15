<?php
namespace App\Controller;

use App\Repository\MongoRepository;

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_post'])) {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $userId = $_SESSION['user_id'];
            $username = $_SESSION['username'];

            $this->mongoRepository->createPost($title, $content, $userId, $username);
            header("Location: /forum"); // redirection pour éviter double POST
            exit;
        }
    }

    // Ajouter un commentaire
    public function addComment(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_comment'])) {
            $postId = $_POST['post_id'];
            $content = $_POST['comment_content'];
            $userId = $_SESSION['user_id'];
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

