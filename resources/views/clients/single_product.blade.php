@extends('clients.master')
@section('content')
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
    <!-- breadcrumb area start -->
    <div class="epix-breadcrumb-area mb-40">
        <div class="container">
            <h4 class="epix-breadcrumb-title">SHOP PAGE</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="index-3.html">Home</a></li>
                    <li><span>Shop Page</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- single product area start -->
    <div class="single-product-area mb-100">
        <div class="container">
            <div class="row mb-40">
                <div class="col-xxl-6 col-lg-6">
                    <div class="epix-single-product-left mr-35">
                        <div class="epix-tab-product mb-15">
                            <div class="epix-product-tab-content">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="epix-single-1">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>featured</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-1.jpg')}}" data-zoom-image="{{asset('laptop/assets/img/product/signle-product-1.jpg')}}" class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-2">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>new</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-2.jpg')}}" data-zoom-image="{{asset('laptop/assets/img/product/signle-product-2.jpg')}}" class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-3">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>hot</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-3.jpg')}}" data-zoom-image="{{asset('laptop/assets/img/product/signle-product-3.jpg')}}" class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-4">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>featured</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-4.jpg')}}" data-zoom-image="{{asset('laptop/assets/img/product/signle-product-4.jpg')}}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="epix-tab-content">
                            <ul class="nav nav-pills mb-3" id="epix-single-product-tab" role="tablist">
                                <li>
                                    <button class="active" value="1" data-bs-toggle="pill" data-bs-target="#epix-single-1"
                                        type="button">
                                        <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-1.jpg')}}" alt="">
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-toggle="pill"  value="2" data-bs-target="#epix-single-2"
                                        type="button">
                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-2.jpg')}}" alt="">
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-toggle="pill"  value="3" data-bs-target="#epix-single-3"
                                        type="button">
                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-3.jpg')}}" alt="">
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-toggle="pill"  value="4" data-bs-target="#epix-single-4"
                                        type="button">
                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-4.jpg')}}" alt="">
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /. single product left -->
                </div>
                <div class="col-xxl-6 col-lg-6">

                    <div class="epix-single-product-right">
                        <div class="rating">
                            <i class="fas fa-star active"></i>
                            <i class="fas fa-star active"></i>
                            <i class="fas fa-star active"></i>
                            <i class="fas fa-star-half"></i>
                            <i class="fas fa-star text-gray"></i>
                        </div>
                        <h4 class="epix-single-product-title">{{ $products->name }}<br></h4>
                        <!-- <p class="epix-product-details-short-description">
                            Screen Size: 8 Inches<br>
                            Screen Resolution: 1280 x 800 pixels
                        </p> -->
                        <p class="epix-product-details-short-description">
                        {{ $products->content_short }}
                        </p>
                        <p class="price">
                            <span class="epix-price-amount">
                                <bdi>
                                    <span class="epix-price-currency-symbol">VNĐ</span>
                                    {{ $products->price }}

                                </bdi>
                            </span>
                            <span class="devider">-</span>
                            <span class="epix-price-amount">
                                <bdi>
                                    <span class="epix-price-currency-symbol">VNĐ</span>
                                    {{ $products->price }}
                                </bdi>
                            </span>
                        </p>
                        <form action="#" class="epix-cart-variation">
                            <div class="epix-product-label mb-35">
                                <a  href="#" class="title">Biến thể</a>
                                <div class="taglist">
                                    <a href="shop.html">Core i5</a>
                                    <a href="shop.html">Core i7</a>
                                    <a href="shop.html">Core i9</a>
                                </div>
                            </div>
                            <div class="epix-quantity-validation">
                                <div class="wrap-2 d-block d-sm-inline-block mb-15 mb-sm-0">
                                    <div class="d-inline-block border-gray mr-20">
                                        <div class="epix-quantity-form">
                                            <div class="cart-plus-minus"></div>
                                            <input type="text" value="2">
                                        </div>
                                    </div>
                                    <a href="cart.html" class="cart-btn mr-15">Add to cart</a>
                                </div>
                                <a href="checkout.html" class="buy-btn d-block d-sm-inline-block text-center text-sm-left">Buy Now</a>
                            </div>
                        </form>
                    </div>
                    <!-- /. single product right -->
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="epix-single-product-description">
                        <div class="epix-single-product-description-tabs-wrap mb-20">
                            <div class="epix-single-product-description-tab">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="active" data-bs-toggle="pill" data-bs-target="#tab-1-1"
                                            type="button">DESCRIPTION</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button data-bs-toggle="pill"  data-bs-target="#tab-1-2" type="button">Additional information</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button data-bs-toggle="pill" data-bs-target="#tab-1-3" type="button">Reviews (3)</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="epix-single-product-description-content-wrap">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="tab-1-1" role="tabpanel">
                                        <div class="epix-single-product-content">
                                        {{ $products->content }}
                                            <div class="row">
                                                <div class="col-xxl-7">
                                                    <div class="epix-featured-list">
                                                        <h4 class="epix-featured-list-title">Technical Details</h4>
                                                        <ul>
                                                            <li>
                                                                <span>Device Length :</span>
                                                                <span>Dimensions 2024*3068</span>
                                                            </li>
                                                            <li>
                                                                <span>Type :</span>
                                                                <span>Rechargeable Lithium battery</span>
                                                            </li>
                                                            <li>
                                                                <span>USB :</span>
                                                                <span>Type-C fast charge</span>
                                                            </li>
                                                            <li>
                                                                <span>USB:</span>
                                                                <span>Type-C fast charge</span>
                                                            </li>
                                                            <li>
                                                                <span>Warranty :</span>
                                                                <span>30 Days Warenty</span>
                                                            </li>
                                                            <li>
                                                                <span>Processor Count :</span>
                                                                <span>30 Days Warenty</span>
                                                            </li>
                                                            <li>
                                                                <span>Device Length :</span>
                                                                <span>Dimensions 2024*3068</span>
                                                            </li>
                                                            <li>
                                                                <span>Type :</span>
                                                                <span>Rechargeable Lithium battery</span>
                                                            </li>
                                                            <li>
                                                                <span>USB :</span>
                                                                <span>Type-C fast charge</span>
                                                            </li>
                                                            <li>
                                                                <span>USB:</span>
                                                                <span>Type-C fast charge</span>
                                                            </li>
                                                            <li>
                                                                <span>Warranty :</span>
                                                                <span>30 Days Warenty</span>
                                                            </li>
                                                            <li>
                                                                <span>Processor Count :</span>
                                                                <span>30 Days Warenty</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-1-2" role="tabpanel">
                                        <div class="epix-additional-product-information">
                                             <div class="epix-product-table">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th>Color</th>
                                                            <td>
                                                                <a href="shop.html">Yellow</a>
                                                                <a href="shop.html">Red</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Dimention</th>
                                                            <td>
                                                                <a href="shop.html"><span>1200 * 500px</span></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>BRAND</th>
                                                            <td>
                                                                <a href="shop.html">MANGO</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>LOOK AFTER ME</th>
                                                            <td>
                                                                <a href="shop.html">Wipe clean only</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-1-3" role="tabpanel">
                                        <div class="epix-review-content mb-40">
                                            <h4 class="epix-review-content-title">3 reviews for Microsoft Surface Laptop 3-15” Touch-Screen</h4>
                                            <div class="epix-rating-count-wrap">
                                                <div class="epix-rating-count-left-content">
                                                    <h5>CUSTOMER REVIEWS</h5>
                                                    <div class="epix-rating-flex-wrap">
                                                        <div class="row g-0">
                                                            <div class="col-xxl-2 col-md-4">
                                                                <div class="epix-rating-count-number-box text-center">
                                                                    <div class="epix-rating-count-number">
                                                                        <h4>4.33</h4>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                    <span class="review-subtitle">Based on 3 reviews</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-8 col-md-8">
                                                                <div class="epix-count-right-progress">
                                                                    <div class="single-progress-list">
                                                                        <div class="rating">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="epix-rating-progress">
                                                                            <div class="progress-count" data-width="72%"></div>
                                                                        </div>
                                                                        <div class="count">
                                                                            <span>55</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="single-progress-list">
                                                                        <div class="rating">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="epix-rating-progress">
                                                                            <div class="progress-count" data-width="32%"></div>
                                                                        </div>
                                                                        <div class="count">
                                                                            <span>32</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="single-progress-list">
                                                                        <div class="rating">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="epix-rating-progress">
                                                                            <div class="progress-count" data-width="44%"></div>
                                                                        </div>
                                                                        <div class="count">
                                                                            <span>44</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="single-progress-list">
                                                                        <div class="rating">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="epix-rating-progress">
                                                                            <div class="progress-count" data-width="93%"></div>
                                                                        </div>
                                                                        <div class="count">
                                                                            <span>93</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="single-progress-list">
                                                                        <div class="rating">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="epix-rating-progress">
                                                                            <div class="progress-count" data-width="65%"></div>
                                                                        </div>
                                                                        <div class="count">
                                                                            <span>65</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xxl-10">
                                                <ul class="epix-commentlist mb-50">
                                                    <li class="epix-comment-item">
                                                        <div class="epix-comment-thumb">
                                                            <img src="{{asset('laptop/assets/img/user/user-1.png')}}" alt="">
                                                        </div>
                                                        <div class="epix-comment-content">
                                                            <div class="epix-comment-top">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="user-name"><a href="blog.html">John Park</a></div>
                                                                <span class="date">– December 14, 2020</span>
                                                            </div>
                                                            <div class="epix-comment-bottom">
                                                                <p>This is an awesome product which is was really good.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="epix-comment-item">
                                                        <div class="epix-comment-thumb">
                                                            <img src="{{asset('laptop/assets/img/user/user-2.png')}}" alt="">
                                                        </div>
                                                        <div class="epix-comment-content">
                                                            <div class="epix-comment-top">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="user-name"><a href="blog.html">Yahun Branze</a></div>
                                                                <span class="date">– February 16, 2020</span>
                                                            </div>
                                                            <div class="epix-comment-bottom">
                                                                <p>This is an awesome product which is was really good.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="epix-comment-item">
                                                        <div class="epix-comment-thumb">
                                                            <img src="{{asset('laptop/assets/img/user/user-3.png')}}" alt="">
                                                        </div>
                                                        <div class="epix-comment-content">
                                                            <div class="epix-comment-top">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="user-name"><a href="blog.html">Md Hemal Akhand</a></div>
                                                                <span class="date">– February 12, 2021</span>
                                                            </div>
                                                            <div class="epix-comment-bottom">
                                                                <p>This is an awesome product was really good.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="epix-review-form-wrapper">
                                                    <h4 class="epix-review-title">Add a review</h4>
                                                    <form action="https://www.devsnews.com/template/epixx-prev/epixx/post">
                                                        <p class="epix-comment-notes">Your email address will not be published. Required fields are marked *</p>
                                                        <div class="row">
                                                            <div class="col-xxl-12">
                                                                <div class="epix-comment-form-rating">
                                                                    <div class="epix-comment-form-rating-label">
                                                                        <div class="row">
                                                                            <div class="col-xxl-12">
                                                                                <div class="epix-wrapper mb-6">
                                                                                    <span class="rating-label d-inline-block">Your rating <span>*</span></span>
                                                                                    <div class="rating d-inline-block">
                                                                                        <i class="fas fa-star"></i>
                                                                                        <i class="fas fa-star"></i>
                                                                                        <i class="fas fa-star"></i>
                                                                                        <i class="fal fa-star"></i>
                                                                                        <i class="fal fa-star"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xxl-12">
                                                                                <div class="epix-wrapper mb-10">
                                                                                    <label for="review" class="rating-label d-block mb-15">Your review
                                                                                        <span>*</span></label>
                                                                                    <textarea name="review" id="review" cols="30" rows="10"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-35">
                                                            <div class="col-xxl-6 col-lg-6">
                                                                <label for="name" class="rating-label d-block mb-15">Name <span>*</span></label>
                                                                <input type="text" id="name">
                                                            </div>
                                                            <div class="col-xxl-6 col-lg-6">
                                                                <label for="email" class="rating-label d-block mb-15">Email <span>*</span></label>
                                                                <input type="email" id="email">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xxl-12">
                                                                <button type="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
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
    <!-- single product area end -->
@endsection
