<?php
use GuzzleHttp\Client;
$client = new Client();
try {
    $response = $client->get('http://teknasyon.project/rest/news');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
$data = $response->getBody()->getContents();
$data = json_decode($data, true);

?>
<?php include "_shared/admin_header.php";?>
<div class="d-flex">
    <?php include "_shared/admin_sidebar.php";?>

    <div class="admin-wrapper mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="post-add">
                        <div>
                            <a href="admin-post-add"><button class="btn btn-primary">
                                Post Ekle
                            </button>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">

                </div>
            </div>
            <hr>
        </div>
        <!-- Table Start-->
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Username</th>
                <th scope="col">Title</th>
                <th scope="col">Tarih</th>
                <th scope="col">Kategori</th>
                <th scope="col">Düzenle veya Sil</th>
            </tr>
            </thead>
            <tbody>

                <?php
                foreach ($data as $news){
                    foreach ($news as $n){

                       echo "<tr>
                                  
                                <th scope='row'>$n[id]</th>
                                <td>$n[user_id]</td>
                                <td>$n[title]</td>
                                <td>$n[created_at]</td>
                                <td>
                                ";
                                foreach ($n['categories'] as $category){
                                   foreach ($category as $c){
                                       echo $c[0].",";
                                   }
                                }
                                echo "</td>
                                <td>
                                <div class='d-flex'>
                                    <form action='admin-post-edit' method='post'>
                                    <input type='text' hidden name='newsId' value='$n[id]'>
                                    <input type='text' hidden name='userId' value='$n[user_id]'>
                                    <button class='btn btn-warning'>Düzenle</button>
                                     </form>
                                     <form action='admin-post-delete' method='post'> 
                                     <input type='text' hidden  name='newsId' value='$n[id]'>
                                     <button class='btn btn-danger'>Sil</button></a>
                                     </form>
                                 </div>    
                                     
                                </td>
                            </tr>";
                    }

                }
                ?>



            </tbody>
        </table>
        <!-- Table Ends-->
    </div>

</div>


<?php include "_shared/admin_footer.php";?>

