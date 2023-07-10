@extends('users.layouts.user_layouts')
@section('title', 'Home | CLUB JS')
@section('content')
    @include('users.layouts.header')
    @include('users.layouts.sidebar')
    <div class="page-content-wrapper">
        <!-- Hero Wrapper -->
        <div class="hero-wrapper">
            <div class="container">
                <div class="pt-3">
                    <!-- Hero Slides-->
                    <div class="hero-slides owl-carousel">
                        <!-- Single Hero Slide-->
                        <div class="single-hero-slide" style="background-image: url({{ asset('users/img/bg-img/1.jpg') }})">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">Amazon Echo</h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary"
                                        href="#" data-animation="fadeInUp" data-delay="800ms"
                                        data-duration="1000ms">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Hero Slide-->
                        <div class="single-hero-slide" style="background-image: url({{ asset('users/img/bg-img/2.jpg') }})">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">Light Candle</h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">Now only $22</p><a class="btn btn-success" href="#"
                                        data-animation="fadeInUp" data-delay="500ms" data-duration="1000ms">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Hero Slide-->
                        <div class="single-hero-slide" style="background-image: url({{ asset('users/img/bg-img/3.jpg') }})">
                            <div class="slide-content h-100 d-flex align-items-center">
                                <div class="slide-text">
                                    <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                        data-duration="1000ms">Best Furniture</h4>
                                    <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                        data-duration="1000ms">3 years warranty</p><a class="btn btn-danger" href="#"
                                        data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Catagories -->

        <!-- Flash Sale Slide -->
        <div class="flash-sale-wrapper mt-3">
            <div class="container">
                <div class="section-heading d-flex align-items-center justify-content-between rtl-flex-d-row-r">
                    <h6 class="d-flex align-items-center rtl-flex-d-row-r"><i
                            class="fa-solid fa-bolt-lightning me-1 text-danger lni-flashing-effect"></i>Category</h6>
                    <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->

                </div>
                <div class="flash-sale-slide owl-carousel mt-n2">
                    <!-- Flash Sale Card -->
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#">
                                <img src="{{ asset('users/img/icons/entertainment.png') }}" alt="">
                            </a>
                            <span class="product-title">Entertainment</span>

                        </div>


                    </div>

                    <!-- Flash Sale Card -->
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/salon.png') }}" alt=""><span
                                    class="product-title">Salon & Spa</span>
                            </a>
                        </div>
                    </div>
                    <!-- Flash Sale Card -->
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/cafe.png') }}" alt=""><span
                                    class="product-title">Cafe
                                    & Restaurant</span>
                            </a>
                        </div>
                    </div>
                    <!-- Flash Sale Card -->
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/retail.png') }}" alt=""><span
                                    class="product-title">Retail</span>
                            </a>
                        </div>
                    </div>
                    <!-- Flash Sale Card -->
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/hotel.png') }}" alt=""><span
                                    class="product-title">Hotel</span>
                            </a>
                        </div>
                    </div>
                    <!-- Flash Sale Card -->
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/service.png') }}" alt=""><span
                                    class="product-title">Services</span>
                            </a>
                        </div>
                    </div>
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/other.png') }}" alt=""><span
                                    class="product-title">Other</span>
                            </a>
                        </div>
                    </div>
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/education.png') }}"
                                    alt=""><span class="product-title">Education</span>
                            </a>
                        </div>
                    </div>
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/electrical.png') }}"
                                    alt=""><span class="product-title">Electrical</span>
                            </a>
                        </div>
                    </div>
                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/real-estate.png') }}"
                                    alt=""><span class="product-title">Real Estate</span>
                            </a>
                        </div>
                    </div>

                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/immigration.png') }}"
                                    alt=""><span class="product-title">Immigration</span>
                            </a>
                        </div>
                    </div>

                    <div class="card flash-sale-card">
                        <div class="card-body">
                            <a href="#"><img src="{{ asset('users/img/icons/tour-travel.png') }}"
                                    alt=""><span class="product-title">Tour & Travel</span>
                            </a>
                        </div>
                    </div>



                </div>

            </div>


        </div>
    </div>
    <!-- Dark Mode -->

    <!-- Top Products -->


    <form class="faq-search-form mt-n1" action="#" method="">
        <input class="form-control" type="search" name="search" placeholder="Search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>




    <!-- CTA Area -->

    <!-- Weekly Best Sellers-->
    <div class="weekly-best-seller-area py-3 mt-2">
        <div class="container">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="section-heading d-flex align-items-center justify-content-between dir-rtl mt-n3">
                <h6 class="d-flex align-items-center rtl-flex-d-row-r"><i
                        class="fa-solid fa-bolt-lightning me-1 text-danger lni-flashing-effect"></i>Global Store</h6>
                <a class="btn p-0" href="global-store-list.html">
                    View All<i class="ms-1 fa-solid fa-arrow-right-long"></i></a>
            </div>
            <div class="container">
                <div class="row gy-3">
                    @forelse ($globalstores as $globalstore)
                        <div class="col-12">
                            <!-- Single Vendor -->
                            <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                                style="background-image: url({{ asset('users/img/bg-img/store.jpg') }})">
                                <h5 class="vendor-title text-white">{{ $globalstore['shop_name'] }}</h5>
                                <div class="vendor-info">
                                    <div class="ratings lh-1"><strong class="text-warning">Category :</strong> <span
                                            class="text-white">{{ $globalstore['category'] }}</span></div>

                                    <div class="ratings lh-1 mt-1"><strong class="text-warning">Deal :</strong> <span
                                            class="text-white">{{ count($globalstore['GetShopDeals']) }}</span></div>
                                </div>
                                <!-- Vendor Profile-->
                                <div class="vendor-profile shadow">
                                    <a class="btn btn-warning btn-sm mt-3"
                                        href="{{ url('user/global-store/' . $globalstore['shop_id']) }}"><i
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


    <div class="weekly-best-seller-area py-3 mt-2">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between dir-rtl mt-n30">
                <h6 class="d-flex align-items-center rtl-flex-d-row-r"><i
                        class="fa-solid fa-bolt-lightning me-1 text-danger lni-flashing-effect"></i>Local Store</h6>
                <a class="btn p-0" href="local-store-list.html">
                    View All<i class="ms-1 fa-solid fa-arrow-right-long"></i></a>
            </div>
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
            </div>
        </div>
    </div>
    </div>
@endsection
