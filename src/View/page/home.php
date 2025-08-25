<?php

require_once ROOTPATH . "src/View/template/header.php";
?>

<main>
    <section class="hero">
        <div class="container">
            <h1>Découvrez votre prochain jeu coup de cœur</h1>
            <p>Plus de 5000 jeux de société référencés, notés et recommandés par la communauté</p>
            <div class="cta-buttons">
                <a href="/games" class="btn btn-primary">Explorer les jeux</a>
                <a href="/register" class="btn btn-secondary">Créer mon profil</a>
            </div>
        </div>
    </section>

    <section class="filters-section container-body">
        <h2 class="filters-title">Trouvez le jeu parfait</h2>
        <div class="filters-grid">
            <div class="filter-group">
                <label>Genre</label>
                <select>
                    <option>Tous les genres</option>
                    <option>Stratégie</option>
                    <option>Coopératif</option>
                    <option>Familial</option>
                    <option>Party Game</option>
                    <option>Deck Building</option>
                </select>
            </div>
            <div class="filter-group">
                <label>Nombre de joueurs</label>
                <select>
                    <option>Tous</option>
                    <option>1 joueur</option>
                    <option>2 joueurs</option>
                    <option>3-4 joueurs</option>
                    <option>5+ joueurs</option>
                </select>
            </div>
            <div class="filter-group">
                <label>Durée</label>
                <select>
                    <option>Toutes durées</option>
                    <option>
                        < 30 min</option>
                    <option>30-60 min</option>
                    <option>60-120 min</option>
                    <option>120+ min</option>
                </select>
            </div>
            <div class="filter-group">
                <label>Âge</label>
                <select>
                    <option>Tous âges</option>
                    <option>6+ ans</option>
                    <option>10+ ans</option>
                    <option>14+ ans</option>
                    <option>18+ ans</option>
                </select>
            </div>
        </div>
    </section>

    <section class="featured-section">
        <div class="container-body">
            <h2 class="section-title">Jeux populaires cette semaine</h2>
            <div class="games-grid" id="game-list">
                <?php foreach (array_slice($games, 0, 3) as $game): ?>
                    <?php include ROOTPATH . 'src/View/template/game_item.php'; ?>
                <?php endforeach; ?>
            </div>
    </section>

    <section class="stats-section">
        <div class="container-body">
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">5,247</span>
                    <span class="stat-label">Jeux référencés</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">42,891</span>
                    <span class="stat-label">Avis joueurs</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">15,634</span>
                    <span class="stat-label">Membres actifs</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Satisfaction</span>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-section">
        <div class="container-body">
            <h2 class="section-title">Nouveautés du mois</h2>
            <div class="games-grid">
                <div class="game-card">
                    <div class="game-image">🦸</div>
                    <div class="game-info">
                        <div class="game-title">Marvel United</div>
                        <div class="game-meta">
                            <span>1-4 joueurs</span>
                            <span>40-60 min</span>
                            <span>14+ ans</span>
                        </div>
                        <div class="rating">
                            <span class="stars">★★★★☆</span>
                            <span>4.3 (892 avis)</span>
                        </div>
                        <div class="game-tags">
                            <span class="tag">Coopératif</span>
                            <span class="tag">Super-héros</span>
                            <span class="tag">Figurines</span>
                        </div>
                    </div>
                </div>

                <div class="game-card">
                    <div class="game-image">🌊</div>
                    <div class="game-info">
                        <div class="game-title">Cascadia</div>
                        <div class="game-meta">
                            <span>1-4 joueurs</span>
                            <span>30-45 min</span>
                            <span>10+ ans</span>
                        </div>
                        <div class="rating">
                            <span class="stars">★★★★★</span>
                            <span>4.9 (1,247 avis)</span>
                        </div>
                        <div class="game-tags">
                            <span class="tag">Placement</span>
                            <span class="tag">Nature</span>
                            <span class="tag">Puzzle</span>
                        </div>
                    </div>
                </div>

                <div class="game-card">
                    <div class="game-image">⚔️</div>
                    <div class="game-info">
                        <div class="game-title">Gloomhaven</div>
                        <div class="game-meta">
                            <span>1-4 joueurs</span>
                            <span>90-150 min</span>
                            <span>14+ ans</span>
                        </div>
                        <div class="rating">
                            <span class="stars">★★★★★</span>
                            <span>4.9 (5,687 avis)</span>
                        </div>
                        <div class="game-tags">
                            <span class="tag">Coopératif</span>
                            <span class="tag">RPG</span>
                            <span class="tag">Campagne</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php
$page_script = '/asset/js/header.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>