<?php

namespace App\Model;

use App\Database\Static\Mysql;

class PageModel
{
    public int $id;
    public string $name;
    public string $slug;
    public bool $active;

    public static function getPage(int $id): array{
        return Mysql::getInstance()->find("page",$id);
    }

    public static function createPage(string $name, string $slug, bool $active): bool{
        return Mysql::getInstance()->create("pages",[[
            "name" => $name, "slug" => $slug,
            "active" => $active,
        ]]);
    }

    public static function updatePage(int $id, string $name, string $slug, bool $active){
        return Mysql::getInstance()->update("pages", $id, [[
            "name" => $name,"slug" => $slug,
            "active" => $active,
        ]]);
    }

    public static function deletePage(int $id){
        return Mysql::getInstance()->delete("pages",$id);
    }
}