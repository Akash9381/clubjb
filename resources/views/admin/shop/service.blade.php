@extends('admin.layouts.admin_layouts')
@section('title', 'Service')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Services
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Services </a></li>

                    </ul>
                </div>
            </div>
        </div>

        <form id="user-form">
            <div class="container-fluid">
            <div class="alert alert-primary">
                <strong>Users Details</strong>
            </div>

            <!-- Advanced Select -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <p> Customer Name </p>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="employee Name" />
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <p>Mobile </p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="employee Number" />
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <p>Cust ID </p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="employee Number" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <p>Email </p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="employee Number" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <p>Cust Type </p>
                                    <div class="form-group ">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" name="gender" id="new" class="with-gap"
                                                value="option1">
                                            <label for="new">New</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="gender" id="old" class="with-gap"
                                                value="option2" checked="">
                                            <label for="old"> old</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <p>Cust Status </p>
                                    <div class="form-group ">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" name="gender" id="active" class="with-gap"
                                                value="option1">
                                            <label for="active">Active</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="gender" id="inactive" class="with-gap"
                                                value="option2" checked="">
                                            <label for="inactive"> Inactive</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <p>Mem Type </p>
                                    <div class="form-group ">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" name="gender" id="bronze" class="with-gap"
                                                value="option1">
                                            <label for="bronze">Bronze</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="gender" id="silver" class="with-gap"
                                                value="option2" checked="">
                                            <label for="silver"> Silver</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="gender" id="gold" class="with-gap"
                                                value="option2" checked="">
                                            <label for="gold"> Gold</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="gender" id="Platinum" class="with-gap"
                                                value="option2" checked="">
                                            <label for="Platinum"> Platinum</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <p>Mem Payment </p>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="employee Number" />
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Select -->
            <!-- Input Slider -->


            <div class="alert alert-primary">
                <strong>Store Types</strong>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-md-6">

                                    <div class="form-group ">
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" name="gender" id="local" class="with-gap"
                                                value="option1">
                                            <label for="local">Local Shop</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="gender" id="global" class="with-gap"
                                                value="option2" checked="">
                                            <label for="global"> Global Shop</label>
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
                                <div class="col-lg-6 col-md-6">
                                    <p> <b>State </b> </p>

                                    <select class="form-control show-tick ms select2" data-placeholder="Select">
                                        <option></option>
                                        <option>Andhra Pradesh</option>
                                        <option>Arunachal Pradesh</option>
                                        <option>Assam</option>
                                        <option>Bihar</option>
                                        <option>Chhattisgarh</option>
                                        <option>Goa</option>
                                        <option>Gujarat</option>
                                        <option>Haryana</option>
                                        <option>Himachal Pradesh</option>
                                        <option>Jharkhand</option>
                                        <option>Karnataka</option>
                                        <option>Kerala</option>
                                        <option>Madhya Pradesh</option>
                                        <option>Maharashtra</option>
                                        <option>Manipur</option>
                                        <option>Meghalaya</option>
                                        <option>Mizoram</option>
                                        <option>Nagaland</option>
                                        <option>Odisha</option>
                                        <option>Punjab</option>
                                        <option>Rajasthan</option>
                                        <option>Sikkim</option>
                                        <option>Tamil Nadu</option>
                                        <option>Telangana</option>
                                        <option>Tripura</option>
                                        <option>Uttar Pradesh</option>
                                        <option>Uttarakhand</option>
                                        <option>West Bengal</option>

                                    </select>

                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <p> <b>City</b> </p>

                                    <select class="form-control show-tick ms select2" data-placeholder="Select">
                                        <option></option>
                                        <option>Mumbai</option>
                                        <option>Delhi</option>
                                        <option>Bangalore</option>
                                        <option>Hyderabad</option>
                                        <option>Ahmedabad</option>
                                        <option>Chennai</option>
                                        <option>Kolkata</option>
                                        <option>Surat</option>
                                        <option>Pune</option>
                                    </select>

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
                                <div class="col-md-12">
                                    <p> <b>Store Name </b> </p>

                                    <select class="form-control show-tick ms select2" data-placeholder="Select">
                                        <option></option>
                                        <option>text</option>
                                        <option>text</option>
                                    </select>
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
                                <div class="col-md-12">
                                    <p> <b>Deal Name </b> </p>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Deal Name" />
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
                                    <p> <b>Help </b> </p>
                                    <textarea name="editor1"></textarea>
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
                                    <p> <b>Terms & Condtion </b> </p>
                                    <textarea name="editor2"></textarea>
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
                                <div class="col-md-12">
                                    <p> <b>Code Give </b> </p>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Code Give" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $(document).ready(function() {
            $('#user-form').validate({ // initialize the plugin
                rules: {
                    tc: {
                        required: true
                    }
                }
            });
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
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
