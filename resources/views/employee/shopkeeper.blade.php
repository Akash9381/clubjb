@extends('employee.layouts.employe_layouts')
@section('title', 'Add Shop')

<!-- Chat-launcher -->
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Shop
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Shop</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <form id="user-form" action="{{ url('employee/create-shop') }}" method="POST" enctype="multipart/form-data">
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
                                            <option value="none">Select State</option>
                                            @foreach ($states as $state)
                                                <option>{{ $state['name'] }}</option>
                                            @endforeach

                                        </select>
                                        <div style="color:red;" id="msg_id"></div>
                                        @error('state')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>City</b> </p>
                                        <select class="form-control show-tick ms select2" name="city" id="city"
                                            data-placeholder="Select">
                                            <option value="none">Select City</option>
                                        </select>
                                        <div style="color:red;" id="msg_city"></div>
                                        @error('city')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
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
                                <div class="row clearfix">

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b>Category</b> </p>
                                        <select class="form-control show-tick ms select2" name="category"
                                            data-placeholder="Select">
                                            <option value="Entertainment">Entertainment</option>
                                            <option value="Salon & Spa">Salon & Spa</option>
                                            <option value="Cafe & Restaurant">Cafe & Restaurant</option>
                                            <option value="Retail">Retail</option>
                                            <option value="Hotel">Hotel</option>
                                            <option value="Services">Services</option>
                                            <option value="Education">Education</option>
                                            <option value="Electrical">Electrical</option>
                                            <option value="Real Estate">Real Estate</option>
                                            <option value="Immigration">Immigration</option>
                                            <option value="Tour & Travel">Tour & Travel</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Sub Category</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="sub_category" class="form-control"
                                                placeholder="Type manually" />
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-md-6">
                                        <p style="visibility: hidden;"> <b>Add to hot Stores</b> </p>
                                        <div class="checkbox inlineblock">
                                            <input id="remember_me_3" name="hot_store" type="checkbox">
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
                                <div class="alert alert-primary">
                                    <strong> Shop Details</strong>
                                </div>
                                <div class="row clearfix">

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Shop Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" required value="{{ old('shop_name') }}" name="shop_name"
                                                class="form-control" placeholder="Shop Name" />
                                            @error('shop_name')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Shop Number</b> </p>
                                        <div class="form-group">
                                            <input type="number" readonly value="{{ request()->get('phone') }}" required
                                                name="phone" id="phone" class="form-control"
                                                placeholder="Shop Number" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <p> <b>Ref Id/Number</b> </p>
                                        <input required class="form-control" value="{{ Auth::user()->customer_id }}"
                                            placeholder="Ref Id/Number" name="ref_number" type="text" />
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
                                            <input type="text" name="contact_person" class="form-control"
                                                placeholder="Contact Person" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Contact Number</b> </p>
                                        <div class="form-group">
                                            <input type="number" id="contact_number" name="contact_number"
                                                class="form-control" placeholder="Contact Number" />
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-md-6">
                                        <p> <b> Designation</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="designation" class="form-control"
                                                placeholder="Designation" />
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
                                        <textarea rows="4" name="address_1" class="form-control no-resize" placeholder="Enter your Address"></textarea>
                                    </div>


                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Address Line 2</b> </p>
                                        <textarea rows="4" name="address_2" class="form-control no-resize" placeholder="Enter your Address"></textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mt-2">
                                        <p> <b>Pincode</b> </p>
                                        <div class="form-group">
                                            <input type="number" id="pincode" name="pincode" class="form-control"
                                                placeholder="Pincode" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mt-2">
                                        <p> <b>Landmark</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="landmark" class="form-control"
                                                placeholder="Landmark" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <p> <b>Shop Type</b> </p>
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="shop_type" id="Bronze" checked=""
                                                    class="with-gap" value="Bronze">
                                                <label for="Bronze">Bronze</label>
                                            </div>
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="shop_type" id="Silver" class="with-gap"
                                                    value="Silver">
                                                <label for="Silver">Silver</label>
                                            </div>
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="shop_type" id="Paid" class="with-gap"
                                                    value="Gold">
                                                <label for="Paid">Gold</label>
                                            </div>
                                            <div class="radio inlineblock">
                                                <input type="radio" name="shop_type" id="Platinum" class="with-gap"
                                                    value="Platinum">
                                                <label for="Platinum">Platinum</label>
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
                                            <input type="text" id="ip_address" name="ip_address" readonly
                                                class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Country Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="country_name" id="country_name" readonly
                                                class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Country Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="country_code" id="country_code" readonly
                                                class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Region Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="region_code" id="region_code" readonly
                                                class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Region Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="region_name" id="region_name" readonly
                                                class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>City Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="city_name" id="city_name" readonly
                                                class="form-control" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <p> <b>Zip Code</b> </p>
                                        <div class="form-group">
                                            <input type="text" name="zip_code" id="zip_code" readonly
                                                class="form-control" placeholder="" />
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
                                            <tr>
                                                <td id="row_num' + i + '">1
                                                    <input type="hidden" class="form-control" name="task_number[]"
                                                        value=' + i + '>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" required placeholder="Deal" name="deal[]" value=""></textarea>
                                                </td>
                                                <td> <input type="text" required class="form-control"
                                                        placeholder="Saving Up to" name="saving_up_to[]" value="">
                                                </td>
                                            </tr>
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
                                        <p> <b>Upload Shoop Picture</b> </p>
                                        <div class="form-group">
                                            <input type="file" accept=".png, .jpg, .jpeg" name="shop_pic[]" multiple
                                                class="form-control" placeholder="Upload Pic">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Upload Menu</b> </p>
                                        <div class="form-group">
                                            <input type="file" accept=".png, .jpg, .jpeg, .pdf" name="shop_menu[]"
                                                multiple class="form-control" placeholder="Upload Menu">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Agreement</b> </p>
                                        <div class="form-group">
                                            <input type="file" name="shop_agreement[]" multiple class="form-control"
                                                placeholder="Upload Menu">
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
                                        <p> <b>Help</b> </p>
                                        <textarea id="editor" name="shop_help">{{ $help['help'] ?? '' }}</textarea>
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
                                <textarea id="editor1" name="shop_terms">{{ $tc['tc'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-round"> Add Shopkeeper</button>

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

        jQuery("#phone").keypress(function(e) {
            var length = jQuery(this).val().length;
            if (length > 9) {
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
    </script>
    <script>
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
        $(document).ready(function() {

            jQuery.validator.addMethod("phoneUS", function(phone, element) {
                phone = phone.replace(/\s+/g, "");
                return this.optional(element) || phone.length > 9 && phone.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");

            $('#user-form').validate({ // initialize the plugin
                rules: {
                    phone: {
                        required: true,
                        phoneUS: true
                    },
                    shop_name: {
                        required: true
                    },
                    login_pin: {
                        number: true,
                        minlength: 4,
                        maxlength: 4
                    },
                    ref_number:{
                        required:true
                    }
                }
            });

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
        var i = 1;
        $('#addRow').click(function() {
            i++;
            $('#dynamic_field').append('<tr><td id="row_num' + i + '">' + i +
                '<input type="hidden" class="form-control" name="task_number[]" value=' + i + '></td>' +
                '<td><textarea class="form-control" required placeholder="Deal" name="deal[]" ></textarea></td>' +
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
