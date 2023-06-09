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
    <title>Club JB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('users/img/icons/fav.jpg')}}">
    <!-- Apple Touch Icon -->
    <!-- <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
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
        <!-- Background Shape-->
        <div class="background-shape"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-8"><img class="big-logo" width="80px"
                        src="{{ asset('users/img/club-jb.png') }}" alt="">
                    <div class="text-start rtl-text-right">
                        <h5 class="mb-1 mt-3 text-white text-center">Login </h5>
                        <!--<p class="mb-4 text-white">Enter the OTP code sent to<span class="mx-1">0123 456 7890</span></p>-->
                    </div>
                    <!-- Register Form-->
                    <div class="otp-form mt-5">
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
                        <form id="user-form" action="{{ url('users/login') }}" method="get">
                            <div class="mb-4 d-flex rtl-flex-d-row-r">
                                <select id="countryCodeSelect" aria-label="Default select example">
                                    <option value="">+91</option>
                                </select>
                                <input class="form-control ps-0" id="phone_number" name="phone_number" type="number"
                                    placeholder="Enter phone number">
                                    <label id="phone_number-error" class="error" for="phone_number">@error('phone_number')
                                        {{$message}}
                                    @enderror</label>
                            </div>
                            <button class="btn btn-warning btn-lg w-100" type="submit">Submit</button>
                        </form>
                    </div>
                    <!-- Login Meta-->
                    <div class="login-meta-data">
                        <!--<a class="forgot-password d-block mt-3 mb-1" href="forget-password.html">Forgot Password?</a>-->
                        <!--<p class="mb-0 mt-3">Didn't have an account?<a class="mx-1" href="register.html">Register Now</a></p>-->
                    </div>
                    <!-- View As Guest-->

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
    <script src="{{ asset('users/js/active.js') }}"></script>
    <script src="{{ asset('users/js/pwa.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {

            jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
                phone_number = phone_number.replace(/\s+/g, "");
                return this.optional(element) || phone_number.length > 9 && phone_number.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");

            $('#user-form').validate({ // initialize the plugin
                rules: {
                    phone_number: {
                        required: true,
                        phoneUS: true
                    }
                }
            });

        });
    </script>
</body>

<!-- Mirrored from designing-world.com/suha-v3.0/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 May 2023 07:33:26 GMT -->

</html>
