@extends('users.layouts.user_layouts')
@section('title', 'Profile | CLUB JS')
@section('content')

@include('users.layouts.header')
@include('users.layouts.sidebar')
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Profile Wrapper-->
            <div class="profile-wrapper-area py-3">
                <!-- User Information-->
                <div class="card user-info-card">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="user-profile me-3"><img src="img/bg-img/9.jpg" alt=""></div>
                        <div class="user-info">
                            <p class="mb-0 text-dark">@designing-world</p>
                            <h5 class="mb-0">{{Auth::user()->name}}</h5>
                        </div>
                    </div>
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="fa-solid fa-at"></i><span>Username</span>
                            </div>
                            <div class="data-content">{{$user['GetCustomer']['customer_id'] ?? 'NA'}}</div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="fa-solid fa-user"></i><span>Full
                                    Name</span></div>
                            <div class="data-content">{{Auth::user()->name}}</div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="fa-solid fa-phone"></i><span>Phone</span>
                            </div>
                            <div class="data-content">{{Auth::user()->phone}}</div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="fa-solid fa-envelope"></i><span>Email</span></div>
                            <div class="data-content">{{Auth::user()->gmail ?? 'NA'}} </div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i
                                    class="fa-solid fa-location-dot"></i><span>Shipping Address</span></div>
                            <div class="data-content">{{$user['GetCustomer']['address_1'] ?? 'NA'}}</div>
                        </div>
                        <div class="single-profile-data d-flex align-items-center justify-content-between">
                            <div class="title d-flex align-items-center"><i class="fa-solid fa-star"></i><span>My
                                    Orders</span></div>
                            <div class="data-content"><a class="btn btn-success btn-sm" href="my-order.html">View
                                    Status</a></div>
                        </div>
                        <!-- Edit Profile-->
                        <div class="edit-profile-btn mt-3"><a class="btn btn-primary w-100" href="{{url('user/edit-profile')}}"><i
                                    class="fa-solid fa-pen me-2"></i>Edit Profile</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
