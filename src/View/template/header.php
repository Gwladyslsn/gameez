<?php
require_once ROOTPATH . 'src/Services/Auth.php';
require_once ROOTPATH . 'config/config.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gameez - Votre bibliothèque de jeux de société</title>
</head>

<body>
    <header>
        <nav class="container">
            <div class="logo">
                <a href="<?= BASE_URL ?>">
                    <img src="asset/image/logo.jpg" alt="logo Gameez" class="logo">
                </a>
            </div>

            <!-- Hamburger pour mobile -->
            <button class="hamburger" aria-label="Menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="nav-links">
                <a href="#parcourir">Parcourir</a>
                <a href="#top-rated">Top jeux</a>
                <a href="#nouveautes">Nouveautés</a>
                <a href="#communaute">Communauté</a>
                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="/dashboardAdmin">Espace Admin</a>
                <?php elseif (isset($_SESSION['user'])): ?>
                    <a href="/dashboardAdmin">Mon compte</a>
                <?php else: ?>
                    <a href="/register">Inscription</a>
                <?php endif; ?>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Rechercher un jeu...">
                <button>🔍</button>
            </div>
        </nav>
    </header>