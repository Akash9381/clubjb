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
    <link rel="icon" href="{{ asset('users/img/icons/fav.jpg') }}">
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
    {{-- <link rel="manifest" href="{{ asset('users/manifest.json') }}"> --}}
    <style>
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
            border-color: red;
        }

        .form-select {
            background-color: #08a1dc;
            background-image: url(img/down.png);
            cursor: pointer;
            border: 1px solid #08a1dc;
            color: #fff;
            font-size: 14px;
            height: 40px;
            /*           padding: 8px 8px 8px 24px;*/
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
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
                    <!-- Register Form-->
                    <div class="text-start rtl-text-right">
                        <h5 class="mb-1 mt-3 text-white text-center">Register</h5>
                        <!--<p class="mb-4 text-white">Enter the OTP code sent to<span class="mx-1">0123 456 7890</span></p>-->
                    </div>

                    <div class="register-form mt-5">
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
                        <form id="user-form" action="{{ url('user/insert') }}" method="post">
                            @csrf
                            <div class="form-group text-start mb-4"><span>Mob No</span>

                                <input class="form-control" id="phone" value="{{ request()->get('phn') }}"
                                    name="phone" type="number">
                                    @error('phone')
                                <p class="text-warning">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="form-group text-start mb-4"><span>Set Login Pin</span>

                                <input class="form-control" id="login_pin" name="login_pin" type="number">
                            </div>
                            <div class="form-group text-start mb-4"><span>Full Name</span>
                                <input class="input-psswd form-control" name="name" id="name" type="text">
                            </div>

                            <div class="form-group text-start mb-4"><span>Email Id</span>
                                <input class="input-psswd form-control" id="email" name="email" type="email">
                            </div>

                            <div class="form-group text-start mb-4"><span>Address 1</span>
                                <input class="input-psswd form-control" id="address_1" name="address_1" type="text">
                            </div>

                            <div class="form-group text-start mb-4"><span>Address 2</span>
                                <input class="input-psswd form-control" id="address_2" name="address_2" type="text">
                            </div>

                            <div class="form-group text-start mb-4"><span>Pincode</span>
                                <input class="input-psswd form-control" id="pincode" name="pincode"
                                    type="text">
                            </div>

                            <div class="form-group text-start mb-4"><span>Landmark</span>
                                <input class="input-psswd form-control" id="landmark" name="landmark"
                                    type="text">
                            </div>

                            <div class="form-group text-start mb-4">
                                <select class="form-select" aria-label="Default select example" id="state" name="state">
                                    <option selected>Please select state</option>
                                    @foreach ($states as $state)
                                        <option class="value" value="{{$state['name']}}">{{ $state['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group text-start mb-4">
                                <select class="form-select" aria-label="Default select example" name="city"
                                    id="city">
                                    <option selected>Please select City</option>
                                </select>
                            </div>


                            <div class="form-group text-start mb-4"><span>Business Profile</span>
                                <input class="input-psswd form-control" id="bussiness_profile"
                                    name="bussiness_profile" type="text">
                            </div>

                            <div class="form-group text-start mb-4"><span>Ref number</span>
                                <input class="input-psswd form-control" id="ref_number" name="ref_number"
                                    type="number">
                            </div>
                            <button class="btn btn-warning btn-lg w-100" type="submit">Sign Up</button>
                        </form>
                    </div>
                    <!-- Login Meta-->
                    <!--<div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="mx-1" href="login.html">Sign In</a></p>
            </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="{{ asset('users/js/jquery.min.js') }}"></script>
    <script src="{{ asset('users/js/bootstrap.bundle.min.js') }}"></script>
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
    {{-- <script src="{{ asset('users/js/pwa.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        jQuery("#phone").keypress(function(e) {
            var length = jQuery(this).val().length;
            if (length > 9) {
                return false;
            } else if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            } else if ((length == 0) && (e.which == 48)) {
                return false;
            }
        });

        jQuery("#ref_number").keypress(function(e) {
            var length = jQuery(this).val().length;
            if (length > 9) {
                return false;
            } else if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            } else if ((length == 0) && (e.which == 48)) {
                return false;
            }
        });

        $(document).ready(function() {
            $('#state').on('change', function() {
                var state = this.value;
                $("#city").html('');
                $.ajax({
                    url: "/admin/get-city",
                    type: "get",
                    dataType: 'json',
                    data: {
                        state: state
                    },
                    success: function(result) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city").append('<option value="' + value.city +
                                '">' + value.city + '</option>');
                        });
                    }
                })
            })
            jQuery.validator.addMethod("phoneUS", function(phone, element) {
                phone = phone.replace(/\s+/g, "");
                return this.optional(element) || phone.length > 9 && phone.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");

            jQuery.validator.addMethod("Ref", function(ref_number, element) {
                ref_number = ref_number.replace(/\s+/g, "");
                return this.optional(element) || ref_number.length > 9 && ref_number.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");

            $('#user-form').validate({ // initialize the plugin
                errorPlacement: function() {
                    return false; // suppresses error message text
                },
                rules: {
                    phone: {
                        required: true,
                        phoneUS: true
                    },
                    login_pin: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    ref_number: {
                        Ref: true
                    }
                }
            });

        });
    </script>
</body>

<!-- Mirrored from designing-world.com/suha-v3.0/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 May 2023 07:33:26 GMT -->

</html>
