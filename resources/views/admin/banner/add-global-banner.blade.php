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
                                        <p> <b>Global Shop Name </b> </p>
                                        <select required name="shop_id" class="form-control show-tick ms select2"
                                            data-placeholder="Select">
                                            <option value="">Select Global Shop</option>
                                            @forelse ($shops as $shop)
                                                <option value="{{ $shop['id'] }}">{{ $shop['name'] }}</option>
                                            @empty
                                                <option value="none">No Shop Available</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Brand Name</b> </p>
                                        <input type="text" required name="brand_name" id="brand_name"
                                            class="form-control" placeholder="Brand Name" />
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
                                            <input type="file" required accept=".png, .jpg, .jpeg, .webp"
                                                name="banner_image" class="form-control" placeholder="Banner Name" />
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
