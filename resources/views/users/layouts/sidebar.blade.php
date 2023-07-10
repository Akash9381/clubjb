<div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas"
        aria-labelledby="suhaOffcanvasLabel">
        <!-- Close button-->
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        <!-- Offcanvas body-->
        <div class="offcanvas-body">
            <!-- Sidenav Profile-->
            <div class="sidenav-profile">
                <div class="user-profile"><img src="{{ asset('users/img/icons/Person.ico')}}" alt="icon"></div>
                <div class="user-info">
                    <h5 class="user-name mb-1 text-white">{{Auth::user()->name}}</h5>
                    <!-- <p class="available-balance text-white">Available points <span class="counter">499</span></p>-->
                </div>
            </div>
            <!-- Sidenav Nav-->
            <ul class="sidenav-nav ps-0">
                <li><a href="{{url('user/profile')}}">My Profile</a></li>
                <li><a href="my-services.html">My Services</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="{{url('user/logout')}}">Sign Out</a></li>
            </ul>
        </div>
    </div>
