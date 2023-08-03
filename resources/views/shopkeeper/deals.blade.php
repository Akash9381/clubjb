@extends('shopkeeper.layouts.shopkeeper_layouts')
@section('title', 'Deals')
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
                                <table id="table_id"
                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Deal Name</th>
                                            <th>Saving Upto</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($deals as $deal)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($deal->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $deal['shop_deal'] }}</td>
                                                <td>{{ $deal['saving_up_to'] }}</td>
                                                <td><label class="switch">
                                                        <input type="checkbox"
                                                            @if ($deal['status'] == '1') checked @endif
                                                            value="{{ $deal['id'] }}">
                                                        <span class="slider round"></span>
                                                    </label></td>
                                                <td>
                                                    <button class="btn btn-icon btn-neutral btn-icon-mini"><a title="edit"
                                                            href="{{ url('shopkeeper/deal/edit/' . $deal->id) }}"><i
                                                                class="zmdi zmdi-edit"></i></a></button>
                                                    {{-- <button class="btn btn-icon btn-neutral btn-icon-mini"><a title="trash"
                                                            href="{{ url('shopkeeper/deal-trash/' . $deal->id) }}" title="Delete"
                                                            onclick="return confirm('Are you sure to delete this Deal?');"><i
                                                                class="zmdi zmdi-delete"></i></a></button> --}}
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
    <script>
        $(document).ready(function() {
            var status = "0";
            var deal_id = "";
            $("input[type='checkbox']").change(function() {
                if ($(this).is(":checked")) {
                    deal_id = $(this).val();
                    status = "1";

                } else {
                    var deal_id = $(this).val();
                    status = "0";
                }
                $.ajax({
                    url: "/shopkeeper/deal_status",
                    type: "get",
                    dataType: 'json',
                    data: {
                        status: status,
                        deal_id: deal_id
                    },
                    success: function(result) {
                        alert('Status Updated Successfully');
                    }
                })

            });
        });
    </script>
@endsection
