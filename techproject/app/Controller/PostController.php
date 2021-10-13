<?php

namespace App\Controller;

use App\Model\NewsPostModel;
use App\Model\PostModel;

class PostController extends AbstractController
{
    public function index($id, $postName){
        $post = NewsPostModel::getNewsPost($id);
        echo view("post",[$post,$postName]);

    }

}