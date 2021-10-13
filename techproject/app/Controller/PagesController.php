<?php

namespace App\Controller;

class PagesController extends AbstractController
{
    public function index(){
        echo view('login',[]);
    }

}