<?php

namespace App\Controller;
use App\Database\Static\Mysql;
use App\Middleware\CheckPassword;
use App\Middleware\CheckUsername;
use App\Model\CategoryModel;
use App\Model\CommentModel;
use App\Model\NewsModel;
use App\Model\NewsPostModel;
use App\Model\RoleModel;
use App\Model\UserModel;
use GuzzleHttp\Promise\Create;
use Symfony\Component\Routing\RequestContext;

class UserLoginController extends AbstractController
{

    public function register(){
        echo view("register",[]);

        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){

            $username = $_POST['username'];
            if(empty(UserModel::getUserByUserName($username))){
                $password = $_POST['password'];
                $email = $_POST['email'];
                $password = password_hash($password,PASSWORD_DEFAULT);
                UserModel::createUser($username, $password,$email);
                header("location:http://teknasyon.project/login");
            }else{
                header("location:http://teknasyon.project/register");
            }
        }




    }
    public function login(){
        echo view("login",[]);

    }
    public function logout(){
        session_destroy();
        header("location:http://teknasyon.project/login");

    }
    public function loginValidation(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new UserModel($username, $password);

        $checkUsername = new CheckUsername();
        $checkPassword = new CheckPassword();
        $checkUsername->then($checkPassword);

        try {
        $checkUsername->check($user);
        }catch (\Exception $e){
            echo "Hata" . $e->getMessage();exit;
          header("location:http://teknasyon.project/login");
          exit;
        }

        $user = UserModel::getUserByUserName($username);

        session_start();

        $_SESSION["username"] = $username;
        $_SESSION["authenticated"] = true;
        $_SESSION["userId"] = $user[0]['id'];


        header("Location:http://teknasyon.project/home");
    }


}