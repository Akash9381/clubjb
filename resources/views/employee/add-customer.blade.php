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
                        <li class="breadcrumb-item"><a href="{{url('employee/dashboard')}}"><i class="zmdi zmdi-home"></i> Home</a></li>
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
        <form id="user-form" method="POST" action="{{ url('employee/new-customer') }}">
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
                                            <input type="number" id
                                            ="customer_number" value="{{$phone??''}}" name="customer_number" required class="form-control"
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
                                            <div class="radio inlineblock">
                                                <input type="radio" name="payment_status" id="unPaid" checked="" class="with-gap"
                                                    value="Silver" >
                                                <label for="unPaid">Silver</label>
                                            </div>
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="payment_status" id="Paid" class="with-gap"
                                                    value="Gold" >
                                                <label for="Paid">Gold</label>
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
                                    <input type="hidden" name="login_pin" value="1111">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <input id="checkbox" name="wp_msg" type="checkbox">
                                                <label for="checkbox">Whatsapp  Sent My Gift </label>
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
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        jQuery("#customer_number").keypress(function(e) {
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

            jQuery.validator.addMethod("phoneUS", function(customer_number, element) {
                customer_number = customer_number.replace(/\s+/g, "");
                return this.optional(element) || customer_number.length > 9 && customer_number.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");

            jQuery.validator.addMethod("Ref", function(ref_number, element) {
                ref_number = ref_number.replace(/\s+/g, "");
                return this.optional(element) || ref_number.length > 9 && ref_number.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");

            $('#user-form').validate({ // initialize the plugin
                rules: {
                    customer_number: {
                        required: true,
                        phoneUS: true
                    },
                    ref_number: {
                        required: true,
                        Ref: true
                    },
                    customer_name: {
                        required: true
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
@endsection
