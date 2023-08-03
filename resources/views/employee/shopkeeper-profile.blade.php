@extends('employee.layouts.employe_layouts')
@section('title', 'ShopKeeper Profile')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2> {{ $shop['name'] }} Profile
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Profile</a></li>

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
                                    <div class="col-lg-4 col-md-6 col-6">
                                        <h6 class="mt-2 m-b-0">State </h6>
                                        <span class="job_post">{{ $shop['state'] ?? 'NA' }}</span>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6">
                                        <h6 class="mt-2 m-b-0">City </h6>
                                        <span class="job_post">{{ $shop['city'] ?? 'NA' }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <!-- #END# Select2 -->

            <!-- Advanced Select -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Shop id </h6>
                                    <span class="job_post">{{ $shop['customer_id'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Active date </h6>
                                    <span class="job_post">
                                        @if ($shop->active_date)
                                            {{ \Carbon\Carbon::parse($shop->active_date)->format('d-m-Y') }}
                                        @else
                                            Inactive
                                        @endif
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Add date </h6>
                                    <span
                                        class="job_post">{{ \Carbon\Carbon::parse($shop->created_at)->format('d-m-Y') }}</span>
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
                                    <h6 class="mt-2 m-b-0">Shop Name </h6>
                                    <span class="job_post">{{ $shop['name'] }}</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Shop Number </h6>
                                    <span class="job_post">{{ preg_replace('~[+\d-](?=[\d-]{4})~', '*', $shop['phone'])}}</span>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Ref ID/Mobile number </h6>
                                    <span class="job_post">{{ $shop['ref_number'] }}</span>

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
                                <div class="col-md-12">
                                    <h6 class="mb-2 m-b-0 text-center">Shop Deals</h6>
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>Deal</th>
                                                <th>Saving UpTo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($shop['GetShopDeals'] as $deal)
                                                <tr>
                                                    <td>{{ $deal['shop_deal'] }}</td>
                                                    <td>{{ $deal['saving_up_to'] }}</td>
                                                </tr>

                                            @empty

                                                <tr>
                                                    <td colspan="2">No Deal Found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
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
                                <div class="col-md-12">
                                    <h6 class="mt-2 m-b-0">Help</h6>
                                    <span class="job_post">{!! $shop['LocalShop']['shop_help'] ?? 'NA' !!}</span>
                                </div>
                                <div class=" col-md-12">
                                    <h6 class="mt-2 m-b-0">Terms & Conditions </h6>
                                    <span class="job_post">{!! $shop['LocalShop']['shop_terms'] ?? 'NA' !!}</span>
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
                                <div class="col-lg-12 col-md-12">
                                    <h6 class="mt-2 m-b-0 text-center"> Documents </h6>
                                    <hr>
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border mb-5">
                                    <p><h6>Shop Picture</h6></p>
                                    @forelse ($shop['GetShopPicture'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b></label>
                                        <img src="{{ asset('/storage/shop/shop_pic/' . $picture['shop_picture']) }}" alt="{{ $picture['shop_picture'] }}" width="100" height="100">
                                        <a href="{{ asset('/storage/shop/shop_pic/' . $picture['shop_picture']) }}"
                                            download="{{ $picture['shop_picture'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        NA
                                    @endforelse
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border mb-5">
                                    <p><h6>Shop Menu</h6></p>
                                    @forelse ($shop['GetShopMenu'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_menu'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_menu/' . $picture['shop_menu']) }}"
                                            download="{{ $picture['shop_menu'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        NA
                                    @endforelse
                                </div>
                                <div class="col-lg-6 col-md-6 rounded border">
                                    <p><h6> Agreement </h6></p>
                                    @forelse ($shop['GetShopAgreement'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_agreement'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_agreement/' . $picture['shop_agreement']) }}"
                                            download="{{ $picture['shop_agreement'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        NA
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input Slider -->
        </div>
    </section>
@endsection
