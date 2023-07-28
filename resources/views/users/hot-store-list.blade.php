@extends('users.layouts.user_layouts')
@section('content')
    @include('users.layouts.dealheader')
    @include('users.layouts.sidebar')
    <div class="page-content-wrapper">
        <div class="weekly-best-seller-area py-3 mt-2">
            <div class="container">
                <div class="container">
                    <div class="row gy-3">
                        @forelse ($localstores as $localstore)
                            <div class="col-12">
                                <!-- Single Vendor -->
                                <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                                    style="background-image: url({{ asset('users/img/bg-img/store.jpg') }})">
                                    <h5 class="vendor-title text-white">{{ $localstore['shop_name'] }}</h5>
                                    <div class="vendor-info">
                                        <div class="ratings lh-1"><strong class="text-warning">Category :</strong> <span
                                                class="text-white">{{ $localstore['category'] }}</span></div>

                                        <div class="ratings lh-1 mt-1"><strong class="text-warning">Deal :</strong> <span
                                                class="text-white">{{ count($localstore['GetShopDeals']) }}</span></div>
                                    </div>
                                    <!-- Vendor Profile-->
                                    <div class="vendor-profile shadow">
                                        <a class="btn btn-warning btn-sm mt-3"
                                            href="{{ url('user/local-store/' . $localstore['shop_id']) }}"><i
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



                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- lochal store-->
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
@endsection
