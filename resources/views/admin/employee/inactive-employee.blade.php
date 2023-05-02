@extends('admin.layouts.admin_layouts')


@section('content')

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Inactive Table
                <small>Welcome to Club Jb</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Inactive Table</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                       <th>S.no</th>
                                       <th>Date</th>
                                       <th>Emp Id</th>
                                        <th>Name</th>
                                        <th>Number</th>

                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                       <td>1</td>
                                       <td>20-04-2023</td>
                                       <td>E xxxxxx</td>
                                        <td>Lorem Ipsum is simply</td>
                                        <td>1234567890</td>

                                        <td>
                                       <select class="form-control show-tick ms select2" data-placeholder="Select">
									   <option>Active</option>
									   <option> In Active</option>
                                       </select>
                                        </td>

                                        <td>
                                        <button class="btn btn-icon btn-neutral btn-icon-mini"><a href="{{url('admin/employee-profile')}}"><i class="zmdi zmdi-eye"></i></a></button>
                                        <button class="btn btn-icon btn-neutral btn-icon-mini"><i class="zmdi zmdi-edit"></i></button>
                                        <button class="btn btn-icon btn-neutral btn-icon-mini"><i class="zmdi zmdi-check-all"></i></button>
                                        <button class="btn btn-icon btn-neutral btn-icon-mini"><i class="zmdi zmdi-delete"></i></button>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->

        <!-- #END# Exportable Table -->
    </div>
</section>

@endsection

@section('js')

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('admin/light/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

{{-- <script src="{{asset('admin/light/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{asset('admin/light/assets/js/pages/tables/jquery-datatable.js')}}"></script> --}}
@endsection
