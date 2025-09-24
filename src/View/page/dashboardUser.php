<?php
require_once ROOTPATH . "src/View/template/header.php";
?>


<div class="dashboard-container">
    <div class="dashboard-header">
        <h1><i class="fa-solid fa-puzzle-piece" style="color: #B197FC;"></i></i> Mon Espace Gameez <i class="fa-solid fa-puzzle-piece" style="color: #B197FC;"></i></i></h1>
        <p>Gérez votre profil et vos wishlists de jeux de société</p>
    </div>

    <div class="dashboard-grid">
        <!-- Profil utilisateur -->
        <div class="card profile-card">
            <div class="card-header">
                <h2>👤 Mon Profil</h2>
                <button class="edit-btn">
                    ✏️ Modifier
                </button>
            </div>

            <div class="profile-info">
                <div class="info-group">
                    <div class="info-label">Email</div>
                    <div class="info-value" id="email-display"><?= htmlspecialchars($user['user_mail']) ?></div>
                    <div class="info-value hidden" id="email-edit">
                        <input type="email" value="gamemaster@email.com" id="email-input">
                    </div>
                </div>

                <div class="info-group">
                    <div class="info-label">Prénom</div>
                    <div class="info-value" id="firstname-display"><?= htmlspecialchars($user['user_name']) ?></div>
                    <div class="info-value hidden" id="firstname-edit">
                        <input type="text" value="Alexandre" id="firstname-input">
                    </div>
                </div>

                <div class="info-group">
                    <div class="info-label">Nom</div>
                    <div class="info-value" id="lastname-display"><?= htmlspecialchars($user['user_lastname']) ?></div>
                    <div class="info-value hidden" id="lastname-edit">
                        <input type="text" value="Martin" id="lastname-input">
                    </div>
                </div>

                <div class="info-group">
                    <div class="info-label">Date de naissance</div>
                    <div class="info-value"><?= date('d/m/Y', strtotime($user['user_dob'])) ?></div>
                </div>

            </div>

            <div class="action-buttons hidden" id="actionButtons">
                <button class="btn-save" onclick="saveChanges()">
                    💾 Sauvegarder
                </button>
                <button class="btn-cancel" onclick="cancelEdit()">
                    ❌ Annuler
                </button>
            </div>
        </div>

        <!-- Wishlists -->
        <div class="card wishlist-card">
            <div class="card-header">
                <h2>❤️ Mes Wishlists</h2>
            </div>

            <button class="add-wishlist-btn">
                ➕ Nouvelle Wishlist
            </button>

            <?php foreach ($lists as $list): ?>
                <div class="wishlist-item">
                    <div class="wishlist-header">
                        <div class="wishlist-name"><?= htmlspecialchars($list['list_name']) ?></div>
                        <div class="wishlist-count"><?= count($list['games']) ?> jeux</div>
                    </div>
                    <div class="wishlist-games">
                        <?php foreach ($list['games'] as $index => $game): ?>
                            <?php if ($index < 3): ?>
                                <?php if (!empty($game['id_game'])): ?>
                                    <div class="game-preview"><?= htmlspecialchars($game['game_name']) ?></div>
                                <?php elseif (!empty($game['id_extension'])): ?>
                                    <div class="game-preview"><?= htmlspecialchars($game['extension_name']) ?></div>
                                <?php endif ?>
                            <?php elseif ($index === 3): ?>
                                <div class="game-preview">+<?= count($list['games']) - 3 ?> autres</div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <!-- Statistiques -->
        <div class="card stats-card">
            <div class="card-header">
                <h2>📊 Mes Statistiques</h2>
            </div>

            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number"><?= $nb_list ?></div>
                    <div class="stat-label">Wishlists actives</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?= $nb_games ?></div>
                    <div class="stat-label">Jeux en wishlist</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?= $nb_review ?></div>
                    <div class="stat-label">Jeux notés</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?= $average_notes ?></div>
                    <div class="stat-label">Note moyenne</div>
                </div>
            </div>
        </div>


        <!-- Section Mes avis -->
        <div class="card review-card">
            <div class="card-header">
                <h2><i class="fa-solid fa-star" style="color: #FFD43B;"> </i> Mes avis</h2>
            </div>

            <div class="review">
                <?php foreach ($reviews as $review): ?>
                    <?php $rating = (int)$review['review_note']; ?>
                    <!-- Liste des avis -->
                    <div class="reviews-container">
                        <div class="review-card" data-rating="<?= $rating ?>">
                            <div class="review-header">
                                <div class="review-game-info">
                                    <?php if ($review['id_game']): ?>
                                        <h3 class="game-name"><?= $review['game_name'] ?></h3>
                                    <?php elseif ($review['id_extension']): ?>
                                        <h3 class="game-name"><?= $review['extension_name'] ?></h3>
                                    <?php endif ?>
                                </div>
                                <div class="review-rating">
                                    <div class="stars-display">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($i <= $rating): ?>
                                                <i class="fa-solid fa-star star-filled"></i>
                                            <?php else: ?>
                                                <i class="fa-regular fa-star star-empty"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="review-comment">
                                <div class="comment-bubble">
                                    <p><i class="fa-solid fa-quote-left"></i> <?= $review['review_comment'] ?> <i class="fa-solid fa-quote-right"></i></p>
                                </div>
                            </div>

                            <div class="review-actions">
                                <button class="action-btn edit-btn" onclick="editReview(1)">
                                    <i class="fa-solid fa-edit"></i> Modifier
                                </button>
                                <button class="action-btn delete-btn" onclick="editReview(1)">
                                    <i class="fa-solid fa-edit"></i> Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<script src="/asset/js/header.js"></script>
<script src="/asset/js/dashboardUser.js"></script>

<?php
require_once ROOTPATH . "src/View/template/footer.php"; ?>