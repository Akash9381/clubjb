@extends('employee.layouts.employe_layouts')
@section('title', 'Customer Create')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Customer
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">customer </a></li>

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
        <form method="POST" action="{{ url('employee/new-customer') }}">
            @csrf
            <div class="container-fluid">
                <!-- Color Pickers -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Customer Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" required name="customer_name"
                                                placeholder="Customer Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Customer Mobile</b></p>
                                        <div class="form-group">
                                            <input type="number" name="customer_number" required class="form-control"
                                                placeholder="Customer Number" />
                                        </div>
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

                                    <div class="col-lg-6 col-md-6">

                                        <div class="form-group mt-5">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="payment_status" id="Paid" class="with-gap"
                                                    value="Gold" checked>
                                                <label for="Paid">Gold</label>
                                            </div>
                                            <div class="radio inlineblock">
                                                <input type="radio" name="payment_status" id="unPaid" class="with-gap"
                                                    value="Silver" >
                                                <label for="unPaid">Silver</label>
                                            </div>
                                        </div>
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
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Ref mobile number</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="ref_number" value="{{ Auth::user()->phone }}" class="form-control" placeholder="Ref mobile number" />
                                        </div>
                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <input id="checkbox" name="wp_msg" type="checkbox">
                                                <label for="checkbox">Whatsapp Massage Sent My Gift </label>
                                            </div>
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
