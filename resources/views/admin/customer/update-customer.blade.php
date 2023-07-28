@extends('admin.layouts.admin_layouts')
@section('title', 'Update Customer')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Update Customer
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Update Customer </a></li>

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
        <form id="user-form" method="POST" action="{{ url('admin/edit-customer/' . $customer['id']) }}">
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
                                            <input type="text" required class="form-control" value="{{ $customer['name'] }}"
                                                name="name" placeholder="Customer Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Customer Mobile</b></p>
                                        <div class="form-group">
                                            <input type="number" readonly name="phone"
                                                value="{{ $customer['phone'] }}" required class="form-control"
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
                                        <p> <b>Customer ID</b></p>
                                        <input type="text" readonly class="form-control"
                                            value="{{ $customer['customer_id'] }}" required name="customer_id" />
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Customer Type</b></p>
                                        <div class="form-group">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" @if ($customer['Customer']['payment_status'] == 'Bronze') checked @endif
                                                    name="payment_status" id="Bronze" class="with-gap" value="Bronze">
                                                <label for="Bronze">Bronze</label>
                                            </div>
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" @if ($customer['Customer']['payment_status'] == 'Silver') checked @endif
                                                    name="payment_status" id="unPaid" class="with-gap" value="Silver">
                                                <label for="unPaid">Silver</label>
                                            </div>
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="payment_status" id="Paid" class="with-gap"
                                                    value="Gold" @if ($customer['Customer']['payment_status'] == 'Gold') checked @endif>
                                                <label for="Paid">Gold</label>
                                            </div>
                                            <div class="radio inlineblock">
                                                <input type="radio" @if ($customer['Customer']['payment_status'] == 'Platinum') checked @endif
                                                    name="payment_status" id="unPaid" class="with-gap" value="Platinum">
                                                <label for="unPaid">Platinum</label>
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
                                        <p> <b>Ref mobile number </b> </p>
                                        <div class="form-group">
                                            <input type="text" required name="ref_number" value="{{ $customer['ref_number'] }}"
                                                class="form-control" placeholder="Ref mobile number" />
                                        </div>
                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <input id="checkbox" @if ($customer['Customer']['wp_msg']) checked @endif
                                                    name="wp_msg" type="checkbox">
                                                <label for="checkbox">Whatsapp Message Sent (My Gift) </label>
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
        // max 10 digits number and do n't accept zero as the first digit.

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
    </script>
    <script>
        $(document).ready(function() {

            jQuery.validator.addMethod("phoneUS", function(phone, element) {
                phone = phone.replace(/\s+/g, "");
                return this.optional(element) || phone.length > 9 && phone.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");


            $('#user-form').validate({
                rules: {
                    phone: {
                        required: true,
                        phoneUS: true
                    },
                    name: {
                        required: true
                    },
                    ref_number:{
                        required:true
                    }
                }
            });
        });
    </script>
@endsection
