
@extends('admin.layouts.admin_layouts')



    <!-- Right Sidebar -->


    <!-- Chat-launcher -->

@section('content')

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add employee
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Employee </a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Color Pickers -->

            <!-- #END# Color Pickers -->
            <!-- Masked Input -->

            <!-- #END# Masked Input -->
            <!-- Multi Select -->

            <!-- #END# Multi Select -->



            <!-- Advanced Select2 -->
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
            <!-- #END# Select2 -->


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-lg-2 col-md-6">
                                    <p> <b>S.no</b> </p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="S.no" />
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <p> <b>Add date</b> </p>
                                    <div class="form-group">
                                        <input type="date" class="form-control" placeholder="Add date" />
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-6">
                                    <p> <b>Active date</b> </p>
                                    <div class="form-group">
                                        <input type="date" class="form-control" placeholder="Active date" />
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <p> <b>Emp id</b> </p>
                                    <div class="form-group">

                                        <form>
                                            <h5 class="pin-title">E</h5>
                                            <input class="pin" type="text" maxlength="1" />
                                            <input class="pin" type="text" maxlength="1" />
                                            <input class="pin" type="text" maxlength="1" />
                                            <input class="pin" type="text" maxlength="1" />
                                            <input class="pin" type="text" maxlength="1" />
                                            <input class="pin" type="text" maxlength="1" />
                                        </form>


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



                                <div class="col-lg-4 col-md-6">
                                    <p> <b>Employee type</b> </p>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select">
                                        <option>Full Time </option>
                                        <option>Part Time</option>
                                        <option>Student</option>

                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <p> <b>Employee Name</b> </p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="employee Name" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <p> <b>Empl Number</b> (<small>Login Number</small> )</p>
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








            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-lg-2 col-md-6">
                                    <p> <b>Login Pin</b> </p>
                                    <form>

                                        <input class="pin" type="text" maxlength="1" />
                                        <input class="pin" type="text" maxlength="1" />
                                        <input class="pin" type="text" maxlength="1" />
                                        <input class="pin" type="text" maxlength="1" />

                                    </form>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <p> <b>Ref mobile number</b> </p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Ref mobile number" />
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-6">
                                    <p> <b>Upload documents</b> </p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" placeholder="Upload documents" />
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <p> <b>Upload agreement</b> </p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" placeholder="Upload agreement" />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round"> Add Employee</button>

                                </div>
                                <div style="visibility: hidden;" id="nouislider_basic_example"></div>

                                <div style="visibility: hidden;" id="nouislider_range_example"></div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div>
    </section>

@endsection

@section('js')


@endsection
