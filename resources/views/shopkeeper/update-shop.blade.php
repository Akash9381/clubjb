@extends('shopkeeper.layouts.shopkeeper_layouts')
@section('title', 'Update Profile')

<!-- Chat-launcher -->
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Update Profile
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('shopkeeper/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Update </a></li>

                    </ul>
                </div>
            </div>
        </div>
        <form id="user-form" action="{{ url('shopkeeper/update-shop') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="alert alert-primary">
                                    <strong> Shop State-City</strong>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>State </b> </p>
                                        <select class="form-control show-tick ms select2" data-placeholder="Select"
                                            name="state" id="state">
                                            <option value="none">Select State</option>
                                            @foreach ($states as $state)
                                                <option @if ($state['name'] == $shop['state']) selected @endif>
                                                    {{ $state['name'] }}</option>
                                            @endforeach

                                        </select>
                                        <div style="color:red;" id="msg_id"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>City</b> </p>
                                        <select class="form-control show-tick ms select2" name="city" id="city"
                                            data-placeholder="Select">
                                            <option value="none">Select City</option>
                                            <option selected>{{ $shop['city'] }}</option>
                                        </select>
                                        <div style="color:red;" id="msg_city"></div>
                                    </div>
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
                                <div class="alert alert-primary">
                                    <strong> Shop Category</strong>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-3">
                                        <p> <b> Shop Type</b> </p>
                                        <div class="form-group">
                                            <strong>{{ $shop['LocalShop']['shop_type'] }}</strong>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <p> <b>Hot Shop</b> </p>
                                        <div class="form-group">
                                            @if ($shop['LocalShop']['hot_store'])
                                                <p> <b>Yes</b> </p>
                                            @else
                                                <p> <b>No</b> </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <p> <b>Category</b> </p>
                                        <select class="form-control show-tick ms select2" name="category"
                                            data-placeholder="Select">
                                            <option @if ($shop['LocalShop']['category'] == 'Entertainment') selected @endif value="Entertainment">
                                                Entertainment</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Salon & Spa') selected @endif value="Salon & Spa">
                                                Salon & Spa</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Cafe & Restaurant') selected @endif
                                                value="Cafe & Restaurant">Cafe & Restaurant</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Retail') selected @endif value="Retail">Retail
                                            </option>
                                            <option @if ($shop['LocalShop']['category'] == 'Hotel') selected @endif value="Hotel">Hotel
                                            </option>
                                            <option @if ($shop['LocalShop']['category'] == 'Services') selected @endif value="Services">
                                                Services</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Education') selected @endif value="Education">
                                                Education</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Electrical') selected @endif value="Electrical">
                                                Electrical</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Real Estate') selected @endif value="Real Estate">
                                                Real Estate</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Immigration') selected @endif value="Immigration">
                                                Immigration</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Tour & Travel') selected @endif
                                                value="Tour & Travel">Tour & Travel</option>
                                            <option @if ($shop['LocalShop']['category'] == 'Other') selected @endif value="Other">Other
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Sub Category</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['LocalShop']['sub_category'] ?? 'NA' }}"
                                                name="sub_category" class="form-control" placeholder="Type manually" />
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
                                <div class="alert alert-primary">
                                    <strong> Shop Details</strong>
                                </div>
                                <div class="row clearfix">


                                    <div class="col-lg-3 col-md-6">
                                        <p> <b> Shop Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" required value="{{ $shop['name'] }}" name="shop_name"
                                                class="form-control" placeholder="Shop Name" />
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <p> <b> Shop Number</b> </p>
                                        <div class="form-group">
                                            <input type="number" readonly value="{{ $shop['phone'] }}" required
                                                name="shop_number" id="shop_number" class="form-control"
                                                placeholder="Shop Number" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Login Pin</b> </p>
                                        <input class="form-control" value="{{ $shop['login_pin'] }}" required
                                            name="login_pin" type="text" maxlength="4" />
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b> Ref Id/Number</b> </p>
                                        <div class="form-group">
                                            <input type="text" readonly required value="{{ $shop['ref_number'] }}"
                                                name="ref_number" id="ref_number" class="form-control"
                                                placeholder="Ref Number" />
                                        </div>
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
                                <div class="alert alert-primary">
                                    <strong> Contact Details</strong>
                                </div>
                                <div class="row clearfix">

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Contact Person</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['LocalShop']['contact_person'] }}"
                                                name="contact_person" class="form-control"
                                                placeholder="Contact Person" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Contact Number</b> </p>
                                        <div class="form-group">
                                            <input type="number" id="contact_number"
                                                value="{{ $shop['LocalShop']['contact_number'] }}" name="contact_number"
                                                class="form-control" placeholder="Contact Number" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Designation</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['LocalShop']['designation'] }}"
                                                name="designation" class="form-control" placeholder="Designation" />
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
                                <div class="alert alert-primary">
                                    <strong> Shop Address</strong>
                                </div>
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


                                    <div class="col-lg-6 col-md-6 mt-2">
                                        <p> <b>Pincode</b> </p>
                                        <div class="form-group">
                                            <input type="number" id="pincode" value="{{ $shop['pincode'] }}"
                                                name="pincode" class="form-control" placeholder="Pincode" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mt-2">
                                        <p> <b>Landmark</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['landmark'] }}" name="landmark"
                                                class="form-control" placeholder="Landmark" />
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
                                            <input type="text" value="{{ $shop['LocalShop']['ip_address'] }}"
                                                id="ip_address" name="ip_address" readonly class="form-control"
                                                placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Country Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['LocalShop']['country_name'] }}"
                                                name="country_name" id="country_name" readonly class="form-control"
                                                placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Country Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['LocalShop']['country_code'] }}"
                                                name="country_code" id="country_code" readonly class="form-control"
                                                placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Region Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" id="region_code" name="region_code"
                                                value="{{ $shop['LocalShop']['region_code'] }}" readonly
                                                class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Region Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['LocalShop']['region_name'] }}"
                                                name="region_name" id="region_name" readonly class="form-control"
                                                placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>City Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['LocalShop']['city_name'] }}"
                                                name="city_name" id="city_name" readonly class="form-control"
                                                placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Zip Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" value="{{ $shop['LocalShop']['zip_code'] }}"
                                                name="zip_code" id="zip_code" readonly class="form-control"
                                                placeholder="" />
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
                                <div class="alert alert-primary">
                                    <strong> Shop Deals</strong>
                                </div>
                                <div class="row clearfix">
                                    <br><br>
                                    <div class="col-md-10">
                                        <p> <b>Shop Deals</b> </p>
                                    </div>
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
                                                @if ($deal['status'] == 1)
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" class="form-control"
                                                                name="task_number[]"
                                                                value='{{ $key + 1 }}'>{{ $key + 1 }}
                                                        </td>
                                                        <td>
                                                            <textarea readonly class="form-control" required>{{ $deal['shop_deal'] }}</textarea>
                                                        </td>
                                                        <td> <input readonly type="text" required class="form-control"
                                                                placeholder="Saving Up to"
                                                                value="{{ $deal['saving_up_to'] }}"> </td>
                                                        <td>
                                                            <a class="btn btn-danger" title="edit"
                                                                href="{{ url('shopkeeper/deal/edit/' . $deal['id']) }}"><i
                                                                    class="zmdi zmdi-edit"></i></a>
                                                            @if ($key > 0)
                                                                <a title="trash" type="button" class="btn btn-danger "
                                                                    onclick="return confirm('Are you sure you want to trash this item?');"
                                                                    href="{{ url('shopkeeper/deal-trash/' . $deal['id']) }}"><i
                                                                        class="zmdi zmdi-delete"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
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
                                <div class="alert alert-primary">
                                    <strong> Shop Documents</strong>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Uploaded Pic</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_pic[]" accept=".png, .jpg, .jpeg" multiple
                                                class="form-control" placeholder="Upload Pic">
                                        </div>
                                        @foreach ($shop['GetShopPicture'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b></label>
                                            <img src="{{ asset('/storage/shop/shop_pic/' . $picture['shop_picture']) }}"
                                                alt="{{ $picture['shop_picture'] }}" width="100" height="100">
                                            <a href="{{ asset('/storage/shop/shop_pic/' . $picture['shop_picture']) }}"
                                                download="{{ $picture['shop_picture'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            <a href="{{ url('admin/shop/shop_pic/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Uploaded Menu</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_menu[]" accept=".png, .jpg, .jpeg, .pdf"
                                                multiple class="form-control" placeholder="Upload Menu">
                                        </div>
                                        @foreach ($shop['GetShopMenu'] as $key => $picture)
                                            <label for=""><b>{{ $key + 1 }}.</b>
                                                {{ $picture['shop_menu'] }}</label>
                                            <a href="{{ asset('/storage/shop/shop_menu/' . $picture['shop_menu']) }}"
                                                download="{{ $picture['shop_menu'] }}" title="Download"> <i
                                                    class="material-icons">move_to_inbox</i></a>
                                            <a href="{{ url('admin/shop/shop_menu/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt-3">
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
                                            <a href="{{ url('admin/shop/shop_agreement/delete/' . $picture['id']) }}"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="material-icons">delete</i></a>
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
                                <div class="alert alert-primary">
                                    <strong> Shop Help</strong>
                                </div>
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-6">
                                        <p> <b>Help</b> </p>
                                        <textarea id="editor" name="shop_help">{!! $shop['LocalShop']['shop_help'] !!}</textarea>
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
                                <div class="alert alert-primary">
                                    <strong> Shop Terms & Conditions</strong>
                                </div>
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-6">
                                        <p> <b>Shop Terms & Conditions</b> </p>
                                        <textarea id="editor1" name="shop_terms">{!! $shop['LocalShop']['shop_terms'] !!}</textarea>
                                    </div>
                                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        // max 10 digits number and do n't accept zero as the first digit.
        $('#user-form').submit(function(e) {
            var state = $("#msg_id");
            var msg = "Please select State";
            var city = $("#msg_city");
            var msg_city = "Please select city";
            if ($('#state').val() == "none") {
                state.append(msg);
                e.preventDefault();
                return false;
            } else {
                $("#msg_id").html('');
            }
            if ($('#city').val() == "none") {
                city.append(msg_city);
                e.preventDefault();
                return false;
            } else {
                $("#msg_city").html('');
            }
        });

        $("#state").on('change', function() {
            if ($("#state").val() != "none") {
                $("#msg_id").html('');
            }
        })

        $("#city").on('change', function() {
            if ($("#city").val() != "none") {
                $("#msg_city").html('');
            }
        })
        jQuery("#shop_number").keypress(function(e) {
            var length = jQuery(this).val().length;
            if (length > 9) {
                return false;
            } else if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            } else if ((length == 0) && (e.which == 48)) {
                return false;
            }
        });

        jQuery("#contact_number").keypress(function(e) {
            var length = jQuery(this).val().length;
            if (length > 9) {
                return false;
            } else if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            } else if ((length == 0) && (e.which == 48)) {
                return false;
            }
        });
        jQuery("#login_pin").keypress(function(e) {
            var length = jQuery(this).val().length;
            if (length > 3) {
                return false;
            } else if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            } else if ((length == 0) && (e.which == 48)) {
                return false;
            }
        });

        jQuery("#pincode").keypress(function(e) {
            var length = jQuery(this).val().length;
            if (length > 5) {
                return false;
            } else if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            } else if ((length == 0) && (e.which == 48)) {
                return false;
            }
        });
    </script>
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
                        $('#city').html('<option value="none">Select City</option>');
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
                '<td><textarea class="form-control" required placeholder="Deal" name="deal[]" ></textarea></td></td>' +
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
