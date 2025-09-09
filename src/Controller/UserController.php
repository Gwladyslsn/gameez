<?php 

namespace App\Controller;

use App\Database\Database;
use App\Repository\ListRepository;
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
        $listRepository = new ListRepository($pdo);

        $user = $userRepo->getDataUser($_SESSION['user']);
        $lists = $listRepository->getListsByUser($_SESSION['user']);
        
        foreach ($lists as &$list) {
        $list['games'] = $listRepository->getGamesByList($list['id_list']);
    }

        $this->render('View/page/dashboardUser', [
            'user' => $user,
            'lists' => $lists,
        ]);
    }
    }
