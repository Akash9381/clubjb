<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Club JB">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#08a1dc">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
    <!-- Title -->
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="img/icons/fav.jpg">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/brands.min.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/solid.min.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/coustam.css')}}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('users/style.css')}}">
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('users/manifest.json')}}">
</head>

<body>
    <!-- Preloader-->

@yield('content')
@include('users.layouts.footer')

    <script src="{{ asset('users/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('users/js/jquery.min.js')}}"></script>
    <script src="{{ asset('users/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('users/js/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('users/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('users/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('users/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('users/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('users/js/jquery.passwordstrength.js')}}"></script>
    <script src="{{ asset('users/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('users/js/theme-switching.js')}}"></script>
    <script src="{{ asset('users/js/no-internet.js')}}"></script>
    <script src="{{ asset('users/js/active.js')}}"></script>
    <script src="{{ asset('users/js/pwa.js')}}"></script>
</body>


</html>
