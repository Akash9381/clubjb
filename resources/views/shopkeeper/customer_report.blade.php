@extends('shopkeeper.layouts.shopkeeper_layouts')
@section('title', 'Customer Report')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Customers Reports
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('shopkeeper/dashboard') }}"><i
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
                                <table id="table_id"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Customer Number</th>
                                            <th>Customer Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $customer['customer_id'] }}</td>
                                                <td>{{ $customer['customer_name'] }}</td>
                                                <td>{{ $customer['customer_number'] }}</td>
                                                <td>{{ $customer['payment_status'] }}</td>
                                                <td>
                                                    @if ($customer['status'] == '1')
                                                        Verified
                                                    @else
                                                        Pending
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="#"><i class="zmdi zmdi-eye"></i></a></button>
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
    <script>
        $(function() {
            $("#table_id").dataTable();
        });
    </script>
@endsection
