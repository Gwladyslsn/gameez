<?php

namespace App\Controller;



class PageController extends Controller
{
    public function home()
    {
        $this->render('View/page/home', []);
    }

    public function register()
    {
        $this->render('View/page/register', []);
    }

    public function dashboardUser()
    {
        $this->render('View/page/dashboardUser', []);
    }

    // ADMIN
    public function dashboardAdmin()
    {
        $this->render('View/page/admin/dashboardAdmin', []);
    }
}
