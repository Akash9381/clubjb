@extends('admin.layouts.admin_layouts')
@section('title', 'Add Global Banner')

<!-- Chat-launcher -->


@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Upload Global Banner
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Upload Banner </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <form id="user-form" action="{{ url('admin/global-banner-add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <!-- Advanced Select2 -->
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

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Shop Name </b> </p>
                                        <select name="shop_id" id="shop_id" class="form-control show-tick ms select2"
                                            data-placeholder="Select">
                                            <option value="none">Select Shop</option>
                                            @forelse ($shops as $shop)
                                                <option value="{{ $shop['user_id'] }}">{{ $shop['shop_name'] }}</option>
                                            @empty
                                                <option value="none">No Shop Available</option>
                                            @endforelse
                                        </select>
                                        <div style="color:red;" id="msg_shop"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Brand Name</b> </p>
                                        <select name="brand_name" id="brand_name" class="form-control show-tick ms select2"
                                            data-placeholder="Select">
                                            <option value="none">Select Brand</option>
                                            <option>text</option>
                                            <option>text</option>
                                        </select>
                                        <div style="color:red;" id="msg_brand"></div>
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
                                    <div class="col-lg-12 col-md-12">
                                        <p> <b>Banner Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="banner_name" id="banner_name" class="form-control"
                                                placeholder="Banner Name" />
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
                                    <div class="col-lg-12 col-md-12">
                                        <p> <b>Banner Upload</b> <small>(upload banner in 1960*600px)</small> </p>
                                        <div class="form-group">
                                            <input type="file" name="banner_image" class="form-control"
                                                placeholder="Banner Name" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-round"> Add Banner</button>
                    </div>
                </div>
                <div style="visibility: hidden;" id="nouislider_basic_example"></div>

                <div style="visibility: hidden;" id="nouislider_range_example"></div>
            </div>
        </form>
    </section>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $('#user-form').submit(function(e) {
            var state = $("#msg_id");
            var msg = "Please select State";
            var city = $("#msg_city");
            var msg_city = "Please select city";
            var shop = $("#msg_shop");
            var msg_shop = "Please select shop name";
            var brand = $("#msg_brand");
            var msg_brand = "Please select Brand";
            if ($('#shop_id').val() == "none") {
                shop.append(msg_shop);
                e.preventDefault();
                return false;
            } else {
                $("#msg_shop").html('');
            }
            if ($('#brand_name').val() == "none") {
                brand.append(msg_brand);
                e.preventDefault();
                return false;
            } else {
                $("#msg_brand").html('');
            }
            if ($('#state').val() == "none") {
                state.append(msg);
                e.preventDefault();
                return false;
            } else {
                $("#msg_id").html('');
            }
            if ($('#city').val() == "none") {
                city.append(msg_city);
                e.preventDefault();
                return false;
            } else {
                $("#msg_city").html('');
            }
        });

        $("#state").on('change', function() {
            if ($("#state").val() != "none") {
                $("#msg_id").html('');
            }
        })

        $("#city").on('change', function() {
            if ($("#city").val() != "none") {
                $("#msg_city").html('');
            }
        })

        $("#shop_id").on('change', function() {
            if ($("#shop_id").val() != "none") {
                $("#msg_shop").html('');
            }
        })
        $("#brand_name").on('change', function() {
            if ($("#brand_name").val() != "none") {
                $("#msg_brand").html('');
            }
        })
        $(document).ready(function() {

            $('#user-form').validate({ // initialize the plugin
                rules: {
                    banner_name: {
                        required: true
                    }
                }
            });

        });
    </script>
@endsection
