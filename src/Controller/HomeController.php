<?php

namespace App\Controller;

class HomeController 
{
    public function index()
    {
        return $this->render('Home/index.html');
    }
}