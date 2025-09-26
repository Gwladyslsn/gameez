<?php

$imagePath = '/asset/image/extensions/' . htmlspecialchars($extension->getImageExtension());
?>

<div class="extension-card fade-in" data-category="strategy">
    <div class="extension-image">
        <span>
            <img src="<?= $imagePath ?>" alt="Image du jeu" class="extensionImage">
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
            <span class="detail-value"></span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Complexité :</span>
            <span class="detail-value"><?= htmlspecialchars($extension->getComplexity()) ?> /5</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Sortie le :</span>
            <span class="detail-value"><?= htmlspecialchars($extension->getReleaseDate()->format('d/m/Y')) ?></span>
        </div>
    </div>
    <div class="extension-actions">
        <button class="add-to-wishlist btn-add-list" data-type="extension" data-id="<?= htmlspecialchars($extension->getIdExtension()) ?>">Ajouter à ma liste</button>
        <button class="add-review btn-add-review" data-type="extension" data-id="<?= htmlspecialchars($extension->getIdExtension()) ?>">Donner mon avis</button>
    </div>
</div>