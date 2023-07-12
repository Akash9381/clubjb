@extends('shopkeeper.layouts.shopkeeper_layouts')
@section('title', 'Give Service')

@section('css')

    <link rel="stylesheet" href="{{ asset('employee/assets/plugins/morrisjs/morris.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('employee/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />

    <link rel="stylesheet" href="{{ asset('employee/assets/plugins/multi-select/css/multi-select.css') }}">
    <!-- Bootstrap Spinner Css -->
    <link rel="stylesheet" href="{{ asset('employee/assets/plugins/jquery-spinner/css/bootstrap-spinner.css') }}">
    <!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="{{ asset('employee/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="{{ asset('employee/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
    <!-- noUISlider Css -->
    <link rel="stylesheet" href="{{ asset('employee/assets/plugins/nouislider/nouislider.min.css') }}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('employee/assets/plugins/select2/select2.css') }}" />
@endsection
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Give Services
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('shopkeeper/dashboard') }}"><i
                                    class="zmdi zmdi-home"></i>Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
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
            <form action="{{ url('shopkeeper/take-service') }}" method="POST">
                @csrf
                @forelse ($deals as $deal)
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="body ">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="checkbox">
                                                <input name="deal[]" class="ak" value="{{ $deal['id'] }}"
                                                    id="{{ $deal['id'] }}" type="checkbox">
                                                <label for="{{ $deal['id'] }}">
                                                    <b>{{ $deal['shop_deal'] }}</b>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="body ">
                                    <div class="row clearfix">
                                        <div class="col-lg-11 col-md-6">
                                            <p> <b>No Deals Found</b> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                <input type="hidden" name="phone" value="{{ request()->get('phone') }}">
                <div class="col-sm-12">
                    <button style="display: none" id="modalbtn" type="button" class="btn btn-default waves-effect m-r-20"
                        data-toggle="modal" data-target="#defaultModal">Give Services</button>

                </div>

                <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="title" id="defaultModalLabel">Bill</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="number" name="bill_number" class="form-control"
                                                placeholder="Bill No" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="number" name="amount" class="form-control"
                                                placeholder="Amount" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success  waves-effect">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('js')

    <script src="{{ asset('employee/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('employee/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script> <!-- Input Mask Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script> <!-- Multi Select Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script> <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/nouislider/nouislider.js') }}"></script> <!-- noUISlider Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/select2/select2.min.js') }}"></script> <!-- Select2 Js -->

    <script src="{{ asset('employee/light/assets/js/pages/forms/advanced-form-elements.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".ak").click(function() {
                if ($('.ak').filter(':checked').length < 1) {
                    $("#modalbtn").hide();
                } else {
                    $("#modalbtn").show();
                }
            });
        });
    </script>
@endsection
