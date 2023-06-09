<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('employee/assets/images/fav.jpg')}}" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('employee/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('employee/assets/plugins/charts-c3/plugin.css')}}" />
    <link rel="stylesheet" href="{{asset('employee/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />


    <!--Google font-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <!---->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('employee/light/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('employee/light/coustam.css')}}">
    <link rel="stylesheet" href="{{ asset('employee/light/assets/css/color_skins.css')}}">
    @yield('css')
</head>

<body class="theme-purple">
    <!-- Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    @include('employee.layouts.header')
    @include('employee.layouts.sidebar')

    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{ asset('employee/light/assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{ asset('employee/light/assets/bundles/vendorscripts.bundle.js')}}"></script>

    <script src="{{ asset('employee/light/assets/bundles/c3.bundle.js')}}"></script>
    <script src="{{ asset('employee/light/assets/bundles/jvectormap.bundle.js')}}"></script>
    <script src="{{ asset('employee/light/assets/bundles/knob.bundle.js')}}"></script>

    <script src="{{ asset('employee/light/assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{ asset('employee/light/assets/js/pages/index.js')}}"></script>
    @yield('js')
</body>


</html>

