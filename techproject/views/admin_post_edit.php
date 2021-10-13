<?php

use App\Model\NewsPostModel;


if (isset($_POST['title']) || isset($_POST['content'])){

    $target_dir = __DIR__."..\..\public\\resources\images\\";
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
    $newsId = $_POST['newsId'];
    $userId = $_POST['userId'];

    $created_at = date("d/m/Y h:i:s");
    $updated_at = date("d/m/Y h:i:s");

    NewsPostModel::updateNewsPost($newsId,$userId,$title, $content, $updated_at,
        $images,0,1,
        [$categories[0],$categories[1],$categories[2],$categories[3],$categories[4],$categories[5],$categories[6],$categories[7]]);

    header("Location:http://teknasyon.project/admin-posts");
}else{
    $id = $_POST['newsId'];
    $news = NewsPostModel::getNewsPost($id);
}
?>
<?php include "_shared/admin_header.php";?>
<div class="d-flex">
    <?php include "_shared/admin_sidebar.php";?>
    <div class="admin-wrapper">
        <div class="container-fluid">
            <form action="/admin-post-edit" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label >Haber Başlığı</label>
                    <input type="text" class="form-control" name ="title" placeholder="Haber başlığını giriniz" <?php echo "value = $news[title] " ?>>
                </div>
                <div class="form-group">
                    <label >Haber içeriği</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control" style="resize: none" placeholder="Yazmaya başlayın..." ><?php echo $news['content']?></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Resim dosyası yükleyiniz</label>
                    <input class="form-control" type="file" id="formFile" name="images">
                </div>

                <label>Haber Durumlarını Seçiniz</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="breaking_news" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Son Dakika Haberi</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="active" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Haber Aktifliği</label>
                        </div>
                    </div>

                </div>

                <label>Kategorileri Seçiniz</label>
                <div class="input-group mb-3">

                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="haber" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Haber</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="spor" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Spor</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="finans" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Finans</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="seyahat" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Seyahat</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="oyun" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Oyun</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="egitim" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Eğitim</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="sinema" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Sinema</label>
                        </div>
                    </div>
                    <div class="input-group-prepend" style="margin-left: 0.5rem">
                        <div class="input-group-text">
                            <input type="checkbox" name="sanat" value=1>
                            <label class="form-label" style="margin-left: 5px;margin-top: 10px;">Sanat</label>
                        </div>
                    </div>
                </div>
                <input type="text" hidden name="newsId" value='<?php echo $_POST['newsId']; ?>'>
                <input type="text" hidden name="userId" value='<?php echo $_POST['userId']; ?>'>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>

</div>

<?php include "_shared/admin_footer.php";?>

