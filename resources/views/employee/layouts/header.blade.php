 <!-- Top Bar -->
 <nav class="navbar p-l-5 p-r-5">
     <ul class="nav navbar-nav navbar-left">
         <li>
             <div class="navbar-header">
                 <a href="javascript:void(0);" class="bars"></a>
                 <a class="navbar-brand" href="{{url('employee/dashboard')}}"><span class="m-l-10">
                         <img width="80px" src="{{ asset('employee/light/assets/img/logo.png')}}"> </span></a>
             </div>
         </li>
         <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
         </li>

{{--
         <li class="hidden-sm-down">
             <div class="input-group">
                 <input type="text" class="form-control" placeholder="Search...">
                 <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
             </div>
         </li> --}}
         <li class="float-right">
             <a href="{{url('employee/logout')}}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>

         </li>
     </ul>
 </nav>
