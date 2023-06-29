@extends('admin.layouts.admin_layouts')

@section('css')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Active Table
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Active Table</a></li>

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
                                        @forelse ($customers as $customer)
                                            <tr>
                                                <td>1</td>
                                                <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $customer['customer_id'] }}</td>
                                                <td>{{ $customer['customer_name'] }}</td>
                                                <td>{{ $customer['customer_number'] }}</td>

                                                <td>
                                                    <label class="switch">
                                                        <input type="checkbox" @if ($customer['status'] == '1')
                                                        checked
                                                        @endif  value="{{ $customer['customer_id'] }}">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="{{ url('admin/customer-profile/' . $customer->customer_id) }}"><i
                                                                class="zmdi zmdi-eye"></i></a></button>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><i
                                                            class="zmdi zmdi-edit"></i></button>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><i
                                                            class="zmdi zmdi-delete"></i></button>
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

    {{-- <script src="{{asset('admin/light/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{asset('admin/light/assets/js/pages/tables/jquery-datatable.js')}}"></script> --}}
    <script>
        $(document).ready(function() {
            var status = "0";
            var customer_id = "";
            $("input[type='checkbox']").change(function() {
                if ($(this).is(":checked")) {
                    customer_id = $(this).val();
                    status = "1";

                } else {
                    var customer_id = $(this).val();
                    status = "0";
                }
                $.ajax({
                    url: "/admin/customer_status",
                    type: "get",
                    dataType: 'json',
                    data: {
                        status: status,
                        customer_id: customer_id
                    },
                    success: function(result) {
                        alert('Status Update Successfully');
                    }
                })

            });
        });
    </script>
@endsection
