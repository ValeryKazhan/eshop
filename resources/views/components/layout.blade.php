@props(['cart'=> \App\Models\Cart::getPurchases()])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma Shop - Home</title>
    <link rel="icon" href="img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="/vendors/linericon/style.css">
    <link rel="stylesheet" href="/vendors/nouislider/nouislider.min.css">
</head>
<body>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="/"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <x-li-link href="/">Home</x-li-link>
{{--                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>--}}
                        @auth
                            <x-dropdown :name="auth()->user()->name">
                                <x-li-link href="/my-orders">My Orders</x-li-link>
                                <x-li-link href="/logout">Log Out</x-li-link>
                            </x-dropdown>


                        @else
                            <x-li-link href="/login">Login</x-li-link>
                            <x-li-link href="/register">Register</x-li-link>
                        @endauth


                    </ul>

                    <ul class="nav-shop">
                        <li><x-search-field-global/></li>
{{--                        <li class="nav-item"><button><i class="ti-search"></i></button></li>--}}
                        <li class="nav-item">
                            <a href="/cart" class="mr-3">
                                <button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{$cart ? count($cart) : ''}}</span></button>
                            </a>
                        </li>
                        <x-order-link-button/>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->

{{$slot}}

<!--================ Start footer Area  =================-->
<footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">Our Mission</h4>
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no
                            divided deep moved us lan Gathering thing us land years living.
                        </p>
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Quick Links</h4>
                        <ul class="list">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Product</a></li>
                            <li><a href="#">Brand</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Gallery</h4>
                        <ul class="list instafeed d-flex flex-wrap">
                            <li><img src="img/gallery/r1.jpg" alt=""></li>
                            <li><img src="img/gallery/r2.jpg" alt=""></li>
                            <li><img src="img/gallery/r3.jpg" alt=""></li>
                            <li><img src="img/gallery/r5.jpg" alt=""></li>
                            <li><img src="img/gallery/r7.jpg" alt=""></li>
                            <li><img src="img/gallery/r8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Contact Us</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Head Office
                            </p>
                            <p>123, Main Street, Your City</p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Phone Number
                            </p>
                            <p>
                                +123 456 7890 <br>
                                +123 456 7890
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                free@infoexample.com <br>
                                www.infoexample.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->



<script src="/vendors/jquery/jquery-3.2.1.min.js" defer></script>
<script src="/vendors/bootstrap/bootstrap.bundle.min.js" defer></script>
<script src="/vendors/skrollr.min.js" defer></script>
<script src="/vendors/owl-carousel/owl.carousel.min.js" defer></script>
<script src="/vendors/nice-select/jquery.nice-select.min.js" defer></script>
<script src="/vendors/nouislider/nouislider.min.js" defer></script>
<script src="/vendors/jquery.ajaxchimp.min.js" defer></script>
<script src="/vendors/mail-script.js" defer></script>
<script src="/js/main.js" defer></script>
</body>
</html>
