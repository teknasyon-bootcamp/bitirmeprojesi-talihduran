<?php

namespace App\Model;

use App\Database\Static\Mysql;

class PermissionModel
{
    public int $id;
    public int $userId;
    public bool $_create;
    public bool $_update;
    public bool $_delete;
    public bool $_read;

    public static function getPermission(int $id): array{
        return Mysql::getInstance()->find("permissions",$id);
    }

    public static function createPermission(int $userId, bool $_create, bool $_update, bool $_delete, bool $_read): bool{
        return Mysql::getInstance()->create("roles",[[
            "user_id" => $userId, "_create" => $_create,
            "_update" => $_update, "_delete" => $_delete,
            "_read" => $_read
        ]]);
    }

    public static function updatePermission(int $userId, bool $_create, bool $_update, bool $_delete, bool $_read){
        return Mysql::getInstance()->updateByField("permissions","user_id", $userId, [[
            "user_id" => $userId,"_create" => $_create,
            "_update" => $_update, "_delete" => $_delete,
            "_read" => $_read
        ]]);
    }

    public static function deletePermission(int $id){
        return Mysql::getInstance()->delete("roles",$id);
    }

}