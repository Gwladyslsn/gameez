<?php 

namespace App\Controller;

use App\Repository\AdminRepository;
use App\Database\Database;

class AdminController
{
    public function dashboardadmin()
    {
        $pdo = (new Database())->getConnection();
        $adminRepo = new AdminRepository($pdo);

        $stats = $adminRepo->getStats();
        $topGames = $adminRepo->getTopGames();

        require ROOTPATH . 'src/View/page/admin/dashboardAdmin.php';
    }
}

