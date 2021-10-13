<?php

namespace App\Model;

use App\Database\Static\Mysql;

class NewsModel
{
    public int $id;
    public int $userId;
    public string $title;
    public string $content;
    public string $images;
    public bool $breakingNews;
    public bool $active;
    public string $created_at;
    public string $updated_at;


public static function getNews(int $id): array{
    return Mysql::getInstance()->find("news",$id);
}
    public static function getAllNews(): array{
        return Mysql::getInstance()->all("news");
    }

public static function createNews(int $userId, string $title, string $content , string $images, bool $breakingNews, bool $active, string $created_at,string $updated_at): bool{
    return Mysql::getInstance()->create("news",[[
        "user_id" =>$userId, "title" => $title,
        "content" => $content, "images" => $images,
        "breaking_news" => $breakingNews, "active" => $active, "created_at" => $created_at,
        "updated_at" => $updated_at
        ]]);
}

public static function updateNews(int $id,int $userId,string $title, string $content , string $images, bool $breakingNews, bool $active,string $updated_at){
    return Mysql::getInstance()->update("news",$id,[[
        "user_id" =>$userId, "title" => $title,
        "content" => $content, "images" => $images,
        "breaking_news" => $breakingNews, "active" => $active,
        "updated_at" => $updated_at
    ]]);
}

public static function deleteNews(int $id){
    return Mysql::getInstance()->delete("news",$id);
}

}