@extends('employee.layouts.employe_layouts')
@section('title', 'Add Employee')



<!-- Right Sidebar -->


<!-- Chat-launcher -->

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Employee
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
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
        <form method="POST" action="{{ url('employee/create-employee') }}" enctype="multipart/form-data">
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
                                            <option>Select State</option>
                                            @foreach ($states as $state)
                                                <option>{{ $state['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>City</b> </p>
                                        <select class="form-control show-tick ms select2" name="city" id="city"
                                            data-placeholder="Select">
                                            <option value="">Select City</option>
                                        </select>
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
                                    <div class="col-lg-4 col-md-6">
                                        <p> <b>Employee type</b> </p>
                                        <select class="form-control show-tick ms select2" name="employee_type"
                                            data-placeholder="Select">
                                            <option>Part Time</option>
                                            <option>Student</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <p> <b>Employee Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" required class="form-control" name="employee_name"
                                                placeholder="employee Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <p> <b>Empl Number</b> (<small>Login Number</small> )</p>
                                        <div class="form-group">
                                            <input type="text" required class="form-control" name="employee_number"
                                                placeholder="employee Number" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-none">
                                        <p> <b>Login Pin</b> </p>
                                        <input type="number" value="1111" name="login_pin" maxlength="4" minlength="4"
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
                                            <input type="text" class="form-control" name="ref_number"
                                                placeholder="Ref mobile number" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload Pictures</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="picture_document[]" multiple class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload Aadharcard</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="aadhar_document[]" multiple class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload Driving Licence</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="driving_document[]" multiple class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload CV</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="cv_document[]" multiple class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 rounded border">
                                        <p> <b>Upload Passport</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="passport_document[]" multiple class="form-control" " />
                                                    </div>
                                                </div>


                                                <div class="col-lg-6 col-md-6 rounded border">
                                                    <p> <b>Upload agreement</b> </p>
                                                    <div class="form-group">
                                                        <input type="file" name="agreement_document[]" multiple class="form-control"  />
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
                        $('#city').html('<option value="">Select City</option>');
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
