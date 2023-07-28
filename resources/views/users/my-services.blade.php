@extends('users.layouts.user_layouts')
@section('content')
    @include('users.layouts.dealheader')
    @include('users.layouts.sidebar')
    <div class="page-content-wrapper">
        <div class="weekly-best-seller-area py-3 mt-2">
            <div class="container">

                <div class="container">



                    <table class="table table-success table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Trans I'd</th>
                                <th scope="col">Store</th>
                                <th scope="col">Date & Time </th>
                                <th scope="col">View </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>#123456</td>
                                <td>Text</td>
                                <td>02-06-2023</td>
                                <td> <a class="text-dark" href="invoice.html"><i
                                            class="fa-sharp fa-solid fa-eye"></i></a></td>
                            </tr>

                            <tr>

                                <td>#123456</td>
                                <td>Text</td>
                                <td>02-06-2023</td>
                                <td> <a class="text-dark" href="invoice.html"><i
                                            class="fa-sharp fa-solid fa-eye"></i></a></td>
                            </tr>

                            <tr>

                                <td>#123456</td>
                                <td>Text</td>
                                <td>02-06-2023</td>
                                <td> <a class="text-dark" href="invoice.html"><i
                                            class="fa-sharp fa-solid fa-eye"></i></a></td>
                            </tr>

                            <tr>

                                <td>#123456</td>
                                <td>Text</td>
                                <td>02-06-2023</td>
                                <td> <a class="text-dark" href="invoice.html"><i
                                            class="fa-sharp fa-solid fa-eye"></i></a></td>
                            </tr>


                        </tbody>
                    </table>


                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>


                </div>
            </div>
        </div>


        <!-- lochal store-->





    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>


@endsection
