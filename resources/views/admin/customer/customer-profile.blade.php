@extends('admin.layouts.admin_layouts')

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
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">profile</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Color Pickers -->
            <!-- Advanced Select2 -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <h6 class="mt-2 m-b-0">Customer Name </h6>
                                    <span class="job_post">{{ $customer['customer_name'] ?? 'NA' }}</span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-4">
                                    <h6 class="mt-2 m-b-0">Customer Number </h6>
                                    <span class="job_post">{{ $customer['customer_number'] ?? 'NA' }}</span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-4">
                                    <h6 class="mt-2 m-b-0">Customer Id </h6>
                                    <span class="job_post">{{ $customer['customer_id'] ?? 'NA' }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Select2 -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Payment Status</h6>
                                    <span class="job_post">{{ $customer['payment_status'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Add date </h6>
                                    <span
                                        class="job_post">{{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y') }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Active date </h6>
                                    @if ($customer->active_date)
                                        <span
                                            class="job_post">{{ \Carbon\Carbon::parse($customer->active_date)->format('d-m-Y') }}</span>
                                    @else
                                        Inactive
                                    @endif
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
                                    <h6 class="mt-2 m-b-0">Login Pin </h6>
                                    <span class="job_post">{{ $customer['GetCustomers']['login_pin'] ?? 'NA' }}</span>

                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Ref mobile number </h6>
                                    <span class="job_post">{{ $customer['ref_number'] ?? 'NA' }}</span>

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
                                <div class="col-sm-12">
                                    <a href="{{ url('admin/update-customer/' . $customer['customer_id']) }}"
                                        class="btn btn-primary btn-round"> Edit </a>
                                    <button type="submit" class="btn btn-primary btn-round"> Delete</button>
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
