@extends('employee.layouts.employe_layouts')
@section('title', 'Update Local Shop')

<!-- Chat-launcher -->


@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Update Shopkeeper
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Shopkeeper </a></li>

                    </ul>
                </div>
            </div>
        </div>
        <form action="{{ url('employee/update-shop/'.$shop['shop_id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <!-- Color Pickers -->
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
                <!-- Advanced Select2 -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>State </b> </p>
                                        <select class="form-control show-tick ms select2" data-placeholder="Select"
                                            name="state" id="state">
                                            <option value="">Select State</option>
                                            @foreach ($states as $state)
                                                <option @if ($state['name'] == $shop['state']) selected @endif>
                                                    {{ $state['name'] }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>City</b> </p>
                                        <select class="form-control show-tick ms select2" name="city" id="city"
                                            data-placeholder="Select">
                                            <option value="">Select City</option>
                                            <option selected>{{ $shop['city'] }}</option>
                                        </select>
                                    </div>
                                    <input hidden name="ref_number" value="{{ Auth::user()->phone }}">
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

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b>Category</b> </p>
                                        <select class="form-control show-tick ms select2" name="category"
                                            data-placeholder="Select">
                                            <option @if ($shop['category'] == 'Entertainment') selected @endif value="Entertainment">
                                                Entertainment</option>
                                            <option @if ($shop['category'] == 'Salon & Spa') selected @endif value="Salon & Spa">
                                                Salon & Spa</option>
                                            <option @if ($shop['category'] == 'Cafe & Restaurant') selected @endif
                                                value="Cafe & Restaurant">Cafe & Restaurant</option>
                                            <option @if ($shop['category'] == 'Retail') selected @endif value="Retail">Retail
                                            </option>
                                            <option @if ($shop['category'] == 'Hotel') selected @endif value="Hotel">Hotel
                                            </option>
                                            <option @if ($shop['category'] == 'Services') selected @endif value="Services">
                                                Services</option>
                                            <option @if ($shop['category'] == 'Education') selected @endif value="Education">
                                                Education</option>
                                            <option @if ($shop['category'] == 'Electrical') selected @endif value="Electrical">
                                                Electrical</option>
                                            <option @if ($shop['category'] == 'Real Estate') selected @endif value="Real Estate">
                                                Real Estate</option>
                                            <option @if ($shop['category'] == 'Immigration') selected @endif value="Immigration">
                                                Immigration</option>
                                            <option @if ($shop['category'] == 'Tour & Travel') selected @endif
                                                value="Tour & Travel">Tour & Travel</option>
                                            <option @if ($shop['category'] == 'Other') selected @endif value="Other">Other
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Sub Category</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['sub_category'] ?? 'NA' }}"
                                                name="sub_category" class="form-control" placeholder="Type manually" />
                                        </div>
                                    </div>




                                    <div class="col-lg-4 col-md-6">
                                        <p style="visibility: hidden;"> <b>Add to hot Stores</b> </p>
                                        <div class="checkbox inlineblock">
                                            <input id="remember_me_3" @if ($shop['hot_store']) checked @endif
                                                name="hot_store" type="checkbox">
                                            <label for="remember_me_3">
                                                <b>Add to hot Stores</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Advanced Select -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">


                                    <div class="col-lg-3 col-md-6">
                                        <p> <b> Ref Number</b> </p>
                                        <div class="form-group">
                                            <input type="number" required value="{{ $shop['ref_number'] }}" name="ref_number"
                                                class="form-control" placeholder="Ref Number" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b> Shop Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" required value="{{ $shop['shop_name'] }}" name="shop_name"
                                                class="form-control" placeholder="Shop Name" />
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <p> <b> Shop Number</b> </p>
                                        <div class="form-group">
                                            <input type="number" readonly value="{{ $shop['shop_number'] }}" required
                                                name="shop_number" class="form-control" placeholder="Shop Number" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Login Pin</b> </p>
                                        <input class="form-control" value="{{ $shop['GetLocalShop']['login_pin'] }}"
                                            required name="login_pin" type="text" maxlength="4" />
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

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Contact Person</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['contact_person'] }}"
                                                name="contact_person" class="form-control"
                                                placeholder="Contact Person" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Contact Number</b> </p>
                                        <div class="form-group">
                                            <input type="number" value="{{ $shop['contact_number'] }}"
                                                name="contact_number" class="form-control"
                                                placeholder="Contact Number" />
                                        </div>
                                    </div>




                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Designation</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['designation'] }}" name="designation"
                                                class="form-control" placeholder="Designation" />
                                        </div>
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

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Address Line 1</b> </p>
                                        <textarea rows="4" value="{{ $shop['address_1'] }}" name="address_1" class="form-control no-resize"
                                            placeholder="Enter your Address"></textarea>
                                    </div>


                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Address Line 2</b> </p>
                                        <textarea rows="4" value="{{ $shop['address_2'] }}" name="address_2" class="form-control no-resize"
                                            placeholder="Enter your Address"></textarea>
                                    </div>

                                    <div class="row p-3">

                                        <div class="col-lg-6 col-md-6">
                                            <p> <b>Pincode</b> </p>
                                            <div class="form-group">
                                                <input type="number" value="{{ $shop['pincode'] }}" name="pincode"
                                                    class="form-control" placeholder="Pincode" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <p> <b>Landmark</b> </p>
                                            <div class="form-group">
                                                <input type="text" value="{{ $shop['landmark'] }}" name="landmark"
                                                    class="form-control" placeholder="Landmark" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">

                                            <div class="form-group mt-5">
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="shop_type" id="Paid"
                                                        class="with-gap" value="gold"
                                                        @if ($shop['shop_type'] == 'gold') checked @endif>
                                                    <label for="Paid">Gold</label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="shop_type"
                                                        @if ($shop['shop_type'] == 'silver') checked @endif id="unPaid"
                                                        class="with-gap" value="silver">
                                                    <label for="unPaid">Silver</label>
                                                </div>
                                            </div>
                                        </div>

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

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label id="crnt_location" class="btn btn-primary btn-round">
                                                Add Shop Location</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>IP</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['ip_address'] }}" id="ip_address"
                                                name="ip_address" readonly class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Country Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['country_name'] }}"
                                                name="country_name" id="country_name" readonly class="form-control"
                                                placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Country Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['country_code'] }}"
                                                name="country_code" id="country_code" readonly class="form-control"
                                                placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Region Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" id="region_code" name="region_code"
                                                value="{{ $shop['region_code'] }}" readonly class="form-control"
                                                placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Region Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['region_name'] }}" name="region_name"
                                                id="region_name" readonly class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>City Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['city_name'] }}" name="city_name"
                                                id="city_name" readonly class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Zip Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['zip_code'] }}" name="zip_code"
                                                id="zip_code" readonly class="form-control" placeholder="" />
                                        </div>
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
                                    <br><br>
                                    <div class="form-group">
                                        <input type='button' class="btn btn-primary btn-round" value='Add Deal'
                                            id='addRow' name='addRow' />
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Deal Name</th>
                                                <th>Saving Up to</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamic_field">
                                            @foreach ($shop['GetShopDeals'] as $key => $deal)
                                                <tr>
                                                    <td>
                                                        <input type="hidden" class="form-control" name="task_number[]"
                                                            value='{{ $key + 1 }}'>{{ $key + 1 }}
                                                    </td>
                                                    <td><input type="text" required class="form-control"
                                                            placeholder="Deal" value="{{ $deal['shop_deal'] }}"></td>
                                                    <td> <input type="text" required class="form-control"
                                                            placeholder="Saving Up to"
                                                            value="{{ $deal['saving_up_to'] }}"> </td>
                                                    <td><button type="button" class="btn btn-danger "><i
                                                                class="zmdi zmdi-edit"></i></button>
                                                        <button type="button" class="btn btn-danger "><i
                                                                class="zmdi zmdi-delete"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Upload Menu</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_menu[]" multiple class="form-control"
                                                placeholder="Upload Menu">
                                        </div>
                                        @foreach ($shop['GetShopMenu'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_menu'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_menu/' . $picture['shop_menu']) }}"
                                                download="{{ $picture['shop_menu'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            {{-- <a href="{{ url('admin/shop/shop_menu/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a> --}}
                                        @endforeach
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Upload Pic</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_pic[]" multiple class="form-control"
                                                placeholder="Upload Pic">
                                        </div>
                                        @foreach ($shop['GetShopPicture'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_picture'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_pic/' . $picture['shop_picture']) }}"
                                                download="{{ $picture['shop_picture'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            {{-- <a href="{{ url('admin/shop/shop_pic/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a> --}}
                                        @endforeach
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Aadhar Card</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_aadhar_card[]" multiple class="form-control"
                                                placeholder="Upload Pic">
                                        </div>
                                        @foreach ($shop['GetShopAdhar'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_adahar'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_aadhar_card/' . $picture['shop_adahar']) }}"
                                                download="{{ $picture['shop_adahar'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            {{-- <a href="{{ url('admin/shop/shop_aadhar_card/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a> --}}
                                        @endforeach
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Pan card</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_pan_card[]" multiple class="form-control"
                                                placeholder="Upload Pic">
                                        </div>
                                        @foreach ($shop['GetShopPanCard'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_pancard'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_pan_card/' . $picture['shop_pancard']) }}"
                                                download="{{ $picture['shop_pancard'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            {{-- <a href="{{ url('admin/shop/shop_pancard/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a> --}}
                                        @endforeach
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Driving Licence</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_driving[]" multiple class="form-control"
                                                placeholder="Upload Pic">
                                        </div>
                                        @foreach ($shop['GetShopDriving'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_driving'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_driving/' . $picture['shop_driving']) }}"
                                                download="{{ $picture['shop_driving'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            {{-- <a href="{{ url('admin/shop/shop_driving/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a> --}}
                                        @endforeach
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Passport</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_passport[]" multiple class="form-control"
                                                placeholder="Upload Pic">
                                        </div>
                                        @foreach ($shop['GetShopPassport'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_passport'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_passport/' . $picture['shop_passport']) }}"
                                                download="{{ $picture['shop_passport'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            {{-- <a href="{{ url('admin/shop/shop_passport/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a> --}}
                                        @endforeach
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>CV</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_cv[]" multiple class="form-control"
                                                placeholder="Upload Pic">
                                        </div>
                                        @foreach ($shop['GetShopCv'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_cv'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_cv/' . $picture['shop_cv']) }}"
                                                download="{{ $picture['shop_cv'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            {{-- <a href="{{ url('admin/shop/shop_cv/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a> --}}
                                        @endforeach
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Agreement</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_agreement[]" multiple class="form-control"
                                                placeholder="Upload Pic">
                                        </div>
                                        @foreach ($shop['GetShopAgreement'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_agreement'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_agreement/' . $picture['shop_agreement']) }}"
                                                download="{{ $picture['shop_agreement'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            {{-- <a href="{{ url('admin/shop/shop_agreement/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a> --}}
                                        @endforeach
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

                                    <div class="col-lg-12 col-md-6">
                                        <p> <b>Help</b> </p>
                                        <textarea rows="4" name="shop_help" class="form-control no-resize" placeholder="Please type ">{{$shop['shop_help']}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="float-left text-black"> Terms and conditions </h2>
                            </div>
                            <div class="body">
                                <textarea rows="4" name="shop_terms" class="form-control no-resize" placeholder="Please type ">{{$shop['shop_terms']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-round"> Update Shopkeeper</button>

                    </div>
                </div>

            </div>
        </form>
    </section>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var state = this.value;
                $("#city").html('');
                $.ajax({
                    url: "/admin/get-city",
                    type: "get",
                    dataType: 'json',
                    data: {
                        state: state
                    },
                    success: function(result) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city").append('<option value="' + value.city +
                                '">' + value.city + '</option>');
                        });
                    }
                })
            })
            $('#crnt_location').on('click', function() {
                $.ajax({
                    url: "/employee/crnt_location",
                    type: "get",
                    dataType: 'json',
                    success: function(result) {
                        $('#ip_address').val(result.info.ip);
                        $('#country_name').val(result.info.countryName);
                        $('#country_code').val(result.info.countryCode);
                        $('#region_code').val(result.info.regionCode);
                        $('#region_name').val(result.info.regionName);
                        $('#city_name').val(result.info.cityName);
                        $('#zip_code').val(result.info.zipCode);
                    }
                })
            })
        });
    </script>
    <script>
        var i = 0;
        $('#addRow').click(function() {
            i++;
            $('#dynamic_field').append('<tr><td id="row_num' + i + '">' + i +
                '<input type="hidden" class="form-control" name="task_number[]" value=' + i + '></td>' +
                '<td><input type="text" required class="form-control" placeholder="Deal" name="deal[]" value=""></td>' +
                '<td> <input type="text" required class="form-control" placeholder="Saving Up to" name="saving_up_to[]" value=""> </td>' +
                '<td><button type="button" name="remove" class="btn btn-danger btn_remove">X</button></td></tr>'
            );
        });
        $(document).on('click', '.btn_remove', function() {
            $(this).closest("tr").remove(); //use closest here
            $('tbody tr').each(function(index) {
                //change id of first tr
                $(this).find("td:eq(0)").attr("id", "row_num" + (index + 1))
                //change hidden input value
                $(this).find("td:eq(0)").html((index + 1) +
                    '<input type="hidden" name="task_number[]" value=' + (index + 1) + '>')
            });
            i--;
        });
    </script>
@endsection
