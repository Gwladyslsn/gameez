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
            <span class="detail-label">Note moyenne :</span>
            <span class="detail-value">4</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">complexité :</span>
            <span class="detail-value"><?= htmlspecialchars($extension->getComplexity()) ?> /5</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Date de sortie :</span>
            <span class="detail-value"><?= htmlspecialchars($extension->getReleaseDate()->format('d/m/Y')) ?></span>
        </div>
    </div>
    <div class="extension-actions">
        <button class="add-to-wishlist">Ajouter à ma liste</button>
        <button class="add-review">Donner mon avis</button>
    </div>
</div>