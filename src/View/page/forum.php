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
        <div class="post fade-in">
            <div class="post-header">
                <div class="user-avatar">MG</div>
                <div class="post-info">
                    <div class="username">MaxGamer</div>
                    <div class="post-time">Il y a 2 heures</div>
                </div>
            </div>
            <div class="post-content">
                <div class="post-title">Nouveau jeu indé découvert : "Pixel Adventures"</div>
                <div class="post-text">Salut la communauté ! Je viens de découvrir ce petit jeu indépendant absolument génial. Le gameplay est fluide, les graphismes pixel art sont magnifiques et la bande sonore est addictive. Quelqu'un d'autre l'a testé ? J'aimerais avoir vos avis !</div>
            </div>
            <div class="post-actions">
                <button class="action-btn like-btn" onclick="toggleLike(this)">
                    <span>❤️</span>
                    <span class="like-count">12</span>
                </button>
                <button class="action-btn comment-btn" onclick="toggleComments(this)">
                    <span>💬</span>
                    <span>5 commentaires</span>
                </button>
            </div>
            <div class="comments-section">
                <div class="comment">
                    <div class="comment-header">
                        <div class="comment-avatar">LP</div>
                        <div class="comment-username">PixelPro</div>
                        <div class="comment-time">Il y a 1 heure</div>
                    </div>
                    <div class="comment-text">Je l'ai aussi testé ! Complètement d'accord, c'est un petit bijou. Le level design est vraiment bien pensé 👍</div>
                </div>
                <div class="comment">
                    <div class="comment-header">
                        <div class="comment-avatar">GQ</div>
                        <div class="comment-username">GameQueen</div>
                        <div class="comment-time">Il y a 45 min</div>
                    </div>
                    <div class="comment-text">Merci pour la recommandation ! Je vais le télécharger ce soir 🎮</div>
                </div>
                <div class="add-comment">
                    <input type="text" class="comment-input" placeholder="Ajoutez votre commentaire...">
                    <button class="comment-submit">Envoyer</button>
                </div>
            </div>
        </div>

        <div class="post fade-in">
            <div class="post-header">
                <div class="user-avatar">RC</div>
                <div class="post-info">
                    <div class="username">RetroCollector</div>
                    <div class="post-time">Il y a 4 heures</div>
                </div>
            </div>
            <div class="post-content">
                <div class="post-title">Ma collection rétro s'agrandit !</div>
                <div class="post-text">Je viens de récupérer une Game Boy Color en parfait état avec Pokémon Or ! La nostalgie est au rendez-vous 😍 Quels sont vos jeux rétro préférés ? Et avez-vous des conseils pour bien conserver les cartouches ?</div>
            </div>
            <div class="post-actions">
                <button class="action-btn like-btn" onclick="toggleLike(this)">
                    <span>❤️</span>
                    <span class="like-count">8</span>
                </button>
                <button class="action-btn comment-btn" onclick="toggleComments(this)">
                    <span>💬</span>
                    <span>3 commentaires</span>
                </button>
            </div>
            <div class="comments-section">
                <div class="comment">
                    <div class="comment-header">
                        <div class="comment-avatar">VG</div>
                        <div class="comment-username">VintageGamer</div>
                        <div class="comment-time">Il y a 2 heures</div>
                    </div>
                    <div class="comment-text">Super trouvaille ! Pour les cartouches, évite l'humidité et nettoie les contacts délicatement avec de l'alcool isopropylique 👌</div>
                </div>
                <div class="add-comment">
                    <input type="text" class="comment-input" placeholder="Ajoutez votre commentaire...">
                    <button class="comment-submit">Envoyer</button>
                </div>
            </div>
        </div>

        <div class="post fade-in">
            <div class="post-header">
                <div class="user-avatar">SG</div>
                <div class="post-info">
                    <div class="username">SpeedGamer</div>
                    <div class="post-time">Il y a 6 heures</div>
                </div>
            </div>
            <div class="post-content">
                <div class="post-title">Tournoi speedrun ce weekend !</div>
                <div class="post-text">Salut les speedrunners ! J'organise un petit tournoi amical ce weekend sur Super Mario Bros. Catégorie Any% ! Qui est chaud pour participer ? On streamera sur Twitch et il y aura peut-être des petits prix à gagner 🏆</div>
            </div>
            <div class="post-actions">
                <button class="action-btn like-btn" onclick="toggleLike(this)">
                    <span>❤️</span>
                    <span class="like-count">15</span>
                </button>
                <button class="action-btn comment-btn" onclick="toggleComments(this)">
                    <span>💬</span>
                    <span>7 commentaires</span>
                </button>
            </div>
            <div class="comments-section">
                <div class="add-comment">
                    <input type="text" class="comment-input" placeholder="Ajoutez votre commentaire...">
                    <button class="comment-submit">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    <button class="floating-action" onclick="scrollToTop()">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</div>

<script src="/asset/js/forum.js"></script>
<?php
$page_script = '/asset/js/header.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>