<?php

namespace App\Middleware;
use App\Model\UserModel;
class CheckUsername extends UserMiddleware{


    public function check(UserModel $user)
    {
        $userCredentials = UserModel::getUserByUserName($user->username);
        if(empty($userCredentials)){
            throw new \Exception("Kullanıcı adınız hatalı");
        }
        $this->next($user);
    }
}