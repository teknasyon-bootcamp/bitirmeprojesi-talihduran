<?php

namespace App\Model;

use App\Database\Static\Mysql;

class PostModel extends  AbstractModel
{
    public int $id;
    public string $title;
    public string $content;
    public string $create_at;
    public string $update_at;
    public string $images;
    public string $username;
    public string $author;
    public string $category;


    public static function getPosts(){
        return Mysql::getInstance()->getPosts();
    }

    public static function createNews(string $table, array $values): bool{
        return Mysql::getInstance()->create($table,$values);
    }
    public static function createPosts(string $table, int $userId, int $authorId, int $newsId){
        return Mysql::getInstance()->createPosts($table, $userId, $authorId, $newsId);
    }

}






//
//namespace App\Model;
//use App\Database\Static\Mysql;
//use App\Pattern\Singleton;
//
//class Books extends AbstractModel
//{
//    public static function all(): array
//    {
//        return Mysql::getInstance()->all("book");
//    }
//    public static function customSql(){
//        return Mysql::getInstance()->getPdoObject();
//    }
//}