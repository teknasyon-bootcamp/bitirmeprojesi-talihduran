<?php

namespace App\Model;

use App\Database\Static\Mysql;

class UserModel extends AbstractModel
{
    public string $username;
    public string $password;
    public string $email;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public static function getUser(int $id): array{
        return Mysql::getInstance()->find("users",$id);
    }
    public static function getUserByUserName(string $username): array{
        return Mysql::getInstance()->findByField("users","username",$username);
    }

    public static function getAllUser(): array{
        return Mysql::getInstance()->all("users");
    }

    public static function createUser(string $username, string $password, string $email): bool{
        try {
            Mysql::getInstance()->startTransaction();
            Mysql::getInstance()->create("users",[["username" =>$username, "pass" => $password, "email" => $email]]);
            $id = Mysql::getInstance()->lastInsertedId();
            RoleModel::createRole($id,0,0,0,1);
            Mysql::getInstance()->commitTransaction();
        }catch (\PDOException $e){
            Mysql::getInstance()->rollbackTransaction();
            print "Error!: " . $e->getMessage() . "</br>";
            return false;
        }
        return true;
    }

    public static function updateUser(int $id, string $username, string $password, string $email){
        return Mysql::getInstance()->update("users",$id,[["username" => $username, "pass" => $password, "email" => $email]]);
    }

    public static function updateUserName(int $id, string $username){
        return Mysql::getInstance()->update("users",$id,[["username" => $username]]);
    }

    public static function updateUserPassword(int $id, string $password){
        return Mysql::getInstance()->update("users",$id,[["pass" => $password]]);
    }

    public static function updateUserEmail(int $id,string $email){
        return Mysql::getInstance()->update("users",$id,[["email" => $email]]);
    }

    public static function deleteUser(int $id){
        return Mysql::getInstance()->delete("users",$id);
    }
}
