<?php

namespace App\Middleware;

use App\Model\UserModel;

class CheckPassword extends UserMiddleware{

    /**
     * @throws \Exception
     */
    public function check(UserModel $user)
    {
        $userCredentials = UserModel::getUserByUserName($user->username);
        $v = password_verify($user->password, $userCredentials[0]['pass']);
        if (!$v){
            throw new \Exception("Üzgünüz şifreniz hatalı");
        }

    }
}