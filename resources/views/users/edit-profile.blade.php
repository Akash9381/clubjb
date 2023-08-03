@extends('users.layouts.user_layouts')
@section('title', 'Edit Profile | CLUB JS')
@section('content')

    @include('users.layouts.header')
    @include('users.layouts.sidebar')
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Profile Wrapper-->
            <div class="profile-wrapper-area py-3">

                <form action="{{ url('user/update-profile') }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <!-- User Information-->
                    <div class="card user-info-card">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="user-profile me-3">
                                <div id="preview">
                                    @if(ProfileImage())
                                    <img src="{{ asset('/storage/employee/picture_document/' . ProfileImage()) }}" alt="profile_image">
                                    @else
                                    <img src="{{ asset('users/img/bg-img/9.jpg') }}" alt="profile_image">
                                    @endif
                                </div>
                                <div class="change-user-thumb">
                                    <input class="form-control-file" id="image" name="image[]" accept=".png, .jpg, .jpeg, .webp" type="file">
                                    <button><i class="fa-solid fa-pen"></i></button>
                                </div>
                            </div>
                            <div class="user-info">
                                <p class="mb-0 text-dark">{{ $user['customer_id'] }}</p>
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
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-at"></i><span>Username</span></div>
                                <input class="form-control" disabled type="text"
                                    value="{{ $user['customer_id'] }}">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-user"></i><span>Full Name</span></div>
                                <input class="form-control" required name="name" type="text"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-phone"></i><span>Phone</span></div>
                                <input class="form-control" type="number" value="{{ Auth::user()->phone }}" disabled>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-envelope"></i><span>Email Address</span>
                                </div>
                                <input class="form-control" name="email" type="email"
                                    value="{{ Auth::user()->email ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="fa-solid fa-location-arrow"></i><span>Shipping
                                        Address</span></div>
                                <input class="form-control" name="address_1" type="text"
                                    value="{{ $user['address_1'] ?? '' }}">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Save All Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function imagePreview(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var fileReader = new FileReader();
                fileReader.onload = function(event) {
                    $('#preview').html('<img src="' + event.target.result + '" />');
                };
                fileReader.readAsDataURL(fileInput.files[0]);
            }
        }

        $("#image").change(function() {
            imagePreview(this);
        });
    </script>
@endsection
