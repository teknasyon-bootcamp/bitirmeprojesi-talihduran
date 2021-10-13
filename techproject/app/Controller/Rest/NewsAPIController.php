<?php

namespace App\Controller\Rest;

use App\Model\AuthorModel;
use App\Model\CategoryModel;
use App\Model\CommentModel;
use App\Model\NewsModel;
use App\Model\NewsPostModel;
use App\Model\PostModel;
use App\Model\UserModel;
use Symfony\Component\Routing\RequestContext;

class NewsAPIController implements ApiInterface
{
    public RequestContext $context;
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function requestHandler(){
        $this->context->setMethod($_SERVER['REQUEST_METHOD']);
        $RequestMethod =  $this->context->getMethod();

        $func = match ($RequestMethod){
            "GET" => $this->getAll(),
            "POST" => $this->create(),
        };

    }

    public function singleRequestHandler($id){
        $this->context->setMethod($_SERVER['REQUEST_METHOD']);
        $RequestMethod =  $this->context->getMethod();

        $func = match ($RequestMethod){
            "GET" => $this->get($id),
            "PATCH" => $this->update($id),
            "PUT" => $this->update($id),
            "DELETE" => $this->delete($id)
        };

    }
    public function get($id)
    {
        header("Content-Type: application/json; charset=utf-8");
        $news = NewsPostModel::getNewsPost($id);
        $news = json_encode($news);
        echo $news;

    }

    public function getAll()
    {
        header("Content-Type: application/json; charset=utf-8");
        $allNews = NewsPostModel::getAllNewsPost();
        $allNews = json_encode($allNews);
        echo $allNews;
    }

    public function create(): bool
    {

        $userId =$_POST['userId'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $created_at = $_POST['created_at'];
        $updated_at = $_POST['updated_at'];
        $images = $_POST['images'];
        $categories[0] = $_POST['haber'];
        $categories[1] = $_POST['spor'];
        $categories[2] = $_POST['finans'];
        $categories[3] = $_POST['seyahat'];
        $categories[4] = $_POST['oyun'];
        $categories[5] = $_POST['egitim'];
        $categories[6] = $_POST['sinema'];
        $categories[7] = $_POST['sanat'];
        $breaking_news = $_POST['breaking_news'];
        $active = $_POST['active'];

        return NewsPostModel::createNewsPost(
            $userId, $title, $content,
            $created_at, $updated_at,
            $images, $breaking_news, $active,[$categories[0],$categories[1],$categories[2],$categories[3],$categories[4],$categories[5],$categories[6],$categories[7]]
        );
    }

    public function update($id)
    {

        $data = file_get_contents("php://input");

        $pattern1 = '/name="[a-z].*"/';
        $pattern2 = '/\s{2}[[:alnum:]].*\s-/';
        preg_match_all($pattern1, $data, $matches);
        preg_match_all($pattern2, $data, $matches2);
        $form_var =[];
        $form_val = [];
        foreach ($matches as $match){
            foreach ($match as $var){
                preg_match('/".*"/',$var,$var);
                $form_var[] = trim($var[0],"\"");
            }
        }


        foreach ($matches2 as $match){
            foreach ($match as $var){
                $form_val[] = rtrim(trim($var),'-');
            }
        }

        $form_params = [];

        for($i=0; $i<count($form_var); $i++){
            $form_params[] =[
                $form_var[$i] => $form_val[$i]
            ];
        }

        foreach ($form_params as $form_param){
            if(isset($form_param['userId'])){
                $userId =$form_param['userId'];
            }elseif(isset($form_param['title'])){
                $title =rtrim($form_param['title']);
            } elseif(isset($form_param['content'])){
                $content = rtrim($form_param['content']);
            }elseif(isset($form_param['updated_at'])){
                $updated_at = $form_param['updated_at'];
            }elseif(isset($form_param['images'])){
                $images = rtrim($form_param['images']);
            }elseif(isset($form_param['haber'])){
                $categories[0] = $form_param['haber'];
            }elseif(isset($form_param['spor'])){
                $categories[1] = $form_param['spor'];
            }elseif(isset($form_param['finans'])){
                $categories[2] = $form_param['finans'];
            }elseif(isset($form_param['seyahat'])){
                $categories[3] = $form_param['seyahat'];
            }elseif(isset($form_param['oyun'])){
                $categories[4] = $form_param['oyun'];
            }elseif(isset($form_param['egitim'])){
                $categories[5] = $form_param['egitim'];
            }elseif(isset($form_param['sinema'])){
                $categories[6] = $form_param['sinema'];
            }elseif(isset($form_param['sanat'])){
                $categories[7] = $form_param['sanat'];
            }elseif(isset($form_param['breaking_news'])){
                $breaking_news = $form_param['breaking_news'];
            }elseif (isset($form_param['active'])){
                $active = $form_param['active'];
            }
        }

        NewsPostModel::updateNewsPost($id, $userId, $title, $content, $updated_at, $images, $breaking_news, $active, $categories);

    }

    public function delete($id)
    {
        NewsPostModel::delete($id);
    }



}