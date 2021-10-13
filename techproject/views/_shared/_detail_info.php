<?php
$news = $data[0];
?>
<div class="container">

<div class="detail-header-wrapper mt-4 ">
    <div>
        <h1><?= $news['title'] ?></h1>
    </div>
    <div class="detail-bottom-info mt-3">
        <?php foreach ($news['categories'] as $categories){
            foreach ($categories as $category){
                echo "<div class='detail-category'>
            <span>$category[0]</span>
        </div>";
            }
        };?>

        <div class="detail-author">
            <div class="detail-avatar">
            </div>
            <div style="margin-left: 7px">
                <span><?= $news['author']['nameSurname']?></span>
            </div>

        </div>
        <!--<div class="detail-date">
            <div style="margin-right: 5px"><span class="material-icons">schedule</span></div>
            <div style="margin-bottom: 5px"><span class="detail-date-font"><?= $news['created_at']?></span></div>
        </div>-->
    </div>

</div>
</div>