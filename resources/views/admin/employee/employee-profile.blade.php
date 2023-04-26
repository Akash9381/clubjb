@extends('admin.layouts.admin_layouts')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>profile
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
                                <div class="col-lg-6 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">State </h6>
                                    <span class="job_post">text</span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <h6 class="mt-2 m-b-0">City </h6>
                                    <span class="job_post">text</span>
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
                                    <span class="job_post">text</span>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Add date </h6>
                                    <span class="job_post">text</span>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Active date </h6>
                                    <span class="job_post">text</span>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Emp id </h6>
                                    <span class="job_post">text</span>
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
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Employee type </h6>
                                    <span class="job_post">text</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Employee Name </h6>
                                    <span class="job_post">text</span>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h6 class="mt-2 m-b-0">Employee Number </h6>
                                    <span class="job_post">text</span>
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


                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Login Pin </h6>
                                    <span class="job_post">text</span>

                                </div>


                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0">Ref mobile number </h6>
                                    <span class="job_post">text</span>

                                </div>


                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0"> Documents </h6>
                                    <img src="../assets/images/documents.jpg" alt=""
                                        class="img-fluid img-thumbnail m-t-30" width="150">
                                    <a href="#" title="Download"> <i class="material-icons">move_to_inbox</i></a>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h6 class="mt-2 m-b-0"> Agreement </h6>
                                    <img src="../assets/images/documents.jpg" alt=""
                                        class="img-fluid img-thumbnail m-t-30" width="150">
                                    <a href="#" title="Download"> <i class="material-icons">move_to_inbox</i></a>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round"> Edit </button>
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
