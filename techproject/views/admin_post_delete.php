<?php

use App\Model\NewsPostModel;

$newsId = $_POST['newsId'];
NewsPostModel::delete($newsId);

header("Location:http://teknasyon.project/admin-posts");