<?php
require_once ROOTPATH . "src/View/template/header.php";
?>


<div class="container-extensions">
    <div class="header-extensions">
        <h1>🎲 Extensions de Jeux</h1>
        <p>Découvrez les extensions qui enrichissent vos jeux de société favoris avec de nouvelles mécaniques, personnages et aventures</p>
    </div>

    <div class="featured-section">
        <h2 class="section-title">⭐ Extension Coup de Cœur</h2>
        <div class="featured-card fade-in">
            <div class="featured-content">
                <div class="featured-image">🏴‍☠️</div>
                <div class="featured-info">
                    <h3>Pirates & Corsaires</h3>
                    <div class="featured-base-game">Extension pour • Les Aventuriers du Rail</div>
                    <p>Embarquez pour des aventures en haute mer ! Cette extension ajoute des routes maritimes, des cartes trésor et de nouveaux défis pirates. Naviguez entre les îles et découvrez des trésors cachés.</p>
                    <div class="featured-highlights">
                        <span class="highlight">🚢 Routes maritimes</span>
                        <span class="highlight">💰 Cartes trésor</span>
                        <span class="highlight">🗺️ Nouvelles cartes</span>
                    </div>
                </div>
                <button class="featured-wishlist" onclick="addToWishlist('Pirates & Corsaires')">
                    💝 Ajouter à ma liste
                </button>
            </div>
        </div>
    </div>

    <div class="search-and-filters">
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Rechercher une extension..." id="searchInput">
            <button class="search-btn" onclick="searchExtensions()">🔍 Rechercher</button>
        </div>
        <div class="filters">
            <button class="filter-btn active" data-category="all">🌟 Toutes</button>
            <button class="filter-btn" data-category="strategy">♟️ Stratégie</button>
            <button class="filter-btn" data-category="adventure">🗺️ Aventure</button>
            <button class="filter-btn" data-category="family">👨‍👩‍👧‍👦 Famille</button>
            <button class="filter-btn" data-category="thematic">🎭 Thématique</button>
            <button class="filter-btn" data-category="cooperative">🤝 Coopératif</button>
        </div>
    </div>

    <div class="extensions-grid" id="extensionsGrid">
            <?php foreach ($extensions as $extension): ?>
                <?php include ROOTPATH . 'src/View/template/extension_item.php'; ?>
        <?php endforeach; ?>
    </div>

</div>


<script src="/asset/js/forum.js"></script>
<?php
$page_script = '/asset/js/header.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>