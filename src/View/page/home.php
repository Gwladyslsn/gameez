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



    <section class="featured-section">
        <div class="container-body">
            <h2 class="section-title">Jeux populaires cette semaine</h2>
            <div class="games-grid" id="game-list">
                <?php foreach (array_slice($popularGames, 0, 6) as $popularGame): ?>
                    <?php require ROOTPATH . 'src/View/template/popular_game_item.php'; ?>
                <?php endforeach; ?>
            </div>
    </section>

    <section class="stats-section">
        <div class="container-body">
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number"><?= $nbGames ?></span>
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
            </div>
        </div>
    </section>

    <section class="featured-section">
        <div class="container-body">
            <h2 class="section-title">Nouveautés du mois</h2>
            <div class="games-grid" id="new-game-list">
                <?php foreach (array_slice($newGames, 0, 3) as $newGame): ?>
                    <?php require ROOTPATH . 'src/View/template/new_game_item.php'; ?>
                <?php endforeach; ?>
            </div>
    </section>
</main>

<div class="cta-buttons">
    <a href="/games" class="btn btn-primary">Explorer les jeux</a>
    <a href="/register" class="btn btn-secondary">Créer mon profil</a>
</div>


<?php
$page_script = '/asset/js/header.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>