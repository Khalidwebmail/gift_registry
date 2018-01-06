
<?php 
$userEmail = Session::get('user.user_email');

?>

<header class="header-area header-wrapper">
<!-- header-top-bar -->
<div class="header-top-bar plr-185">
<div class="container-fluid">
<div class="row">
<div class="col-sm-6 hidden-xs">
<div class="call-us">
<p class="mb-0 roboto">(+88) 01234-567890</p>
</div>
</div>
<div class="col-sm-6 col-xs-12">
<div class="top-link clearfix">
<ul class="link f-right">

<li>
    <a href="{{ url('/user-profile') }}">
        <i class="fa fa-smile-o" aria-hidden="true"></i>

        Hi, {{$userEmail}}
    </a>
</li>

<li>
    <a href="{{ url('/user-profile') }}">
        <i class="zmdi zmdi-account"></i>
        My Account
    </a>
</li>
<li>
    <a href="wishlist.html">
        <i class="zmdi zmdi-favorite"></i>
        Wish List (0)
    </a>
</li>
<li>
    <a href="{{ url('/signout') }}">
        <i class="zmdi zmdi-lock"></i>
        Sign-out
    </a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- header-middle-area -->
<div id="sticky-header" class="header-middle-area plr-185">
<div class="container-fluid">
<div class="full-width-mega-dropdown">
<div class="row">
<!-- logo -->
<div class="col-md-2 col-sm-6 col-xs-12">
<div class="logo">
<a href="index.html">
    <img src="{{asset('frontend/img/logo/logo.png')}}"alt="main logo">
</a>
</div>
</div>
<!-- primary-menu -->
<div class="col-md-8 hidden-sm hidden-xs">
<nav id="primary-menu">
<ul class="main-menu text-center">
    <li><a href="{{ url('/') }}">Home</a></li>
    
    
    
    <li><a href="blog.html">Explore</a>
        <ul class="dropdwn">
            <li>
                <a href="#">About My Gift</a>
            </li>
            <li>
                <a href="#">History</a>
            </li>
            <li><a href="{{ url('/user-signup-page') }}">User Signup </a></li>
            <li><a href="{{ url('/vendor-signup-page') }}">Vendor Signup </a></li>
            <li><a href="{{ url('/signin-page') }}">Sign In </a></li>
            
        </ul>
    </li>
    <li> <a href="#">Categories</a></li>
    <li> <a href="#">Gift Search</a></li>
    <!-- <li> <a href="#">User Search</a></li> -->
    <li><a href="{{ url('/search-user-wishlist') }}">Wishlist Search</a></li>
    <li><a href="#">Contact</a></li>
</ul>
</nav>
</div>
<!-- header-search & total-cart -->
<div class="col-md-2 col-sm-6 col-xs-12">
<div class="search-top-cart  f-right">
<!-- header-search -->
<div class="header-search header-search-2 f-left">
    <div class="header-search-inner">
       <button class="search-toggle">
        <i class="zmdi zmdi-search"></i>
       </button>
        <form action="#">
            <div class="top-search-box">
                <input type="text" placeholder="Search here your product...">
                <button type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </form> 
    </div>
</div>
<div class="header-account header-account-2 f-left">
    <ul class="user-meta">
        <li><a href="#"><i class="zmdi zmdi-view-headline"></i></a>
            <ul>
                <li><a href="{{ url('/user-profile') }}">My Account</a></li>
                <li><a href="#">Wish list</a></li>
                <li><a href="#">Checkout</a></li>
                <li><a href="#">Testimonial</a></li>
                <li><a href="#">Log in</a></li>        
            </ul>
        </li>
    </ul>
</div>
<!-- total-cart -->
<div class="total-cart total-cart-2 f-left">
    <div class="total-cart-in">
        <div class="cart-toggler">
            <a href="#">
                <span class="cart-quantity">02</span><br>
                <span class="cart-icon">
                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                </span>
            </a>                            
        </div>
        <ul>
            <li>
                <div class="top-cart-inner your-cart">
                    <h5 class="text-capitalize">Your Cart</h5>
                </div>
            </li>
            <li>
                <div class="total-cart-pro">
                    <!-- single-cart -->
                    <div class="single-cart clearfix">
                        <div class="cart-img f-left">
                            <a href="#">
                                <img src="{{asset('frontend/img/cart/1.jpg')}}" alt="Cart Product" />
                            </a>
                            <div class="del-icon">
                                <a href="#">
                                    <i class="zmdi zmdi-close"></i>
                                </a>
                            </div>
                        </div>
                        <div class="cart-info f-left">
                            <h6 class="text-capitalize">
                                <a href="#">Dummy Product Name</a>
                            </h6>
                            <p>
                                <span>Brand <strong>:</strong></span>Brand Name
                            </p>
                            <p>
                                <span>Model <strong>:</strong></span>Grand s2
                            </p>
                            <p>
                                <span>Color <strong>:</strong></span>Black, White
                            </p>
                        </div>
                    </div>
                    <!-- single-cart -->
                    <div class="single-cart clearfix">
                        <div class="cart-img f-left">
                            <a href="#">
                                <img src="{{asset('frontend/img/cart/1.jpg')}}" alt="Cart Product" />
                            </a>
                            <div class="del-icon">
                                <a href="#">
                                    <i class="zmdi zmdi-close"></i>
                                </a>
                            </div>
                        </div>
                        <div class="cart-info f-left">
                            <h6 class="text-capitalize">
                                <a href="#">Dummy Product Name</a>
                            </h6>
                            <p>
                                <span>Brand <strong>:</strong></span>Brand Name
                            </p>
                            <p>
                                <span>Model <strong>:</strong></span>Grand s2
                            </p>
                            <p>
                                <span>Color <strong>:</strong></span>Black, White
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="top-cart-inner subtotal">
                    <h4 class="text-uppercase g-font-2">
                        Total  =  
                        <span>$ 500.00</span>
                    </h4>
                </div>
            </li>
            <li>
                <div class="top-cart-inner view-cart">
                    <h4 class="text-uppercase">
                        <a href="#">View cart</a>
                    </h4>
                </div>
            </li>
            <li>
                <div class="top-cart-inner check-out">
                    <h4 class="text-uppercase">
                        <a href="#">Check out</a>
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>
<!-- END HEADER AREA -->



<!-- START MOBILE MENU AREA -->
<div class="mobile-menu-area hidden-lg hidden-md">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="mobile-menu">
<nav id="dropdown">
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="#">Explore</a>
    <ul>
         <li>
                <a href="#">About My Gift</a>
            </li>
            <li>
                <a href="#">History</a>
            </li>
    </ul>
</li>

<li> <a href="#">Categories</a></li>
    <li> <a href="#">Gift Search</a></li>
    <!-- <li> <a href="#">User Search</a></li> -->
    <li><a href="{{ url('/search-user-wishlist') }}">Wishlist Search</a></li>
    <li><a href="#">Contact</a></li>
</ul>
</nav>
</div>
</div>
</div>
</div>
</div>
<!-- END MOBILE MENU AREA -->
