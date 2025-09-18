<?php 

namespace App\Controller;

use App\Database\Database;
use App\Repository\ListRepository;
use App\Repository\UserRepository;
use App\Repository\ReviewRepository;
use App\Repository\GameRepository;

class AdminController extends Controller 
{

    public function dashboardAdmin()
    {
    if (!isset($_SESSION['admin'])) {
            header('Location: /register');
            exit;
        }
    }
}