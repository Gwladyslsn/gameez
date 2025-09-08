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
        <div class="extension-card fade-in" data-category="strategy">
            <div class="extension-image">🏰</div>
            <div class="extension-info">
                <h3 class="extension-name">Châteaux & Cathédrales</h3>
                <div class="base-game">Extension pour • Carcassonne</div>
                <p class="extension-description">Construisez des châteaux imposants et des cathédrales majestueuses. Cette extension ajoute 18 nouvelles tuiles et introduit un grand meeple pour renforcer vos revendications territoriales.</p>
            </div>
            <div class="extension-details">
                <div class="detail-item">
                    <span class="detail-label">👥 Joueurs :</span>
                    <span class="detail-value">2-6</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">⏱️ Durée :</span>
                    <span class="detail-value">+15 min</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">🎯 Âge :</span>
                    <span class="detail-value">7+</span>
                </div>
            </div>
            <div class="extension-actions">
                <button class="add-to-wishlist">Ajouter à ma liste</button>
                <button class="add-review">Donner mon avis</button>
            </div>
        </div>

        <div class="extension-card fade-in" data-category="adventure">
            <div class="extension-image">🌊</div>
            <div class="extension-info">
                <h3 class="extension-name">Marins & Ports</h3>
                <div class="base-game">Extension pour • Catan</div>
                <p class="extension-description">Explorez les mers et découvrez de nouvelles îles ! Construisez des bateaux, établissez des routes commerciales maritimes et colonisez des îles riches en ressources précieuses.</p>
            </div>
            <div class="extension-details">
                <div class="detail-item">
                    <span class="detail-label">👥 Joueurs :</span>
                    <span class="detail-value">3-4</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">⏱️ Durée :</span>
                    <span class="detail-value">90 min</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">🎯 Âge :</span>
                    <span class="detail-value">12+</span>
                </div>
            </div>
            <div class="extension-actions">
                <button class="add-to-wishlist">Ajouter à ma liste</button>
                <button class="add-review">Donner mon avis</button>
            </div>
        </div>

        <div class="extension-card fade-in" data-category="cooperative">
            <div class="extension-image">🔬</div>
            <div class="extension-info">
                <h3 class="extension-name">Au Seuil de l'Apocalypse</h3>
                <div class="base-game">Extension pour • Pandemic</div>
                <p class="extension-description">Face à des virus mutants plus dangereux ! Cette extension introduit 5 nouveaux modules de difficulté et des cartes événements qui bouleversent complètement la stratégie habituelle.</p>
            </div>
            <div class="extension-details">
                <div class="detail-item">
                    <span class="detail-label">👥 Joueurs :</span>
                    <span class="detail-value">2-4</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">⏱️ Durée :</span>
                    <span class="detail-value">45 min</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">🎯 Âge :</span>
                    <span class="detail-value">10+</span>
                </div>
            </div>
            <div class="extension-actions">
                <button class="add-to-wishlist">Ajouter à ma liste</button>
                <button class="add-review">Donner mon avis</button>>
            </div>
        </div>

        <div class="extension-card fade-in" data-category="family">
            <div class="extension-image">🎪</div>
            <div class="extension-info">
                <h3 class="extension-name">Le Grand Cirque</h3>
                <div class="base-game">Extension pour • Ticket to Ride</div>
                <p class="extension-description">Le cirque arrive en ville ! Déplacez le chapiteau de cirque à travers vos routes et gagnez des points bonus. Une extension familiale colorée et amusante pour tous les âges.</p>
            </div>
            <div class="extension-details">
                <div class="detail-item">
                    <span class="detail-label">👥 Joueurs :</span>
                    <span class="detail-value">2-5</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">⏱️ Durée :</span>
                    <span class="detail-value">+10 min</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">🎯 Âge :</span>
                    <span class="detail-value">8+</span>
                </div>
            </div>
            <div class="extension-actions">
                <button class="add-to-wishlist">Ajouter à ma liste</button>
                <button class="add-review">Donner mon avis</button>
            </div>
        </div>

        <div class="extension-card fade-in" data-category="thematic">
            <div class="extension-image">🧙‍♂️</div>
            <div class="extension-info">
                <h3 class="extension-name">L'Éveil des Mages</h3>
                <div class="base-game">Extension pour • Gloomhaven</div>
                <p class="extension-description">Quatre nouvelles classes de mages rejoignent l'aventure ! Maîtrisez les éléments avec le Pyromancien, l'Aquamancien, le Terramancien et l'Aéromancien, chacun avec ses propres mécaniques uniques.</p>
            </div>
            <div class="extension-details">
                <div class="detail-item">
                    <span class="detail-label">👥 Joueurs :</span>
                    <span class="detail-value">1-4</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">⏱️ Durée :</span>
                    <span class="detail-value">120 min</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">🎯 Âge :</span>
                    <span class="detail-value">14+</span>
                </div>
            </div>

            <div class="btn-actions">
                <button class="add-to-wishlist">Ajouter à ma liste</button>
                <button class="add-review">Donner mon avis</button>
            </div>
        </div>
    </div>
</div>


<script src="/asset/js/forum.js"></script>
<?php
$page_script = '/asset/js/header.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>