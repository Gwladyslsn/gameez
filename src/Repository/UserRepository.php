<?php

namespace App\Repository;

use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /* CREATE */

    public function addUser(string $username, string $lastname, string $password, string $phone, string $email): bool
    {
        $query = $this->pdo->prepare("
        INSERT INTO user (user_name, user_lastname, user_password, user_tel, user_mail)
        VALUES (:userName, :userLastname, :userPassword, :userPhone, :userEmail)");

        $userPassword = password_hash($password, PASSWORD_DEFAULT);

        $query->bindParam(':userName', $userName);
        $query->bindParam(':userLastname', $userLastname);
        $query->bindParam(':userPassword', $userPassword);
        $query->bindParam(':userPhone', $userPhone);
        $query->bindParam(':userEmail', $userEmail);

        return $query->execute();
    }





    /* READ */

    public function getAdminByEmail(string $emailAdmin)
    {
    $sql = "SELECT * FROM admin WHERE admin_mail = :adminMail";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['admin_mail' => $emailAdmin]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    return $admin ?: null;
}

    public function getAllUsers(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM user ORDER BY idUser");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataUser(string $idUser): ?array
    {
        $sql = "SELECT * FROM user WHERE id_user = :idUser";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_user' => $idUser]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }

    public function verifUserExists(string $userEmail, string $password)
    {
        $sql = "SELECT id_user, user_password FROM user WHERE user_mail = :userEmail";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_mail' => $userEmail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['user_password'])) {
            return $user['id_user'];
        }
        return false;
    }

    public function verifyUserInput(array $user): array
    {
        $errors = [];

        if (empty($user["user_name"])) {
            $errors["user_name"] = "Le champ Prénom ne doit pas être vide";
        }
        if (empty($user["user_lastname"])) {
            $errors["user_lastname"] = "Le champ Nom ne doit pas être vide";
        }
        if (empty($user["user_mail"])) {
            $errors["user_mail"] = "Le champ Email ne doit pas être vide";
        }
        if (empty($user["user_password"])) {
            $errors["user_password"] = "Le champ Mot de passe ne doit pas être vide";
        }
        return $errors;
    }

    public function emailExists(string $userEmail): bool
    {
        $sql = "SELECT COUNT(*) FROM user WHERE user_mail = :userEmail";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_mail' => $userEmail]);
        return $stmt->fetchColumn() > 0;
    }




    /* UPDATE */




    /* DELETE */
}
