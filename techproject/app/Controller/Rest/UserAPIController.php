<?php

namespace App\Controller\Rest;

use App\Model\UserModel;
use Symfony\Component\Routing\RequestContext;

class UserAPIController implements ApiInterface
{

    public RequestContext $context;
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function requestHandler(){
        $this->context->setMethod($_SERVER['REQUEST_METHOD']);
        $RequestMethod =  $this->context->getMethod();

        $func = match ($RequestMethod){
            "GET" => $this->getAll(),
            "POST" => $this->create(),
        };

    }

    public function singleRequestHandler($id){
        $this->context->setMethod($_SERVER['REQUEST_METHOD']);
        $RequestMethod =  $this->context->getMethod();

        $func = match ($RequestMethod){
            "GET" => $this->get($id),
            "PATCH" => $this->update($id),
            "PUT" => $this->update($id),
            "DELETE" => $this->delete($id)
        };

    }
    public function get($id)
    {
        header("Content-Type: application/json; charset=utf-8");
        $user = UserModel::getUser($id);
        $user = json_encode($user);
        echo $user;
    }

    public function getAll()
    {
        header("Content-Type: application/json; charset=utf-8");
        $users = UserModel::getAllUser();
        $users = json_encode($users);
        echo $users;
    }

    public function create():bool
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        return UserModel::createUser($username,password_hash($password,PASSWORD_DEFAULT),$email);
    }

    public function update($id)
    {
         $data = file_get_contents("php://input");

         $pattern1 = '/name="[a-z].*"/';
         //$pattern2 = '/\s"[a-z].*"|\s\d.*/';
         $pattern2 = '/\s{2}[a-z0-9].*/';
         preg_match_all($pattern1, $data, $matches);
         preg_match_all($pattern2, $data, $matches2);

         $form_var =[];
         $form_val = [];
         foreach ($matches as $match){
            foreach ($match as $var){
                preg_match('/".*"/',$var,$var);
                $form_var[] = trim($var[0],"\"");
            }
         }


        foreach ($matches2 as $match){
            foreach ($match as $var){
                $form_val[] = trim($var);
            }
        }

        $form_params = [];

        for($i=0; $i<count($form_var); $i++){
            $form_params[] =[
                $form_var[$i] => $form_val[$i]
            ];
        }


        foreach ($form_params as $form_values){
            foreach ($form_values as $k => $v){
                if($k == "username"){
                    $username = $v;
                }elseif($k == "password"){
                    $password = password_hash($v,PASSWORD_DEFAULT);
                }elseif($k == "email"){
                    $email = $v;
                }
            }
        }


        if(isset($username) && isset($password) && isset($email)){
            UserModel::updateUser($id,$username, $password, $email);
        }elseif (isset($username) && !isset($password) && !isset($email)){
            UserModel::updateUserName($id, $username);
        }elseif (!isset($username) && isset($password) && !isset($email)){
            UserModel::updateUserPassword($id, $password);
        }elseif (!isset($username) && !isset($password) && isset($email)){
            UserModel::updateUserEmail($id, $email);
        }
    }

    public function delete($id)
    {
        UserModel::deleteUser($id);
    }


}