@extends('employee.layouts.employe_layouts')
@section('title', 'Search Employee')

<!-- Chat-launcher -->
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Search Here
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('employee/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>


                    </ul>
                </div>
            </div>
        </div>
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
        <div class="container-fluid">
            <!-- #END# Select2 -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-6">
                                    <form id="search-shopkeeper" action="{{ url()->current() }}">
                                        <div class="input-group">
                                            <input type="number" value="{{ old('phone') }} " required name="phone"
                                                id="phone" class="form-control" placeholder="Enter Mobile Number...">
                                            <button class="input-group-addon"><i class="zmdi zmdi-search"></i></button>
                                        </div>
                                        <label id="phone-error" class="error" for="phone"></label>
                                        @error('phone')
                                            <label id="phone-error" class="error" for="phone">{{ $message }}</label>
                                        @enderror
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="card">
                        <div class="body">
                            @forelse ($data as $shop)
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong for="customer_edit">{{ $shop['name'] }}</strong>
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <a href="{{ url('employee/edit-shopkeeper/' . $shop['id']) }}"><i
                                                class="zmdi zmdi-edit"></i></a>

                                    </div>
                                </div>
                            @empty
                                <div class="text-center">
                                    <strong>No Employee Found</strong><br>
                                    <a href="{{ url('employee/add-shopkeeper') }}" class="btn btn-primary">Create New
                                        Employee</a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

@endsection

@section('js')

    <script src="{{ asset('employee/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script> <!-- Bootstrap Colorpicker Js -->
    <script src="{{ asset('employee/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script> <!-- Input Mask Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script> <!-- Multi Select Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script> <!-- Jquery Spinner Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/nouislider/nouislider.js') }}"></script> <!-- noUISlider Plugin Js -->
    <script src="{{ asset('employee/assets/plugins/select2/select2.min.js') }}"></script> <!-- Select2 Js -->

    <script src="{{ asset('employee/lightassets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
    <script src="{{ asset('employee/lightassets/js/pages/forms/advanced-form-elements.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
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

            jQuery.validator.addMethod("phoneUS", function(phone, element) {
                phone = phone.replace(/\s+/g, "");
                return this.optional(element) || phone.length > 9 && phone.match(
                    /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
            }, "Please specify a valid phone number");

            $('#search-shopkeeper').validate({ // initialize the plugin
                rules: {
                    phone: {
                        required: true,
                        phoneUS: true
                    },
                }
            });
        });
    </script>
@endsection
