<?php

use App\Model\CommentModel;
use App\Model\UserModel;
use GuzzleHttp\Client;

$username = $_SESSION['username'];
$user_id = $_SESSION['userId'];

if (isset($_POST['hideUser']) && isset($_POST['comment']) ){
    $comment = $_POST['comment'];
    CommentModel::createComment(2, $news['id'], $comment);

}elseif(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    CommentModel::createComment($_SESSION['userId'], $news['id'],$comment);
}
$client = new Client();
try {
    $response = $client->get('http://teknasyon.project/rest/news/'.$news['id']);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
$data = $response->getBody()->getContents();
$data = json_decode($data, true);

?>
<div class="container mt-3">
    <hr>
    <div class="comments-wrapper">
        <form action="/news/<?php echo "$news[id]/".permalink($news['title']) ?>" method="post">
        <div class="row">
            <div class="col-md-2">
                <div class="comments">
                    <div class="comment-avatar">

                    </div>
                    <div class="comment-author">
                    <span>
                        <?php echo $username ?>
                    </span>
                    </div>

                </div>
                <div class="hide-user">
                    <span>
                       <input type="checkbox" id="hide-user" name="hideUser" value=1>
                        <label for="vehicle1"> İsmimi gizle</label><br>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="comment-input">
                    <div>
                        <textarea name="comment" id="" cols="30" rows="7"></textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary" type="submit">Yorum Yap</button>
                    </div>
                </div>
            </div>
        </form>
        </div>


    </div>
    <!-- User Comments Starts-->
    <div class="user-comment-wrapper mt-5">
        <div class="row">
            <div class="col-md-8">

                <?php
                    foreach ($data['comments'] as $comments){
                       foreach ($comments as $comment){
                           $user = UserModel::getUser($comment['user_id']);
                           $username = $user['username'];
                           $content = $comment['comment'];
                          echo "
                           <div class='user-comments mt-2'>
                    <!-- User Comment Start-->
                    <div class='user-comment'>
                        <div class='user-avatar'>

                        </div>
                        <div class='user-name'>

                            <p><span>$username</span>$content</p>
                        </div>
                    </div>
                    <!-- User Comment Ends-->
                </div>
                          ";
                       }
                    }
                ?>




            </div>
        </div>

    </div>
    <!-- User Comments Ends-->
</div>