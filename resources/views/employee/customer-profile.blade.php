@extends('employee.layouts.employe_layouts')
@section('title', 'Customer Profile')

<!-- Chat-launcher -->


@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Customer Profile
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
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Customer ID </h6>
                                    <span class="job_post">{{ $customer['customer_id'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Active date </h6>
                                    @if ($customer->active_date)
                                        {
                                        <span
                                            class="job_post">{{ \Carbon\Carbon::parse($customer->active_date)->format('d-m-Y') }}</span>
                                        }
                                    @else
                                        Pending
                                    @endif
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Add date </h6>
                                    <span
                                        class="job_post">{{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y') }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Customer Name </h6>
                                    <span class="job_post">{{ $customer['name'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Customer Number</h6>
                                    <span class="job_post">{{ preg_replace('~[+\d-](?=[\d-]{4})~', '*', $customer['phone'])}}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Customer Type</h6>
                                    <span class="job_post">{{ $customer['Customer']['payment_status'] }}</span>
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
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Ref ID/mobile number </h6>
                                    <span class="job_post">{{ $customer['ref_number'] }}</span>

                                </div>

                                <div style="visibility: hidden;" id="nouislider_basic_example"></div>

                                <div style="visibility: hidden;" id="nouislider_range_example"></div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input Slider -->
        </div>
    </section>

@endsection
<!-- Jquery Core Js -->
@section('js')

    <script src="{{ asset('employee//assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script> <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('employee//assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script> <!-- Input Mask Plugin Js -->
    <script src="{{ asset('employee//assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script> <!-- Multi Select Plugin Js -->
    <script src="{{ asset('employee//assets/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script> <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset('employee//assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('employee//assets/plugins/nouislider/nouislider.js') }}"></script> <!-- noUISlider Plugin Js -->
    <script src="{{ asset('employee//assets/plugins/select2/select2.min.js') }}"></script> <!-- Select2 Js -->

    <script src="{{ asset('employee/light/assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
    <script src="{{ asset('employee/light/assets/js/pages/forms/advanced-form-elements.js') }}"></script>

@endsection
