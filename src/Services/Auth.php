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

        $userName = $_POST["user_name"] ?? '';
        $userLastname = $_POST["user_lastname"] ?? '';
        $userEmail = $_POST["user_mail"] ?? '';
        $userDob = $_POST["user_dob"] ?? '';
        $userPassword = $_POST["user_password"] ?? '';

        $errors = $userRepo->verifyUserInput($_POST);

        if (empty($errors)) {
            if ($userRepo->emailExists($userEmail)) {
                echo '<div class="alert alert-success">
                        <p class="text-white bg-gray-900 body-font">Un compte avec cette adresse email existe déjà. Veuillez vous connecter ou utiliser une autre adresse.</p>
                        </div>';
            } else {
                if ($userRepo->addUser($userName, $userLastname, $userPassword, $userEmail, $userDob)) {
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
        $error = [];

        $email = $_POST["user_mail"] ?? '';
        $password = $_POST["user_password"] ?? '';

        // 1. Tentative connexion admin
        $admin = $userRepo->getAdminByEmail($email);
        if ($admin && password_verify($password, $admin['admin_password'])) {
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
            header('Location: dashboardUser');
            exit;
        } else {
            $error = "Identifiants et/ou mot de passe incorrect(s).";
        }
    }

    /* DECONNEXION */
    public static function logout(string $redirectTo = ''): void
    {
        self::startSession();
        session_unset();
        session_destroy();
        header("Location: $redirectTo");
        exit();
    }
}
