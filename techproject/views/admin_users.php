<?php

use App\Model\RoleModel;
use GuzzleHttp\Client;
$client = new Client();
try {
    $response = $client->get('http://teknasyon.project/rest/users');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
$data = $response->getBody()->getContents();
$data = json_decode($data, true);

?>
<?php include "_shared/admin_header.php";?>
<div class="d-flex">
    <?php include "_shared/admin_sidebar.php";?>

    <div class="admin-wrapper">
        <div class="container-fluid">
        </div>
        <!-- Table Start-->
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Roller</th>
                <th scope="col">Düzenle veya Sil</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($data as $users){
                 $userId = $users['id'];
                    echo "<tr>
                                <th scope='row'>$users[id]</th>
                                <td>$users[username]</td>
                                <td>$users[email]</td>   
                                <td>";
                                   $roles = RoleModel::getRoleByUserId((int)$users['id']);

                                       foreach ($roles as $role){
                                           foreach ($role as $r =>$v){
                                               if($r == "id"|| $r=="user_id" || $v == 0){

                                               }else{
                                                   echo $r . ",";
                                               };
                                           }


                                       }

                    echo "</td>                         
                                <td>
                                <div class='d-flex'>
                                <div>
                                    <form action='/admin-users-edit' method='post'>
                <input  type='text' name='userId' value='$userId' hidden>
                <button  class='btn btn-warning'>Düzenle</button>
            </form></div>
            <div>
            <form action='/admin-users-delete' method='post'>
                <input  type='text' name='userId' value='$userId' hidden>
                  <button  class='btn btn-danger'>Sil</button>
            </form>
                  </div>  
                  </div>            
                  </td>
                            </tr>";
            }
            ?>



            </tbody>
        </table>
        <!-- Table Ends-->
    </div>
        </div>
    </div>


</div>


<?php include "_shared/admin_footer.php";?>

