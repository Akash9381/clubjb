@extends('employee.layouts.employe_layouts')
@section('title', 'Profile')

<!-- Chat-launcher -->


@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>profile
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('employee/dashboard') }}"><i
                                    class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">profile</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">State </h6>
                                    <span class="job_post">{{ $employee['state'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">City </h6>
                                    <span class="job_post">{{ $employee['city'] }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Select2 -->

            <!-- Advanced Select -->


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Emp id </h6>
                                    <span class="job_post">{{ $employee['employee_id'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Add date </h6>
                                    <span
                                        class="job_post">{{ \Carbon\Carbon::parse($employee->created_at)->format('d-m-Y') }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Active date </h6>
                                    <span class="job_post">
                                        @if ($employee->active_date)
                                            {{ \Carbon\Carbon::parse($employee->active_date)->format('d-m-Y') }}
                                        @else
                                            Inactive
                                        @endif
                                    </span>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Employee type </h6>
                                    <span class="job_post">{{ $employee['employee_type'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Employee Name </h6>
                                    <span class="job_post">{{ $employee['employee_name'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Employee Number </h6>
                                    <span class="job_post">{{ $employee['employee_number'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Select -->
            <!-- Input Slider -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Login Pin </h6>
                                    <span class="job_post">XXXX</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Ref mobile number </h6>
                                    <span class="job_post">{{ $employee['ref_number'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0"> Agreement </h6>
                                    @forelse ($employee['GetEmployeeAgreement'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['agreement_document'] }}</label>
                                        <a href="{{ asset('/storage/employee/agreement_document/' . $picture['agreement_document']) }}"
                                            download="{{ $picture['agreement_document'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                    NA
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input Slider -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="text-center col-md-12">
                                    <h6 class="mt-2 m-b-0"> Documents </h6>
                                    <hr>
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border">
                                    <p> <b>Uploaded Pictures</b> </p>
                                    <div class="form-group">
                                        @forelse ($employee['GetEmployeePicture'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['picture_document'] }}</label>
                                            <a href="{{ asset('/storage/employee/picture_document/' . $picture['picture_document']) }}"
                                                download="{{ $picture['picture_document'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                        @empty
                                            NA
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border">
                                    <p> <b>Uploaded Aadharcard</b> </p>
                                    <div class="form-group">
                                        @forelse ($employee['GetEmployeeAadhar'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['aadhar_document'] }}</label>
                                            <a href="{{ asset('/storage/employee/aadhar_document/' . $picture['aadhar_document']) }}"
                                                download="{{ $picture['aadhar_document'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                        @empty
                                            NA
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border">
                                    <p> <b>Uploaded Driving Licence</b> </p>
                                    <div class="form-group">
                                        @forelse ($employee['GetEmployeeDriving'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['driving_document'] }}</label>
                                            <a href="{{ asset('/storage/employee/driving_document/' . $picture['driving_document']) }}"
                                                download="{{ $picture['driving_document'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                        @empty
                                            NA
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border">
                                    <p> <b>Uploaded CV</b> </p>
                                    <div class="form-group">
                                        @forelse ($employee['GetEmployeeCV'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['cv_document'] }}</label>
                                            <a href="{{ asset('/storage/employee/cv_document/' . $picture['cv_document']) }}"
                                                download="{{ $picture['cv_document'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                        @empty
                                            NA
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border">
                                    <p> <b>Uploaded Passport</b> </p>
                                    <div class="form-group">
                                        @forelse ($employee['GetEmployeePassPort'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['passport_document'] }}</label>
                                            <a href="{{ asset('/storage/employee/passport_document/' . $picture['passport_document']) }}"
                                                download="{{ $picture['passport_document'] }}" title="Download"> <i class="material-icons">move_to_inbox</i></a>
                                        @empty
                                            NA
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <a class="btn btn-primary btn-round"
                                        href="{{ url('employee/update-profile/' . $employee['employee_id']) }}"> Edit </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
<!-- Jquery Core Js -->
@section('js')

    <script src="{{ asset('employee/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script> <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('employee/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script> <!-- Input Mask Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script> <!-- Multi Select Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script> <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/nouislider/nouislider.js') }}"></script> <!-- noUISlider Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/select2/select2.min.js') }}"></script> <!-- Select2 Js -->

    <script src="{{ asset('employee/light/assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
    <script src="{{ asset('employee/light/assets/js/pages/forms/advanced-form-elements.js') }}"></script>

@endsection
