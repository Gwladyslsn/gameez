
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameez - Dashboard Admin</title>

</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <span class="icon-gamepad"></span>
                    <span>Gameez Admin</span>
                </div>
                <div class="search-container">
                    <div class="search-box">
                        <span class="search-icon icon-search"></span>
                        <input type="text" placeholder="Rechercher un jeu...">
                    </div>
                    <span class="icon-settings" style="cursor: pointer; font-size: 1.25rem;"></span>
                </div>
            </div>
        </div>

        
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
    </header>

    