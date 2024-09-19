<?php use \Illuminate\Support\Facades\Route?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="HVAC Template">
    <meta name="keywords" content="HVAC, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HVAC | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css')}}'" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" type="text/css">

</head>

<body>



<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__widget">
        <a href="#"><i class="fa fa-cart-plus"></i></a>
        <a href="#" class="search-switch"><i class="fa fa-search"></i></a>
        <a href="#" class="primary-btn">Add Car</a>
    </div>
    <div class="offcanvas__logo">
        <a href="/"><img src="assets/img/logo.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <ul class="offcanvas__widget__add">
        <li><i class="fa fa-clock-o"></i> Week day: 08:00 am to 18:00 pm</li>
        <li><i class="fa fa-envelope-o"></i> Info.colorlib@gmail.com</li>
    </ul>
    <div class="offcanvas__phone__num">
        <i class="fa fa-phone"></i>
        <span>(+12) 345 678 910</span>
    </div>
    <div class="offcanvas__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul class="header__top__widget">
                        <li><i class="fa fa-clock-o"></i> Week day: 08:00 am to 18:00 pm</li>
                        <li><i class="fa fa-envelope-o"></i> Info.colorlib@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="header__top__right">
                        <div class="header__top__phone">
                            <i class="fa fa-phone"></i>
                            <span>(+12) 345 678 910</span>
                        </div>
                        <div class="header__top__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="/"><img src="assets/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="header__nav">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{Route::currentRouteName()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">Home</a></li>
{{--                            <li><a href="{{route("cars")}}">Cars</a></li>--}}
{{--                            <li><a href="{{route("blog")}}">Blog</a></li>--}}
                            <li class="{{Route::currentRouteName()=='about' ? 'active' : ''}}"><a href="{{route("about")}}">About</a></li>
                            <li class="{{Route::currentRouteName()=='contact' ? 'active' : ''}}"><a href="{{route("contact")}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <span class="fa fa-bars"></span>
        </div>
    </div>
</header>
