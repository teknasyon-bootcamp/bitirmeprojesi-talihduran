<?php

namespace App\Model;

use App\Database\Static\Mysql;

class AuthorModel
{
    public int $id;
    public int $userId;
    public string $nameSurname;
    public string $bio;

    public static function getAuthor(int $id): array{
        return Mysql::getInstance()->find("author",$id);
    }
    public static function getAuthorByUserId(int $userId): array{
        return Mysql::getInstance()->findByField("author","user_id",$userId);
    }

    public static function createAuthor(int $userId, string $nameSurname, string $bio): bool{
        return Mysql::getInstance()->create("author",[[
            "user_id" => $userId, "nameSurname" => $nameSurname,
            "bio" => $bio,
        ]]);
    }

    public static function updateAuthor(int $userId, string $nameSurname, string $bio){
        return Mysql::getInstance()->updateByField("author","user_id", $userId, [[
            "user_id" => $userId, "nameSurname" => $nameSurname,
            "bio" => $bio,
        ]]);
    }

    public static function deleteAuthor(int $id){
        return Mysql::getInstance()->delete("author",$id);
    }
}