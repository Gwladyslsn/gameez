<?php

$imagePath = '/asset/' . htmlspecialchars($popularGame->getImageGame());
?>

<div class="game-card">
    <div class="game-image">
        <span><img src="<?= $imagePath ?>" alt="Image du jeu" class="gameImage"></span>
    </div>
    <h3 class="game-title"><?= htmlspecialchars($popularGame->getNameGame()) ?></h3>
    <div class="game-meta">
        <span class="meta-tag"><?= htmlspecialchars($popularGame->getNbGamer()) ?> joueurs</span>
        <span class="meta-tag"><?= htmlspecialchars($popularGame->getDurationGame()) ?> minutes</span>
        <span class="meta-tag">à partir de <?= htmlspecialchars($popularGame->getAgeGamer()) ?> ans</span>
    </div>
    <div class="game-rating">
        <div class="stars">★★★★☆</div>
        <span class="rating-text">4.6 (3,521 avis)</span>
    </div>
    <p class="game-description"><?= htmlspecialchars($popularGame->getDescriptionGame())?></p>
</div>