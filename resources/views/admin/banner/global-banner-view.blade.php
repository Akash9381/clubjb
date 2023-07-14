@extends('admin.layouts.admin_layouts')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Banner View
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Banner View</a></li>

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
                                <div class="col-lg-6 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">Shop Id </h6>
                                    <span class="job_post">{{ $banner['GetShop']['shop_id'] ?? 'NA' }}</span>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <h6 class="mt-2 m-b-0">Add date </h6>
                                    <span
                                        class="job_post">{{ \Carbon\Carbon::parse($banner->created_at)->format('d-m-Y') }}</span>
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
                                <div class="col-lg-6 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">Banner Name </h6>
                                    <span class="job_post">{{ $banner['banner_name'] ?? 'NA' }}</span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">Shop Name </h6>
                                    <span class="job_post">{{ $banner['GetShop']['shop_name'] ?? 'NA' }}</span>
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
                                    <h6 class="mt-2 m-b-0">Banner</h6>
                                    <img src="{{ asset('/storage/shopbanner/' . $banner['banner_image']) }}"
                                        alt="{{ $banner['banner_image'] }}">
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
                                    <a href="{{ url('admin/update-global-banner/' . $banner['id']) }}"
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
