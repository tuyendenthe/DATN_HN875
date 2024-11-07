<!DOCTYPE html>
<html class="no-js" lang="">


<!-- Mirrored from www.devsnews.com/template/epixx-prev/epixx/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 16:30:41 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Epix - Electronics eCommerce HTML Template</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="manifest" href="https://devsnews.com/template/epixx-prev/epixx/site.webmanifest/" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('laptop/assets//css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/meanmenu.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/swipper.css') }}" />
    <link rel="stylesheet" href="{{ asset('laptop/assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        .swiper-container {
            width: 100%;
            height: 600px;
            /* Thay đổi chiều cao theo nhu cầu */
        }

        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
        }

        .slider-content {
            color: white;
            /* Màu chữ */
            text-align: center;
            /* Căn giữa nội dung */
        }
    </style>
</head>

<body>
    <!-- header area start -->
    @include('blocks.header')
    <!-- header area end -->

    <!-- slide-bar start -->
    <div class="container">
        @if (session('message'))
            <div id="notification" class="notification alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <!-- Other content here -->
    </div>

    <style>
        .notification {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notification = document.getElementById('notification');

            if (notification) {
                // Show the notification
                notification.style.display = 'block';

                // Hide the notification after 5 seconds
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 7000);

                // Optional: Add hover effect to keep it visible
                notification.addEventListener('mouseenter', function() {
                    notification.style.display = 'block';
                });

                notification.addEventListener('mouseleave', function() {
                    notification.style.display = 'none';
                });
            }
        });
    </script>
    <div class="fix">
        <div class="side-info d-lg-none">
            <button class="side-info-close"><i class="fal fa-times"></i></button>

            <div class="side__logo mb-25">
                <a href="index.html"><img src="assets/img/logo/logo.png" alt="logo" /></a>
            </div>

            <div class="mobile-menu"></div>

            <div class="contact-infos mt-30 mb-30">
                <div class="contact-list mb-30">
                    <h4>Contact Info</h4>
                    <ul class="p-0">
                        <li><i class="fal fa-map"></i>no.1 Nam Dinh, Viet Nam</li>
                        <li><i class="fal fa-phone-alt"></i><a href="tell:+876864764764">0362978755</a></li>
                        <li><i class="fal fa-envelope-open"></i><a
                                href="https://www.devsnews.com/cdn-cgi/l/email-protection#c2a3a6afabac82a5afa3abaeeca1adaf"><span
                                    class="__cf_email__"
                                    data-cfemail="8aebeee7e3e4caede7ebe3e6a4e9e5e7">[email&#160;protected]</span></a>
                        </li>
                    </ul>
                    <div class="sidebar__menu--social">
                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- slide-bar end -->

    <main>

        <!-- slider area start -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide" style="background-image: url('{{ asset($banner->image) }}');">
                        <div class="container">
                            <div class="slider-content">
                                <span class="epix-slide-subtitle">{{ $banner->title }}</span>
                                <h2 class="epix-slide-title">{{ $banner->description }}</h2>
                                <a href="shop.html" class="epix-btn-1">
                                    <span>Purchase Now<i class="fal fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <!-- slider area end -->

        <!-- banner area start -->
        <section class="banner-area pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-lg-6">

                        <div class="epix-single-banner mb-30 wow fadeInUp" data-wow-delay=".2s"
                            data-background="assets/img/banner/banner-1.jpg">
                            <div class="epix-collection-box">
                                <h3 class="epix-c-heading">Bộ sưu tập năm 2021</h3>
                                <div class="epix-c-list">
                                    <ul>
                                        <li><a href="shop.html">Galaxy Tabs & Ides</a></li>
                                        <li><a href="shop.html">Phụ kiện</a></li>
                                        <li><a href="shop.html">MacBook</a></li>
                                        <li><a href="shop.html">Laptop Acer</a></li>
                                        <li><a href="shop.html">Laptop Asus</a></li>
                                        <li><a href="shop.html">Laptop Dell</a></li>
                                        <li><a href="shop.html">Laptop MSI</a></li>
                                        <li><a href="shop.html">Laptop Lenovo</a></li>
                                        <li><a href="shop.html">Laptop HP</a></li>
                                        <li><a href="shop.html">Ổ cứng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xxl-6 col-lg-6">
                        <div class="epix-single-banner-2 mb-30 wow fadeInUp" data-wow-delay=".4s"
                            data-background="https://th.bing.com/th/id/OIP.jnoyoTqzhiFCYCu2BJYbUAHaE3?rs=1&pid=ImgDetMain">
                            <h3 class="epix-c-heading-2">Google Mini<br>
                                Home Appliances<br>
                                Nest 4.0</h3>
                            <a href="shop.html" class="epix-white-btn"><span>Shop Now<i
                                        class="fal fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area end -->
        <!-- new arrival area start -->
        {{-- <section class="new-arrival pt-65 pb-95">
      <div class="container">
        <div class="row mb-45">
          <div class="col-xxl-12">
            <div class="epix-section-title text-center">
              <h5 class="s-title">Newest Arrivals Of This Month</h5>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xxl-5 col-xl-5 arrival-col-1">
            <div class="banner-3 wow fadeInUp" data-wow-delay=".2s">
              <div class="thumb">
                <img src="assets/img/banner/banner-3.jpg" class="w-100" alt="">
              </div>
              <div class="content">
                <span class="shipping text-uppercase">*Free shipping</span>
                <h3>Watches</h3>
                <a href="shop.html" class="epix-btn-2"><span>Explore Now<i class="fal fa-angle-right"></i></span></a>
              </div>
            </div>
          </div>
          <div class="col-xxl-7 col-xl-7 product-col-space arrival-col-2">
            <div class="row g-0">
              <div class="col-xxl-4 col-sm-6 col-md-4 col-lg-4">
                <div class="epix-single-product wow fadeInUp" data-wow-delay=".2s">
                  <div class="epix-product-thumb">
                    <a href="single-product.html"><img src="assets/img/product/23.jpg" class="img-fluid" alt=""></a>
                    <div class="epix-action">
                      <a href="single-product.html" class="p-cart product-popup-toggle">
                        <i class="fal fa-eye"></i>
                        <i class="fal fa-eye"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-heart"></i>
                        <i class="fal fa-heart"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-shopping-cart"></i>
                        <i class="fal fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="epix-product-content">
                    <div class="wrap">
                      <span class="epix-p-subtitle">Speakers</span>
                      <div class="rating">
                        <i class="fal fa-star"></i>
                        <span>2.5</span>
                      </div>
                    </div>
                    <h5 class="epix-p-title"><a href="single-product.html">Originals Win Camera</a></h5>
                    <div class="price-box">
                      <span class="price">$150.99</span>
                      <a href="single-product.html">+ Select Option</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-4 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay=".4s">
                <div class="epix-single-product">
                  <div class="epix-product-thumb">
                    <a href="single-product.html"><img src="assets/img/product/6.jpg" class="img-fluid" alt=""></a>
                    <div class="epix-action">
                      <a href="single-product.html" class="p-cart product-popup-toggle">
                        <i class="fal fa-eye"></i>
                        <i class="fal fa-eye"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-heart"></i>
                        <i class="fal fa-heart"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-shopping-cart"></i>
                        <i class="fal fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="epix-product-content">
                    <div class="wrap">
                      <span class="epix-p-subtitle">Cameras</span>
                      <div class="rating">
                        <i class="fal fa-star"></i>
                        <span>4.5</span>
                      </div>
                    </div>
                    <h5 class="epix-p-title"><a href="single-product.html">Sodales Par Iaculis</a></h5>
                    <div class="price-box">
                      <span class="price">$125.99</span>
                      <a href="single-product.html">+ Select Option</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-4 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay=".6s">
                <div class="epix-single-product">
                  <div class="epix-product-thumb">
                    <span class="sale">sale</span>
                    <a href="single-product.html"><img src="assets/img/product/2.jpg" class="img-fluid" alt=""></a>
                    <div class="epix-action">
                      <a href="single-product.html" class="p-cart product-popup-toggle">
                        <i class="fal fa-eye"></i>
                        <i class="fal fa-eye"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-heart"></i>
                        <i class="fal fa-heart"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-shopping-cart"></i>
                        <i class="fal fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="epix-product-content">
                    <div class="wrap">
                      <span class="epix-p-subtitle">Cameras</span>
                      <div class="rating">
                        <i class="fal fa-star"></i>
                        <span>3.3</span>
                      </div>
                    </div>
                    <h5 class="epix-p-title"><a href="single-product.html">Sceleris Quie Nostra</a></h5>
                    <div class="price-box">
                      <span class="price">$32.99</span>
                      <a href="single-product.html">+ Select Option</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-4 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay=".8s">
                <div class="epix-single-product">
                  <div class="epix-product-thumb">
                    <a href="single-product.html"><img src="assets/img/product/14.jpg" class="img-fluid" alt=""></a>
                    <div class="epix-action">
                      <a href="single-product.html" class="p-cart product-popup-toggle">
                        <i class="fal fa-eye"></i>
                        <i class="fal fa-eye"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-heart"></i>
                        <i class="fal fa-heart"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-shopping-cart"></i>
                        <i class="fal fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="epix-product-content">
                    <div class="wrap">
                      <span class="epix-p-subtitle">Laptops</span>
                      <div class="rating">
                        <i class="fal fa-star"></i>
                        <span>2.4</span>
                      </div>
                    </div>
                    <h5 class="epix-p-title"><a href="single-product.html">Wireless Audio System</a></h5>
                    <div class="price-box">
                      <span class="price">$150.00</span>
                      <a href="single-product.html">+ Select Option</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-4 col-sm-6 col-md-4 col-lg-4 wow fadeInUp" data-wow-delay="1s">
                <div class="epix-single-product">
                  <div class="epix-product-thumb">
                    <a href="single-product.html"><img src="assets/img/product/25.jpg" class="img-fluid" alt=""></a>
                    <div class="epix-action">
                      <a href="single-product.html" class="p-cart product-popup-toggle">
                        <i class="fal fa-eye"></i>
                        <i class="fal fa-eye"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-heart"></i>
                        <i class="fal fa-heart"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-shopping-cart"></i>
                        <i class="fal fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="epix-product-content">
                    <div class="wrap">
                      <span class="epix-p-subtitle">Tablets</span>
                      <div class="rating">
                        <i class="fal fa-star"></i>
                        <span>2.4</span>
                      </div>
                    </div>
                    <h5 class="epix-p-title"><a href="single-product.html">Game Console Conller</a></h5>
                    <div class="price-box">
                      <span class="price"><del>$150.99</del> <span class="active">$215.00</span></span>
                      <a href="single-product.html">+ Select Option</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-4 col-sm-6 col-md-4 col-lg-4">
                <div class="epix-single-product wow fadeInUp" data-wow-delay="1.2s">
                  <div class="epix-product-thumb">
                    <a href="single-product.html"><img src="assets/img/product/22.jpg" class="img-fluid" alt=""></a>
                    <div class="epix-action">
                      <a href="single-product.html" class="p-cart product-popup-toggle">
                        <i class="fal fa-eye"></i>
                        <i class="fal fa-eye"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-heart"></i>
                        <i class="fal fa-heart"></i>
                      </a>
                      <a href="cart.html" class="p-cart">
                        <i class="fal fa-shopping-cart"></i>
                        <i class="fal fa-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                  <div class="epix-product-content">
                    <div class="wrap">
                      <span class="epix-p-subtitle">Speakers</span>
                      <div class="rating">
                        <i class="fal fa-star"></i>
                        <span>2.4</span>
                      </div>
                    </div>
                    <h5 class="epix-p-title"><a href="single-product.html">Tablet Thin Elite Book</a></h5>
                    <div class="price-box">
                      <span class="price">$212.00</span>
                      <a href="single-product.html">+ Select Option</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
        <!-- new arrival area end -->

        <!-- promo area start -->
        {{-- <section class="promo-area pb-100">
      <div class="container">
        <div class="promo-banner pl-75 pr-90 pt-30 pb-35 theme-bg">
          <div class="row">
            <div class="col-xxl-5 col-xl-5 col-lg-6">
              <div class="box-wrap">
                <div class="epix-p-box">
                  <div class="epix-p-icon">
                    <img src="assets/img/icon/television.png" alt="">
                    <span class="label">Television</span>
                  </div>
                </div>
                <div class="epix-p-box">
                  <div class="epix-p-icon">
                    <img src="assets/img/icon/headphone.png" alt="">
                    <span class="label">Headphone</span>
                  </div>
                </div>
                <div class="epix-p-box">
                  <div class="epix-p-icon">
                    <img src="assets/img/icon/computer.png" alt="">
                    <span class="label">Computers</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-xl-3 d-none d-xl-block">
              <div class="promo-img">
                <img src="assets/img/banner/promo-img.png" alt="">
              </div>
            </div>
            <div
              class="col-xxl-4 col-xl-4 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
              <h3 class="promo-title d-inline-block text-center">Shop & Save Big On <br>
                Listed Categories Here</h3>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
        <!-- promo area end -->
        <!-- deals area start -->
        @if ($flashSales->count())
            <section class="deals-area bg-gray pt-40">
                <div class="container">
                    <div class="deals-product bg-white">
                        <div class="row  align-items-center">
                            <div class="col-xxl-3 col-xl-3">
                                <div class="deal-product-left">
                                    <h3 class="deals-title">Siêu<br>
                                        Flash Sale</h3>
                                    <div class="deals-countdown mb-25">

                                        <div class="countdown-inner" data-countdown=""
                                            data-date="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $flashSales[0]->time_end)->format('M d Y H:i:s') }}">
                                            <ul>
                                                <li><span data-days="">0</span> Ngày</li>
                                                <li><span data-hours="">0</span> Giờ</li>
                                                <li><span data-minutes="">0</span> Phút</li>
                                                <li><span data-seconds="">0</span> Giây</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="shop.html" class="link-details">Xem Tất Cả<i
                                            class="fal fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-xxl-9 col-xl-9">
                                <div class="deal-product-wrap pl-80">
                                    <div class="d-product-active">
                                        <div class="swiper-container d-product-active">
                                            <div class="swiper-wrapper">

                                                @foreach ($flashSales as $flashSale)
                                                    <div class="swiper-slide" style="flex-shrink: unset;">
                                                        <div class="epix-single-product epix-single-product-2">
                                                            <div class="epix-product-thumb epix-product-thumb-2">
                                                                <span class="sale">sale</span>
                                                                <a
                                                                    href="{{ route('product.details', $flashSale->product->id) }}">
                                                                    <img src="{{ Storage::url($flashSale->product->image) }}"
                                                                        class="img-fluid">
                                                                </a>
                                                                <div class="epix-action">
                                                                    <a href="{{ route('product.details', $flashSale->product->id) }}"
                                                                        class="p-cart product-popup-toggle">
                                                                        <i class="fal fa-eye"></i>
                                                                        <i class="fal fa-eye"></i>
                                                                    </a>
                                                                    <a href="cart.html" class="p-cart">
                                                                        <i class="fal fa-heart"></i>
                                                                        <i class="fal fa-heart"></i>
                                                                    </a>
                                                                    <a href="cart.html" class="p-cart">
                                                                        <i class="fal fa-shopping-cart"></i>
                                                                        <i class="fal fa-shopping-cart"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="epix-product-content">
                                                                <div class="wrap">
                                                                    <span class="epix-p-subtitle">Đánh giá</span>
                                                                    <div class="rating">
                                                                        <i class="fal fa-star"></i>
                                                                        <span>4.5</span>
                                                                    </div>
                                                                </div>
                                                                <h5 class="epix-p-title"><a
                                                                        href="{{ route('product.details', $flashSale->product->id) }}">{{ $flashSale->product->name }}</a>
                                                                </h5>
                                                                <div class="price-box">
                                                                    <span class="price"><span
                                                                            class="active">{{ number_format($flashSale->product->price) }}đ</span></span>
                                                                    <a
                                                                        href="{{ route('product.details', $flashSale->product->id) }}">+
                                                                        Xem Thêm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /. deals product wrap -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="deal-product-collection pl-100 pr-100">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- deals area end -->
        <!-- unmissed area start -->
        <section class="unmissed-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-sm-6 unmissed-col-1">
                        <div class="unmissed-sidebar">
                            <h4 class="epix-sidebar-title">Danh mục</h4>
                            <ul class="epix-um-list">
                                <li class="has-arrow"><a href="shop.html"><i
                                            class="fal fa-desktop"></i><span>MacBook</span></a>
                                </li>
                                <li class="has-arrow"><a href="shop.html"><i
                                            class="fal fa-laptop"></i><span>Acer</span></a>
                                </li>
                                <li class="has-arrow"><a href="shop.html"><i
                                            class="fal fa-mobile-android"></i><span>Asus</span></a>
                                </li>
                                <li class="has-arrow"><a href="shop.html"><i
                                            class="fal fa-camera-retro"></i><span>Dell</span></a></li>
                                <li class="has-arrow"><a href="shop.html"><i
                                            class="fal fa-video"></i><span>MSI</span></a>
                                </li>
                                <li class="has-arrow"><a href="shop.html"><i
                                            class="fal fa-mouse"></i><span>Lenovo</span></a>
                                </li>
                                <li class="has-arrow"><a href="shop.html"><i
                                            class="fal fa-laptop"></i><span>HP</span></a>
                                </li>
                                <li class="has-arrow"><a href="shop.html"><i class="fal fa-camera-retro"></i><span>Ổ
                                            cứng</span></a></li>
                            </ul>
                            <a href="shop.html" class="link-details">Xem tất cả sản phẩm<i
                                    class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xxl-9 col-xl-9 unmissed-col-2">
                        <div class="product-col-space-2">
                            <div class="row g-0">
                                @foreach ($products as $item)
                                    <div class="col-xxl-3 col-sm-6 col-md-4 col-lg-4 col-xl-3 wow fadeInUp"
                                        data-wow-delay=".2s">
                                        <div class="epix-single-product">
                                            <div class="epix-product-thumb epix-product-thumb-3">
                                                <a href="single-product.html">
                                                    <img src="{{ Storage::url($item->image) }}" {{-- <img src="assets/img/product/23.jpg" --}}
                                                        class="img-fluid" alt=""></a>
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="cart.html" class="p-cart">
                                                        <i class="fal fa-heart"></i>
                                                        <i class="fal fa-heart"></i>
                                                    </a>
                                                    <a href="cart.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="epix-product-content">
                                                <div class="wrap">
                                                    <span
                                                        class="epix-p-subtitle">{{ optional(optional($item)->category)->name ?? 'No Category' }}</span>
                                                    <div class="rating">
                                                        <i class="fal fa-star"></i>
                                                        <span>2.5</span>
                                                    </div>
                                                </div>
                                                <h5 class="epix-p-title"><a
                                                        href="single-product.html">{{ $item->name }}</a></h5>
                                                <div class="price-box">
                                                    <span class="price">{{ $item->price }}</span>
                                                    <a href="single-product.html">+ Select Option</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- unmissed end -->
        <!-- sub banner area start -->
        <section class="sub-banner-area pb-100">
            <div class="container">
                <div class="banner-inner pt-95 pb-80 pl-95 pr-95"
                    data-background="assets/img/banner/offer-banner-2.jpg">
                    <div class="text-center d-inline-block">
                        <h5 class="epix-s-banner-subtitle">45% Flate On</h5>
                        <h3 class="epix-s-banner-title">Tiện ích</h3>
                        <a href="shop.html" class="epix-btn-1" tabindex="0"><span>Khám phá ngay<i
                                    class="fal fa-angle-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- sub banner area end -->

        <!-- service area start -->
        <div class="service-area pb-95">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8">
                        <div class="service-wrapper">
                            <div class="row s-row">
                                <div class="col-xxl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                    <div class="epix-single-service">
                                        <div class="epix-s-icon">
                                            <img src="assets/img/icon/service-1.png" alt="">
                                        </div>
                                        <div class="epix-s-content">
                                            <a href="shop.html" class="epix-s-link">Giao hàng miễn phí</a>
                                            <p>Các biến thể mới vượt qua <br>
                                                Lorem có sẵn..</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="epix-single-service">
                                        <div class="epix-s-icon">
                                            <img src="assets/img/icon/service-2.png" alt="">
                                        </div>
                                        <div class="epix-s-content">
                                            <a href="shop.html" class="epix-s-link">Trả hàng trong 20 ngày</a>
                                            <p>Các biến thể mới vượt qua <br>
                                                Lorem có sẵn..</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                    <div class="epix-single-service">
                                        <div class="epix-s-icon">
                                            <img src="assets/img/icon/service-3.png" alt="">
                                        </div>
                                        <div class="epix-s-content">
                                            <a href="shop.html" class="epix-s-link">Thanh toán an toàn</a>
                                            <p>Các biến thể mới vượt qua <br>
                                                Lorem có sẵn..</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-6 wow fadeInUp" data-wow-delay="1s">
                        <div class="epix-newsletter-form pl-50">
                            <h4 class="epix-newsletter-title">Đăng ký nhận bản tin</h4>
                            <form action="#">
                                <input type="text" placeholder="Nhập email của bạn">
                                <button type="submit">
                                    <i class="fal fa-long-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                        <!-- /. service newsletter -->
                    </div>
                </div>
            </div>
        </div>
        <!-- service area end -->

        <!-- handpicked area start -->
        <div class="handpicked-area bg-gray pt-40 pb-95">
            <div class="container">
                <div class="handpicked-inner pl-30 pr-30 pt-35 bg-white">
                    <div class="row mb-35">
                        <div class="col-xxl-12">
                            <div class="epix-section-title text-center">
                                <h5 class="s-title">Sản phẩm được lựa chọn cẩn thận cho bạn</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-45">
                        <div class="col-xxl-12">
                            <div class="epix-handpicked-banner"
                                data-background="assets/img/banner/product-banner-2.jpg">
                                <h4 class="epix-h-banner-text">Dòng thông minh 4.0
                                </h4>
                                <a href="shop.html" class="epix-white-btn"><span>Mua ngay<i
                                            class="fal fa-angle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4 col-sm-6 col-md-4">
                            <div class="epix-handpicked-product mb-50">
                                <div class="epix-h-pro-thumb mr-35">
                                    <a href="single-product.html"><img src="assets/img/product/1.jpg"
                                            alt=""></a>
                                </div>
                                <div class="epix-h-pro-content">
                                    <div class="epix-product-content pe-0 ps-0 pt-0 pb-0">
                                        <div class="wrap">
                                            <span class="epix-p-subtitle">Laptops</span>
                                            <div class="rating">
                                                <i class="fal fa-star"></i>
                                                <span>2.4</span>
                                            </div>
                                        </div>
                                        <h5 class="epix-p-title"><a href="single-product.html">Wireless Audio
                                                System</a></h5>
                                        <div class="price-box mb-15">
                                            <span class="price">$150.00</span>
                                            <a href="single-product.html">+ Select Option</a>
                                        </div>
                                        <div class="epix-p-quantity mr-10">
                                            <form action="#">
                                                <button class="epix-price-increment cart-plus">+</button>
                                                <button class="epix-price-decrement cart-minus">-</button>
                                                <input type="text" value="1">
                                            </form>
                                        </div>
                                        <div class="d-inline-block">
                                            <div class="epix-action">
                                                <a href="cart.html" class="p-cart">
                                                    <i class="fal fa-shopping-cart"></i>
                                                    <i class="fal fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6  col-md-4">
                            <div class="epix-handpicked-product mb-50">
                                <div class="epix-h-pro-thumb mr-35">
                                    <a href="single-product.html"><img src="assets/img/product/18.jpg"
                                            alt=""></a>
                                </div>
                                <div class="epix-h-pro-content">
                                    <div class="epix-product-content pe-0 ps-0 pt-0 pb-0">
                                        <div class="wrap">
                                            <span class="epix-p-subtitle">Cameras</span>
                                            <div class="rating">
                                                <i class="fal fa-star"></i>
                                                <span>3.3</span>
                                            </div>
                                        </div>
                                        <h5 class="epix-p-title"><a href="single-product.html">White Mini Smart NX
                                                06</a></h5>
                                        <div class="price-box mb-15">
                                            <span class="price">$143.00</span>
                                            <a href="single-product.html">+ Select Option</a>
                                        </div>
                                        <div class="epix-p-quantity mr-10">
                                            <form action="#">
                                                <button class="epix-price-increment  cart-plus">+</button>
                                                <button class="epix-price-decrement  cart-minus">-</button>
                                                <input type="text" value="1">
                                            </form>
                                        </div>
                                        <div class="d-inline-block">
                                            <div class="epix-action">
                                                <a href="cart.html" class="p-cart">
                                                    <i class="fal fa-shopping-cart"></i>
                                                    <i class="fal fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6  col-md-4">
                            <div class="epix-handpicked-product mb-50">
                                <div class="epix-h-pro-thumb mr-35">
                                    <a href="single-product.html"><img src="assets/img/product/32.jpg"
                                            alt=""></a>
                                </div>
                                <div class="epix-h-pro-content">
                                    <div class="epix-product-content pe-0 ps-0 pt-0 pb-0">
                                        <div class="wrap">
                                            <span class="epix-p-subtitle">Printers</span>
                                            <div class="rating">
                                                <i class="fal fa-star"></i>
                                                <span>4.5</span>
                                            </div>
                                        </div>
                                        <h5 class="epix-p-title"><a href="single-product.html">Full Color Laser Pro
                                                452</a></h5>
                                        <div class="price-box mb-15">
                                            <span class="price">$250.00</span>
                                            <a href="single-product.html">+ Select Option</a>
                                        </div>
                                        <div class="epix-p-quantity mr-10">
                                            <form action="#">
                                                <button class="epix-price-increment  cart-plus">+</button>
                                                <button class="epix-price-decrement  cart-minus">-</button>
                                                <input type="text" value="1">
                                            </form>
                                        </div>
                                        <div class="d-inline-block">
                                            <div class="epix-action">
                                                <a href="cart.html" class="p-cart">
                                                    <i class="fal fa-shopping-cart"></i>
                                                    <i class="fal fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6  col-md-4">
                            <div class="epix-handpicked-product mb-50">
                                <div class="epix-h-pro-thumb mr-35">
                                    <span class="sale">sale</span>
                                    <a href="single-product.html"><img src="assets/img/product/24.jpg"
                                            alt=""></a>
                                </div>
                                <div class="epix-h-pro-content">
                                    <div class="epix-product-content pe-0 ps-0 pt-0 pb-0">
                                        <div class="wrap">
                                            <span class="epix-p-subtitle">Cameras</span>
                                            <div class="rating">
                                                <i class="fal fa-star"></i>
                                                <span>3.1</span>
                                            </div>
                                        </div>
                                        <h5 class="epix-p-title"><a href="single-product.html">Smartphone 32GB LTE</a>
                                        </h5>
                                        <div class="price-box mb-15">
                                            <span class="price"><del>$150.00</del><span
                                                    class="active">$120.99</span></span>
                                            <a href="single-product.html">+ Select Option</a>
                                        </div>
                                        <div class="epix-p-quantity mr-10">
                                            <form action="#">
                                                <button class="epix-price-increment  cart-plus">+</button>
                                                <button class="epix-price-decrement  cart-minus">-</button>
                                                <input type="text" value="1">
                                            </form>
                                        </div>
                                        <div class="d-inline-block">
                                            <div class="epix-action">
                                                <a href="cart.html" class="p-cart">
                                                    <i class="fal fa-shopping-cart"></i>
                                                    <i class="fal fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6  col-md-4">
                            <div class="epix-handpicked-product mb-50">
                                <div class="epix-h-pro-thumb mr-35">
                                    <span class="sale">sale</span>
                                    <a href="single-product.html"><img src="assets/img/product/23.jpg"
                                            alt=""></a>
                                </div>
                                <div class="epix-h-pro-content">
                                    <div class="epix-product-content pe-0 ps-0 pt-0 pb-0">
                                        <div class="wrap">
                                            <span class="epix-p-subtitle">Laptops</span>
                                            <div class="rating">
                                                <i class="fal fa-star"></i>
                                                <span>3.1</span>
                                            </div>
                                        </div>
                                        <h5 class="epix-p-title"><a href="single-product.html">Universal Headphones
                                                12</a></h5>
                                        <div class="price-box mb-15">
                                            <span class="price">$210.00</span>
                                            <a href="single-product.html">+ Select Option</a>
                                        </div>
                                        <div class="epix-p-quantity mr-10">
                                            <form action="#">
                                                <button class="epix-price-increment  cart-plus">+</button>
                                                <button class="epix-price-decrement  cart-minus">-</button>
                                                <input type="text" value="1">
                                            </form>
                                        </div>
                                        <div class="d-inline-block">
                                            <div class="epix-action">
                                                <a href="cart.html" class="p-cart">
                                                    <i class="fal fa-shopping-cart"></i>
                                                    <i class="fal fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-sm-6  col-md-4">
                            <div class="epix-handpicked-product mb-50">
                                <div class="epix-h-pro-thumb mr-35">
                                    <span class="sale">sale</span>
                                    <a href="single-product.html"><img src="assets/img/product/28.jpg"
                                            alt=""></a>
                                </div>
                                <div class="epix-h-pro-content">
                                    <div class="epix-product-content pe-0 ps-0 pt-0 pb-0">
                                        <div class="wrap">
                                            <span class="epix-p-subtitle">Cameras</span>
                                            <div class="rating">
                                                <i class="fal fa-star"></i>
                                                <span>3.1</span>
                                            </div>
                                        </div>
                                        <h5 class="epix-p-title"><a href="single-product.html">Notebook Widescreen
                                                Y7</a></h5>
                                        <div class="price-box mb-15">
                                            <span class="price"><del>$150.00</del><span
                                                    class="active">$199.00</span></span>
                                            <a href="single-product.html">+ Select Option</a>
                                        </div>
                                        <div class="epix-p-quantity mr-10">
                                            <form action="#">
                                                <button class="epix-price-increment  cart-plus">+</button>
                                                <button class="epix-price-decrement  cart-minus">-</button>
                                                <input type="text" value="1">
                                            </form>
                                        </div>
                                        <div class="d-inline-block">
                                            <div class="epix-action">
                                                <a href="cart.html" class="p-cart">
                                                    <i class="fal fa-shopping-cart"></i>
                                                    <i class="fal fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. handpicked products -->
                </div>
            </div>
        </div>
        <!-- handpicked area end -->
        <!-- brand area start -->
        <div class="brand-area bg-gray pb-95 ">
            <div class="container">
                <div class="row">
                    <h4 class="epix-brand-title">Được tin cậy bởi
                        500+ Thương hiệu</h4>
                </div>
                <div class="col-xxl-10 col-xl-8">
                    <div class="brand-carousel">
                        <div class="brand-active swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide single-brand text-xl-end">
                                    <a href="shop.html"><img src="assets/img/brand/brand-1.png" alt=""></a>
                                </div>
                                <div class="swiper-slide single-brand text-xl-end">
                                    <a href="shop.html"><img src="assets/img/brand/brand-2.png" alt=""></a>
                                </div>
                                <div class="swiper-slide single-brand text-xl-end">
                                    <a href="shop.html"><img src="assets/img/brand/brand-3.png" alt=""></a>
                                </div>
                                <div class="swiper-slide single-brand text-xl-end">
                                    <a href="shop.html"><img src="assets/img/brand/brand-4.png" alt=""></a>
                                </div>
                                <div class="swiper-slide single-brand text-xl-end">
                                    <a href="shop.html"><img src="assets/img/brand/brand-5.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- brand area end -->
    </main>
    <!-- footer area start -->
    <footer class="footer-area footer-1 bg-black  pt-85">
        <div class="footer-main pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 footer-col-1 col-sm-6 col-md-8 col-lg-8">
                        <div class="footer-widget widget mb-30 widget-about">
                            <div class="widget-about">
                                <h4 class="epix-footer-title">Tải ứng dụng</h4>
                                <p><a href="index.html">Epixx</a> Ứng dụng hiện đã có trên Google<br>
                                    Play & App Store. Nhận nó ngay bây giờ.</p>
                                <div class="logo-list logo-list-1">
                                    <a href="#"><img src="assets/img/icon/icon-app-store.png"
                                            alt=""></a>
                                    <a href="#"><img src="assets/img/icon/icon-google-play.png"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. footer about widget -->
                    <div class="col-xxl-6 col-xl-6  footer-col-2">
                        <div class="row">
                            <div class="col-xxl-4 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                <div class="footer-widget mb-30">
                                    <h4 class="epix-footer-title">Thông tin</h4>
                                    <ul>
                                        <li><a href="about.html">Về chúng tôi</a></li>
                                        <li><a href="shop.html">Thông tin giao hàng</a></li>
                                        <li><a href="shop.html">Sản phẩm mới</a></li>
                                        <li><a href="shop.html">Hàng tốt nhất</a></li>
                                        <li><a href="login.html">Tài khoản của tôi</a></li>
                                        <li><a href="cart.html">Lịch sử đặt hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-sm-6 col-md-4  col-lg-4  col-xl-4">
                                <div class="footer-widget mb-30">
                                    <h4 class="epix-footer-title">Tài khoản của tôi</h4>
                                    <ul>
                                        <li><a href="login.html">Tài khoản của tôi</a></li>
                                        <li><a href="cart.html">Giỏ hàng</a></li>
                                        <li><a href="cart.html">Sản phẩm yêu thích</a></li>
                                        <li><a href="shop.html">Giá giảm</a></li>
                                        <li><a href="cart.html">Lịch sử đặt hàng</a></li>
                                        <li><a href="cart.html">Đơn hàng quốc tế</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-sm-6 col-md-4  col-lg-4  col-xl-4">
                                <div class="footer-widget mb-30">
                                    <h4 class="epix-footer-title">Dịch vụ khách hàng</h4>
                                    <ul>
                                        <li><a href="contact.html">Sơ đồ trang web</a></li>
                                        <li><a href="contact.html">Tài khoản của tôi</a></li>
                                        <li><a href="contact.html">Thông tin giao hàng</a></li>
                                        <li><a href="cart.html">Lịch sử đặt hàng</a></li>
                                        <li><a href="cart.html">Sản phẩm yêu thích</a></li>
                                        <li><a href="shop.html">Đặc biệt</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. footer menu widget -->
                    <div class="col-xxl-3 col-xl-3 footer-col-3 col-sm-6 col-md-4 col-lg-4 order-first order-xl-last">
                        <div class="footer-widget widget mb-30 widget-contact">
                            <h4 class="epix-footer-title">Thông tin liên hệ</h4>
                            <div class="contact-info">
                                <div class="info-main d-flex">
                                    <div class="contact-icon mr-15">
                                        <img src="assets/img/icon/icon-contact.png" alt="">
                                    </div>
                                    <div class="contact-desc">
                                        <p>Miễn phí 24/24:<br>
                                            <a href="tel:0123456789">0123456789</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="info-sub">
                                    <p>
                                        Địa chỉ ở đây.<br>
                                        <a
                                            href="https://www.devsnews.com/cdn-cgi/l/email-protection#086c6d6567486d70696578646d266b6765"><span
                                                class="__cf_email__"
                                                data-cfemail="dbbfbeb6b49bbea3bab6abb7bef5b8b4b6">[email&#160;protected]</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. footer contact widget -->
                </div>
            </div>
        </div>
        <!-- /. main footer -->
        <div class="footer-copyright text-xl-center">
            <div class="container">
                <p>© 2021 Epixx - Made By <a href="https://www.devsnews.com/support/">BDevs</a>. All Rights Reserved.
                </p>
            </div>
        </div>

        <!-- /. copyright footer -->
    </footer>
    <!-- footer area end -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <!-- JS here -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('laptop/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/swipper-bundle.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/countdown.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/jquery-ui-slider-range.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/mouse-wheel.min.js') }}"></script>
    <script src="{{ asset('laptop/assets/js/main.js') }}"></script>


</body>


<!-- Mirrored from www.devsnews.com/template/epixx-prev/epixx/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 16:30:49 GMT -->

</html>
