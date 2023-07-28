@extends('admin.layouts.admin_layouts')
@section('title', 'Update Local Shop Deal')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Update Deal
                        <small>Welcome to Club Jb</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('shopkeeper/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">update deal</a></li>

                    </ul>
                </div>
            </div>
        </div>
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
        <form id="user-form" method="POST" action="{{ url('admin/update-shop-deal/' . $deal['id']) }}">
            @csrf
            <div class="container-fluid">
                <!-- Color Pickers -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-12">
                                        <p> <b>Deal</b> </p>
                                        <div class="form-group">
                                            <input type="text" required value="{{ $deal['shop_deal'] }}"
                                                class="form-control" required name="shop_deal" placeholder="Deal Name" />
                                                @error('shop_deal')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <p> <b>Saving Upto</b></p>
                                        <div class="form-group">
                                            <input type="text" required value="{{ $deal['saving_up_to'] }}"
                                                name="saving_up_to" required class="form-control"
                                                placeholder="Saving Upto" />
                                                @error('saving_up_to')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round"> Update Deal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#user-form').validate({ // initialize the plugin
                rules: {
                    shop_deal: {
                        required: true
                    },
                    saving_up_to: {
                        required: true
                    }
                }
            });
        });
    </script>
@endsection
