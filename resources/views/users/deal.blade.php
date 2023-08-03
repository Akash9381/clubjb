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
    <title>Deal | Club JB</title>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Poppins:wght@300&family=Roboto:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('users/img/icons/fav.jpg') }}">

    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/coustam.css') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('users/style.css') }}">
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('users/manifest.json') }}">

</head>


<body>
    <!-- Preloader-->

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
            <!-- Back Button-->
            <div class="back-button me-2 me-2"><a href="{{ url()->previous() }}"><i
                        class="fa-solid fa-arrow-left-long"></i></a>
            </div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">{{ $deal['shop_deal'] }} for {{ $deal['User']['name'] }}</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                aria-controls="suhaOffcanvas">
                <div><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas"
        aria-labelledby="suhaOffcanvasLabel">
        <!-- Close button-->
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        <!-- Offcanvas body-->
        <div class="offcanvas-body">
            <!-- Sidenav Profile-->
            <div class="sidenav-profile">
                <div class="user-profile"><img src="{{ asset('users/img/icons/Person.ico') }}" alt=""></div>
                <div class="user-info">
                    <h5 class="user-name mb-1 text-white">{{ Auth::user()->name }}</h5>
                </div>
            </div>
            <!-- Sidenav Nav-->
            <ul class="sidenav-nav ps-0">
                <li><a href="{{ url('user/profile') }}">My Profile</a></li>
                <li><a href="#">My Services</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="{{ url('user/logout') }}">Sign Out</a></li>
            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="weekly-best-seller-area py-3 mt-2">
            <div class="container">

                <div class="container">
                    <div class="billing-information-card mb-3">

                        <div class="card user-data-card">
                            <div class="card-body">
                                <div class="single-profile-data d-flex align-items-center justify-content-between">
                                    <div class="title d-flex align-items-center"><span>{{ $deal['shop_deal'] }}</span>
                                    </div>
                                    <div class="data-content text-success">Savings Up to ₹{{ $deal['saving_up_to'] }}
                                    </div>
                                </div>
                                <div class="single-profile-data d-flex align-items-center justify-content-between">
                                    <div class="title d-flex align-items-center">
                                        <span>{{ $deal['User']['name'] }}</span></div>
                                    <div class="data-content"><a class="btn btn-primary"
                                            href="tel:{{ $deal['User']['phone'] }}">Call Now</a>
                                    </div>
                                </div>
                                <div class="single-profile-data d-flex align-items-center justify-content-between">
                                    <div class="title d-flex align-items-center">

                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><img width="30px"
                                                            src="{{ asset('users/img/icons/fav.jpg') }}"></td>
                                                    <td>5.0</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="data-content"><a class="btn btn-warning" href="#">Direction</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- lochal store-->


        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                        aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                        aria-controls="profile-tab-pane" aria-selected="false">Address</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                        data-bs-target="#contact-tab-pane" type="button" role="tab"
                        aria-controls="contact-tab-pane" aria-selected="false">T&C</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu-tab-pane"
                        type="button" role="tab" aria-controls="menu-tab-pane"
                        aria-selected="false">Menu</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="help-tab" data-bs-toggle="tab" data-bs-target="#help-tab-pane"
                        type="button" role="tab" aria-controls="help-tab-pane"
                        aria-selected="false">Help</button>
                </li>

            </ul>
            <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">Home</div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <b>Address:</b> {{ $deal['User']['address_1'] ?? 'NA' }}<br>
                    <b>Landmark:</b> {{ $deal['User']['landmark'] ?? 'NA' }}
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">{!! $deal['Shop']['shop_terms'] ?? 'NA' !!}</div>
                <div class="tab-pane fade" id="menu-tab-pane" role="tabpanel" aria-labelledby="menu-tab"
                    tabindex="0">Menu</div>

                <div class="tab-pane fade" id="help-tab-pane" role="tabpanel" aria-labelledby="help-tab"
                    tabindex="0">{!! $deal['Shop']['shop_help'] ?? 'NA' !!}</div>

            </div>
        </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
        <div class="suha-footer-nav">
            <div class="data-content text-center"><a class="btn btn-primary call"
                    href="tel:{{ $deal['User']['phone'] }}"> <i class="fa-solid fa-phone"></i>&nbsp; Call
                    Now</a></div>
        </div>
    </div>




    <!-- All JavaScript Files-->
    <script src="{{ asset('users/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.min.js') }}"></script>
    <script src="{{ asset('users/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('users/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.passwordstrength.js') }}"></script>
    <script src="{{ asset('users/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('users/js/theme-switching.js') }}"></script>
    <script src="{{ asset('users/js/no-internet.js') }}"></script>
    <script src="{{ asset('users/js/active.js') }}"></script>
    <script src="{{ asset('users/js/pwa.js') }}"></script>
</body>


</html>
