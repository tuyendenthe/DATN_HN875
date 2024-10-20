<header class="header-area d-none d-lg-block">
    <div class="header-top-3">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-lg-4">
                    <div class="top-left-3 d-inline-block">
                        <div class="header-contact-3">
                            <a href="tel:18000344585"><i class="fal fa-headphones-alt"></i> 18000 344 585</a>
                        </div>
                    </div>
                    <div class="select-boxes select-boxes-3">
                        <div class="select-default select-default-3">
                            <button>EN <i class="fal fa-angle-down"></i></button>
                            <ul>
                                <li><a href="#">EN</a></li>
                                <li><a href="#">BN</a></li>
                                <li><a href="#">USA</a></li>
                            </ul>
                        </div>
                        <div class="select-default ml-10">
                            <button>EUR <i class="fal fa-angle-down"></i></button>
                            <ul>
                                <li><a href="#">EUR</a></li>
                                <li><a href="#">Taka</a></li>
                                <li><a href="#">Dinar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8  col-lg-8">
                    <div class="header-right-3 text-end">
                        <div class="h-top-list-3 d-inline-block">


                            <a href="single-product.html"><i class="fal fa-balance-scale"></i>Compare</a>
                            <a href="cart.html"><i class="fal fa-heart"></i>Wishlist</a>
                            <a href="cart.html" class="header-cart-3"><i class="fal fa-shopping-bag"></i>0 / $0.00</a>
                            <div class="user-menu">
                                @if(Auth::check())
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle"><i class="fal fa-user"></i> Tài khoản</a>
                                        <div class="dropdown-menu">
                                            <a href="">Cập nhật tài khoản</a>
                                            <a href="">Đơn hàng của bạn</a>
                                            <a href="{{ route('logout') }}">Đăng xuất</a>

                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}"><i class="fal fa-user"></i> Log in / Register</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ./ header top 3 -->
    <div class="header-main-3 p-rel">
        <div class="container">
            <div class="header-wrap-3">
                <div class="logo">
                    <a href="index-3.html"><img src="assets/img/logo/logo.png" alt=""></a>
                </div>
                <div class="header-form-3">
                    <form action="{{route('search')}}" method="POST">
                        @csrf
                        <input type="text" placeholder="Search anything here.." name="keyw">
                        <button><i class="fal fa-search"></i></button>
                    </form>
                </div>
                <div class="header-nav header-nav-3">
                    <nav id="mobile-menu">
                        <ul>
                            <li class="menu-item-has-children no-after"><a href="{{ route('index') }}">Home</a>

                            </li>
                            <li class="menu-item-has-children has-mega no-after"><a href="{{ route('shop') }}">Shop</a>
                                <div class="mega-menu" data-background="assets/img/bg/mega-menu-bg-1.jpg">
                                    {{-- <ul>
                                        <li>
                                            <ul>
                                                <li class="title"><a href="shop.html">SHOP LAYOUT</a></li>
                                                <li><a href="shop.html">Pagination</a></li>
                                                <li><a href="shop.html">Ajax Load More</a></li>
                                                <li><a href="shop.html">Infinite Scroll</a></li>
                                                <li><a href="shop.html">Sidebar Right</a></li>
                                                <li><a href="shop.html">Sidebar Left</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="title"><a href="shop.html">SHOP PAGES</a></li>
                                                <li><a href="shop.html">List View</a></li>
                                                <li><a href="shop.html">Small Products</a></li>
                                                <li><a href="shop.html">Large Products</a></li>
                                                <li><a href="shop.html">Shop — 3 Items</a></li>
                                                <li><a href="shop.html">Shop — 4 Items</a></li>
                                                <li><a href="shop.html">Shop — 5 Items</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="title"><a href="shop.html">PRODUCT LAYOUT</a></li>
                                                <li><a href="shop.html">Description Sticky</a></li>
                                                <li><a href="shop.html">Product Carousel</a></li>
                                                <li><a href="shop.html">Gallery Modern</a></li>
                                                <li><a href="shop.html">Thumbnail Left</a></li>
                                                <li><a href="shop.html">Thumbnail Right</a></li>
                                                <li><a href="shop.html">Thumbnail Botttom</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <li class="title"><a href="shop.html">Basketball</a></li>
                                                <li><a href="shop.html">East Hampton Fleece</a></li>
                                                <li><a href="shop.html">Faxon Canvas Low</a></li>
                                                <li><a href="shop.html">Habitasse Dictumst</a></li>
                                                <li><a href="shop.html">Kaoreet Lobortis</a></li>
                                                <li><a href="shop.html">NikeCourt Zoom Prestige</a></li>
                                                <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                            </ul>
                                        </li>
                                    </ul> --}}
                                </div>
                            </li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li>
                                <a href="{{ route('blog') }}">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('blog') }}">Blog List</a></li>
                                    <li><a href="{{ route('single_blog') }}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contact.send') }}">Contact us</a></li>
                            <li><a href="{{ route('bookfix.send') }}">Book fix</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="header-action-3 d-none d-xxl-block">
                    <div class="single-item mr-30">
                        <div class="single-action-3">
                            <div class="thumb">
                                <img src="assets/img/icon/world.png" alt="">
                            </div>
                            <div class="content">
                                <a href="shop.html">Worldwide</a>
                                <a href="shop.html"><span>Free Shipping</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-action-3">
                            <div class="thumb">
                                <img src="assets/img/icon/world.png" alt="">
                            </div>
                            <div class="content">
                                <a href="contact.html">24 Support</a>
                                <a href="tel:1800453856"><span>+1800 453 856</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. main header 3 -->
</header>
<!-- header area end -->
<div class="mobile-header d-lg-none">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="logo">
                    <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-6">
                <div class="bar-icon text-end">
                    <button class="toggle-nav-menu sidebar-menu-toggle">
                        <i class="fal fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
