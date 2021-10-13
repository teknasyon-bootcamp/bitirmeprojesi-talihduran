<?php
namespace App\Controller;

use App\Model\NewsPostModel;
use App\Model\RoleModel;
use App\Model\UserModel;

class AdminController extends AbstractController{
    public function index(){
        echo view("admin",[]);
    }
    public function pages(){
        echo view("admin_pages",[]);
    }
    public function posts(){

        echo view("admin_posts");
    }
    public function users(){
        echo view("admin_users",[]);
    }
    public function deleteRequest(){
        session_start();
        $userId = $_SESSION['userId'];
        UserModel::deleteUser($userId);
        session_destroy();
        header("Location:http://teknasyon.project/login");
    }
    public function myProfile(){
        echo view("my_profile");

    }
    public function usersEdit(){
        echo view("admin_users_edit",[]);
        $userId = $_POST['userId'];

        $admin = $_POST['admin']??0;
        $moderator = $_POST['moderator']??0;
        $editor = $_POST['editor']??0;
        $user = $_POST['user']??0;

        if($admin == 1 || $moderator == 1 || $editor == 1 || $user == 1){
            RoleModel::updateRole($userId, $admin, $moderator, $editor, $user);
            header("Location:http://teknasyon.project/admin-users");
        }

    }
    public function usersDelete(){
        $userId = $_POST['userId'];
        UserModel::deleteUser($userId);
        header("Location:http://teknasyon.project/admin-users");
    }
    public function postAdd(){
        echo view("admin_post_add",[]);
    }
    public function postEdit(){
        echo view("admin_post_edit",[]);
    }
    public function postDelete(){
        echo view("admin_post_delete",[]);
    }
    public function handler(){
        $target_dir = __DIR__."..\..\..\public\\resources\images\\";
        $target_file = $target_dir . basename($_FILES["images"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST)){
            $check = getimagesize($_FILES["images"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if ($_FILES["images"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["images"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $images = $_FILES['images']['name'];
       $title = $_POST['title'];
       $content = $_POST['content'];
       $breaking_news = $_POST['breaking_news']??0;
       $active = $_POST['active']??0;

       $categories[0] = $_POST['haber']??0;
       $categories[1] = $_POST['spor']??0;
       $categories[5] = $_POST['finans']??0;
       $categories[2] = $_POST['seyahat']??0;
       $categories[3] = $_POST['oyun']??0;
       $categories[4] = $_POST['egitim']??0;
       $categories[6] = $_POST['sinema']??0;
       $categories[7] = $_POST['sanat']??0;

       $created_at = date("d/m/Y h:i:s");
       $updated_at = date("d/m/Y h:i:s");
       session_start();
       NewsPostModel::createNewsPost(
           $_SESSION['userId'], $title, $content, $created_at, $updated_at,
           $images,$breaking_news,$active,
           [$categories[0],$categories[1],$categories[2],$categories[3],$categories[4],$categories[5],$categories[6],$categories[7]]
       );
        header("Location:http://teknasyon.project/admin-posts");
    }
}
