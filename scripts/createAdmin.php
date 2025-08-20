<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Database\Database;

if (php_sapi_name() !== 'cli') {
    exit("Ce script ne peut être exécuté que via la ligne de commande.\n");
}

function createAdmin()
{

    $database = new Database();
    $pdo = $database->getConnection();
    $hashedPassword = password_hash('Am25p9xUG7*', PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (admin_name, admin_lastname, admin_mail, admin_password)
            VALUES (:name, :lastname, :email, :password)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => 'Gwladys',
        ':lastname' => 'Laisne',
        ':email' => 'gwladyslaisne@outlook.fr',
        ':password' => $hashedPassword,
    ]);

    echo "Admin créé avec succès.";
}


createAdmin();






