@props([
    'cartItemsNumber'=> \App\Models\Cart::getItemsNumber(),
    'cart'=> \App\Models\Cart::getPurchases(),
    'wishlist' => auth()->check() ? auth()->user()->wishlist : array(),
    'title'
    ])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-ComFpatible" content="ie=edge">
    <title>Aroma Shop - {{$title}}</title>
    <link rel="icon" href="img/logo6.png" type="image/png">
    <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/style.css">

{{--    <link rel="stylesheet" href="{{ public_path('/css/style.css') }}">--}}

    <link rel="stylesheet" href="/vendors/linericon/style.css">
    <link rel="stylesheet" href="/vendors/nouislider/nouislider.min.css">
</head>
<body>

@include('header')

{{$slot}}

@include('footer')


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
