<?php

$imagePath = '/asset/image/extensions/' . htmlspecialchars($extension->getImageExtension());
?>

<div class="extension-card fade-in" data-category="strategy">
    <div class="extension-image">
        <span>
            <img src="<?= $imagePath ?>" alt="Image du jeu" class="gameExtension">
        </span>
    </div>
    <div class="extension-info">
        <h3 class="extension-name"><?= htmlspecialchars($extension->getExtensionName()) ?></h3>
        <div class="base-game">
            Extension pour • <?= htmlspecialchars($extension->getNameGame()) ?>
        </div>
        <p class="extension-description">
            <?= htmlspecialchars($extension->getExtensionDescription()) ?>
        </p>
    </div>
    <div class="extension-details">
        <div class="detail-item">
            <span class="detail-label">👥 Joueurs :</span>
            <span class="detail-value">2-6</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">⏱️ Durée :</span>
            <span class="detail-value">+15 min</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">🎯 Âge :</span>
            <span class="detail-value">7+</span>
        </div>
    </div>
    <div class="extension-actions">
        <button class="add-to-wishlist">Ajouter à ma liste</button>
        <button class="add-review">Donner mon avis</button>
    </div>
</div>