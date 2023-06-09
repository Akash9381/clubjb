@extends('shopkeeper.layouts.shopkeeper_layouts')
@section('title', 'ShopKeeper Dashboard')

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2> Shopkeeper Dashboard
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('employee/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0"><a class="text-dark" href="{{url('employee/customer-search')}}">Add Customer <img
                                                width="20px" src="{{ asset('employee/light/assets/img/add.png') }}"></a>
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0"><a class="text-dark" href="{{url('employee/shopkeeper-search')}}">Add Shopkeeper <img
                                                width="20px" src="{{ asset('employee/light/assets/img/add.png') }}"></a>
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0"><a class="text-dark" href="#">Submit Link <img width="20px"
                                                src="{{ asset('employee/light/assets/img/link.png') }}"></a></h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
