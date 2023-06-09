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

                    <li class="active"><a href="javascript:void(0);" class="menu-toggle"><span>Employee</span></a>
                        <ul class="ml-menu">
                            <li class="{{setActiveClass('admin/add-employee')}}"><a href="{{url('admin/add-employee')}}">Add New</a></li>
                            <li class="{{setActiveClass('admin/inactive-employee')}}"><a href="{{url('admin/inactive-employee')}}">Inactive Table</a></li>
                            <li class="{{setActiveClass('admin/active-employee')}}"><a href="{{url('admin/active-employees')}}">Active Table</a></li>

                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><span>Customer</span></a>
                        <ul class="ml-menu">
                            <li><a href="{{url('admin/add-customer')}}">Add New</a></li>
                            <li><a href="{{url('admin/inactive-customers')}}">Inactive Table</a></li>
                            <li><a href="{{url('admin/active-customers')}}">Active Table</a></li>

                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><span>Shopkeeper</span></a>
                        <ul class="ml-menu">
                            <li><a href="{{url('admin/local-shop-form')}}">Add Local Shop</a></li>
                            <li><a href="{{url('admin/global-shop-form')}}">Add Global Shop</a></li>
                            <li><a href="#">Active Global Shop</a></li>
                            <li><a href="#">Inactive Global Shop</a></li>
                            <li><a href="{{url('admin/active-local-shops')}}">Active Local Shop</a></li>
                            <li><a href="{{url('admin/inactive-local-shops')}}">Inactive Local Shop</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</aside>
