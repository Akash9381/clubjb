@extends('employee.layouts.employe_layouts')
@section('title', 'Profile')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>{{ Auth::user()->name }}
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <!-- Advanced Select2 -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">State </h6>
                                    <span class="job_post">{{ $employee['state'] ?? 'NA' }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">City </h6>
                                    <span class="job_post">{{ $employee['city'] ?? 'NA' }}</span>
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
                                    <span class="job_post">{{ $employee['customer_id'] }}</span>
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
                                    <h6 class="mt-2 m-b-0">Employee Name </h6>
                                    <span class="job_post">{{ $employee['name'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Employee Number </h6>
                                    <span class="job_post">{{ $employee['phone'] }}</span>
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
                                    <span class="job_post">{{ $employee['login_pin'] ?? 'NA' }}</span>

                                </div>


                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Ref mobile number </h6>
                                    <span class="job_post">{{ $employee['ref_number'] ?? 'NA' }}</span>

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
                                <div style="visibility: hidden;" id="nouislider_basic_example"></div>

                                <div style="visibility: hidden;" id="nouislider_range_example"></div>


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
                                <div class="text-center col-md-12">
                                    <h6 class="mt-2 m-b-0"> Documents </h6>
                                    <hr>
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border">
                                    <p> <b>Uploaded Pictures</b> </p>
                                    <div class="form-group">
                                        @forelse ($employee['GetEmployeePicture'] as $key => $picture)
                                            <img src="{{ asset('/storage/employee/picture_document/' . $picture['picture_document']) }}"
                                                alt="{{ $picture['picture_document'] }}" width="100" height="100">
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
                                                download="{{ $picture['passport_document'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                        @empty
                                            NA
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <a class="btn btn-primary btn-round" href="{{ url('employee/update-profile') }}">
                                        Edit </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input Slider -->
        </div>
    </section>
@endsection
