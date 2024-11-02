<header>
    <div class="header-area theme-bg header-1 d-none d-lg-block">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="epix-t-left">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('index') }}">Trang chủ</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('about') }}">About</a>
                                    </li>
                                    <li>
                                    </li>
                                    </li>
                                    <li>
                                        <a href="{{ route('shop') }}">Sản phẩm</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html"><span>Shop Grid</span></a></li>
                                            <li><a href="{{ route('single_product') }}">Single Product</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog') }}">Tin tức</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('blog') }}">Danh sách tin tức</a></li>
                                            {{-- <li><a href="{{ route('single_blog') }}">Chi tiết tin tức</a></li> --}}
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact.form') }}">Liên hệ</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('bookfix.form') }}">Đặt lịch sửa chữa</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- /. header left -->
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="text-end">
                            <div class="epix-t-right">
                                <div class="ht-actions">
                                    <a href="{{ route('login') }}">Đăng nhập</a>
                                    <a href="#">Theo dõi đơn hàng</a>
                                </div>
                                <div class="epix-ht-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-2 col-xl-2 col-lg-3">
                        <div class="epix-header-logo">
                            <a href="index.html"><img src="assets/img/logo/logo-white.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-6">
                        <div class="epix-header-flex">
                            <div class="epix-side-dropdown d-none d-xl-block">
                                <button class="epix-side-btn epix-side-btn-1">
                                    <span class="bars"></span><span class="text">Linh kiện</span><i
                                        class="fal fa-angle-down"></i>
                                </button>
                                <ul>
                                    <li><a href="#">Science</a></li>
                                    <li><a href="#">Arts</a></li>
                                    <li><a href="#">Commarce</a></li>
                                </ul>
                            </div>
                            <div class="epix-header-form epix-header-form-1">
                                <form action="{{ route('search') }}" method="POST">
                                    @csrf
                                    <input type="text" placeholder="Search anything here.." name="keyw">
                                    <button><i class="fal fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-3">
                        <div class="epix-header-actions">
                            <div class="epix-action-single">
                                <a href="cart.html">
                                    <div class="icon">
                                        <i class="fal fa-heart"></i>
                                        <span>0</span>
                                    </div>
                                    <div class="content">
                                        <span>Yêu thích</span>
                                    </div>
                                </a>
                            </div>
                            <div class="epix-action-single">
                                <a href="cart.html">
                                    <div class="icon">
                                        <i class="fal fa-shopping-cart"></i>
                                        <span>0</span>
                                    </div>
                                    <div class="content">
                                        <span> Giỏ hàng</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom p-rel">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-9 col-xl-9">
                        <div class="header-nav">
                            <nav>
                                <ul>
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('index') }}"><i class="bi bi-house">Home</i></a>
                                    </li>
                                    <li class="menu-item-has-children has-mega">
                                        <a href="shop.html">Tiện ích</a>
                                        <div class="mega-menu" data-background="assets/img/bg/mega-menu-bg-1.jpg">
                                            <ul>
                                                <li>
                                                    <ul>
                                                        <li class="title"><a href="shop.html">Cửa hàng</a></li>
                                                        <li><a href="shop.html">Pagination</a></li>
                                                        <li><a href="shop.html">Ajax Load More</a></li>
                                                        <li><a href="shop.html">Infinite Scroll</a></li>
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
                                                        <li class="title"><a href="shop.html">PRODUCT LAYOUT</a>
                                                        </li>
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
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item-has-children has-mega">
                                        <a href="shop.html">PC & Laptop</a>
                                        <div class="mega-menu" data-background="assets/img/bg/mega-menu-bg-1.jpg">
                                            <ul>
                                                <li>
                                                    <ul>
                                                        <li class="title"><a href="shop.html">SHOP LAYOUT</a>
                                                        </li>
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
                                                        <li class="title"><a href="shop.html">PRODUCT LAYOUT</a>
                                                        </li>
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
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item-has-children has-mega">
                                        <a href="shop.html">Phụ kiện</a>
                                        <div class="mega-menu" data-background="assets/img/bg/mega-menu-bg-1.jpg">
                                            <ul>
                                                <li>
                                                    <ul>
                                                        <li class="title"><a href="shop.html">SHOP LAYOUT</a>
                                                        </li>
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
                                                        <li class="title"><a href="shop.html">PRODUCT LAYOUT</a>
                                                        </li>
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
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item-has-children has-mega">
                                        <a href="shop.html">Điện thoại và Máy tính bảng</a>
                                        <div class="mega-menu" data-background="assets/img/bg/mega-menu-bg-1.jpg">
                                            <ul>
                                                <li>
                                                    <ul>
                                                        <li class="title"><a href="shop.html">SHOP LAYOUT</a>
                                                        </li>
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
                                                        <li class="title"><a href="shop.html">PRODUCT LAYOUT</a>
                                                        </li>
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
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item-has-children has-mega">
                                        <a href="shop.html">Game Console</a>
                                        <div class="mega-menu" data-background="assets/img/bg/mega-menu-bg-1.jpg">
                                            <ul>
                                                <li>
                                                    <ul>
                                                        <li class="title"><a href="shop.html">SHOP LAYOUT</a>
                                                        </li>
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
                                                        <li class="title"><a href="shop.html">PRODUCT LAYOUT</a>
                                                        </li>
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
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-item-has-children has-mega">
                                        <a href="#">Máy ảnh & GPS</a>
                                        <div class="mega-menu" data-background="assets/img/bg/mega-menu-bg-1.jpg">
                                            <ul>
                                                <li>
                                                    <ul>
                                                        <li class="title"><a href="shop.html">SHOP LAYOUT</a>
                                                        </li>
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
                                                        <li class="title"><a href="shop.html">PRODUCT LAYOUT</a>
                                                        </li>
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
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 d-none d-xl-block">
                        <div class="header-right text-end">
                            <div class="header-contact">
                                <a href="tel:1800344565"><i class="fal fa-headphones"></i> 1800 344 565</a>
                            </div>
                            <div class="select-boxes">
                                <div class="select-default">
                                    <button>EN <i class="fal fa-angle-down"></i></button>
                                    <ul>
                                        <li><a href="#">EN</a></li>
                                        <li><a href="#">BN</a></li>
                                        <li><a href="#">USA</a></li>
                                    </ul>
                                </div>
                                <div class="select-default ml-10">
                                    <button>VN <i class="fal fa-angle-down"></i></button>
                                    <ul>
                                        <li><a href="#">VN</a></li>
                                        <li><a href="#">Taka</a></li>
                                        <li><a href="#">Dinar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. pc header -->
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
    <!-- /. mobile header -->
</header>
