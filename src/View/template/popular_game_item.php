<?php

$imagePath = '/asset/' . htmlspecialchars($popularGame->getImageGame());
$avg = round($popularGame->getAvgRating() ?? 0);
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
    <div class="stars"><?= str_repeat('★', $avg) . str_repeat('☆', 5 - $avg) ?></div>
    <span class="rating-text"><?= htmlspecialchars(number_format($popularGame->getAvgRating() ?? 0, 1)) ?></span>
</div>
    <p class="game-description"><?= htmlspecialchars($popularGame->getDescriptionGame())?></p>
</div>