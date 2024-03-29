<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Shopkeeper Login | Club House</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('users/img/icons/fav.jpg') }}">
    <!-- Custom Css -->

    <link rel="stylesheet" href="{{ asset('employee/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('employee/light/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('employee/light/assets/css/authentication.css') }}">
    <link rel="stylesheet" href="{{ asset('employee/light/assets/css/color_skins.css') }}">
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
            color: red;
        }
    </style>
</head>

<body class="theme-purple authentication sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <div class="navbar-translate n_logo">

                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>

        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-image:url({{ asset('employee/assets/images/login.jpg') }})">
        </div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">

                    <form id="user-form" class="form" method="post" action="{{ url('shopkeeper/authenticate') }}">
                        @csrf
                        <div class="header">
                            <div class="logo-container">
                                <img src="{{ asset('employee/light/assets/img/logo.png') }}" alt="">
                            </div>
                            <h5>Log in</h5>
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
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <input type="number" class="form-control" id="phone" name="phone"
                                    placeholder="Enter Mobile No">
                                <span class="input-group-addon">
                                </span>
                            </div>
                            {{-- <label id="phone-error" class="error" for="phone"></label> --}}
                        </div>

                        <div class="content">
                            <div class="input-group">
                                <input type="number" id="login_pin" name="login_pin" class="form-control"
                                    placeholder="Enter Login Pin">
                                <span class="input-group-addon">

                                </span>
                            </div>
                            {{-- <label id="login_pin-error" class="error" for="login_pin"></label> --}}
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-block ">SUBMIT</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                {{-- <nav>
                    <ul>

                        <li><a href="#" target="_blank">Admin Login</a></li>

                    </ul>
                </nav> --}}
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    <span> <a href="#" target="_blank"> All Rights Reserved <strong>Club Jb</strong></a></span>
                </div>
            </div>
        </footer>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('employee/light/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('employee/light/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

    <script>
        $(".navbar-toggler").on('click', function() {
            $("html").toggleClass("nav-open");
        });
        //=============================================================================
        $('.form-control').on("focus", function() {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function() {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
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
            jQuery("#login_pin").keypress(function(e) {
                var length = jQuery(this).val().length;
                if (length > 3) {
                    return false;
                } else if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                } else if ((length == 0) && (e.which == 48)) {
                    return false;
                }
            });
            jQuery.validator.addMethod("phoneUS", function(phone, element) {
                phone = phone.replace(/\s+/g, "");
                return this.optional(element) || phone.length > 9 && phone.match(
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
                        required: true,
                        number: true,
                        minlength: 4,
                        maxlength: 4
                    }
                }
            });
        });
    </script>
</body>


</html>
