@extends('admin.layouts.admin_layouts')
@section('title', 'Add Banner')

<!-- Chat-launcher -->


@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Update Banner
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Upload Banner </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <form id="user-form" action="{{ url('admin/banner-update/' . $banner['id']) }}" method="POST"
            enctype="multipart/form-data">
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
                                        <p> <b>State </b> </p>
                                        <select class="form-control show-tick ms select2" data-placeholder="Select"
                                            name="state" id="state">
                                            <option value="none">Select State</option>
                                            @foreach ($states as $state)
                                                <option @if ($state['name'] == $banner['state']) selected @endif>
                                                    {{ $state['name'] }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color:red;" id="msg_id"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>City</b> </p>
                                        <select class="form-control show-tick ms select2" name="city" id="city"
                                            data-placeholder="Select">
                                            <option value="{{ $banner['city'] }}">{{ $banner['city'] }}</option>
                                        </select>
                                        <div style="color:red;" id="msg_city"></div>
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
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Shop Name </b> </p>
                                        <select name="shop_id" id="shop_id" class="form-control show-tick ms select2"
                                            data-placeholder="Select">
                                            @forelse ($shops as $shop)
                                                @if (str_contains($shop['customer_id'], 'LS') == true)
                                                    <option value="{{ $shop['id'] }}"
                                                        @if ($shop['id'] == $banner['shop_id']) selected @endif>
                                                        {{ $shop['name'] }}</option>
                                                @endif
                                            @empty
                                                <option value="none">Select Local Shop</option>
                                            @endforelse
                                        </select>
                                        <div style="color:red;" id="msg_shop"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Brand Name</b> </p>
                                        <input type="text" value="{{$banner['brand_name'] ?? 'NA'}}" required name="brand_name" id="brand_name" class="form-control"
                                                placeholder="Brand Name" />
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
                                            <input type="text" required value="{{ $banner['banner_name'] }}" name="banner_name"
                                                id="banner_name" class="form-control" placeholder="Banner Name" />
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
                                            <input type="file" accept=".png, .jpg, .jpeg, .webp" name="banner_image" class="form-control"
                                                placeholder="Banner Name" />
                                        </div>
                                        <img src="{{ asset('/storage/shopbanner/' . $banner['banner_image']) }}"
                                            alt="{{ $banner['banner_image'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-round"> Update Banner</button>
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
            if ($('#shop_id').val() == "none") {
                shop.append(msg_shop);
                e.preventDefault();
                return false;
            } else {
                $("#msg_shop").html('');
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
    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var state = this.value;
                $("#city").html('');
                $.ajax({
                    url: "/admin/get-city",
                    type: "get",
                    dataType: 'json',
                    data: {
                        state: state
                    },
                    success: function(result) {
                        $('#city').html('<option value="none">Select City</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city").append('<option value="' + value.city +
                                '">' + value.city + '</option>');
                        });
                    }
                })
            })
        });
    </script>
@endsection
