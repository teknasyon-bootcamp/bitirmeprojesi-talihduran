<?php
$news = $data[0];
$postName = $data[1];
?>
<?php include "_shared/_header.php";?>
<?php include "_shared/_detail_info.php"?>

<div class="container mt-4">
    <div class="content ">
        <?php
        if (isset($news['images'])){
            echo "<div class='content-img'>
            <div>
            <img src='";asset("images/$news[images]"); echo"'  alt=''>
</div>        
</div>";
        }
        ?>
        <p>
            <?php echo $news['content'];?>
        </p>

    </div>
</div>

<?php include "_shared/_comments.php"?>
<?php include "_shared/_footer.php";?>