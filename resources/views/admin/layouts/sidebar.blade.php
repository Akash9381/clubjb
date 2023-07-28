<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">

    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">

                    <li>
                        <div class="user-info">
                            <div class="image">

                                <a href="{{url('admin/dashboard')}}"><img src="{{ asset('admin/light/assets/img/icon/Person.ico') }}"
                                        alt="admin"> &nbsp;
                                    <small class="admin">Admin</small></a>
                            </div>

                        </div>
                    </li>
                    <li class="{{ setActiveClass('admin/dashboard') }}">
                        <a href="{{ url('admin/dashboard') }}"><span>Dashboard</span></a>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/add-employee') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/inactive-employee') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/active-employee') !== false) class="active" @endif><a href="javascript:void(0);"
                            class="menu-toggle"><span>Employee</span></a>
                        <ul class="ml-menu">
                            <li class="{{ setActiveClass('admin/add-employee') }}"><a
                                    href="{{ url('admin/add-employee') }}">Add New</a></li>
                            <li class="{{ setActiveClass('admin/inactive-employee') }}"><a
                                    href="{{ url('admin/inactive-employee') }}">Inactive Table @if (InactiveEmployee() > 0)
                                        <span class="circle">{{ InactiveEmployee() }}</span>
                                    @endif
                                </a></li>
                            <li class="{{ setActiveClass('admin/active-employee') }}"><a
                                    href="{{ url('admin/active-employees') }}">Active Table @if (ActiveEmployee() > 0)
                                        <span class="circle">{{ ActiveEmployee() }}</span>
                                    @endif
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/add-customer') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'inactive-customers') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/active-customers') !== false) class="active" @endif><a href="javascript:void(0);"
                            class="menu-toggle"><span>Customer</span></a>
                        <ul class="ml-menu">
                            <li class="{{ setActiveClass('admin/add-customer') }}"><a
                                    href="{{ url('admin/add-customer') }}">Add New</a></li>
                            <li class="{{ setActiveClass('admin/inactive-customers') }}"><a
                                    href="{{ url('admin/inactive-customers') }}">Inactive Table @if (InactiveCustomer() > 0)
                                        <span class="circle">{{ InactiveCustomer() }}</span>
                                    @endif </a></li>
                            <li class="{{ setActiveClass('admin/active-customers') }}"><a
                                    href="{{ url('admin/active-customers') }}">Active Table </a></li>

                        </ul>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/local-shop-form') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/active-local-shops') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/inactive-local-shops') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/global-shop-form') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/inactive-global-shops') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/active-global-shops') !== false) class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle"><span>Shopkeeper</span></a>
                        <ul class="ml-menu">
                            <li><b>Local</b></li>
                            <li class="{{ setActiveClass('admin/local-shop-form') }}"><a
                                    href="{{ url('admin/local-shop-form') }}">Add Local Shop</a></li>
                            <li class="{{ setActiveClass('admin/active-local-shops') }}"><a
                                    href="{{ url('admin/active-local-shops') }}">Active Local Shop </a></li>
                            <li class="{{ setActiveClass('admin/inactive-local-shops') }}"><a
                                    href="{{ url('admin/inactive-local-shops') }}">Inactive Local Shop @if (InactiveLocalShop() > 0)
                                        <span class="circle">{{ InactiveLocalShop() }}</span>
                                    @endif
                                </a>
                            </li>

                            <li><b>Global</b></li>

                            <li class="{{ setActiveClass('admin/global-shop-form') }}"><a
                                    href="{{ url('admin/global-shop-form') }}">Add Global Shop</a></li>
                            <li class="{{ setActiveClass('admin/active-global-shops') }}"><a
                                    href="{{ url('admin/active-global-shops') }}">Active Global Shop</a></li>
                            <li class="{{ setActiveClass('admin/inactive-global-shops') }}"><a
                                    href="{{ url('admin/inactive-global-shops') }}">Inactive Global Shop @if (InactiveGlobalShop() > 0)
                                        <span class="circle">{{ InactiveGlobalShop() }}</span>
                                    @endif
                                </a></li>

                        </ul>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/add-banner') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/banners-list') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/add-global-banner') !== false) class="active" @endif
                        @if (strpos(Request::url(), 'admin/global-banners-list') !== false) class="active" @endif><a href="javascript:void(0);"
                            class="menu-toggle"><span>Banner</span></a>
                        <ul class="ml-menu">
                            <li><b>Global</b></li>
                            <li class="{{ setActiveClass('admin/add-global-banner') }}"><a
                                    href="{{ url('admin/add-global-banner') }}">Add New</a></li>
                            <li class="{{ setActiveClass('admin/global-banners-list') }}"><a
                                    href="{{ url('admin/global-banners-list') }}">Banner List</a></li>
                            <li><b>Local</b></li>
                            <li class="{{ setActiveClass('admin/add-banner') }}"><a
                                    href="{{ url('admin/add-banner') }}">Add New</a></li>
                            <li class="{{ setActiveClass('admin/banners-list') }}"><a
                                    href="{{ url('admin/banners-list') }}">Banner List</a></li>

                        </ul>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/local-shop-help') !== false) class="active" @endif>
                        <a href="{{url('admin/local-shop-help')}}"><span>Local Shop Help</span></a>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/local-shop-terms-conditions') !== false) class="active" @endif>
                        <a href="{{url('admin/local-shop-terms-conditions')}}"><span>Local Shop T & C</span></a>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/global-shop-help') !== false) class="active" @endif>
                        <a href="{{url('admin/global-shop-help')}}"><span>Global Shop Help</span></a>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/global-shop-terms-conditions') !== false) class="active" @endif>
                        <a href="{{url('admin/global-shop-terms-conditions')}}"><span>Global Shop T & C</span></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</aside>
