<?php
require_once ROOTPATH . 'src/View/template/headerAdmin.php';
?>

<!-- Main Content -->
<main class="main-content">
    <section>
        <div class="container">
            <!-- Overview Tab -->
            <div id="overview" class="tab-content active">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-card-title">Total des jeux</div>
                                <div class="stat-card-value"><?= $stats['total_games'] ?></div>
                            </div>
                            <div class="stat-card-icon games">
                                <span><i class="fa-solid fa-gamepad" style="color: #ff9a9e;"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-card-title">Utilisateurs actifs</div>
                                <div class="stat-card-value"><?= $stats['total_users'] ?></div>
                            </div>
                            <div class="stat-card-icon users">
                                <span><i class="fa-solid fa-person" style="color: #74C0FC;"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-card-title">Total des avis</div>
                                <div class="stat-card-value"><?= $stats['total_reviews'] ?></div>
                            </div>
                            <div class="stat-card-icon reviews">
                                <span><i class="fa-solid fa-comment" style="color: #f0f1f3;"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-card-title">Note moyenne des jeux</div>
                                <div class="stat-card-value"><?= $stats['avg_review'] ?> /5</div>
                            </div>
                            <div class="stat-card-icon clicks">
                                <span><i class="fa-solid fa-ranking-star" style="color: #FFD43B;"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Games Section -->
                <div class="top-games-grid">
                    <div class="top-games-card">
                        <h3 class="top-games-title">
                            <span><i class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                            Top 5 - Meilleur note
                        </h3>
                        <?php $rank = 1; ?>
                        <?php foreach ($topGames as $topGame): ?>
                            <div class="game-item">
                                <div class="game-info">
                                    <div class="game-rank clicks"><?= $rank ?></div>
                                    <span><?= $topGame['game_name'] ?></span>
                                </div>
                                <div class="game-stats">
                                    <div class="game-value"><?= $topGame['review_count'] ?> avis</div>
                                    <div class="game-rating">
                                        <span><i class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                                        <span><?= $topGame['average_rating'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php $rank++; ?>
                        <?php endforeach ?>

                    </div>

                    <div class="top-games-card">
                        <h3 class="top-games-title">
                            <span><i class="fa-solid fa-flag" style="color: #B197FC;"></i></span>
                            Top 5 - Plus en wishlist
                        </h3>
                        <?php $rank = 1; ?>
                        <?php foreach ($topWishlistGames as $topWishlistGame): ?>
                            <div class="game-item">
                                <div class="game-info">
                                    <div class="game-rank wishlists">1</div>
                                    <span><?= $topWishlistGame['game_name'] ?></span>
                                </div>
                                <div class="game-stats">
                                    <div class="game-value"><?= $topWishlistGame['list_count'] ?> listes</div>
                                </div>
                            </div>
                            <?php $rank++; ?>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>

            <!-- Games Management Tab -->
            <div id="games" class="tab-content">
                <div class="section-header">
                    <button class="btn-primary" id="new-game">
                        <span class="icon-plus"></span>
                        Ajouter un jeu
                    </button>
                    <button class="btn-primary" id="new-extension">
                        <span class="icon-plus"></span>
                        Ajouter une extension
                    </button>
                </div>

                <!--MODAL AJOUT JEU-->
                <div id="modal-add-game" class="modal modalGame hidden">
                    <div class="modal-content-game">
                        <span class="close">&times;</span>
                        <h3 class="text-black text-center mb-4">Ajouter un jeu</h3>
                        <form id="form-game" method="post">

                            <div class="mb-4">
                                <label for="game_name" class="text-black">Nom du jeu</label>
                                <textarea id="game_name" name="game_name" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="game_duration" class="text-black">Durée</label>
                                <textarea id="game_duration" name="game_duration" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="nb_gamer" class="text-black">Nombre de joueur</label>
                                <textarea id="nb_gamer" name="nb_gamer" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="age_gamer" class="text-black">Age minimum</label>
                                <textarea id="age_gamer" name="age_gamer" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="image" class="text-black">Image</label>
                                <img id="preview-game" src="/asset/image/jeux/game-default.png" alt="Illustration du jeu" class="image-game">
                                <input type="file" id="file-game" name="image" accept="image/*" class="hidden">
                                <button type="button" id="btn-img-game"
                                    class="button-image">
                                    Choisir une image
                                </button>
                            </div>
                            <div class="mb-4">
                                <label for="game_description" class="text-black">Description</label>
                                <textarea id="game_description" name="game_description" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="id_category" class="text-black">Catégorie</label>
                                <select id="id_category" class="select-modal" name="id_category">
                                    <option>Choisir une categorie</option>
                                    <option value="1">Stratégie</option>
                                    <option value="2">Ambiance</option>
                                    <option value="3">Cartes</option>
                                    <option value="4">Dés</option>
                                    <option value="5">Rôles</option>
                                    <option value="6">Cooperatif</option>
                                    <option value="7">Enquêtes</option>
                                    <option value="8">Enfant</option>
                                    <option value="9">Culturel</option>
                                </select>
                            </div>
                            <button id="btn-add-game">Ajouter ce jeux</button>
                        </form>
                    </div>
                </div>


                <!--MODAL AJOUT Extension-->
                <div id="modal-add-extension" class="modal modalGame hidden">
                    <div class="modal-content-game">
                        <span class="close">&times;</span>
                        <h3 class="text-black text-center mb-4">Ajouter un jeu</h3>
                        <form id="form-extension" method="post">

                            <div class="mb-4">
                                <label for="extension_name" class="text-black">Nom du jeu</label>
                                <textarea id="extension_name" name="extension_name" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="complexity_extension" class="text-black">Complexité</label>
                                <input type="number" id="complexity_extension" name="complexity" class="select-modal"
                                    min="1" max="5" step="1">
                            </div>
                            <div class="mb-4">
                                <label for="date" class="text-black">Date de sortie</label>
                                <input type="date" id="release_date" name="release_date" rows="2"></input>
                            </div>
                            <div class="mb-4">
                                <label for="image" class="text-black">Image</label>
                                <img id="preview-extension" src="/asset/image/jeux/game-default.png" alt="Illustration du jeu" class="image-game">
                                <input type="file" id="file-extension" name="image" accept="image/*" class="hidden">
                                <button type="button" id="btn-img-extension"
                                    class="button-image">
                                    Choisir une image
                                </button>
                            </div>
                            <div class="mb-4">
                                <label for="extension_description" class="text-black">Description</label>
                                <textarea id="extension_description" name="extension_description" rows="2"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="id_game" class="text-black">Jeu de base</label>
                                <select id="id_game" class="select-modal" name="id_game">
                                    <option value="">-- Sélectionner un jeu --</option>
                                    <?php foreach ($gamesBase as $game): ?>
                                        <option value="<?= $game->getIdGame() ?>">
                                            <?= $game->getNameGame() ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button id="btn-add-extension">Ajouter ce jeux</button>
                        </form>
                    </div>
                </div>

                <div class="games-table-container">
                    <div class="table-header">
                        <h3>Jeux récents</h3>
                        <div class="filters">
                            <select class="filter-select" id="filter-category">
                                <option value="0">Toutes les catégories</option>
                                <option value="1">Stratégie</option>
                                <option value="2">Ambiance</option>
                                <option value="3">Cartes</option>
                                <option value="4">Dés</option>
                                <option value="5">Rôles</option>
                                <option value="6">Cooperatif</option>
                                <option value="7">Enquêtes</option>
                                <option value="8">Enfant</option>
                                <option value="9">Culturel</option>
                            </select>
                        </div>
                    </div>

                    <table class="games-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="list-games">
                            <?php foreach ($games as $game): ?>
                                <tr>
                                    <td><?= htmlspecialchars($game->getIdGame()) ?></td>
                                    <td><?= htmlspecialchars($game->getNameGame()) ?></td>
                                    <td><?= htmlspecialchars($game->getCategoryName()) ?></td>
                                    <td>Jeu</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-icon btn-edit">
                                                <span class="icon-edit"></span>
                                            </button>
                                            <button class="btn-icon btn-delete">
                                                <span class="icon-delete"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <!-- Reviews Tab -->
            <div id="reviews" class="tab-content">
                <div class="reviews-header">
                    <span class="pending-badge">3 avis en attente</span>
                </div>

                <?php foreach ($reviews as $review): ?>
                    <div class="review-card">
                        <div class="review-header">
                            <div>
                                <h4 class="review-game-title"><?= $review['game_name'] ?></h4>
                                <div class="review-meta">
                                    <span class="review-user"><?= $review['user_name'] ?></span>
                                    <div class="review-rating">
                                        <span></span><i class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                                        <span></span><i class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                                        <span></span><i class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                                        <span></span><i class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                                        <span></span><i class="fa-solid fa-star" style="color: #FFD43B;"></i></span>
                                        <span>(<?= $review['review_note'] ?>/5)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="review-date">
                                <span class="icon-clock"></span>
                                2024-08-24
                            </div>
                        </div>
                        <p class="review-comment"><?= $review['review_comment'] ?></p>
                        <div class="review-actions">
                            <button class="btn-reject">
                                <span class="icon-x"></span>
                                Rejeter
                            </button>
                            <button class="btn-approve">
                                <span class="icon-check"></span>
                                Approuver
                            </button>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <!-- Users Tab -->
            <div id="users" class="tab-content">
                <div class="coming-soon">
                    <p>Section en cours de développement...</p>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="/asset/js/dashboardAdmin.js"></script>
<script src="/asset/js/modalAdmin.js"></script>

<?php
require_once ROOTPATH . "src/View/template/footer.php";
?>