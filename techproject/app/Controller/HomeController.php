<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    public function index(){
        echo view("home",[]);
    }
}