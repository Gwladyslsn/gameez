<div class="game-card">
    <div class="game-image">
        <span><img src="../asset/<?= htmlspecialchars($game->getImageGame()) ?>" alt=""></span>
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
</div>
