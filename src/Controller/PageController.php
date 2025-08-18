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
}
