 <!-- Left Sidebar -->
 <aside id="leftsidebar" class="sidebar">

     <div class="tab-content">
         <div class="tab-pane stretchRight active" id="dashboard">
             <div class="menu">
                 <ul class="list">

                     <li>
                         <div class="user-info">
                             <div class="image">

                                 <a href="{{ url('shopkeeper/profile') }}" title="profile"><img
                                         src="{{ asset('employee/light/assets/img/icon/Person.ico') }}" alt="admin">
                                     &nbsp;
                                     <small class="admin">{{ Auth::user()->name }}</small></a>
                             </div>

                         </div>
                     </li>

                     <li class="header">MENU</li>

                     <li class="{{ setActiveClass('shopkeeper/dashboard') }}"><a href="{{ url('shopkeeper/dashboard') }}" class="toggled waves-effect waves-block"><i
                                 class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>


                     <li class="{{ setActiveClass('shopkeeper/customer-report') }}"><a href="{{ url('shopkeeper/customer-report') }}" class=" waves-effect waves-block"><i
                                 class="zmdi zmdi-eye"></i><span>
                                 Customer Report</span></a>
                     </li>

                     <li class="{{ setActiveClass('shopkeeper/shopkeeper-reports') }}"><a href="{{ url('shopkeeper/shopkeeper-reports') }}" class=" waves-effect waves-block"><i
                                 class="zmdi zmdi-eye"></i><span>
                                 Shopkeeper Report</span></a>
                     <li class="{{ setActiveClass('shopkeeper/deals') }}"><a href="{{ url('shopkeeper/deals') }}" class=" waves-effect waves-block"><i
                                 class="zmdi zmdi-eye"></i><span>
                                 Deals</span></a>
                     </li>
                     <li class="{{ setActiveClass('shopkeeper/given-deals') }}"><a href="{{ url('shopkeeper/given-deals') }}" class=" waves-effect waves-block"><i
                                 class="zmdi zmdi-eye"></i><span>
                                 Given Deals</span></a>
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
