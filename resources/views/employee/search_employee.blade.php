@extends('employee.layouts.employe_layouts')
@section('title', 'Search Employee')

<!-- Chat-launcher -->


@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Search Here
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('employee/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>


                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- #END# Select2 -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-6">
                                    <form action="{{url()->current()}}">
                                        <div class="input-group">
                                            <input type="number" value="{{ request()->get('search') }}" required name="search" class="form-control" placeholder="Enter Mobile Number...">
                                            <button class="input-group-addon"><i class="zmdi zmdi-search"></i></button>
                                        </div>
                                    </form>
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
                            @forelse ($data as $customer)
                            <div class="row">
                                <div class="col-md-6">
                                    <strong for="customer_edit">{{$customer['name']}}</strong>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <a><i class="zmdi zmdi-edit"></i></a>

                                </div>
                            </div>
                            @empty
                            <div class="text-center">
                                <strong>No Employee Found</strong><br>
                                <a href="{{url('employee/add-employee')}}" class="btn btn-primary">Create New Employee</a>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

    <script src="{{ asset('employee/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script> <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('employee/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script> <!-- Input Mask Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script> <!-- Multi Select Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script> <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/nouislider/nouislider.js') }}"></script> <!-- noUISlider Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/select2/select2.min.js') }}"></script> <!-- Select2 Js -->

    <script src="{{ asset('employee/lightassets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
    <script src="{{ asset('employee/lightassets/js/pages/forms/advanced-form-elements.js') }}"></script>

@endsection
