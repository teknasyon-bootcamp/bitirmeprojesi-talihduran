<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php asset('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php asset('css/main.css'); ?>">
    <title>En son haberler</title>
</head>
<body>

<!-- Header Start-->
<div class="container-fluid p-0">
    <!--Signed-bar Starts-->
    <div class="signed-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">Teknasyon Haber</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: flex-end;margin-right: 100px">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hesap
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/my-profile">Profil</a></li>
                                <li><a class="dropdown-item" href="/delete-my-profile">Hesabımı Sil</a></li>
                                <li><a class="dropdown-item" href="/logout">Çıkış Yap</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--Signed-bar Ends-->
    <div class="container">
        <div class="header-section">
            <div class="row align-items-center header">

                <!-- Header Logo Start-->
                <div class="col-md-4">
                    <a href="/home"><span class="logo-text">Teknasyon Haber</span></a>
                </div>
                <!-- Header Logo End -->
                <div class="col-md-4">

                </div>
                <!-- Sign Starts -->
                <?php

                if(empty($_SESSION['authenticated'])){
                    echo "<div class='col-md-4 sign-buttons'>
                    <div class='sign-in'>
                        <a href='/login'><button class='btn btn-primary'>Giriş Yap</button></a>
                    </div>
                    <div class='sign-up'>
                        <a href='/register'><button class='btn btn-success'>Üye Ol</button>
                    </div>
                    <div>
                    </div>
                </div>
                <!-- Sign Ends -->";
                }else{
                    echo "Hoşgeldiniz ". $_SESSION['username'];
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Menu Start-->
<div class="container-fluid p-0 menu-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-menu-wrapper">
                    <!-- Main Menu Start -->
                    <div class="main-menu">
                            <nav>
                                <ul class="d-flex justify-content-center align-items-center">
                                    <li><a href="#">Haber</a></li>
                                    <li><a href="#">Spor</a></li>
                                    <li><a href="#">Finans</a></li>
                                    <li><a href="#">Oyun</a></li>
                                    <li><a href="#">Sinema</a></li>
                                    <li><a href="#">Eğitim</a></li>
                                </ul>
                            </nav>
                    </div>
                    <!-- Main Menu End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End-->

<!-- Breaking News Section Start -->
<div class="container-fluid p-0 breaking-news-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breaking News Start -->
                <div class="breaking-news-wrapper">
                    <div class="breaking-news-inner">
                        <div>
                            <h5 >SON DAKİKA</h5>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <a href="#">Örnek son dakika haberi...</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- Breaking News Start -->
            </div>
        </div>
    </div>
</div>
<!-- Breaking News Section End -->