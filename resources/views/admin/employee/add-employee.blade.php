@extends('admin.layouts.admin_layouts')

@section('title', 'Employee Add')

<!-- Right Sidebar -->


<!-- Chat-launcher -->

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add employee
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Employee </a></li>

                    </ul>
                </div>
            </div>
        </div>
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
        <form id="user-form" method="POST" action="{{ url('admin/employee-add') }}" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <!-- Color Pickers -->
                <!-- #END# Multi Select -->


                <!-- Advanced Select2 -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>State </b> </p>
                                        <select class="form-control show-tick ms select2" name="state" id="state"
                                            data-placeholder="Select">
                                            <option value="none">Select State</option>
                                            @foreach ($states as $state)
                                                <option>{{ $state['name'] }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color:red;" id="msg_id"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>City</b> </p>
                                        <select class="form-control show-tick ms select2" name="city" id="city"
                                            data-placeholder="Select">
                                            <option value="none">Select City</option>
                                        </select>
                                        <div style="color:red;" id="msg_city"></div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advanced Select -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Employee type</b> </p>
                                        <select class="form-control show-tick ms select2" name="employee_type"
                                            data-placeholder="Select">
                                            <option>Full Time</option>
                                            <option>Part Time</option>
                                            <option>Student</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Employee Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ old('employee_name') }}" class="form-control"
                                                name="employee_name" placeholder="employee Name" />
                                            @error('employee_name')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Empl Number</b> (<small>Login Number</small> )</p>
                                        <div class="form-group">
                                            <input type="number" value="{{ old('employee_number') }}" id="employee_number" class="form-control"
                                                name="employee_number" placeholder="employee Number" />
                                                @error('employee_number')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Login Pin</b> </p>
                                        <input type="number" value="{{ old('login_pin') }}" id="login_pin" name="login_pin"
                                            class="form-control" placeholder="Login pin" />
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Input Slider -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-6">
                                        <p> <b>Ref mobile number</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ old('ref_number') }}" class="form-control" name="ref_number"
                                                placeholder="Ref mobile number" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload Pictures</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="picture_document[]" accept=".png, .jpg, .jpeg" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload Aadharcard</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="aadhar_document[]" accept=".png, .jpg, .jpeg, .pdf" multiple class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload Driving Licence</b> </p>
                                        <div class="form-group">
                                            <input type="file" accept=".png, .jpg, .jpeg, .pdf" name="driving_document[]" multiple class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload CV</b> </p>
                                        <div class="form-group">
                                            <input type="file" accept=".png, .jpg, .jpeg, .pdf" name="cv_document[]" multiple class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload Passport</b> </p>
                                        <div class="form-group">
                                            <input type="file" accept=".png, .jpg, .jpeg, .pdf" name="passport_document[]" multiple
                                                class="form-control" />
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload agreement</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="agreement_document[]" multiple
                                                class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round"> Add Employee</button>

                                    </div>
                                    <div style="visibility: hidden;" id="nouislider_basic_example"></div>

                                    <div style="visibility: hidden;" id="nouislider_range_example"></div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </section>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        // max 10 digits number and do n't accept zero as the first digit.

        jQuery("#employee_number").keypress(function(e) {
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
    </script>
    <script>
        // validation
        $('#user-form').submit(function(e) {
            var state = $("#msg_id");
            var msg = "Please select State";
            var city = $("#msg_city");
            var msg_city = "Please select city";
            if ($('#state').val() == "none") {
                state.append(msg);
                e.preventDefault();
                return false;
            } else {
                $("#msg_id").html('');
            }
            if ($('#city').val() == "none") {
                city.append(msg_city);
                e.preventDefault();
                return false;
            } else {
                $("#msg_city").html('');
            }
        });

        $("#state").on('change', function() {
            if ($("#state").val() != "none") {
                $("#msg_id").html('');
            }
        })

        $("#city").on('change', function() {
            if ($("#city").val() != "none") {
                $("#msg_city").html('');
            }
        })

        $(document).ready(function() {

            jQuery.validator.addMethod("phoneUS", function(employee_number, element) {
                employee_number = employee_number.replace(/\s+/g, "");
                return this.optional(element) || employee_number.length > 9 && employee_number.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");

            $('#user-form').validate({
                rules: {
                    employee_number: {
                        required: true,
                        phoneUS: true
                    },
                    employee_name: {
                        required: true,
                    },
                    login_pin: {
                        number: true,
                        minlength: 4,
                        maxlength: 4
                    }
                }
            });
        });
    </script>
    <script>
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
                        $('#city').html('<option value="none">Select City</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city").append('<option value="' + value.city +
                                '">' + value.city + '</option>');
                        });
                    }
                })
            })
        });
    </script>
@endsection
