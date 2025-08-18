<?php 
require_once ROOTPATH . 'config/config.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/main.css">
    <title>Gameez - Votre bibliothèque de jeux de société</title>
</head>
<body>
    <header>
        <nav class="container">
            <div class="logo">
                <a href="<?= BASE_URL ?>">🎲 Gameez</a>
                
            </div>
            <div class="nav-links">
                <a href="#parcourir">Parcourir</a>
                <a href="#genres">Genres</a>
                <a href="#top-rated">Top jeux</a>
                <a href="#nouveautes">Nouveautés</a>
                <a href="#communaute">Communauté</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Rechercher un jeu...">
                <button>🔍</button>
            </div>
        </nav>
    </header>
