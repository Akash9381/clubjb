<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">

    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">

                    <li>
                        <div class="user-info">
                            <div class="image">

                                <a href="#"><img src="{{asset('admin/light/assets/img/icon/Person.ico')}}" alt="admin"> &nbsp;
                                    <small class="admin">Admin</small></a>
                            </div>

                        </div>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><span>Employee</span></a>
                        <ul class="ml-menu">
                            <li><a href="{{url('admin/add-employee')}}">Add New</a></li>
                            <li><a href="{{url('admin/inactive-employee')}}">Inactive Table</a></li>
                            <li><a href="{{url('admin/active-employees')}}">Active Table</a></li>

                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><span>Customer</span></a>
                        <ul class="ml-menu">
                            <li><a href="#">Add New</a></li>
                            <li><a href="#">Inactive Table</a></li>
                            <li><a href="#">Active Table</a></li>

                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><span>Shopkeeper</span></a>
                        <ul class="ml-menu">
                            <li><a href="#">Add New</a></li>
                            <li><a href="#">Inactive Table</a></li>
                            <li><a href="#">Active Table</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</aside>
