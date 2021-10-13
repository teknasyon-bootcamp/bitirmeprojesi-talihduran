<?php

namespace App\Model;

use App\Database\Static\Mysql;

class NewsPostModel
{
    //public int $newsId;
    public int $userId;
    public string $title;
    public string $content;
    public string $created_at;
    public string $updated_at;
    public string $images;
    public string $breaking_news;
    public string $active;
    //public string $username;
    public string $author;
    public array $categories;

    public static function getNewsPost($id) : array{

        $news = NewsModel::getNews($id);
        $commentsForNews = CommentModel::getCommentsForOneNews($id);
        $author = AuthorModel::getAuthorByUserId($news['user_id']);
        $categories = CategoryModel::getCategoryByField($id);
        $selectedCategory= [];

        foreach ($categories as $category ){
            foreach ($category as $c => $boolVal){
                if($c == "id" || $c =="news_id" || $boolVal == 0){
                    continue;
                }
                $selectedCategory[] = [$c];
            }
        }

        $news['comments'] = [$commentsForNews];
        if (isset($author[0])){
            $news['author'] = [
                'id' => $author[0]['id'],
                'nameSurname' => $author[0]['name_surname'],
                'bio' => $author[0]['bio']
            ];
        }else{
            $news['author'] = [
                'id' => "Not Available",
                'nameSurname' => "Not Available",
                'bio' => "Not Available",
            ];
        }

        $news['categories'] = [$selectedCategory];
        return $news;
    }

    public static function getAllNewsPost(): array
    {
        $allNews = NewsModel::getAllNews();
        $newsId = [];

        foreach ($allNews as $n){
            $newsId[] = $n['id'];
        }
        $newsStack = [];

        foreach ($newsId as $id){

            $news = NewsModel::getNews($id);

            $commentsForNews = CommentModel::getCommentsForOneNews($id);
            $author = AuthorModel::getAuthorByUserId($news['user_id']);
            $categories = CategoryModel::getCategoryByField($id);

            $selectedCategory= [];

            foreach ($categories as $category ){
                foreach ($category as $c => $boolVal){
                    if($c == "id" || $c =="news_id" || $boolVal == 0){
                        continue;
                    }
                    $selectedCategory[] = [$c];
                }
            }

            $news['comments'] = [$commentsForNews];
            if (isset($author[0])){
            $news['author'] = [
                'id' => $author[0]['id'],
                'nameSurname' => $author[0]['name_surname'],
                'bio' => $author[0]['bio']
            ];
            }
            $news['categories'] = [$selectedCategory];

            $newsStack[] = [$news];
        }
        return $newsStack;
    }

    public static function createNewsPost (
        int $userId, string $title, string $content, string $created_at,
        string $updated_at, string $images, bool $breaking_news, bool $active,array $categories
    ): bool{
        try {
            Mysql::getInstance()->startTransaction();
            NewsModel::createNews($userId, $title, $content,$images, $breaking_news,$active,$created_at, $updated_at);
            $newsId = Mysql::getInstance()->lastInsertedId();
            CategoryModel::createCategory($newsId, $categories[0], $categories[1], $categories[2], $categories[3], $categories[4], $categories[5], $categories[6], $categories[7]);
            Mysql::getInstance()->commitTransaction();
        }catch (\PDOException $e){
            Mysql::getInstance()->rollbackTransaction();
            print "Error!: " . $e->getMessage() . "</br>";
            return false;
        }
        return true;
    }

    public static function updateNewsPost(
        int $id, int $userId, string $title, string $content,
        string $updated_at,string $images, bool $breaking_news, bool $active,array $categories
    ): bool
    {
        try {
            Mysql::getInstance()->startTransaction();
            NewsModel::updateNews($id, $userId, $title, $content, $images, $breaking_news, $active, $updated_at);
            CategoryModel::updateCategory($id,  $categories[0], $categories[1], $categories[2], $categories[3], $categories[4], $categories[5], $categories[6], $categories[7]);
            Mysql::getInstance()->commitTransaction();
        }catch (\PDOException $e){
            Mysql::getInstance()->rollbackTransaction();
            print "Error!: " . $e->getMessage() . "</br>";
            return false;
        }
        return true;
    }

    public static function delete($id) :bool{
        try {
            Mysql::getInstance()->startTransaction();
            NewsModel::deleteNews($id);
            CategoryModel::deleteCategoryByNewsId($id);
            Mysql::getInstance()->commitTransaction();
        }catch (\PDOException $e){
            Mysql::getInstance()->rollbackTransaction();
            print "Error!: " . $e->getMessage() . "</br>";
            return false;
        }
        return true;
    }
}