<?php

use App\Model\RoleModel;
use GuzzleHttp\Client;
$client = new Client();
try {
    $response = $client->get('http://teknasyon.project/rest/news');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
$data = $response->getBody()->getContents();
$data = json_decode($data, true);
foreach ($data as $news){
    foreach ($news as $news_arr){
        $post [] = $news_arr;
    }
}
$news_count = count($post);

$sidekickPosts = [$post[rand(0,$news_count-1)], $post[rand(0,$news_count -1)], $post[rand(0,$news_count -1)], $post[rand(0,$news_count -1)]];
for($i=0; $i<9; $i++){
    $tenPosts[] = $post[rand(0,$news_count-1)];
}


//echo  $_SESSION['username'];
//echo  $_SESSION['authenticated'];
?>

<?php include "_shared/_header.php";?>

<div class="container mt-4">
<!-- Posts Section Starts -->
<div class="row">
    <div class="col-md-3 p-1 " >
        <!-- Post Sidekick Wrapper Starts -->
        <div class="post-sidekick-wrapper">
            <!--  Post Sidekick Starts -->
            <a href='<?php echo "news/" . $sidekickPosts[0]['id']."/".permalink($sidekickPosts[0]['title']); ?> '>
            <div class="post-sidekick">
                <div class="category">
                    <p>HABER</p>
                </div>
                <div class="post-title">
                    <p><?= $sidekickPosts[0]['title']?></p>
                </div>

                <img src='<?php asset("images/".$sidekickPosts[0]['images']); ?>' alt="">
            </div>
            </a>
            <!--  Post Sidekick Ends -->

            <!--  Post Sidekick Starts -->
            <a href='<?php echo "news/" . $sidekickPosts[1]['id']."/".permalink($sidekickPosts[0]['title']); ?> '>
            <div class="post-sidekick">
                <div class="category">
                    <p>HABER</p>
                </div>
                <div class="post-title">
                    <p><?= $sidekickPosts[1]['title']?></p>
                </div>
                <img src='<?php asset("images/".$sidekickPosts[1]['images']); ?>' alt="">
            </div>
            </a>
            <!--  Post Sidekick Ends -->
        </div>
        <!-- Post Sidekick Wrapper Ends -->
    </div>
    <div class="col-md-6 p-1 m-0">
        <!-- Post Hero Wrapper Starts -->
        <div class="post-hero-wrapper">
            <div class="post-hero">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->

                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php
                        foreach ($tenPosts as $post){
                            $images = $post['images'];
                            echo "<div class='swiper-slide'>
                            <a href='";echo "news/$post[id]"."/".permalink($post['title'])."'>
                            <div class='category'>
                                <p>HABER</p>
                            </div>
                            <div class='hero-post-title'>
                                <p>$post[title]</p>
                            </div>
                            <img src='";echo asset("images/".$images) ."' alt=''>
                          </a>
                           </div>";
                        }

                        ?>


                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
                <!-- Slider main container Ends -->
            </div>
        </div>
        <!-- Post Hero Wrapper Ends -->
    </div>
    
    <div class="col-md-3 p-1 " >
        <!-- Post Sidekick Wrapper Starts -->


        <div class="post-sidekick-wrapper">
            <!--  Post Sidekick Starts -->
            <a href='<?php echo "news/" . $sidekickPosts[2]['id']."/".permalink($sidekickPosts[2]['title']); ?> '>
            <div class="post-sidekick">
                <div class="category">
                    <p>HABER</p>
                </div>
                <div class="post-title">
                    <p><?= $sidekickPosts[2]['title']?></p>
                </div>

                <img src='<?php asset("images/".$sidekickPosts[2]['images']); ?>' alt="">
            </div>
            </a>
            <!--  Post Sidekick Ends -->

            <!--  Post Sidekick Starts -->
            <a href='<?php echo "news/" . $sidekickPosts[3]['id']."/".permalink($sidekickPosts[3]['title']); ?> '>
            <div class="post-sidekick">
                <div class="category">
                    <p>HABER</p>
                </div>
                <div class="post-title">
                    <p><?= $sidekickPosts[3]['title']?></p>
                </div>
                <img src='<?php asset("images/".$sidekickPosts[3]['images']); ?>' alt="">
            </div>
            </a>
            <!--  Post Sidekick Ends -->
        </div>
        </a>
        <!-- Post Sidekick Wrapper Ends -->
    </div>
</div>
    <!-- Posts Section Ends -->
</div>

<div>
    <!-- Random News Section Starts-->
        <div class="container mt-5">
            <div>
                <h3>Öne Çıkan Haberler</h3>
            </div>
            <div class="row">
               <div class="col-md-12 p-0" >
                   <!-- Random News Post Starts-->
                   <div class="random-posts-section" >
                       <?php
                       foreach ($tenPosts as $post){
                           echo "
<!-- Post Starts -->
                       <div class='row mt-2 post-frame'>
                           <div class='col-md-4 p-0'>
                               <div class='post-img'>
                                   <img src='";asset("images/$post[images]");echo "' alt=''>
                               </div>
                           </div>
                           <div class='col-md-8 p-0'>
                               <div class='post-desc'>
                                   <div class='post-desc-inner'>
                                       <h4>$post[title]</h4>
                                       <p>";echo substr($post['content'],0,120). "...</p>
                                       <div class='read-link'>
                                           <a href='/news/";echo $post['id']. "/" . permalink($post['title']). "'>Okumaya devam edin</a>
                                       </div>
                                   </div>

                               </div>
                           </div>
                       </div>
<!-- Post Ends -->";
                       }


                       ?>



                   </div>
                   <!-- Random News Post Ends-->
               </div>
            </div>
        </div>
    <!-- Random News Section Starts-->
</div>


<?php include "_shared/_footer.php";?>

