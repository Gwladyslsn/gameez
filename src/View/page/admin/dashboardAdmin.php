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
                            <span class="icon-trending"></span>
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
                                        <span class="star">★</span>
                                        <span><?= $topGame['average_rating'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php $rank++; ?>
                        <?php endforeach ?>

                    </div>

                    <div class="top-games-card">
                        <h3 class="top-games-title">
                            <span class="star">★</span>
                            Top 5 - Plus en wishlist
                        </h3>
                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">1</div>
                                <span>Baldur's Gate 3</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">2,341 wishlists</div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">2</div>
                                <span>Starfield</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">2,156 wishlists</div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">3</div>
                                <span>Spider-Man 2</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">1,987 wishlists</div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">4</div>
                                <span>Final Fantasy XVI</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">1,834 wishlists</div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">5</div>
                                <span>Diablo IV</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">1,723 wishlists</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Games Management Tab -->
            <div id="games" class="tab-content">
                <div class="section-header">
                    <button class="btn-primary">
                        <span class="icon-plus"></span>
                        Ajouter un jeu
                    </button>
                </div>

                <div class="games-table-container">
                    <div class="table-header">
                        <h3>Jeux récents</h3>
                        <div class="filters">
                            <select class="filter-select">
                                <option>Tous les statuts</option>
                                <option>Publié</option>
                                <option>Brouillon</option>
                            </select>
                            <select class="filter-select">
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
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>The Witcher 3</td>
                                <td>RPG</td>
                                <td><span class="status-badge published">Publié</span></td>
                                <td>2024-08-20</td>
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
                            <tr>
                                <td>Cyberpunk 2077</td>
                                <td>Action</td>
                                <td><span class="status-badge published">Publié</span></td>
                                <td>2024-08-19</td>
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
                            <tr>
                                <td>Elden Ring</td>
                                <td>RPG</td>
                                <td><span class="status-badge draft">Brouillon</span></td>
                                <td>2024-08-18</td>
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
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Reviews Tab -->
            <div id="reviews" class="tab-content">
                <div class="reviews-header">
                    <span class="pending-badge">3 avis en attente</span>
                </div>

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <h4 class="review-game-title">The Witcher 3</h4>
                            <div class="review-meta">
                                <span class="review-user">Par Alex123</span>
                                <div class="review-rating">
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span>(5/5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-date">
                            <span class="icon-clock"></span>
                            2024-08-24
                        </div>
                    </div>
                    <p class="review-comment">Jeu absolument fantastique avec une histoire incroyable et un monde ouvert magnifique. Les quêtes secondaires sont aussi intéressantes que la quête principale.</p>
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

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <h4 class="review-game-title">Cyberpunk 2077</h4>
                            <div class="review-meta">
                                <span class="review-user">Par Gamer456</span>
                                <div class="review-rating">
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star empty">★</span>
                                    <span class="star empty">★</span>
                                    <span>(3/5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-date">
                            <span class="icon-clock"></span>
                            2024-08-24
                        </div>
                    </div>
                    <p class="review-comment">Beaucoup de bugs au lancement mais l'univers est vraiment cool. Les graphismes sont impressionnants sur une bonne config.</p>
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

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <h4 class="review-game-title">Elden Ring</h4>
                            <div class="review-meta">
                                <span class="review-user">Par RPGFan</span>
                                <div class="review-rating">
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span>(5/5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-date">
                            <span class="icon-clock"></span>
                            2024-08-23
                        </div>
                    </div>
                    <p class="review-comment">Meilleur FromSoftware à ce jour ! L'exploration est addictive et les boss sont épiques. Un chef-d'œuvre du jeu vidéo.</p>
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
<?php
require_once ROOTPATH . "src/View/template/footer.php";
?>