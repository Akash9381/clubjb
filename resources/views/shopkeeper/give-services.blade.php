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
                                    class="zmdi zmdi-home"></i>
                                Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @forelse ($deals as $deal)
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body ">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="checkbox">
                                            <input id="{{ $deal['id'] }}" type="checkbox">
                                            <label for="{{ $deal['id'] }}">
                                                <b>{{ $deal['shop_deal'] }}</b>
                                            </label>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-11 col-md-6">
                                    <p> <b>{{$deal['shop_deal']}}</b> </p>
                                </div> --}}
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


            {{-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body ">
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-6">
                                    <div class="checkbox">
                                        <input id="checkbox13" type="checkbox" checked="">
                                        <label for="checkbox13">
                                            <p style="visibility: hidden;">Checked</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-11 col-md-6">
                                    <p> <b>Deals</b> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-13 col-sm-13">
                    <div class="card">
                        <div class="body ">
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-6">
                                    <div class="checkbox">
                                        <input id="checkbox15" type="checkbox" checked="">
                                        <label for="checkbox15">
                                            <p style="visibility: hidden;">Checked</p>
                                        </label>
                                    </div>



                                </div>
                                <div class="col-lg-11 col-md-6">
                                    <p> <b>Deals</b> </p>



                                </div>





                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body ">
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-6">
                                    <div class="checkbox">
                                        <input id="checkbox14" type="checkbox" checked="">
                                        <label for="checkbox14">
                                            <p style="visibility: hidden;">Checked</p>
                                        </label>
                                    </div>



                                </div>
                                <div class="col-lg-11 col-md-6">
                                    <p> <b>Deals</b> </p>



                                </div>





                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}


            <div class="col-sm-12">
                <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal"
                    data-target="#defaultModal">Give Services</button>

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
                                        <input type="text" class="form-control" placeholder="Bill No" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Amount" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success  waves-effect">Confirm</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

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
@endsection
