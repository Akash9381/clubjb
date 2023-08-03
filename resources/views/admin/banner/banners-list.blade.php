@extends('admin.layouts.admin_layouts')
@section('title', 'Local Bannner List')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Banners Table
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Banner Table</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
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
                                            <th>Shop Id</th>
                                            <th>Shop Name</th>
                                            <th>Banner Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($banner->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $banner['GetShop']['customer_id'] }}</td>
                                                <td>{{ $banner['GetSHop']['name'] }}</td>
                                                <td>{{ $banner['banner_name'] }}</td>
                                                <td>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="{{ url('admin/banner-view/' . $banner->id) }}"><i
                                                                class="zmdi zmdi-eye"></i></a></button>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini">
                                                        <a href="{{ url('admin/update-banner/' . $banner['id']) }}"><i
                                                                class="zmdi zmdi-edit"></i></a></button>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a
                                                            href="{{ url('admin/banner/delete/' . $banner->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete this banner?');"
                                                            title="delete banner"><i
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
    <script>
        $(function() {
            $("#table_id").dataTable();
        });
    </script>
@endsection
