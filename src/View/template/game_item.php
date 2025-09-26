<?php

$imagePath = '/asset/' . htmlspecialchars($game->getImageGame());
$avg = round($game->getAvgRating() ?? 0);
?>

<div class="game-card game" id="game-container">
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
    <div class="stars"><?= str_repeat('★', $avg) . str_repeat('☆', 5 - $avg) ?></div>
    <span class="rating-text"><?= htmlspecialchars(number_format($game->getAvgRating() ?? 0, 1)) ?></span>
</div>
    <div  class="game-description">
    <p class="game-description"><?= htmlspecialchars($game->getDescriptionGame()) ?></p>
    </div>

    <div class="btn-actions">
        <button class="add-to-wishlist btn-add-list" data-type="game" data-id="<?= htmlspecialchars($game->getIdGame()) ?>">Ajouter à ma liste</button>
        <button class="add-review btn-add-review" data-type="game" data-id="<?= htmlspecialchars($game->getIdGame()) ?>">Donner mon avis</button>
    </div>
</div>
