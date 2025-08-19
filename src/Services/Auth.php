<?php

namespace App\Services;

use App\Database\Database;
use App\Repository\UserRepository;

$database = new Database();
$pdo = $database->getConnection();



class Auth
{

    public static function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function signin()
    {
        $errors = [];
        $database = new Database();
        $pdo = $database->getConnection();
        $userRepo = new UserRepository($pdo);

        $name_user = $_POST["name_user"] ?? '';
        $lastname_user = $_POST["lastname_user"] ?? '';
        $email_user = $_POST["email_user"] ?? '';
        $password_user = $_POST["password_user"] ?? '';
        $id_role = $_POST["id_role"] ?? '';
        $credit_user = 20;

        $errors = $userRepo->verifyUserInput($_POST);

        if (empty($errors)) {
            if ($userRepo->emailExists($email_user)) {
                echo '<div class="alert alert-success">
                        <p class="text-white bg-gray-900 body-font">Un compte avec cette adresse email existe déjà. Veuillez vous connecter ou utiliser une autre adresse.</p>
                        </div>';
            } else {
                if ($userRepo->addUser($name_user, $lastname_user, $email_user, $password_user, $id_role, $credit_user)) {
                    echo '<div class="alert alert-success">
                            <p class="text-gray-400 bg-gray-900 body-font">✅ Inscription réussie ! Vous pouvez maintenant vous connecter !</p>
                            </div>';
                } else {
                    $errors[] = "Une erreur est survenue";
                    return $errors;
                }
            }
        }
    }

    public function login()
    {
        $database = new Database();
        $pdo = $database->getConnection();
        $userRepo = new UserRepository($pdo);
        $errors = [];

        $email = $_POST["user_mail"] ?? '';
        $password = $_POST["user_password"] ?? '';

        // 1. Tentative connexion admin
        $admin = $userRepo->getAdminByEmail($email);
        if ($admin && password_verify($password, $admin['password_admin'])) {
            $_SESSION['admin'] = [
                'id_admin' => $admin['id_admin'],
                'admin_mail' => $admin['admin_mail'],
                'admin_name' => $admin['admin_name']
            ];
            header('Location: dashboardAdmin');
            exit;
        }

        // 2. Sinon tentative connexion utilisateur
        $id_user = $userRepo->verifUserExists($email, $password);
        if ($id_user !== false) {
            $_SESSION['user'] = $id_user;
            header('Location: http://localhost:8000/dashboardUser');
            exit;
        } else {
            echo "Identifiants et/ou mot de passe incorrect(s).";
        }
    }
}
