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
    <title>Enter Login Pin | Club JB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('users/img/icons/fav.jpg') }}">
    <!-- Apple Touch Icon -->
    <!--  <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">-->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/nice-select.css') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('users/style.css') }}">
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('users/manifest.json') }}">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .error {
            color: #FFCA2C;
        }
    </style>
</head>

<body>
    <!-- Preloader-->

    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-10 col-lg-8">
                    <img class="big-logo" width="80px" src="{{ asset('users/img/club-jb.png') }}" alt="">
                    <div class="text-start rtl-text-right">
                        <h5 class="mb-1 mt-3 text-white text-center">Enter your login code</h5>
                        <!--<p class="mb-4 text-white">Enter the OTP code sent to<span class="mx-1">0123 456 7890</span></p>-->
                    </div>
                    <!-- OTP Verify Form-->
                    <div class="otp-verify-form mt-5">
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form id="login-form" action="{{ url('users/authenticate') }}" method="POST">
                            @csrf
                            <div class="d-flex justify-content-between mb-5 rtl-flex-d-row-r">
                                <input class="single-otp-input form-control" type="number" name="pin1"
                                    value="" placeholder="-" maxlength="1">
                                @error('pin1')
                                    <label class="error" for="pin1">
                                        {{ $message }}
                                    </label>
                                @enderror
                                <input class="single-otp-input form-control" type="number" name="pin2"
                                    value="" placeholder="-" maxlength="1">
                                @error('pin2')
                                    <label class="error" for="pin2">
                                        {{ $message }}
                                    </label>
                                @enderror
                                <input class="single-otp-input form-control" type="number" name="pin3"
                                    value="" placeholder="-" maxlength="1">
                                @error('pin3')
                                    <label id="pin3-error" class="error" for="pin3">
                                        {{ $message }}
                                    </label>
                                @enderror
                                <input class="single-otp-input form-control" type="number" name="pin4"
                                    value="" placeholder="-" maxlength="1">
                                @error('pin4')
                                    <label id="pin4-error" class="error" for="pin4">
                                        {{ $message }}
                                    </label>
                                @enderror
                                <input type="hidden" type="number" name="phn"
                                    value="{{ request()->get('phn') }}">
                                @error('phone_number')
                                    <label class="error" for="phn">
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>
                            <button class="btn btn-warning btn-lg w-100" type="submit">Verify &amp; Proceed</button>
                        </form>
                    </div>
                    <!-- Term & Privacy Info-->
                    <!--<div class="login-meta-data">
              <p class="mt-3 mb-0">Don't received the OTP?<span class="otp-sec mx-1 text-white" id="resendOTP"></span></p>
            </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="{{ asset('users/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.min.js') }}"></script>
    <script src="{{ asset('users/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('users/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('users/js/jquery.passwordstrength.js') }}"></script>
    <script src="{{ asset('users/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('users/js/theme-switching.js') }}"></script>
    <script src="{{ asset('users/js/otp-timer.js') }}"></script>
    <script src="{{ asset('users/js/active.js') }}"></script>
    <script src="{{ asset('users/js/pwa.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login-form').validate({ // initialize the plugin
                rules: {
                    pin1: {
                        required: true,
                    },
                    pin2: {
                        required: true,
                    },
                    pin3: {
                        required: true,
                    },
                    pin4: {
                        required: true,
                    },
                    phn: {
                        required: true,
                    },
                }
            });

        });
    </script>
</body>


</html>
