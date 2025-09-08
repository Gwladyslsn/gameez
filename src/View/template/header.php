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
                <a href="/games">Parcourir</a>
                <a href="#nouveautes">Nouveautés</a>
                <a href="/forum">Communauté</a>
                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="/dashboardAdmin">Espace Admin</a>
                <?php elseif (isset($_SESSION['user'])): ?>
                    <a href="/dashboardUser">Mon compte</a>
                <?php endif; ?>
                <?php  if (isset($_SESSION['user']) || isset($_SESSION['admin'])): ?>
                <a href="<?= BASE_URL ?>logout">Déconnexion</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>register">Connexion / Inscription</a>
            <?php endif; ?>
            </div>

        </nav>
    </header>