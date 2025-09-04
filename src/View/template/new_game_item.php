<?php
$imagePath = '/asset/' . htmlspecialchars($newGame->getImageGame());

?>

<div class="game-card">
    <div class="game-image">
        <span><img src="<?= $imagePath ?>" alt="Image du jeu" class="gameImage"></span>
    </div>
    <div class="game-title"><?= htmlspecialchars($newGame->getNameGame()) ?></div>
    <div class="game-meta">
        <span class="meta-tag"><?= htmlspecialchars($newGame->getNbGamer()) ?> joueurs</span>
        <span class="meta-tag"><?= htmlspecialchars($newGame->getDurationGame()) ?> minutes</span>
        <span class="meta-tag"><?= htmlspecialchars($newGame->getAgeGamer()) ?> ans</span>
    </div>
    <div class="rating">
        <span class="stars">★★★★☆</span>
        <span>4.3 (892 avis)</span>
    </div>
    <div class="game-tags">
        <span class="tag">Coopératif</span>
        <span class="tag">Super-héros</span>
        <span class="tag">Figurines</span>
    </div>
</div>