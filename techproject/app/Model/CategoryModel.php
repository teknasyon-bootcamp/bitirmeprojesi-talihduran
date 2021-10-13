<?php

namespace App\Model;

use App\Database\Static\Mysql;

class CategoryModel
{
    public int $id;
    public int $newsId;
    public bool $haber;
    public bool $spor;
    public bool $finans;
    public bool $seyahat;
    public bool $oyun;
    public bool $egitim;
    public bool $sinema;
    public bool $sanat;

    public static function getCategory(int $id): array{
        return Mysql::getInstance()->find("categories",$id);
    }
    public static function getCategoryByField(int $newsId): array{
        return Mysql::getInstance()->findByField("categories","news_id", $newsId);
    }

    public static function createCategory(int $newsId, bool $haber, bool $spor, bool $finans, bool $seyahat, bool $oyun, bool $egitim, bool $sinema, bool $sanat): bool{
        return Mysql::getInstance()->create("categories",[[
            "news_id" => $newsId,
            "haber" => $haber, "spor" =>$spor,
            "finans" => $finans, "seyahat" => $seyahat,
            "oyun" => $oyun, "egitim" => $egitim, "sinema" => $sinema,
            "sanat" => $sanat
        ]]);
    }

    public static function updateCategory(int $newsId, bool $haber, bool $spor, bool $finans, bool $seyahat, bool $oyun, bool $egitim, bool $sinema, bool $sanat){
        return Mysql::getInstance()->updateByField("categories","news_id", $newsId, [[
            "haber" => $haber, "spor" =>$spor,
            "finans" => $finans, "seyahat" => $seyahat,
            "oyun" => $oyun, "egitim" => $egitim, "sinema" => $sinema,
            "sanat" => $sanat
        ]]);
    }

    public static function deleteCategory(int $id){
        return Mysql::getInstance()->delete("categories",$id);
    }
    public static function deleteCategoryByNewsId(int $newsId){
        return Mysql::getInstance()->deleteByField("categories","news_id",$newsId);
    }

}