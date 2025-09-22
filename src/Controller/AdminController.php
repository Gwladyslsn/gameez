<?php 

namespace App\Controller;

use App\Repository\AdminRepository;
use App\Repository\GameRepository;
use App\Database\Database;

class AdminController
{
    public function dashboardadmin()
    {
        $pdo = (new Database())->getConnection();
        $adminRepo = new AdminRepository($pdo);
        $gameRepo = new GameRepository($pdo);

        $stats = $adminRepo->getStats();
        $topGames = $adminRepo->getTopGames();
        $topWishlistGames = $adminRepo->getTopWishlistGames();
        $games = $gameRepo->getGames();

        require ROOTPATH . 'src/View/page/admin/dashboardAdmin.php';
    }
}

