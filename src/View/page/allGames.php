<?php
require_once ROOTPATH . "src/View/template/header.php";


?>


<div class="container-body">
    <div class="page-title">
        <h1>Tous nos jeux</h1>
        <p>Découvrez notre collection de plus de 5000 jeux de société</p>
    </div>

    <div class="filters-section">
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Rechercher un jeu, un éditeur, un auteur...">
        </div>

        <div class="filters-grid">
            <div class="filter-group">
                <label class="filter-label">Catégorie</label>
                <select class="filter-select">
                    <option>Toutes les catégories</option>
                    <option>Stratégie</option>
                    <option>Famille</option>
                    <option>Coopératif</option>
                    <option>Ambiance</option>
                    <option>Expert</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">Nombre de joueurs</label>
                <select class="filter-select">
                    <option>Tous</option>
                    <option>1 joueur</option>
                    <option>2 joueurs</option>
                    <option>3-4 joueurs</option>
                    <option>5+ joueurs</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">Âge</label>
                <select class="filter-select">
                    <option>Tous âges</option>
                    <option>6+ ans</option>
                    <option>8+ ans</option>
                    <option>10+ ans</option>
                    <option>12+ ans</option>
                    <option>14+ ans</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">Durée</label>
                <select class="filter-select">
                    <option>Toutes durées</option>
                    <option>Moins de 30 min</option>
                    <option>30-60 min</option>
                    <option>60-120 min</option>
                    <option>Plus de 2h</option>
                </select>
            </div>
        </div>
    </div>

    <div class="results-info">
        <span><?= $nbGames ?> jeux trouvés</span>
        <select class="sort-select">
            <option>Trier par popularité</option>
            <option>Trier par note</option>
            <option>Trier par nom</option>
            <option>Trier par date de sortie</option>
        </select>
    </div>

    <div class="games-grid" id="game-list">
        <?php foreach ($games as $game): ?>
            <?php include ROOTPATH . 'src/View/template/game_item.php'; ?>
        <?php endforeach; ?>
    </div>

    <div class="load-more">
        <button class="load-more-btn" id ="load-more-btn" data-offset="10">Charger plus de jeux</button>
    </div>
</div>

<script src="/asset/js/header.js"></script>
<script src="/asset/js/games.js"></script>
<?php
require_once ROOTPATH . "src/View/template/footer.php"; 
?>