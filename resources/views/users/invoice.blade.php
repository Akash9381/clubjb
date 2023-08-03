@extends('users.layouts.user_layouts')
@section('title','Invoice')
@section('deal','Invoice')
@section('content')
    @include('users.layouts.dealheader')
    @include('users.layouts.sidebar')
    <div class="page-content-wrapper">
        <div class="weekly-best-seller-area py-3 mt-2">
            <div class="container">
                <div class="container">

                    <div class="billing-information-card mb-3">
                        <div class="card billing-information-title-card bg-danger">
                            <div class="card-body">
                                <h6 class="text-center mb-0 text-white">Users Details</h6>
                            </div>
                        </div>
                        <div class="card user-data-card">
                            <div class="card-body">

                                <div class="container ">
                                    <div class="row">
                                        <div class="col">
                                            <h6> Customer Name </h6>
                                            <p>{{Auth::user()->name}}</p>
                                        </div>
                                        <div class="col">
                                            <h6> Mobile </h6>
                                            <p>{{Auth::user()->phone}}</p>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <h6>Cust ID</h6>
                                            <p>{{Auth::user()->customer_id}}</p>
                                        </div>
                                        <div class="col">
                                            <h6>Email</h6>
                                            <p>{{Auth::user()->email ?? 'NA'}}</p>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h6> Cust Type</h6>
                                            <p>text</p>
                                        </div>
                                        <div class="col">
                                            <h6> Cust Status</h6>
                                            <p>text</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col">
                                            <h6> Mem Type</h6>
                                            <p>text</p>
                                        </div>
                                        <div class="col">
                                            <h6> Mem Payment</h6>
                                            <p>text</p>
                                        </div>
                                    </div>

                                </div>

                                <!-- Edit Address-->
                            </div>
                        </div>
                    </div>


                    <div class="billing-information-card mb-3">
                        <div class="card billing-information-title-card bg-danger">
                            <div class="card-body">
                                <h6 class="text-center mb-0 text-white">Deals Details</h6>
                            </div>
                        </div>
                        <div class="card user-data-card">
                            <div class="card-body">

                                <div class="container ">
                                    <div class="row">
                                        <div class="col">
                                            <h6> Store Type </h6>
                                            <p>text123</p>
                                        </div>
                                        <div class="col">
                                            <h6> Store Name </h6>
                                            <p>{{$deal['Shop']['name']}}</p>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <h6>Deal Name</h6>
                                            <p>{{$deal['GetDeal']['shop_deal']}}</p>
                                        </div>


                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h6>Code Given</h6>
                                            <p>text</p>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h6> Help</h6>
                                            <p>Buy 1 tub Popcron & Get 2 Cold drink</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col">
                                            <h6> Terms& Condtion</h6>
                                            <p>Buy 1 tub Popcron & Get 2 Cold drink</p>
                                        </div>
                                    </div>








                                </div>

                                <!-- Edit Address-->
                            </div>
                        </div>
                    </div>


                    <div class="billing-information-card mb-3">
                        <div class="card billing-information-title-card bg-danger">
                            <div class="card-body">
                                <h6 class="text-center mb-0 text-white">Invoice</h6>
                            </div>
                        </div>
                        <div class="card user-data-card">
                            <div class="card-body">

                                <div class="container ">
                                    <div class="row">
                                        <div class="col">
                                            <h6> Transaction I'd</h6>
                                            <p>#123456</p>
                                        </div>
                                        <div class="col">
                                            <h6> Order I'd</h6>
                                            <p>3852</p>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <h6> City</h6>
                                            <p>chandigarh</p>
                                        </div>
                                        <div class="col">
                                            <h6> State</h6>
                                            <p>chandigarh</p>
                                        </div>

                                    </div>




                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <h6> Gross Amount</h6>
                                            <p>Rs 456/-</p>
                                        </div>
                                        <div class="col">
                                            <h6> Saving upto</h6>
                                            <p>Rs 456/-</p>
                                        </div>

                                        <div class="col">
                                            <h6> Handling Fees</h6>
                                            <p>Rs 456/-</p>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h6> Mem Fee</h6>
                                                <p>Rs 456/-</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h6> Amount Paid</h6>
                                                <p>Rs 456/-</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h6> Payment Mood</h6>
                                                <p>Rs 456/-</p>
                                            </div>
                                            <div class="col">
                                                <h6> Ref.No</h6>
                                                <p>Rs 456/-</p>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h6> Payment Ref</h6>
                                                <p>text...</p>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col">
                                                <h6> Pay Image/Screenshot</h6>
                                                <img width="50Px" src="img/icons/fav.jpg">
                                            </div>
                                        </div>



                                        <!--<div class="col">
                                   <h6> Type</h6>
                                   <p>Cupon</p>
                                  </div>-->

                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col">
                                            <h6> Purchase Date</h6>
                                            <p>02-06-2023</p>
                                        </div>
                                        <div class="col">
                                            <h6> Purchase Time</h6>
                                            <p>4:47pm</p>
                                        </div>

                                    </div>




                                </div>

                                <!-- Edit Address-->
                            </div>
                        </div>
                    </div>

                    <!--Deal Details-->

                </div>
            </div>
        </div>
    </div>
    @endsection
