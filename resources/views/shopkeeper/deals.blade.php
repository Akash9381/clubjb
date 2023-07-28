@extends('shopkeeper.layouts.shopkeeper_layouts')
@section('title', 'Deals')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Deals
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('shopkeeper/dashboard') }}"><i
                                    class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">All Deals</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
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
                                            <th>Deal Name</th>
                                            <th>Saving Upto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($deals as $deal)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($deal->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $deal['shop_deal'] }}</td>
                                                <td>{{ $deal['saving_up_to'] }}</td>
                                                <td>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="{{ url('shopkeeper/deal/edit/' . $deal->id) }}"><i
                                                                class="zmdi zmdi-edit"></i></a></button>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="{{ url('deal/delete/' . $deal->id) }}" title="Delete"
                                                            onclick="return confirm('Are you sure to delete this Deal?');"><i
                                                                class="zmdi zmdi-delete"></i></a></button>
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
