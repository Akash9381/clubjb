<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Club JB">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#08a1dc">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Club JB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="img/icons/icon-72x72.png">
    <!-- Apple Touch Icon -->
   <!-- <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">-->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/brands.min.css">
    <link rel="stylesheet" href="css/solid.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Web App Manifest -->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>
    <!-- Preloader-->
    
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
        <!-- Back Button-->
        <div class="back-button me-2 me-2"><a href="profile.html"><i class="fa-solid fa-arrow-left-long"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Edit Profile</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
      <!-- Close button-->
      <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      <!-- Offcanvas body-->
      <div class="offcanvas-body">
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
          <div class="user-profile"><img src="img/icons/Person.ico" alt=""></div>
          <div class="user-info">
            <h5 class="user-name mb-1 text-white">Users Name</h5>
           <!-- <p class="available-balance text-white">Available points <span class="counter">499</span></p>-->
          </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
         <li><a href="profile.html">My Profile</a></li>
          <li><a href="my-services.html">My Services</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="#">Sign Out</a></li>
        </ul>
      </div>
    </div>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
              <div class="user-profile me-3"><img src="img/bg-img/9.jpg" alt="">
                <div class="change-user-thumb">
                  <form>
                    <input class="form-control-file" type="file">
                    <button><i class="fa-solid fa-pen"></i></button>
                  </form>
                </div>
              </div>
              <div class="user-info">
                <p class="mb-0 text-dark">@designing-world</p>
                <h5 class="mb-0">Suha Jannat</h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <form action="#" method="">
                <div class="mb-3">
                  <div class="title mb-2"><i class="fa-solid fa-at"></i><span>Username</span></div>
                  <input class="form-control" type="text" value="designing-world">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="fa-solid fa-user"></i><span>Full Name</span></div>
                  <input class="form-control" type="text" value="Suha Jannat" disabled>
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="fa-solid fa-phone"></i><span>Phone</span></div>
                  <input class="form-control" type="text" value="+880 000 111 222">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="fa-solid fa-envelope"></i><span>Email Address</span></div>
                  <input class="form-control" type="email" value="care@example.com">
                </div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="fa-solid fa-location-arrow"></i><span>Shipping Address</span></div>
                  <input class="form-control" type="text" value="28/C Green Road, BD">
                </div>
                <button class="btn btn-success w-100" type="submit">Save All Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="suha-footer-nav">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0 d-flex rtl-flex-d-row-r">
          <li><a href="home.html"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="my-services.html"><i class="fa-solid fa-bag-shopping"></i>My Services</a></li>
          <li><a href="#"><i class="fa-solid fa-heart"></i>My Reference</a></li>
          <li><a href="#"><i class="fa-solid fa-gear"></i>Settings</a></li>
          
        </ul>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/theme-switching.js"></script>
    <script src="js/no-internet.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
  </body>


</html>