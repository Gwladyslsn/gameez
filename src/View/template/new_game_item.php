<?php
$imagePath = '/asset/' . htmlspecialchars($newGame->getImageGame());
$avg = round($newGame->getAvgRating() ?? 0);

?>

<div class="game-card game" id="game-container">
    <div class="game-image">
        <span><img src="<?= $imagePath ?>" alt="Image du jeu" class="gameImage"></span>
    </div>
    <h3 class="game-title"><?= htmlspecialchars($newGame->getNameGame()) ?></h3>
    <div class="game-meta">
        <span class="meta-tag"><?= htmlspecialchars($newGame->getNbGamer()) ?> joueurs</span>
        <span class="meta-tag"><?= htmlspecialchars($newGame->getDurationGame()) ?> minutes</span>
        <span class="meta-tag">à partir de <?= htmlspecialchars($newGame->getAgeGamer()) ?> ans</span>
    </div>
    <div class="game-rating">
    <div class="stars">
        <?= str_repeat('★', $avg) ?><?= str_repeat('☆', 5 - $avg) ?>
    </div>
    <span class="rating-text"><?= htmlspecialchars(number_format($newGame->getAvgRating() ?? 0, 1)) ?></span>
</div>
    <div  class="game-description">
    <p class="game-description"><?= htmlspecialchars($newGame->getDescriptionGame()) ?></p>
    </div>
</div>