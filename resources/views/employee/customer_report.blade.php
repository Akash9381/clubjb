@extends('employee.layouts.employe_layouts')

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
                                <table id="table_id" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Customer Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($customers as $customer)
                                        @if (str_contains($customer['customer_id'], 'C-') == true)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $customer['customer_id'] }}</td>
                                                <td>{{ $customer['name'] }}</td>
                                                <td>{{ preg_replace('~[+\d-](?=[\d-]{4})~', '*', $customer['phone'])}}</td>
                                                <td>
                                                    @if ($customer['status'] == '1')
                                                        Verified
                                                    @else
                                                        Pending
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                        href="{{ url('employee/customer-profile/' . $customer->id) }}"><i
                                                            class="zmdi zmdi-eye"></i></a></button>
                                                </td>
                                            </tr>
                                            @endif
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
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('admin/assets/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    <script>
        $(function() {
            $("#table_id").dataTable();
        });
    </script>
@endsection
