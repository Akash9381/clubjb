<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between d-flex rtl-flex-d-row-r">
        <!-- Logo Wrapper -->
        <div class="logo-wrapper"><a href="{{ url('user/home') }}"><img width="50px;"
                    src="{{ asset('users/img/logo.png') }}" alt="logo"></a>
        </div>
        <div class="navbar-logo-container d-flex align-items-center">
            <!-- Cart Icon -->
            <!--<div class="cart-icon-wrap"><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i><span>2</span></a></div>-->
            <!-- User Profile Icon -->
            <div class="container">
                <div class="search-city">
                    <form action="#" method="">
                        <select class="form-select" aria-label="Default select example">
                            <option value="none" >Select City</option>
                            @foreach (GetCity() as $city)
                                <option value="{{ $city['city'] }}" @if ($city['city'] == Auth::user()->city)
                                    selected
                                @endif>{{ $city['city'] }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <!-- Navbar Toggler -->
            <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                aria-controls="suhaOffcanvas">
                <div><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>
</div>
