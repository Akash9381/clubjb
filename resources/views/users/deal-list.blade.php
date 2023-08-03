@extends('users.layouts.user_layouts')
@section('title','Deal List')
@section('deal','Deals for '. $shop_name['name'])
@section('content')
    @include('users.layouts.dealheader')
    @include('users.layouts.sidebar')
    <div class="page-content-wrapper">
        <!-- Weekly Best Sellers-->
        <div class="weekly-best-seller-area py-3 mt-2">
            <div class="container">

                <div class="container">
                    <div class="row gy-3">
                        @forelse ($deals as $deal)
                            <div class="col-12">
                                <!-- Single Vendor -->
                                <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                                    style="background-image: url({{ asset('users/img/bg-img/store.jpg') }})">
                                    <h5 class="vendor-title text-white">{{ $deal['shop_deal'] }}</h5>
                                    <div class="vendor-info">
                                        <div class="ratings lh-1">
                                            <h6 class="text-white">Saving up to : <strong
                                                    class="text-warning">{{ $deal['saving_up_to'] }}</strong>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="vendor-profile shadow">
                                        <a class="btn btn-warning btn-sm mt-3" href="{{ url('user/deal/' . $deal['id']) }}"><i
                                                class="fa-solid fa-arrow-right-long ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <!-- Single Vendor -->
                                <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                                    style="background-image: url({{ asset('users/img/bg-img/store.jpg') }})">
                                    <h5 class="vendor-title text-white">Not Available</h5>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- lochal store-->
    </div>
@endsection
