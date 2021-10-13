<?php use App\Model\CommentModel;
use App\Model\NewsModel;
use App\Model\UserModel;

include "_shared/_header.php";?>
<?php

$username = $_SESSION['username'];
$userId = $_SESSION['userId'];

$comments = CommentModel::getCommentsForUser($userId);
//var_dump($comments);

?>

<div class="user-div">
    <div style="text-align: center">
        <div class="profile-circle">

        </div>
        <?php echo "Hoşgeldin ".$_SESSION['username']?>
    </div>

    <div class="profile-bio">

    </div>
    <div class="profile-comments">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Haber</th>
                    <th scope="col">Yorum</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($comments as $comment){
                    $_comment =$comment['comment'];
                    $newsId  =$comment['news_id'];
                    $_news = NewsModel::getNews($newsId);
                    $newsTitle = $_news['title'];

                echo "
                <tr>
                    <th scope='row'>$newsId</th>
                    <td>$newsTitle</td>
                    <td>$_comment</td>

                </tr>";

                }
               ?>

                </tbody>
            </table>

    </div>
</div>

<?php include "_shared/_footer.php";?>
