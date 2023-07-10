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
                        <div class="user-profile me-3"><img src="img/bg-img/9.jpg" alt="">
                            <div class="change-user-thumb">
                                <form>
                                    <input class="form-control-file" type="file">
                                    <button><i class="fa-solid fa-pen"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="user-info">
                            <p class="mb-0 text-dark">{{ $user['GetCustomer']['customer_id'] }}</p>
                            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                        </div>

                    </div>
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">
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
                        <form action="{{ url('user/update-profile') }}" method="Post">
                            @csrf
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-at"></i><span>Username</span></div>
                                <input class="form-control" disabled type="text"
                                    value="{{ $user['GetCustomer']['customer_id'] }}">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-user"></i><span>Full Name</span></div>
                                <input class="form-control" required name="name" type="text"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-phone"></i><span>Phone</span></div>
                                <input class="form-control" type="text" value="{{ Auth::user()->phone }}" disabled>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-envelope"></i><span>Email Address</span>
                                </div>
                                <input class="form-control" name="email" type="email"
                                    value="{{ Auth::user()->email ?? 'NA' }}">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-location-arrow"></i><span>Shipping
                                        Address</span></div>
                                <input class="form-control" name="address_1" type="text"
                                    value="{{ $user['GetCustomer']['address_1'] ?? 'NA' }}">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Save All Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
