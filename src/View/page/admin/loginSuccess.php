<?php
require_once ROOTPATH . "src/View/template/header.php";
?>

<p>Connexion réussie !</p>

<button class="submit-btn" onclick="window.open('<?= htmlspecialchars($redirectUrl) ?>', '_blank')">Ouvrir le dashboard admin</button>
<script>
    setTimeout(function() {
        window.location.href = "/";
    }, 5000); // Redirige après 5 secondes
</script>

<?php
require_once ROOTPATH . "src/View/template/footer.php"; 
?>