<?php

require_once ROOTPATH . "src/View/template/header.php";

use App\Repository\UserRepository;
use App\Database\Database;

$database = new Database();
$pdo = $database->getConnection();
$userRepo = new UserRepository($pdo);

if (isset($_SESSION['user'])) {
    $id_user = $_SESSION['user'];

    // Récupérer les infos utilisateur avec la méthode correcte
    $user = $userRepo->getDataUser($id_user);
} else {
    header('Location: /register');
    exit;
}

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
                <button class="edit-btn" onclick="toggleEdit()">
                    ✏️ Modifier
                </button>
            </div>

            <div class="profile-info">
                <div class="info-group">
                    <div class="info-label">Pseudo</div>
                    <div class="info-value" id="username-display">GameMaster42</div>
                    <div class="info-value hidden" id="username-edit">
                        <input type="text" value="GameMaster42" id="username-input">
                    </div>
                </div>

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
                    <div class="info-value"><?= htmlspecialchars($user['user_dob']) ?></div>
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

            <div class="wishlist-item">
                <div class="wishlist-header">
                    <div class="wishlist-name">Mes Incontournables</div>
                    <div class="wishlist-count">8 jeux</div>
                </div>
                <div class="wishlist-games">
                    <div class="game-preview">Catan</div>
                    <div class="game-preview">Azul</div>
                    <div class="game-preview">Wingspan</div>
                    <div class="game-preview">+5 autres</div>
                </div>
            </div>

            <div class="wishlist-item">
                <div class="wishlist-header">
                    <div class="wishlist-name">Noël 2025</div>
                    <div class="wishlist-count">5 jeux</div>
                </div>
                <div class="wishlist-games">
                    <div class="game-preview">Gloomhaven</div>
                    <div class="game-preview">Root</div>
                    <div class="game-preview">Spirit Island</div>
                    <div class="game-preview">+2 autres</div>
                </div>
            </div>

            <div class="wishlist-item">
                <div class="wishlist-header">
                    <div class="wishlist-name">Famille</div>
                    <div class="wishlist-count">12 jeux</div>
                </div>
                <div class="wishlist-games">
                    <div class="game-preview">Ticket to Ride</div>
                    <div class="game-preview">Splendor</div>
                    <div class="game-preview">King of Tokyo</div>
                    <div class="game-preview">+9 autres</div>
                </div>
            </div>

            <div class="wishlist-item">
                <div class="wishlist-header">
                    <div class="wishlist-name">Sorties Récentes</div>
                    <div class="wishlist-count">3 jeux</div>
                </div>
                <div class="wishlist-games">
                    <div class="game-preview">Dune Imperium</div>
                    <div class="game-preview">Lost Ruins</div>
                    <div class="game-preview">Ark Nova</div>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="card stats-card">
            <div class="card-header">
                <h2>📊 Mes Statistiques</h2>
            </div>

            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">4</div>
                    <div class="stat-label">Wishlists actives</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">28</div>
                    <div class="stat-label">Jeux en wishlist</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">15</div>
                    <div class="stat-label">Jeux notés</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">4.2</div>
                    <div class="stat-label">Note moyenne</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">7</div>
                    <div class="stat-label">Avis rédigés</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/asset/js/header.js"></script>
<script src="/asset/js/dashboardUser.js"></script>

<?php
require_once ROOTPATH . "src/View/template/footer.php"; ?>