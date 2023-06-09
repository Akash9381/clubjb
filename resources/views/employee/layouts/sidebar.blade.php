 <!-- Left Sidebar -->
 <aside id="leftsidebar" class="sidebar">

    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">

                    <li>
                        <div class="user-info">
                            <div class="image">

                                <a href="#"><img src="{{ asset('employee/light/assets/img/icon/Person.ico')}}" alt="admin"> &nbsp;
                                    <small class="admin">{{ Auth::user()->name }}</small></a>
                            </div>

                        </div>
                    </li>

                    <li class="header">MENU</li>

                    <li><a href="{{url('employee/dashboard')}}" class="toggled waves-effect waves-block"><i
                                class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>


                    <li><a href="{{url('employee/customer-report')}}" class=" waves-effect waves-block"><i class="zmdi zmdi-eye"></i><span>
                                Customer Report</span></a>
                    </li>

                    <li><a href="{{url('employee/shopkeeper-reports')}}" class=" waves-effect waves-block"><i class="zmdi zmdi-eye"></i><span>
                                Shopkeeper Report</span></a>
                    </li>
                    shop_type
                    {{-- <li><a href="employee.html" class=" waves-effect waves-block"><i
                                class="zmdi zmdi-eye"></i><span> Employee Report</span></a>
                    </li> --}}

                    <li><a href="#" class=" waves-effect waves-block"><i class="zmdi zmdi-eye"></i><span> Link
                                Report</span></a>
                    </li>



                </ul>
            </div>
        </div>

    </div>
</aside>
