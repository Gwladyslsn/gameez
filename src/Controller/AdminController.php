<?php 

namespace App\Controller;

use App\Repository\AdminRepository;
use App\Repository\GameRepository;
use App\Repository\ReviewRepository;
use App\Database\Database;

class AdminController
{

    public function dashboardadmin()
    {
        $pdo = (new Database())->getConnection();
        $adminRepo = new AdminRepository($pdo);
        $gameRepo = new GameRepository($pdo);
        $reviewRepo = new ReviewRepository($pdo);

        $stats = $adminRepo->getStats();
        $topGames = $adminRepo->getTopGames();
        $topWishlistGames = $adminRepo->getTopWishlistGames();
        $games = $gameRepo->getGames();
        $reviews = $reviewRepo->getAllReviews();
        

        require ROOTPATH . 'src/View/page/admin/dashboardAdmin.php';
    }


    
}

