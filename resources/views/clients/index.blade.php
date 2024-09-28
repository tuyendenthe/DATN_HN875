@extends('clients.master')

@section('content')
<main>
    <!-- prealoder area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="first_object"></div>
                <div class="object" id="second_object"></div>
                <div class="object" id="third_object"></div>
            </div>
        </div>
    </div>
    <!-- prealoder area end -->
    <!-- slider area start -->
    <div class="slider-area">
        <div class="pl-20 pr-20">
            <div class="row row-20">
                <div class="col-xxl-6 col-lg-6 slider-col-3-1">
                    <div class="slider-active-2 swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="single-slider mb-20 mb-md-0 d-block slider-height-3  d-flex align-items-center"
                                    data-background="{{asset('laptop/assets/img/slider/main-banner-4.jpg')}}">
                                    <div class="slider-content-3">
                                        <h5 class="slide-subtitle-3">bang & olufsen</h5>
                                        <h2 class="slide-title-3">Beoplay a1</h2>
                                        <p>Epixx is World’s largest otd online marketplace<br>
                                            the connecting buyers with suppliers.</p>
                                        <a href="shop.html" class="transparent-btn">Explore Now <i
                                                class="fal fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-slider mb-20 mb-lg-0 d-block slider-height-3  d-flex align-items-center"
                                    data-background="{{asset('laptop/assets/img/slider/main-banner-5.jpg')}}">
                                    <div class="slider-content-3">
                                        <h5 class="slide-subtitle-3">bang & olufsen</h5>
                                        <h2 class="slide-title-3">Beoplay a1</h2>
                                        <p>Epixx is World’s largest otd online marketplace<br>
                                            the connecting buyers with suppliers.</p>
                                        <a href="shop.html" class="transparent-btn">Explore Now <i
                                                class="fal fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-slider mb-30 mb-lg-0 d-block slider-height-3  d-flex align-items-center"
                                    data-background="{{asset('laptop/assets/img/slider/main-banner-4.jpg')}}">
                                    <div class="slider-content-3">
                                        <h5 class="slide-subtitle-3">bang & olufsen</h5>
                                        <h2 class="slide-title-3">Beoplay a1</h2>
                                        <p>Epixx is World’s largest otd online marketplace<br>
                                            the connecting buyers with suppliers.</p>
                                        <a href="shop.html" class="transparent-btn">Explore Now <i
                                                class="fal fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-slider mb-30 mb-lg-0 d-block slider-height-3  d-flex align-items-center"
                                    data-background="{{asset('laptop/assets/img/slider/main-banner-5.jpg')}}">
                                    <div class="slider-content-3">
                                        <h5 class="slide-subtitle-3">bang & olufsen</h5>
                                        <h2 class="slide-title-3">Beoplay a1</h2>
                                        <p>Epixx is World’s largest otd online marketplace<br>
                                            the connecting buyers with suppliers.</p>
                                        <a href="shop.html" class="transparent-btn">Explore Now <i
                                                class="fal fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-paginations pagination-3"></div>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 slider-col-3-2">
                    <div class="row row-20">
                        <div class="col-xxl-6 col-sm-6 slider-col-3-3 mb-20">
                            <div class="video-product-box video-pro-height">
                                <img src="{{asset('laptop/assets/img/banner/video-banner.jpg')}}" alt="">
                                <a href="https://www.youtube.com/watch?v=LQw2ljPHJU0" class="popup-video"><i class="fal fa-play"></i></a>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-sm-6 slider-col-3-4 mb-20">
                            <div class="banner-3-1">
                                <div class="thumb video-pro-height">
                                    <img src="{{asset('laptop/assets/img/banner/page-3-banner.jpg')}}" class="has-overlay-img" alt="">
                                </div>
                                <div class="content">
                                    <h3>Music Monster</h3>
                                    <p>Epixx is World’s largest online<br>
                                        the connecting buyers.</p>
                                    <a href="shop.html" class="transparent-btn">Shop Now <i
                                            class="fal fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="banner-3-1">
                                <div class="thumb video-pro-height-2">
                                    <img src="{{asset('laptop/assets/img/banner/page-3-banner-2.jpg')}}" alt="">
                                </div>
                                <div class="content">
                                    <h3>xBox 5</h3>
                                    <p>Epixx is World’s largest online<br>
                                        the connecting buyers.</p>
                                    <a href="shop.html" class="transparent-btn">Shop Now <i
                                            class="fal fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider area end -->
    <!-- category area start -->
    <div class="category-area category-3-space pt-95 pb-100">
        <div class="container">
            <div class="row align-items-center mb-80 category-row-space-3">
                <div class="col-xxl-3 col-md-5">
                    <div class="epix-section-title-4">
                        <h3 class="s-title">Find Exactly What<br> You Need</h3>
                        <p>Epixx is World’s largest otd online<br>
                            marketplace the connecting buyers<br>
                            with suppliers.</p>
                    </div>
                </div>
                <div class="col-xxl-9 col-md-7">
                    <div class="category-wrap category-wrap-3 pl-25">
                        <div class="single-category category-3 text-center d-inline-block">
                            <a href="shop.html">
                                <div class="cat-icon">
                                    <i class="pe-7s-monitor"></i>
                                </div>
                                <div class="cat-link">
                                    Television
                                </div>
                            </a>
                        </div>
                        <div class="single-category category-3 text-center d-inline-block">
                            <a href="shop.html">
                                <div class="cat-icon">
                                    <i class="pe-7s-headphones"></i>
                                </div>
                                <div class="cat-link">
                                    Headphones
                                </div>
                            </a>
                        </div>
                        <div class="single-category category-3 text-center d-inline-block">
                            <a href="shop.html">
                                <div class="cat-icon">
                                    <i class="pe-7s-display1"></i>
                                </div>
                                <div class="cat-link">
                                    Computers
                                </div>
                            </a>
                        </div>
                        <div class="single-category category-3 text-center d-inline-block">
                            <a href="shop.html">
                                <div class="cat-icon">
                                    <i class="pe-7s-phone"></i>
                                </div>
                                <div class="cat-link">
                                    Computers
                                </div>
                            </a>
                        </div>
                        <div class="single-category category-3 text-center d-inline-block">
                            <a href="shop.html">
                                <div class="cat-icon">
                                    <i class="pe-7s-cup"></i>
                                </div>
                                <div class="cat-link">
                                    Accessories
                                </div>
                            </a>
                        </div>
                        <div class="single-category category-3 text-center d-inline-block">
                            <a href="shop.html">
                                <div class="cat-icon">
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="cat-link">
                                    Appliances
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-tabs">
                <div class="tab-list">
                    <ul class="" id="myTab2" role="tablist">
                        <li class="" role="presentation">
                            <button class=" " data-bs-toggle="tab" data-bs-target="#tab1"
                                type="">Sản phẩm mới nhất</button>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab2" type="button">Television
                                (05)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab3" type="button">Accessories (03)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab4" type="button">Smartphones (06)</button>
                        </li> -->
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1">
                        <div class="swiper-container tab-product-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        @foreach ( $products as $item )

                                        <div class="product-top">

                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Danh mục</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="{{ url('/index/' . $item->id) }}">
                                                    <img src="{{ Storage::url($item->image) }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="{{ url('/index/' . $item->id) }}">{{ $item->name }}</a></h4>
                                            <div class="price-box">
                                                <span class="price"><del>{{ $item->price }}</del> <span
                                                        class="active">{{ $item->price }}</span></span>
                                                <!-- <a href="single-product.html">+ Select Option</a> -->
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <div class="swiper-container tab-product-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">gAMES, Office</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/4.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Samsung Galaxy S8+ Black
                                                    White 64GB</a></h4>
                                            <div class="price-box">
                                                <span class="price"><del>$150.99</del> <span
                                                        class="active">$205.00</span></span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Computers, Office</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/5.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">ES62-T Steam Iron Nonstick
                                                    with Soleplate</a></h4>
                                            <div class="price-box">
                                                <span class="price">$175.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Speakers</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/1.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Apple iPhone 5s 4.785-Inch
                                                    Black 128GB</a></h4>
                                            <div class="price-box">
                                                <span class="price"><del>$150.99</del> <span
                                                        class="active">$205.00</span></span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Headphones</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/2.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Ultra Wireless S5 Headphone
                                                    with Bluetooth</a></h4>
                                            <div class="price-box">
                                                <span class="price">$180.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">sMARTPhones</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/3.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">MacBook Pro Retina Touch
                                                    Core 16GB</a></h4>
                                            <div class="price-box">
                                                <span class="price">$228.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3">
                        <div class="swiper-container tab-product-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Speakers</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/1.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Apple iPhone 5s 4.785-Inch
                                                    Black 128GB</a></h4>
                                            <div class="price-box">
                                                <span class="price"><del>$150.99</del> <span
                                                        class="active">$205.00</span></span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Headphones</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/2.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Ultra Wireless S5 Headphone
                                                    with Bluetooth</a></h4>
                                            <div class="price-box">
                                                <span class="price">$180.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">sMARTPhones</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/3.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">MacBook Pro Retina Touch
                                                    Core 16GB</a></h4>
                                            <div class="price-box">
                                                <span class="price">$228.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">gAMES, Office</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/4.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Samsung Galaxy S8+ Black
                                                    White 64GB</a></h4>
                                            <div class="price-box">
                                                <span class="price"><del>$150.99</del> <span
                                                        class="active">$205.00</span></span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Computers, Office</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="assets/img/product/5.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">ES62-T Steam Iron Nonstick
                                                    with Soleplate</a></h4>
                                            <div class="price-box">
                                                <span class="price">$175.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab4">
                        <div class="swiper-container tab-product-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">gAMES, Office</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/4.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Samsung Galaxy S8+ Black
                                                    White 64GB</a></h4>
                                            <div class="price-box">
                                                <span class="price"><del>$150.99</del> <span
                                                        class="active">$205.00</span></span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Computers, Office</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/5.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">ES62-T Steam Iron Nonstick
                                                    with Soleplate</a></h4>
                                            <div class="price-box">
                                                <span class="price">$175.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Speakers</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/1.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Apple iPhone 5s 4.785-Inch
                                                    Black 128GB</a></h4>
                                            <div class="price-box">
                                                <span class="price"><del>$150.99</del> <span
                                                        class="active">$205.00</span></span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">Headphones</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/2.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">Ultra Wireless S5 Headphone
                                                    with Bluetooth</a></h4>
                                            <div class="price-box">
                                                <span class="price">$180.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-4">
                                        <div class="product-top">
                                            <div class="wrap">
                                                <span class="epix-p-subtitle">sMARTPhones</span>
                                                <div class="actions">
                                                    <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                    <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="thumb">
                                                <div class="epix-action">
                                                    <a href="single-product.html" class="p-cart product-popup-toggle">
                                                        <i class="fal fa-eye"></i>
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                    <a href="shop.html" class="p-cart">
                                                        <i class="fal fa-shopping-cart"></i>
                                                        <i class="fal fa-shopping-cart"></i>
                                                    </a>
                                                </div>
                                                <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/3.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4><a href="single-product.html">MacBook Pro Retina Touch
                                                    Core 16GB</a></h4>
                                            <div class="price-box">
                                                <span class="price">$228.00</span>
                                                <a href="single-product.html">+ Select Option</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. product tab -->
        </div>
    </div>
    <!-- category area end -->
    <!-- offer banner 2 start -->
    <div class="offer-banner-2 pt-110 pb-110 bg-default mb-100"
        data-background="assets/img/banner/offer-banner-3.jpg">
        <div class="container">
            <div class="offer-banner-2-content pt-60 pb-35">
                <div class="offer-product-box">
                    <img src="{{asset('laptop/assets/img/product/2.jpg')}}" alt="">
                </div>
                <div class="offer-product-content">
                    <div class="wrap">
                        <span class="epix-p-subtitle d-block">Headpones, Office</span>
                        <h3 class="title"><a href="single-product.html">Denon AH-D7100 Music Maniac <br>
                                Headphones</a></h3>
                        <div class="price-box">
                            <span class="price"><span class="active">$205.00</span></span>
                            <a href="single-product.html">+ Select Option</a>
                        </div>
                    </div>
                    <div class="offer-label mb-15">
                        <span>Hurry up! Offer ends in:</span>
                    </div>
                    <div class="deals-countdown deals-countdown-2 mb-25">
                        <div class="countdown-inner" data-countdown="" data-date="Mar 02 2022 20:20:22">
                            <ul>
                                <li><span data-days="">401</span> Days</li>
                                <li><span data-hours="">1</span> Hours</li>
                                <li><span data-minutes="">29</span> min</li>
                                <li><span data-seconds="">40</span> sec</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offer banner 2 end -->
    <!-- trending product area start -->
    <div class="trending-product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-lg-3 trending-col-1">
                    <div class="trending-banner">
                        <a href="shop.html"><img src="{{asset('laptop/assets/img/banner/trending-banner.jpg')}}" class="img-fluid" alt=""></a>
                        <div class="t-banner-content">
                            <a href="shop.html" class="epix-white-btn-2">Smart Phone</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-lg-9 trending-col-2">
                    <div class="trending-right border-bottom-1 mb-25">
                        <div class="row align-items-end">
                            <div class="col-xxl-6 col-md-6">
                                <div class="epix-section-title-4">
                                    <h3 class="s-title">Trending Products</h3>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div class="product-tabs-2">
                                    <ul class="nav justify-content-md-end" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab-1-1"
                                                type="button">On Sell</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="" data-bs-toggle="tab" data-bs-target="#tab-1-2"
                                                type="button" role="tab">Htot Sell</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="" data-bs-toggle="tab" data-bs-target="#tab-1-3"
                                                type="button">Trend</button>
                                        </li>
                                        <li class="nav-item" role="presentation">

                                            <button class="" data-bs-toggle="tab" data-bs-target="#tab-1-4"
                                                type="button">Best Sell</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-2">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-1-1">
                                <div class="trending-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Headphones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/11.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">20W Universal World Travel <br>
                                                            New Converter</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$240.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">sMARTPhones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/12.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Vantech VP-153C Camera <br>
                                                            Full HDM</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$188.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">gAMES, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/13.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Acer 11.6 Chromebook Intel <br>
                                                            Celeron 12GB</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$150.99</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Computers, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/14.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">ES62-T Steam Iron Nonstick <br>
                                                            with Soleplate</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$190.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-1-2">
                                <div class="trending-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Computers, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/15.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">ES62-T Steam Iron Nonstick <br>
                                                            with Soleplate</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$190.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Headphones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/16.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">20W Universal World Travel <br>
                                                            New Converter</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$240.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">sMARTPhones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/17.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Vantech VP-153C Camera <br>
                                                            Full HDM</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$188.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">gAMES, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/18.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Acer 11.6 Chromebook Intel <br>
                                                            Celeron 12GB</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$150.99</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-1-3">
                                <div class="trending-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">sMARTPhones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/17.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Vantech VP-153C Camera <br>
                                                            Full HDM</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$188.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">gAMES, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/18.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Acer 11.6 Chromebook Intel <br>
                                                            Celeron 12GB</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$150.99</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Computers, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/15.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">ES62-T Steam Iron Nonstick <br>
                                                            with Soleplate</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$190.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Headphones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/16.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">20W Universal World Travel <br>
                                                            New Converter</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$240.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-1-4">
                                <div class="trending-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">sMARTPhones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/17.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Vantech VP-153C Camera <br>
                                                            Full HDM</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$188.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">gAMES, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/18.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Acer 11.6 Chromebook Intel <br>
                                                            Celeron 12GB</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$150.99</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Computers, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/15.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">ES62-T Steam Iron Nonstick <br>
                                                            with Soleplate</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$190.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Headphones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/16.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">20W Universal World Travel <br>
                                                            New Converter</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$240.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- trending product area end -->
    <!-- featured product area start -->
    <div class="featured-product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-lg-3 trending-col-1">
                    <div class="trending-banner">
                        <a href="shop.html"><img src="{{asset('laptop/assets/img/banner/featured-banner.jpg')}}" class="img-fluid" alt=""></a>
                        <div class="t-banner-content">
                            <a href="shop.html" class="epix-white-btn-2">Smart Phone</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-lg-9 trending-col-2">
                    <div class="trending-right border-bottom-1 mb-25">
                        <div class="row align-items-end">
                            <div class="col-xxl-6 col-md-6">
                                <div class="epix-section-title-4">
                                    <h3 class="s-title">Featured Products</h3>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div class="product-tabs-2">
                                    <ul class="nav justify-content-md-end" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab-2-1"
                                                type="button">16% Off</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="" data-bs-toggle="tab" data-bs-target="#tab-2-2"
                                                type="button" role="tab">25% Off</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="" data-bs-toggle="tab" data-bs-target="#tab-2-3"
                                                type="button">33% Off</button>
                                        </li>
                                        <li class="nav-item" role="presentation">

                                            <button class="" data-bs-toggle="tab" data-bs-target="#tab-2-4"
                                                type="button">45%Off</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-2">
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="tab-2-1">
                                <div class="trending-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">gAMES, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img
                                                                src="{{asset('laptop/assets/img/product/featured-pro-1.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Leoaa Powerbeat Wireless<br>
                                                            in Ear Head</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$240.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Headphones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img
                                                                src="{{asset('laptop/assets/img/product/featured-pro-2.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Head Powerbeats Wireless <br>
                                                            In Ear VN</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$210.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Computers, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img
                                                                src="{{asset('laptop/assets/img/product/featured-pro-3.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Pc Del – 11.6 Chromebook <br>
                                                            With Intenet</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$150.99</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">sMARTPhones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-4.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Sony Alpha A60 Mirrorless<br>
                                                            Camera</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$190.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2-2">
                                <div class="trending-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Computers, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="assets/img/product/trending-4.jpg"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">ES62-T Steam Iron Nonstick <br>
                                                            with Soleplate</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$190.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Headphones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-1.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">20W Universal World Travel <br>
                                                            New Converter</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$240.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">sMARTPhones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-2.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Vantech VP-153C Camera <br>
                                                            Full HDM</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$188.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">gAMES, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-3.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Acer 11.6 Chromebook Intel <br>
                                                            Celeron 12GB</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$150.99</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2-3">
                                <div class="trending-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Headphones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-1.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">20W Universal World Travel <br>
                                                            New Converter</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$240.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">sMARTPhones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-2.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Vantech VP-153C Camera <br>
                                                            Full HDM</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$188.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">gAMES, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-3.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Acer 11.6 Chromebook Intel <br>
                                                            Celeron 12GB</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$150.99</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Computers, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-4.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">ES62-T Steam Iron Nonstick <br>
                                                            with Soleplate</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$190.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2-4">
                                <div class="trending-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Computers, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-4.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">ES62-T Steam Iron Nonstick <br>
                                                            with Soleplate</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$190.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">Headphones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-1.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">20W Universal World Travel <br>
                                                            New Converter</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$240.00</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">sMARTPhones</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-2.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Vantech VP-153C Camera <br>
                                                            Full HDM</a></h4>
                                                    <div class="price-box">
                                                        <span class="price"><del>$150.00</del><span
                                                                class="active">$188.00</span></span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="single-product-4 single-trending-product">
                                                <div class="product-top">
                                                    <div class="wrap">
                                                        <span class="epix-p-subtitle">gAMES, Office</span>
                                                        <div class="actions">
                                                            <a href="single-product.html"><i class="fal fa-compress-alt"></i></a>
                                                            <a href="cart.html"><i class="fal fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="thumb">
                                                        <div class="epix-action">
                                                            <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                <i class="fal fa-eye"></i>
                                                                <i class="fal fa-eye"></i>
                                                            </a>
                                                            <a href="shop.html" class="p-cart">
                                                                <i class="fal fa-shopping-cart"></i>
                                                                <i class="fal fa-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                        <a href="single-product.html"> <img src="{{asset('laptop/assets/img/product/trending-3.jpg')}}"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="single-product.html">Acer 11.6 Chromebook Intel <br>
                                                            Celeron 12GB</a></h4>
                                                    <div class="price-box">
                                                        <span class="price">$150.99</span>
                                                        <a href="single-product.html">+ Select Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured product area end -->
    <!-- banner area 2 start -->
    <div class="banner-area-2 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-lg-6">
                    <div class="banner-3-1 style-2 mb-30">
                        <div class="thumb">
                            <img src="{{asset('laptop/assets/img/banner/banner-2-1.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <h3>Earburds</h3>
                            <p>Epixx is World largest marketplace<br>
                                connecting buyers suppliers.</p>
                            <a href="shop.html" class="transparent-btn text-capitalize rounded-0">Purchase It <i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6">
                    <div class="banner-3-1 style-2 mb-30">
                        <div class="thumb">
                            <img src="{{asset('laptop/assets/img/banner/banner-2-2.jpg')}}" class="img-fluid" alt="">
                        </div>
                        <div class="content">
                            <h3>Monitors</h3>
                            <p>Epixx is World largest marketplace<br>
                                connecting buyers suppliers.</p>
                            <a href="shop.html" class="transparent-btn text-capitalize rounded-0">Explore Now <i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner area 2 end -->
    <!-- subscribe center area start -->
    <div class="subscribe-center-area bg-gray-2 pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <div class="subscribe-wrap">
                        <div class="subscribe-left text-center mb-35">
                            <h4>Subscribe Now &<br>
                                Get Product Discount 10%</h4>
                        </div>
                        <div class="d-block text-center">
                            <div class="epix-subscribe-form epix-subscribe-form-2">
                                <form action="#" class="mb-20">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Your Email">
                                        <button type="submit">SUBMIT</button>
                                    </div>
                                </form>
                            </div>
                            <div class="hint">
                                <p>Will be used in accordance with our <a href="contact.html">Privacy Policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6">
                   <div class="brand-wrap">
                    <div class="row">
                        <div class="col-xxl-4 col-6 col-md-4">
                            <div class="brand-logo mb-55">
                                <a href="contact.html"><img src="{{asset('laptop/assets/img/brand/brand2/brand.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-6 col-md-4">
                            <div class="brand-logo mb-55">
                                <a href="shop.html"><img src="{{asset('laptop/assets/img/brand/brand2/brand2.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-6 col-md-4">
                            <div class="brand-logo mb-55">
                                <a href="shop.html"><img src="{{asset('laptop/assets/img/brand/brand2/brand3.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-6 col-md-4">
                            <div class="brand-logo mb-55">
                                <a href="shop.html"><img src="{{asset('laptop/assets/img/brand/brand2/brand4.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-6 col-md-4">
                            <div class="brand-logo mb-55">
                                <a href="shop.html"><img src="{{asset('laptop/assets/img/brand/brand2/brand5.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-6 col-md-4">
                            <div class="brand-logo mb-55">
                                <a href="shop.html"><img src="{{asset('laptop/assets/img/brand/brand2/brand6.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe center area end -->
</main>
@endsection
