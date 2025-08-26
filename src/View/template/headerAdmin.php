<?php
require_once ROOTPATH . 'config/config.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gameez - Dashboard Admin</title>

</head>

<body>
    <!-- Header -->
    <header>
        <nav class="container">
            <div class="logo">
                <a href="<?= BASE_URL ?>">
                    <img src="asset/image/logo.jpg" alt="logo Gameez" class="logo">
                </a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Rechercher un jeu...">
                <button>🔍</button>
            </div>
    </header>

    <!-- Navigation -->
    <nav class="nav-tabs">
        <div class="container">
            <div class="nav-tabs-container">
                <button class="tab-button active" onclick="showTab('overview')">
                    <span class="icon-chart"></span>
                    Vue d'ensemble
                </button>
                <button class="tab-button" onclick="showTab('games')">
                    <span class="icon-gamepad"></span>
                    Gestion des jeux
                </button>
                <button class="tab-button" onclick="showTab('reviews')">
                    <span class="icon-message"></span>
                    Avis en attente
                </button>
                <button class="tab-button" onclick="showTab('users')">
                    <span class="icon-users"></span>
                    Utilisateurs
                </button>
            </div>
        </div>
    </nav>