<?php

require_once ROOTPATH . "src/View/template/header.php";

?>

<div class="container-forum">
    <div class="header-forum">
        <h1><i class="fa-solid fa-dice"></i> Communauté Gameez <i class="fa-solid fa-dice"></i></h1>
        <p>Partagez votre passion pour les jeux vidéo avec la communauté</p>
    </div>

    <div class="create-post-section">
        <form class="create-post-form">
            <input type="text" class="create-post-input" placeholder="Titre de votre post..." required>
            <textarea class="create-post-input create-post-textarea" placeholder="Partagez votre expérience, vos découvertes, vos questions..." required></textarea>
            <button type="submit" class="create-post-btn">🚀 Publier</button>
        </form>
    </div>

    <div class="posts-container">
        <?php foreach($posts as $post): ?>
<div class="post fade-in">
    <div class="post-header">
        <div class="user-avatar"><?= $post['author']['avatar'] ?></div>
        <div class="post-info">
            <div class="username"><?= $post['author']['username'] ?></div>
            <div class="post-time"><?= $post['created_at'] ?></div>
        </div>
    </div>
    <div class="post-content">
        <div class="post-title"><?= htmlspecialchars($post['title']) ?></div>
        <div class="post-text"><?= nl2br(htmlspecialchars($post['content'])) ?></div>
    </div>
    <div class="post-actions">
        <form method="POST">
            <input type="hidden" name="post_id" value="<?= $post['_id'] ?>">
            <button type="submit" name="like_post" class="action-btn like-btn">
                ❤️ <span class="like-count"><?= $post['likes'] ?></span>
            </button>
        </form>
        <button class="action-btn comment-btn">💬 <?= count($post['replies']) ?> commentaires</button>
    </div>
    <!-- commentaires -->
    <div class="comments-section">
        <?php foreach($post['replies'] ?? [] as $comment): ?>
        <div class="comment">
            <div class="comment-header">
                <div class="comment-avatar"><?= $comment['author']['avatar'] ?></div>
                <div class="comment-username"><?= $comment['author']['username'] ?></div>
                <div class="comment-time"><?= $comment['created_at'] ?></div>
            </div>
            <div class="comment-text"><?= htmlspecialchars($comment['content_comment']) ?></div>
        </div>
        <?php endforeach; ?>

        <form method="POST" class="add-comment">
            <input type="hidden" name="post_id" value="<?= $post['_id'] ?>">
            <input type="text" name="comment_content" class="comment-input" placeholder="Ajoutez votre commentaire..." required>
            <button name="add_comment" class="reply-btn">Envoyer</button>
        </form>
    </div>
</div>
<?php endforeach; ?>

    </div>

    <button class="floating-action" onclick="scrollToTop()">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</div>

<script src="/asset/js/forum.js"></script>
<?php
$page_script = '/asset/js/header.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>