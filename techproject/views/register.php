<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../public/resources/css/main.css">
    <title>Teknasyon - Kayıt Ol</title>
</head>
<body>
<div class="register-wrapper">
    <form action="/register" method="post">
    <div class="register">
        <div class="mb-5" style="text-align: center;color: #0d6efd;" >
            <h2>Teknasyon Habere Kayıt Ol</h2>
        </div>
        <!--Register Item Starts -->
        <div class="register-item">
            <div class="register-input-icon">
                <span class="material-icons">account_circle</span>
            </div>
            <div class="register-input">
                <input type="text" class="form-control" name="username" placeholder="Kullanıcı adı">
            </div>
        </div>
        <!--Register Item Ends -->
        <!--Register Item Starts -->
        <div class="register-item">
            <div class="register-input-icon">
               <span class="material-icons">email</span>
            </div>
            <div class="register-input">
                <input type="email" class="form-control" name="email" placeholder="Email adresi">
            </div>
        </div>
        <!--Register Item Ends -->
        <!--Register Item Starts -->
        <div class="register-item">
            <div class="register-input-icon">
                <span class="material-icons">lock</span>
            </div>
            <div class="register-input">
                <input type="password" class="form-control" name="password" placeholder="Şifre oluşturun">
            </div>
        </div>
        <!--Register Item Ends -->
        <!--Register Item Starts -->
        <div class="register-item">
            <div class="register-input-icon">
                <span class="material-icons">lock</span>
            </div>
            <div class="register-input">
                <input type="password" class="form-control" name ="passwordAgain" placeholder="Şifreyi tekrar edin">
            </div>
        </div>
        <!--Register Item Ends -->

        <div class="register-btn mt-3">
            <button class="btn btn-primary" type="submit">Kayıt Ol</button>
        </div>
        <div class="mt-4 text-center">
            <a href="/login" style="text-decoration: none"><span>Üye misiniz? </span></a>
        </div>
    </div>
    </form>
</div>

<script src="../public/resources/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/swiper/swiper-bundle.min.js"></script>

</body>