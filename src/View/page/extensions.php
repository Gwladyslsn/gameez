<?php
require_once ROOTPATH . "src/View/template/header.php";
$imagePath = '/asset/image/extensions/' . htmlspecialchars($extensionFav['extension_image']);
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
                
                <div class="featured-image"><img src="<?= $imagePath ?>" alt="Image du jeu" class="gameExtension"></div>
                <div class="featured-info">
                    <h3><?= $extensionFav['extension_name'] ?></h3>
                    <div class="featured-base-game">Extension pour • <?= $extensionFav['game_name'] ?></div>
                    <p><?= $extensionFav['extension_description'] ?></p>
                    <div class="featured-highlights">
                        <div class="detail-item">
                            <span class="detail-label">Note moyenne :</span>
                            <span class="detail-value"><?= $extensionFav['avg_rating'] ?? "—"?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Complexité :</span>
                            <span class="detail-value"><?= $extensionFav['complexity'] ?> /5</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Sortie le :</span>
                            <span class="detail-value"><?= $extensionFav['release_date']?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search-and-filters">
        <div class="search-bar">
            <input type="text" id ="searchInputExt" class="search-input" placeholder="Rechercher une extension..." id="searchInput">
            <button id="searchExt" class="search-btn">🔍 Rechercher</button>
        </div>
        <div class="filters">
            <button class="filter-btn" id="allExt">Toutes</button>
            <button class="filter-btn" id="newExt">Ajouté recemment</button>
            <button class="filter-btn" id="complexExt">Complexe</button>
            <button class="filter-btn" id="bestExt">Meilleur note</button>
        </div>
    </div>

    <div class="extensions-grid" id="extensionsGrid">
        <?php foreach ($extensions as $extension): ?>
            <?php include ROOTPATH . 'src/View/template/extension_item.php'; ?>
        <?php endforeach; ?>
    </div>

</div>

<!--MODAL AJOUT DANS WISHLIST-->
    <?php include ROOTPATH . 'src/View/template/modal_list.php'; ?>
    <!--MODAL AJOUT AVIS-->
    <?php include ROOTPATH . 'src/View/template/modal_review.php'; ?>


<script src="/asset/js/modal.js"></script>
<script src="/asset/js/extension.js"></script>
<?php
$page_script = '/asset/js/header.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>