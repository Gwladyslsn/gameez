<?php 

namespace App\Controller;

use App\Database\Database;
use App\Repository\UserRepository;

class UserController extends Controller
{
    public function dashboardUser()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /register');
            exit;
        }

        $database = new Database();
        $pdo = $database->getConnection();
        $userRepo = new UserRepository($pdo);

        $user = $userRepo->getDataUser($_SESSION['user']);

        $this->render('View/page/dashboardUser', [
            'user' => $user
        ]);
    }
}
