<?php
require_once ROOTPATH . "src/View/template/header.php";

var_dump ($_SESSION['user']);
?>


<div class="container-body">
    <div class="page-title">
        <h1>Tous nos jeux</h1>
        <p>Découvrez notre collection de plus de 5000 jeux de société</p>
    </div>

    <div class="filters-section">
        <div class="search-bar">
            <input type="text" id="searchInput" class="search-input" placeholder="Rechercher un jeu, un éditeur, un auteur...">
            <button id="searchBtn" class="btn search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <div class="filters-grid">
            <div class="filter-group">
                <label class="filter-label">Catégorie</label>
                <select class="filter-select" id="categoryFilter">
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

            <div class="filter-group">
                <label class="filter-label">Nombre de joueurs</label>
                <select class="filter-select" id="nbGamerFilter">
                    <option value="">Tous</option>
                    <option value="1-4">1 à 4 joueurs</option>
                    <option value="1-5">1 à 5 joueurs</option>
                    <option value="1-5">1 à 6 joueurs</option>
                    <option value="1-7">1 à 7 joueurs</option>
                    <option value="1-8">1 à 8 joueurs</option>
                    <option value="2-4">2 à 4 joueurs</option>
                    <option value="2-5">2 à 5 joueurs</option>
                    <option value="2-6">2 à 6 joueurs</option>
                    <option value="2-7">2 à 7 joueurs</option>
                    <option value="2-8">2 à 8 joueurs</option>
                    <option value="2-10">2 à 10 joueurs</option>
                    <option value="2-16">2 à 16 joueurs</option>
                    <option value="3-4">3 à 4 joueurs</option>
                    <option value="3-6">3 à 6 joueurs</option>
                    <option value="3-7">3 à 7 joueurs</option>
                    <option value="3-8">3 à 8 joueurs</option>
                    <option value="3-10">3 à 10 joueurs</option>
                    <option value="3-12">3 à 12 joueurs</option>
                    <option value="3-16">3 à 16 joueurs</option>
                    <option value="4">4 joueurs</option>
                    <option value="4-7">4 à 7 joueurs</option>
                    <option value="4-8">4 à 8 joueurs</option>
                    <option value="4-9">4 à 9 joueurs</option>
                    <option value="4-12">4 à 12 joueurs</option>
                    <option value="5-10">5 à 10 joueurs</option>
                    <option value="6-20">6 à 20 joueurs</option>
                    <option value="8-18">8 à 18 joueurs</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">Âge</label>
                <select class="filter-select" id="ageFilter">
                    <option value="">Tous âges</option>
                    <option value="6+">6+ ans</option>
                    <option value="7+">7+ ans</option>
                    <option value="8+">8+ ans</option>
                    <option value="10+">10+ ans</option>
                    <option value="12+">12+ ans</option>
                    <option value="14+">14+ ans</option>
                    <option value="16+">16+ ans</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">Durée</label>
                <select class="filter-select" id="durationFilter">
                    <option value="">Toutes durées</option>
                    <option value="15 min">15 min</option>
                    <option value="20 min">20 min</option>
                    <option value="20-40 min">20 à 40 min</option>
                    <option value="25 min">25 min</option>
                    <option value="30 min">30 min</option>
                    <option value="30-45 min">30 à 45 min</option>
                    <option value="30-60 min">30 à 60 min</option>
                    <option value="45 min">45 min</option>
                    <option value="45-90 min">45 à 90 min</option>
                    <option value="60-90 min">1h à 1h30h</option>
                    <option value="90 min">1h30</option>
                    <option value="90-120 min">1h30 à 2h</option>
                    <option value="120 min">2h</option>
                    <option value="120-180 min">2h 2h30</option>
                    <option value="180 min">2h30</option>
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
        </select>
    </div>

    <div class="games-grid" id="game-list">
        <?php foreach ($games as $game): ?>
            <?php include ROOTPATH . 'src/View/template/game_item.php'; ?>
        <?php endforeach; ?>

    </div>
    <div class="load-more">
        <button class="load-more-btn" id="load-more-btn" data-offset="10">Charger plus de jeux</button>
    </div>

    <!--MODAL AJOUT DANS WISHLIST-->
    <?php include ROOTPATH . 'src/View/template/modal_list.php'; ?>
    



</div>

<script src="/asset/js/header.js"></script>
<script src="/asset/js/games.js"></script>
<script src="/asset/js/modalList.js"></script>
<?php
require_once ROOTPATH . "src/View/template/footer.php";
?>