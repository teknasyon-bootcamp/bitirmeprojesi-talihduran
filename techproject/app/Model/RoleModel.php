<?php

namespace App\Model;

use App\Database\Static\Mysql;

class RoleModel extends AbstractModel
{

    public int $id;
    public bool $admin;
    public bool $moderator;
    public bool $editor;
    public bool $user;
    public int $userId;

    public static function getRole(int $id): mixed{
        return Mysql::getInstance()->find("roles",$id);
    }
    public static function getRoleByUserId(int $userId): mixed{
        return Mysql::getInstance()->findByField("roles", "user_id", $userId);
    }

    public static function createRole(int $userId,bool $admin, bool $moderator, bool $editor, bool $user): bool{
        return Mysql::getInstance()->create("roles",[["user_id" => $userId,"admin" =>$admin, "moderator" => $moderator, "editor" => $editor, "user" => $user]]);
    }

    public static function updateRole(int $userId,bool $admin, bool $moderator, bool $editor, bool $user){
        return Mysql::getInstance()->updateByField("roles","user_id",$userId,[["user_id" => $userId,"admin" =>$admin, "moderator" => $moderator, "editor" => $editor, "user" => $user]]);
    }

    public static function deleteRole(int $id){
        return Mysql::getInstance()->delete("roles",$id);
    }
}
