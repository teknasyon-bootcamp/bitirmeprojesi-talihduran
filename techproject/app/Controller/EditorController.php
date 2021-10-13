<?php

namespace App\Controller;

class EditorController extends AbstractController
{
    public function index(){
        echo view("editorpanel",[]);
    }
    public function pages(){
        echo view("editor_pages",[]);
    }
    public function posts(){
        echo view("editor_posts",[]);
    }
}