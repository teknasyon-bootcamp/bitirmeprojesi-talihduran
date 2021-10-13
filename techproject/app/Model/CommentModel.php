<?php

namespace App\Model;

use App\Database\Static\Mysql;

class CommentModel extends AbstractModel
{
    public int $id;
    public int $newsId;
    public int $userId;
    public string $comment;

    public static function getComment(int $id): array{
        return Mysql::getInstance()->find("comments",$id);
    }
    public static function getCommentsForUser(int $userId): array{
        return Mysql::getInstance()->findByField("comments","user_id", $userId);
    }
    public static function getCommentsForOneNews(int $newsId): array{
        return Mysql::getInstance()->findByFieldAndColumns("comments","news_id", $newsId, ["user_id", "comment",]);
    }
    public static function getAllComments(): array{
        return Mysql::getInstance()->all("comments");
    }

    public static function createComment(int $userId,int $newsId, string $comment): bool{
        return Mysql::getInstance()->create("comments",[["user_id" => $userId,"news_id" =>$newsId, "comment" => $comment]]);
    }

    public static function updateComment(int $userId,int $newsId, string $comment){
        return Mysql::getInstance()->updateByFields("comments",["user_id","news_id"],[$userId,$newsId],[["comment" => $comment]]);
    }

    public static function deleteComment(int $id){
        return Mysql::getInstance()->delete("comment",$id);
    }
}