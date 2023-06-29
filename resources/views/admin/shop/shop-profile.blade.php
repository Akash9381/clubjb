@extends('admin.layouts.admin_layouts')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2> Shop Profile
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">profile</a></li>

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
                                    <h6 class="mt-2 m-b-0">State </h6>
                                    <span class="job_post">{{ $shop['state'] ?? 'NA' }}</span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
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
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">S.no </h6>
                                    <span class="job_post">NA</span>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Add date </h6>
                                    <span class="job_post">{{ \Carbon\Carbon::parse($shop->created_at)->format('d-m-Y')}}</span>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Active date </h6>
                                    <span class="job_post">NA</span>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Shop id </h6>
                                    <span class="job_post">{{ $shop['shop_id'] }}</span>
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
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Shop Name </h6>
                                    <span class="job_post">{{ $shop['shop_name'] ?? 'NA' }}</span>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Shop Number </h6>
                                    <span class="job_post">{{ $shop['shop_number'] ?? 'NA' }}</span>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Login Pin </h6>
                                    <span class="job_post">{{ $shop['GetLocalShop']['login_pin'] }}</span>

                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Ref mobile number </h6>
                                    <span class="job_post">{{ $shop['ref_number'] }}</span>

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
                                    <h6 class="mt-2 m-b-0"> Documents </h6>
                                    <h6>Shop Picture</h6>
                                    @forelse ($shop['GetShopPicture'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_picture'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_pic/' . $picture['shop_picture']) }}"
                                            download="{{ $picture['shop_picture'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        <label for="">No Documents Uploaded</label>
                                    @endforelse

                                    <h6>Shop Menu</h6>
                                    @forelse ($shop['GetShopMenu'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_menu'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_menu/' . $picture['shop_menu']) }}"
                                            download="{{ $picture['shop_menu'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        <label for="">No Documents Uploaded</label>
                                    @endforelse

                                    <h6>Aadhar card</h6>
                                    @forelse ($shop['GetShopAdhar'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_adahar'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_aadhar_card/' . $picture['shop_adahar']) }}"
                                            download="{{ $picture['shop_adahar'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        <label for="">No Documents Uploaded</label>
                                    @endforelse

                                    <h6>Pan card</h6>
                                    @forelse ($shop['GetShopPanCard'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_pancard'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_pan_card/' . $picture['shop_pancard']) }}"
                                            download="{{ $picture['shop_pancard'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        <label for="">No Documents Uploaded</label>
                                    @endforelse

                                    <h6>Driving</h6>
                                    @forelse ($shop['GetShopDriving'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_driving'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_driving/' . $picture['shop_driving']) }}"
                                            download="{{ $picture['shop_driving'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        <label for="">No Documents Uploaded</label>
                                    @endforelse

                                    <h6>Passport</h6>
                                    @forelse ($shop['GetShopPassport'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_passport'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_passport/' . $picture['shop_passport']) }}"
                                            download="{{ $picture['shop_passport'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        <label for="">No Documents Uploaded</label>
                                    @endforelse

                                    <h6>CV</h6>
                                    @forelse ($shop['GetShopCv'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_cv'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_cv/' . $picture['shop_cv']) }}"
                                            download="{{ $picture['shop_cv'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        <label for="">No Documents Uploaded</label>
                                    @endforelse
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0"> Agreement </h6>
                                    @forelse ($shop['GetShopAgreement'] as $key => $picture)
                                        <label for=""><b>{{ $key + 1 }}.</b>
                                            {{ $picture['shop_agreement'] }}</label>
                                        <a href="{{ asset('/storage/shop/shop_agreement/' . $picture['shop_agreement']) }}"
                                            download="{{ $picture['shop_agreement'] }}" title="Download"> <i
                                                class="material-icons">move_to_inbox</i></a>
                                    @empty
                                        <label for="">No Documents Uploaded</label>
                                    @endforelse
                                </div>

                                <div class="col-sm-12">
                                    <a href="{{url('admin/local-shop/'.$shop['shop_id'])}}" class="btn btn-primary btn-round"> Edit </a>
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
