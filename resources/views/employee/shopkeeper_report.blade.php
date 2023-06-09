@extends('employee.layouts.employe_layouts')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Shopkeeper Reports
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('employee/dashboard') }}"><i
                                    class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Shop Reports</a></li>

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
                                            <th>Date</th>
                                            <th>Shop ID</th>
                                            <th>Shop Name</th>
                                            <th>Number</th>

                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($shops as $shop)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($shop->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $shop['shop_id'] }}</td>
                                                <td>{{ $shop['shop_name'] }}</td>
                                                <td>{{ $shop['shop_number'] }}</td>
                                                <td>
                                                    @if ($shop['status'] == '1')
                                                        Verified
                                                    @else
                                                        Pending
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="{{ url('employee/shop-profile/' . $shop->shop_id) }}"><i
                                                                class="zmdi zmdi-eye"></i></a></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th class="text-center" colspan="7">No Data Available</th>
                                            </tr>
                                        @endforelse

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
    <script src="{{ asset('admin/light/assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>

@endsection
