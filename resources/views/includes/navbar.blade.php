
<div class="header-area header-sticky">
    <!--====================  Navigation top ====================-->

    <div class="navigation-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--====================  navigation section ====================-->

                    <div class="navigation-top-topbar pt-10 pb-10">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-6 text-center text-md-start">
                                <!--=======  header top social links  =======-->

                                <div class="header-top-social-links">
                                    <span class="follow-text mr-15">Follow Us:</span>
                                    <!--=======  social link small  =======-->

                                    <ul class="social-link-small">
                                        <li><a href="http://www.facebook.com/"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li><a href="http://www.twitter.com/"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="http://plus.google.com/"><i
                                                    class="ion-social-googleplus-outline"></i></a></li>
                                        <li><a href="http://www.instagram.com/"><i
                                                    class="ion-social-instagram-outline"></i></a></li>
                                        <li><a href="http://www.youtube.com/"><i class="ion-social-youtube"></i></a></li>
                                    </ul>

                                    <!--=======  End of social link small  =======-->
                                </div>


                                <!--=======  End of header top social links  =======-->
                            </div>
                            <div class="col-lg-4 offset-lg-4 col-md-6">
                                <!--=======  header top dropdown container  =======-->

                                <div
                                    class="headertop-dropdown-container justify-content-center justify-content-md-end">
                                    <div class="header-top-single-dropdown">
                                        <a href="javascript:void(0)" class="active-dropdown-trigger"
                                            id="user-options">My Account <i class="ion-ios-arrow-down"></i></a>

                                        <div
                                            class="header-top-single-dropdown__dropdown-menu-items deactive-dropdown-menu extra-small-mobile-fix">
                                            <ul>
                                                @auth
                                                <li><a href="{{ url("/my-account") }}">My Account</a></li>

                                                @if(auth()->user()->role == 'admin')
                                                    <li><a href="{{ url("/admin") }}">Admin Page</a></li>
                                                @endif

                                                <li>
                                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            @else
                                                <li><a href="{{ url("/my-account") }}">My Account</a></li>
                                                <li><a href="{{ url("/login") }}">Login</a></li>
                                            @endauth

                                            </ul>

                                        </div>

                                        <!--=======  End of dropdown menu items  =======-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">


                    <div class="navigation-top-search-area pt-25 pb-25">
                        <div class="row align-items-center">
                            <div class="col-6 col-xl-2 col-lg-3 order-1 col-md-6 col-sm-5">
                                <!--=======  logo  =======-->

                                <div class="logo">
                                    <a href="{{url("/")}}">
                                        <img width="250" height="60" src="assets/img/logo-white.svg" class="" alt="">
                                    </a>
                                </div>

                                <!--=======  End of logo  =======-->
                            </div>

                            <div class="col-xl-5 offset-xl-1 col-lg-4 order-4 order-lg-2 mt-md-25 mt-sm-25">
                                <!--=======  search bar  =======-->

                                <div class="search-bar">
                                    <form action="#">
                                        <input type="search" placeholder="Search entire store here ...">
                                        <button type="submit"> <i class="icon-search"></i></button>
                                    </form>
                                </div>

                                <!--=======  End of search bar  =======-->
                            </div>

                            <div
                                class="col-xl-3 col-lg-3 order-3 order-sm-2 order-lg-3 order-xs-3 col-md-4 col-sm-5 text-center text-sm-start mt-xs-25">
                                <!--=======  customer support text  =======-->

                                <div class="customer-support-text">
                                    <div class="icon">
                                        <img width="39" height="35" src="assets/img/icons/icon-header-phone.webp" class="img-fluid" alt="">
                                    </div>

                                    <div class="text">
                                        <span>Customer Support</span>
                                        <p>+91 90825 32455</p>
                                    </div>
                                </div>

                                <!--=======  End of customer support text  =======-->
                            </div>

                            <div
                                class="col-6 col-xl-1 col-lg-2 text-end order-2 order-sm-3 order-lg-4 order-xs-2 col-md-2 col-sm-2">
                                <!--=======  cart icon  =======-->

                                <div class="header-cart-icon">
                                    <a href="{{ url('/cart') }}" id="small-cart-trigger" class="small-cart-trigger">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="cart-counter">{{ \App\Models\Cart::where('user_id', auth()->id())->count() }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="navigation-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                <div class="main-menu d-none d-lg-block">
                    <nav>
<ul>
    <li <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>>
        <a href="{{url("/")}}">Home</a>
    </li>
    <li <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>>
        <a href="{{url("/about")}}">About Us</a>
    </li>
    <li <?php if(basename($_SERVER['PHP_SELF']) == 'shop.php') echo 'class="active"'; ?>>
        <a href="{{url("/shop")}}">Shop</a>
    </li>
    <li <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?>>
        <a href="{{url("/contact")}}">Contact</a>
    </li>
</ul>
</nav>


                    </div>
                    <!-- end of navigation section -->

                    <!-- Mobile Menu -->
                    <div class="mobile-menu-wrapper d-block d-lg-none pt-15">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

