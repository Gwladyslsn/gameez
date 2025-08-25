<?php if (!empty($games)): ?>
    <?php foreach ($games as $game): ?>
        <?php include ROOTPATH . 'src/View/template/game_item.php'; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun jeu trouvé.</p>
<?php endif; ?>
