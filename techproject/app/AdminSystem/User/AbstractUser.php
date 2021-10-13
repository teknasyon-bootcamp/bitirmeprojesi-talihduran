<?php

namespace App\AdminSystem\User;

use App\Model\CommentModel;
use App\Model\UserModel;
use App\Pattern\Singleton;

abstract class AbstractUser extends Singleton
{
    public int $id;
//    public string $username;
//    public string $pass;
//
//
   public function __construct(int $id){
       $this->id = $id;
    }
//    public function read(){
//
//    }
//    public function comment(int $newsId, string $content){
//        CommentModel::createComment($this->id, $newsId,$content);
//    }
//    public function deleteRequestForAccount(){
//        UserModel::deleteUser($this->id);
//    }
//    public function followingCategories(){
//
//    }
//    public function getUserAllComments(){
//        CommentModel::getCommentsForUser($this->id);
//    }
//    public function getUserAllNews(){
//
//    }






}