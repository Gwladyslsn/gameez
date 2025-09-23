<?php

namespace App\Controller;

use App\Repository\ExtensionRepository;
use App\Database\Database;


class ExtensionController
{
    private ExtensionRepository $extensionRepo;

    public function __construct()
    {
        $pdo = (new Database())->getConnection();
        $this->extensionRepo = new ExtensionRepository($pdo);
    }

    public function showExtensions()
    {
        
        $extensions = $this->extensionRepo->getAllExtensions();
        require_once ROOTPATH . 'src/View/page/extensions.php';
    }
}
