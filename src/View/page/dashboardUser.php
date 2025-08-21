<?php

require_once ROOTPATH . "src/View/template/header.php";

if (!isset($_SESSION['user'])) {
    header('Location: /register');
    exit;
}
?>

<h1>Dashboard USER</h1>

<?php
$page_script = '/asset/js/header.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>