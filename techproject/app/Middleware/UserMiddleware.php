<?php

namespace App\Middleware;

/*class User{
    public int $id =2;
    public string $name = "Ancyra";
    public string $email = "ancyra@gmail.coma";
}*/

use App\Model\UserModel;

abstract class UserMiddleware
{
    protected object $nextMiddleware;

    public function then(UserMiddleware $middleware){
        $this->nextMiddleware = $middleware;
    }

    public abstract function check(UserModel $user);

    public function next(UserModel $user){
            if(!$this->nextMiddleware) return;
             $this->nextMiddleware->check($user);
    }
}

/*class CheckId extends UserMiddleware{

    public function check(UserModel $user)
    {
       if ($user->id !=1) throw new \Exception("User Id Error");

       $this->next($user);
    }
}
class CheckName extends UserMiddleware{

    public function check(UserModel $user)
    {
        if ($user->name!="Ancyra") throw new \Exception("User Name Error");

        $this->next($user);
    }
}
class CheckEmail extends UserMiddleware{

    public function check(UserModel $user)
    {
        if ($user->email !="ancyra@gmail.com") throw new \Exception("User Email Error");

        $this->next($user);
    }
}

$user = new UserModel;

$checkId = new CheckId;
$checkName = new CheckName;
$checkEmail = new CheckEmail;


//$checkName->then($checkEmail);
$checkId->then($checkName);
$checkName->then($checkEmail);
try {
    $checkId->check($user);
} catch (\Exception $e) {
    echo $e->getMessage();
}*/
