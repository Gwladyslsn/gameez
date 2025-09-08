<?php

$imagePath = '/asset/' . htmlspecialchars($game->getImageGame());
?>

<div class="game-card game">
    <div class="game-image">
        <span><img src="<?= $imagePath ?>" alt="Image du jeu" class="gameImage"></span>
    </div>
    <h3 class="game-title"><?= htmlspecialchars($game->getNameGame()) ?></h3>
    <div class="game-meta">
        <span class="meta-tag"><?= htmlspecialchars($game->getNbGamer()) ?> joueurs</span>
        <span class="meta-tag"><?= htmlspecialchars($game->getDurationGame()) ?> minutes</span>
        <span class="meta-tag">à partir de <?= htmlspecialchars($game->getAgeGamer()) ?> ans</span>
    </div>
    <div class="game-rating">
        <div class="stars">★★★★☆</div>
        <span class="rating-text">4.6 (3,521 avis)</span>
    </div>
    <p class="game-description"><?= htmlspecialchars($game->getDescriptionGame())?></p>

<div class="btn-actions">
    <button class="add-to-wishlist">Ajouter à ma liste</button>
    <button class="add-review">Donner mon avis</button>
</div>
</div>
