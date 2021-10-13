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
    <title>Teknasyon - Giriş yap</title>
</head>
<body>

<div class="login-wrapper">
    <div class="login">
        <div class="login-logo">
            <span>Teknasyon Haber</span>
        </div>
        <div class="login-main">
            <form action="/login/validation" method="POST">
            <div class="mt-3">
                <input type="text"  name ="username" class="form-control" placeholder="Email">
            </div>
            <div class="mt-2">
                <input type="password" name="password" class="form-control" placeholder="Şifre">
            </div>
                <div class="login-btn mt-4">
                    <button class="btn btn-primary">Giriş Yap</button>
                </div>
                <div style="text-align: center;" class="mt-2">
                    <a href="/register" style="text-decoration: none">Kayıt ol</a>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="../public/resources/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>