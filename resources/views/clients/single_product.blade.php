@extends('clients.master')
@section('content')
    <div class="container">
        @if (session('message'))
            <div id="notification" class="notification alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if (session('message1'))
            <div id="notification" class="notification1 alert alert-danger" role="alert">
                {{ session('message1') }}
            </div>
        @endif

        <!-- Other content here -->
    </div>

    <style>
        .notification1 {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #d4edda;
            /* Màu xanh nhạt */
            color: #155724;
            /* Màu chữ xanh đậm */
        }
    </style>
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
        document.addEventListener('DOMContentLoaded', function () {
            var notification = document.getElementById('notification');

            if (notification) {
                // Show the notification
                notification.style.display = 'block';

                // Hide the notification after 5 seconds
                setTimeout(function () {
                    notification.style.display = 'none';
                }, 8000);

                // Optional: Add hover effect to keep it visible
                notification.addEventListener('mouseenter', function () {
                    notification.style.display = 'block';
                });

                notification.addEventListener('mouseleave', function () {
                    notification.style.display = 'none';
                });
            }
        });
    </script>

    <style>
        .rounded:hover {
            color: rgb(20, 178, 252);
            /* Đổi màu đỏ đậm khi hover */
            font-weight: bold;
            /* Chữ đậm khi hover */
        }

        .variant-container {
            display: flex;
            gap: 10px;
            margin-top: 10px;

            flex-wrap: wrap;
            /* Cho phép các phần tử xuống dòng */
            justify-content: center;
            /* Căn giữa các phần tử ngang */

            width: 100%;
            /* Chiều rộng của container */
        }

        .variant-box {
            line-height: 30px;
            min-width: 80px;
            min-height: 30px;
            padding: 0 10px;
            text-align: center;
            display: inline-block;
            background-color: #fafafa;
            text-decoration: none;
            margin-right: 5px;
        }


        .variant-box input[type="radio"] {
            display: none;
            /* Ẩn radio button */
        }


        .price-display {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .page-header {
            background-size: cover;
            background-position: center;
            padding: 50px 0;
            color: #fff;
        }

        .page-header .page-title {
            font-size: 2.5rem;
            margin: 0;
        }

        .breadcrumb-nav {
            margin: 20px 0;
        }

        .breadcrumb-nav .breadcrumb {
            background: none;
            padding: 0;
        }

        .breadcrumb-nav .breadcrumb-item a {
            color: #007bff;
        }

        .breadcrumb-nav .breadcrumb-item.active {
            color: #6c757d;
        }

        /* Định dạng cho phần nội dung */
        .page-content {
            padding: 30px 0;
        }

        .rating {
            direction: rtl;
            display: inline-block;
            font-size: 2rem;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            color: #d3d3d3;
            cursor: pointer;
            font-size: 2rem;
            transition: color 0.3s;
        }

        .rating input[type="radio"]:checked ~ label {
            color: #f39c12;
        }

        .rating label:hover,
        .rating label:hover ~ label {
            color: #f39c12;
        }

        .variant-item {
            flex: 0 0 calc(50% - 10px);
            /* Mỗi ô chiếm 50% chiều rộng, trừ khoảng cách giữa các ô */
            box-sizing: border-box;
            /* Đảm bảo padding và border không ảnh hưởng đến kích thước */
            border: 1px solid #ccc;
            /* Đường viền */
            text-align: center;
            /* Căn giữa nội dung trong ô */
            /* padding: 10px; */
            /* Khoảng cách bên trong ô */
            background-color: #f9f9f9;
            /* Màu nền ô */
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Khi hover vào variant, thay đổi màu nền */
        .variant-box:hover {
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Khi variant được chọn, thay đổi màu nền và chữ thành màu trắng */
        .variant-box.selected {
            background-color: var(--selected-color);
            /* Màu nền từ variant */
            color: white;
            /* Đổi màu chữ thành trắng */
        }

        /* Đổi màu chữ của label khi variant-box được chọn */
        .variant-box.selected label {
            color: white;
            /* Màu chữ của label khi variant được chọn */
        }

        /* Thêm style cho radio button nhỏ lại */
        .variant-box input[type="radio"] {
            width: 16px;
            height: 16px;
            margin-right: 10px;
        }

        /* Thêm style cho label */
        .variant-box label {
            cursor: pointer;
            transition: color 0.3s ease;
            /* Thêm hiệu ứng chuyển màu cho chữ */
        }

        .search-results {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            width: 100%;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
        }

        .search-results .result-item {
            padding: 10px;
            cursor: pointer;
        }

        .search-results .result-item:hover {
            background-color: #f0f0f0;
        }

        .hidden {
            display: none;
        }

        .same-product .row {
            display: flex;
            flex-wrap: wrap;
            /* Đảm bảo các sản phẩm tự động xuống hàng */
            gap: 19px;
            /* Khoảng cách giữa các sản phẩm */
            justify-content: space-between;
            /* Cân đối các sản phẩm trong hàng */
        }

        .same-product .col-xxl-3 {
            flex: 0 0 calc(25% - 20px);
            /* Mỗi sản phẩm chiếm 25% chiều rộng hàng */
            max-width: calc(25% - 20px);
            /* Giới hạn chiều rộng tối đa */
            box-sizing: border-box;
        }

        .epix-single-product-3 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .same-product .row {
            display: flex;
            flex-wrap: wrap;
            /* Tự động xuống hàng nếu vượt quá số cột */
            gap: 20px;
            /* Khoảng cách giữa các cột */
        }

        .same-product .col-xxl-3 {
            flex: 0 0 calc(25% - 20px);
            /* Đảm bảo chiếm 1/4 hàng */
            max-width: calc(25% - 20px);
            box-sizing: border-box;
        }

        .title-container {
            display: flex;
            justify-content: center;
            /* Căn giữa theo chiều ngang */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            height: 50px;
            /* Đặt chiều cao nếu cần */
        }

        /* Định dạng cho khung của mỗi cấu hình */
        /* Khi người dùng hover vào cấu hình */
        /* Khi người dùng hover vào cấu hình */
        .epix-product-label {
            margin-bottom: 35px;
        }

        .variant-option {
            margin-bottom: 15px;
        }

        /* Định dạng cho input radio */
        input[type="radio"] {
            display: none; /* Ẩn radio button mặc định */
        }

        /* Định dạng cho các label chứa cấu hình */
        .variant-option label {
            display: inline-block;
            padding: 12px 20px;
            background-color: #f9f9f9;
            border: 2px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
            width: 100%;
            text-align: center;
        }

        /* Hover effect: khi người dùng hover vào cấu hình */
        .variant-option label:hover {
            background-color: #f1f1f1;
            border-color: #007bff;
        }

        /* Khi chọn cấu hình, thay đổi viền và nền */
        input[type="radio"]:checked + label {
            background-color: #e6f7ff;
            border-color: #007bff;
            color: #007bff;
            font-weight: bold;
        }

        /* Định dạng cho thông tin cấu hình (ram, memory) */
        .variant-option label {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60px; /* Đảm bảo các label có cùng chiều cao */
        }

        /* Định dạng cho thẻ a có class title */
        .epix-product-label .title {
            font-weight: bold;
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        /* Định dạng cho giá cả khi có flash sale */
        .flash-sale-price {
            font-weight: bold;
            color: #d9534f;
            font-size: 18px;
        }

        .original-price {
            color: #999;
            font-size: 16px;
        }

        /* Định dạng cho variant-details (hiển thị giá và số lượng) */
        .variant-details {
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            display: none; /* Đảm bảo nó được ẩn mặc định */
        }

        /* Hiển thị thông tin khi chọn variant */
        .variant-option input[type="radio"]:checked + label + .variant-details {
            display: block; /* Hiển thị thông tin khi chọn cấu hình */
        }

        /* Định dạng khi giá và số lượng hiển thị */
        .variant-details p {
            margin: 5px 0;
        }

        /* Định dạng cho input khi disabled */
        input[type="radio"]:disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }

        /* Thay đổi màu khi label của variant hết hàng */
        .variant-option input[type="radio"]:disabled + label {
            color: #bbb; /* Thay đổi màu label khi sản phẩm hết hàng */
        }

        .variant-option input[type="radio"]:disabled + label:hover {
            text-decoration: none; /* Không thể hover khi disabled */
        }



    </style>

    {{-- @php
        use App\Models\Product;

        $product_parent = Product::where('product_parent', $products->product_parent)
        ->with(['category', 'flashSale'])
        ->get();

        $product_parent_1 = Product::where('id',$products->product_parent)->with(['category', 'flashSale'])->first();

    @endphp --}}
        <!-- breadcrumb area start -->
    <div class="epix-breadcrumb-area mb-40">
        <div class="container">
            <h4 class="epix-breadcrumb-title">Chi Tiết Sản Phẩm</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="index-3.html">Trang chủ</a></li>
                    <li><span>Chi Tiết Sản Phẩm</span></li>
                </ul>
            </div>
            </style>
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
                                                            {{-- <span>featured</span> --}}
                                                            @if ($products->isOnFlashSale())
                                                                <span class="sale">sale</span>
                                                            @endif <br>
                                                        </div>
                                                        <img style="height: 400px;width: 400px; " class="mb-2"
                                                             src="{{asset($products->image)}}"
                                                             data-zoom-image="{{asset('laptop/assets/img/product/signle-product-1.jpg')}}"
                                                             class="img-fluid zoom-img-hover" alt="">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="epix-single-2">
                                                    <div class="epix-single-product-thumb-4">
                                                        <div class="epix-featured">
                                                            <span>Mới</span>
                                                        </div>
                                                        <img
                                                            src="{{asset('laptop/assets/img/product/signle-product-2.jpg')}}"
                                                            data-zoom-image="{{asset('laptop/assets/img/product/signle-product-2.jpg')}}"
                                                            class="img-fluid zoom-img-hover" alt="">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="epix-single-3">
                                                    <div class="epix-single-product-thumb-4">
                                                        <div class="epix-featured">
                                                            <span>hot</span>
                                                        </div>
                                                        <img
                                                            src="{{asset('laptop/assets/img/product/signle-product-3.jpg')}}"
                                                            data-zoom-image="{{asset('laptop/assets/img/product/signle-product-3.jpg')}}"
                                                            class="img-fluid zoom-img-hover" alt="">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="epix-single-4">
                                                    <div class="epix-single-product-thumb-4">
                                                        <div class="epix-featured">
                                                            <span>featured</span>
                                                        </div>
                                                        <img
                                                            src="{{asset('laptop/assets/img/product/signle-product-4.jpg')}}"
                                                            data-zoom-image="{{asset('laptop/assets/img/product/signle-product-4.jpg')}}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /. single product left -->
                            </div>
                            <div class="col-xxl-6 col-lg-6">


                                <div class="epix-single-product-right">
                                    <h4 class="epix-single-product-title">{{ $products->name }}<br></h4>
                                    <p class="epix-product-details-short-description">
                                        {{ $products->content_short }}
                                    </p>
                                    <div class="price-display">
                                        @if($products->isOnFlashSale())
                                            <!-- Kiểm tra nếu sản phẩm còn trong thời gian flash sale -->
                                            <span style="width: 100px" class="price flash-sale-price">{{ number_format($products->flashSale->price_sale, 0, ',', '.') }} VNĐ</span>
                                            <span style="width: 100px" class="price original-price text-muted"><del>{{ number_format($products->price, 0, ',', '.') }} VNĐ</del></span>

                                        @endif

                                    </div>

                                    <div class="epix-product-label mb-35">
                                        <a href="#" class="title">Chọn cấu hình</a>
                                        <div class="d-flex ">
                                        @foreach($products->variants as $variant)
                                            <div class="variant-option m-3">
                                                <input type="radio" {{$variant->quantity == 0 ? 'disabled' : ''}}
                                                id="variant-{{ $variant->id }}" name="product_variant_id" value="{{ $variant->id }}">
                                                <label for="variant-{{ $variant->id }}">
                                                    {{ $variant->ram }}GB - {{ $variant->memory }}GB
                                                </label>
                                                <div class="variant-details" id="details-{{ $variant->id }}" style="display: none;">
                                                    @php


                                                @endphp
                                                    @if($variant -> isInFlashSale())
                                                        @php

                                                            $flashSalePrice = $variant->getFlashSalePriceByVariantId($variant->id);
                                                        @endphp
                                                        <del>Giá: {{ number_format($variant->price) }} VND</del>
                                                        <p>Giá Flash Sale: {{ number_format($flashSalePrice) }} VND</p>
                                                    @else

                                                    <p>Giá: {{ number_format($variant->price) }} VND</p>
                                                    @endif
                                                    <p>Số lượng còn: {{ $variant->quantity }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    </div>




                                    <!-- Form để thêm vào giỏ hàng -->
                                    @if ($products->variants->sum('quantity') < 1)
                                        <button id="hethang">Hết Hàng</button>
                                    @else
                                        <div class="d-flex">
                                            <form id="addToCartForm" style="margin-top: 10px"
                                                  action="{{ route('cart.add1') }}" method="POST"
                                                  class="epix-cart-variation">
                                                @csrf
                                                @if($products->isOnFlashSale())
                                                    <input type="hidden" name="price"
                                                           value="{{ $products->flashSale->price_sale }}">
                                                @else
                                                    <input id="selected_variant" type="hidden" value="" name="product_variants">

                                                @endif

                                                <button type="submit"
                                                        class="btn-success d-block d-sm-inline-block text-center text-sm-left">
                                                    Thêm vào giỏ hàng
                                                </button>
                                            </form>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row ms-5">
                    <div class="col-xxl-12">
                        <div class="epix-single-product-description">
                            <div class="epix-single-product-description-tabs-wrap mb-20">
                                <div class="epix-single-product-description-tab">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="active" data-bs-toggle="pill" data-bs-target="#tab-1-1"
                                                    type="button">Mô Tả Sản Phẩm
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button data-bs-toggle="pill" data-bs-target="#tab-1-2" type="button">Thông
                                                Tin Cơ Bản
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button data-bs-toggle="pill" data-bs-target="#tab-1-3" type="button">Đánh
                                                giá ({{$totalReviews}})
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="epix-single-product-description-content-wrap">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="tab-1-1" role="tabpanel">
                                            <div class="epix-single-product-content">

                                                @php
                                                    echo $products->content;
                                                @endphp
                                                <div class="row">
                                                    <div class="col-xxl-7">
                                                        <div class="epix-featured-list">

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
                                                            <th>Màu</th>
                                                            <td>
                                                                <a href="">{{ $products->color }}</a>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>CPU</th>
                                                            <td>
                                                                <a href="">{{ $products->chip }}</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>Kích thước màn hình</th>
                                                            <td>
                                                                <a href="l">{{ $products->screen }}</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Độ phân giải</th>
                                                            <td>
                                                                <a href="">{{ $products->resolution }}</a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-1-3" role="tabpanel">
                                            <div class="epix-review-content mb-40">
                                                <div class="epix-rating-count-wrap">
                                                    <div class="epix-rating-count-left-content">
                                                        <h5>Đánh Giá Của Người Dùng</h5>
                                                        <div class="epix-rating-flex-wrap">
                                                            <div class="row g-0">
                                                                <div class="col-xxl-2 col-md-4">
                                                                    <div
                                                                        class="epix-rating-count-number-box text-center">
                                                                        <div class="epix-rating-count-number">
                                                                            <h4>{{ number_format($averageRating, 1) }}</h4>
                                                                            <!-- Hiển thị trung bình số sao với 1 chữ số thập phân -->
                                                                        </div>
                                                                        <div class="rating">
                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                @if ($i <=$averageRating)
                                                                                    <!-- Hiển thị sao đầy (màu vàng) -->
                                                                                    <i class="fas fa-star"
                                                                                       style="color: gold;"></i>
                                                                                @elseif ($i - 1 < $averageRating && $i> $averageRating)
                                                                                    <!-- Hiển thị sao bán phần nếu giá trị trung bình có phần thập phân -->
                                                                                    <i class="fas fa-star-half-alt"
                                                                                       style="color: gold;"></i>
                                                                                @else
                                                                                    <!-- Hiển thị sao rỗng -->
                                                                                    <i class="fal fa-star"
                                                                                       style="color: lightgray;"></i>
                                                                                @endif
                                                                            @endfor
                                                                        </div>
                                                                        <span class="review-subtitle">Đã Có {{$totalReviews}} Lượt Đánh Giá</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-8 col-md-8">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-10">
                                                    <ul id="commentList" class="epix-commentlist mb-50">
                                                        @foreach ($reviews as $review)
                                                            <li class="epix-comment-item">
                                                                <div class="epix-comment-thumb">
                                                                    <img
                                                                        src="{{ asset('laptop/assets/img/user/user-1.png') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="epix-comment-content">
                                                                    <div class="epix-comment-top">
                                                                        <div style="margin-bottom: 15px" class="rating">
                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                @if ($i <=$review->star)
                                                                                    <!-- Hiển thị sao đầy màu vàng từ trái qua phải -->
                                                                                    <i class="fas fa-star"
                                                                                       style="color: gold;"></i>
                                                                                @else
                                                                                    <!-- Hiển thị sao rỗng từ trái qua phải -->
                                                                                    <i class="fas fa-star"
                                                                                       style="color: lightgray;"></i>
                                                                                @endif
                                                                            @endfor
                                                                        </div>
                                                                        <div class="user-name"><a
                                                                                href="#">{{ $review->users_name?? 'Unknown User' }}</a>
                                                                        </div>
                                                                        <span
                                                                            class="date"> {{ $review->created_at->format('d-m-Y') }}</span>
                                                                    </div>
                                                                    <span class="date"> {{ $review->comment }}</span>

                                                                    <div class="epix-comment-bottom">
                                                                        <p>{{ $review->content }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach


                                                    </ul>
                                                    <div class="epix-review-form-wrapper">
                                                        <h4 class="epix-review-title">Thêm Đánh Giá</h4>
                                                        <form id="reviewForm" action="{{ route('post.review') }}"
                                                              method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name='product_id'
                                                                   value="{{$products->id}}">

                                                            <div class="rating">
                                                                <input type="radio" name="star" id="star5" value="5">
                                                                <label for="star5" title="5 stars">★</label>

                                                                <input type="radio" name="star" id="star4" value="4">
                                                                <label for="star4" title="4 stars">★</label>

                                                                <input type="radio" name="star" id="star3" value="3">
                                                                <label for="star3" title="3 stars">★</label>

                                                                <input type="radio" name="star" id="star2" value="2">
                                                                <label for="star2" title="2 stars">★</label>

                                                                <input type="radio" name="star" id="star1" value="1">
                                                                <label for="star1" title="1 star">★</label>
                                                            </div>
                                                            <br>
                                                            <label for="comment">Nội Dung:</label>
                                                            <textarea name="comment" id="comment"></textarea>

                                                            <button type="submit ">Đánh giá</button>
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

                <div class="row ms-5">
                    <div class="">
                        <div class="same-product">
                            <div class="title-container">
                                <h3>SẢN PHẨM TƯƠNG TỰ</h3>
                            </div>
                            <div class="row">
                                @foreach ($category as $item)
                                <div class="col-xxl-4 col-sm-6 col-md-4">
                                    <div class="epix-handpicked-product mb-50">
                                        <div class="epix-h-pro-thumb mr-35">
                                            <a href="{{ route('single_product', $item->id) }}"><img
                                                    style="margin-right: 10px" height="150px" width="150px"
                                                    src="{{ asset($item->image) }}" alt=""></a>
                                        </div>
                                        <div class="epix-h-pro-content">

                                            <div class="epix-product-content pe-0 ps-0 pt-0 pb-0">


                                                <h5 style="width: 200px" class="epix-p-title"><a
                                                        href="{{ route('single_product', $item->id) }}">{{ $item->name }}</a>
                                                </h5>
                                                <div style="width: 200px" class="price-box mb-15">

                                                    @if ($item->isOnFlashSale())
                                                        <!-- Kiểm tra nếu sản phẩm còn trong thời gian flash sale -->
                                                        <span
                                                            class="price flash-sale-price">{{ number_format($item->flashSale->price_sale, 0, ',', '.') }}
                                                            VNĐ</span>
                                                        <span class="price original-price text-muted"><del>{{ number_format($item->price, 0, ',', '.') }}
                                                                VNĐ</del></span>
                                                    @else
                                                        <span
                                                            class="price">{{ number_format($item->variants->min('price'), 0, ',', '.') }}
                                                            VNĐ</span>
                                                    @endif
                                                    <a href="{{ route('single_product', $item->id) }}">Xem chi tiết</a>
                                                </div>
                                                <div class="wrap">
                                                    <span class="epix-p-subtitle">Đánh giá</span>
                                                    <div class="rating">
                                                        <i class="fal fa-star"></i>
                                                        <span>{{ number_format($item->averageRating(), 1) }}</span>
                                                    </div>
                                                </div>
                                                {{-- <div style="width: 200px" class="price-box mb-15">
                                                    <span class="price">Số phiên bản:
                                                        {{ $item->variants->count() }}</span>
                                                    <a href="{{ route('single_product', $item->id) }}">+ Select
                                                        Option</a>
                                                </div> --}}
                                                <div class="d-inline-block">
                                                    <div class="epix-action">
                                                        {{-- <a href="cart.html" class="p-cart">
                                                            <i class="fal fa-shopping-cart"></i>
                                                            <i class="fal fa-shopping-cart"></i>
                                                        </a> --}}
                                                    </div>
                                                </div>
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

        </div>


        <!-- Placeholder for success message -->
        <!-- Placeholder for success message -->
        <div id="successMessage" style="display: none;
    position: fixed; top: 75%; left: 50%; transform: translate(-50%, -50%);
    background-color: green; color: white; padding: 15px 30px; border-radius: 5px;
    text-align: center; font-size: 18px; z-index: 9999;">
            Đánh giá của bạn đã được gửi thành công, quản trị viên sẽ xem sét và phê duyệt thông báo của bạn.
        </div>
        <!-- Add jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $('#reviewForm').submit(function (event) {
                event.preventDefault(); // Ngăn form submit mặc định

                // Kiểm tra nếu chưa chọn sao hoặc để trống nội dung
                const star = $('input[name="star"]:checked').val();
                const comment = $('#comment').val().trim();

                if (!star) {
                    alert('Bạn phải chọn số sao đánh giá.');
                    return;
                }

                if (!comment) {
                    alert('Nội dung đánh giá không được để trống.');
                    return;
                }

                // Sử dụng AJAX để gửi form mà không tải lại trang
                $.ajax({
                    url: '{{ route("post.review") }}', // Đảm bảo URL chính xác
                    type: 'POST',
                    data: new FormData(this), // Gửi dữ liệu form
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            // Hiển thị thông báo thành công ở giữa trang
                            $('#successMessage').fadeIn().delay(2000).fadeOut();
                            $('#reviewForm')[0].reset(); // Reset form sau khi gửi
                        }
                    },
                    error: function () {
                        alert('Có lỗi xảy ra khi gửi đánh giá. Vui lòng thử lại.');
                    }
                });
            });
        </script>


        <!-- <script>
            document.getElementById('reviewForm').addEventListener('submit', function(event) {
                const star = document.querySelector('input[name="star"]:checked');
                const comment = document.getElementById('comment').value.trim();

                // Kiểm tra nếu chưa chọn số sao
                if (!star) {
                    alert('Bạn phải chọn số sao đánh giá.');
                    event.preventDefault(); // Ngăn không cho form được gửi
                    return;
                }

                // Kiểm tra nếu phần nội dung đánh giá bị để trống
                if (!comment) {
                    alert('Nội dung đánh giá không được để trống.');
                    event.preventDefault(); // Ngăn không cho form được gửi
                    return;
                }

                // Kiểm tra độ dài nội dung
                if (comment.length < 5) {
                    alert('Nội dung đánh giá phải có ít nhất 5 ký tự.');
                    event.preventDefault(); // Ngăn không cho form được gửi
                    return;
                }
            });
        </script> -->

        <!-- single product area end -->
        <script>
            function selectVariant(element) {

                // Xóa class "selected" khỏi tất cả các hộp
                var variants = document.querySelectorAll('.variant-box');
                variants.forEach(function (variant))
                {
                    variant.classList.remove('selected');

                <
                /div>
                    <
                        script src="https://code.jquery.com/jquery-3.6.0.min.js">
                        }
                        }
        </script>

        <!-- single product area end -->
        <script>
            $(document).ready(function () {
                // Khi người dùng nhập từ khóa
                $('#search-input').on('keyup', function () {
                    let query = $(this).val();
                    if (query.length > 0) {
                        $.ajax({
                            url: '/search-products',
                            method: 'GET',
                            data: {
                                keyword: query
                            },
                            success: function (data) {
                                $('#search-results').html(data).removeClass('hidden');
                            }
                        });
                    } else {
                        $('#search-results').addClass('hidden');
                    }
                });

                // Ẩn kết quả khi nhấn ra ngoài khung tìm kiếm
                $(document).on('click', function (event) {
                    if (!$(event.target).closest('#search-form, #search-results').length) {
                        $('#search-results').addClass('hidden');
                    }
                });

            });
        </script>
        <script>
            var phienban = 0;
            var mausac = 0;
            var bonho = 0;
            var giaban = '{{ $products->price }}';

            function selectVariant1(element) {
                giaban = '{{ $products->price }}';
                // Xóa class "selected" khỏi tất cả các hộp
                var variants = document.querySelectorAll('.variant-box1');
                variants.forEach(function (variant) {
                    variant.classList.remove('selected');
                    element.style.backgroundColor = '';
                });

                // Thêm class "selected" cho hộp được chọn
                element.classList.add('selected');

                // Đánh dấu radio button tương ứng
                var radioButton = element.querySelector('input[type="radio"]');
                radioButton.checked = true;

                // Lấy giá từ thuộc tính data-price và cập nhật giá sản phẩm
                var selectedPrice = element.getAttribute('data-price');
                phienban = parseInt(selectedPrice);
                let totalPrice = parseInt(giaban) + parseInt(phienban) + parseInt(mausac) + parseInt(bonho);
                let formattedPrice = new Intl.NumberFormat('vi-VN').format(totalPrice);
                document.getElementById('product-price').innerText = formattedPrice;
                var variants = document.querySelectorAll('.variant-box');

                variants.forEach(function (variant) {
                    variant.classList.remove('selected');
                });


            }

            function selectVariant2(element) {
                // Xóa class "selected" khỏi tất cả các hộp
                var variants = document.querySelectorAll('.variant-box2');
                variants.forEach(function (variant) {
                    variant.style.backgroundColor = '';
                    variant.classList.remove('selected');
                });

                // Thêm class "selected" cho hộp được chọn
                element.classList.add('selected');

                // Đánh dấu radio button tương ứng
                var radioButton = element.querySelector('input[type="radio"]');
                radioButton.checked = true;

                // Lấy giá từ thuộc tính data-price và cập nhật giá sản phẩm
                var selectedPrice = element.getAttribute('data-price');

                var priceProduct = document.getElementById('product-price').textContent.trim();
                console.log(Number(priceProduct));

                selectedPrice = Number(priceProduct) + Number(selectedPrice);
                document.getElementById('product-price').innerText = selectedPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");


                mausac = parseInt(selectedPrice);
                totalPrice = parseInt(giaban) + parseInt(phienban) + parseInt(mausac) + parseInt(bonho);
                let formattedPrice = new Intl.NumberFormat('vi-VN').format(totalPrice);
                document.getElementById('product-price').innerText = formattedPrice;
                var selectedColor = element.getAttribute('data-value');
                element.classList.add('selected');
                console.log(selectedColor)
                element.style.setProperty('--selected-color', selectedColor);
                document.querySelectorAll('.variant-box').forEach(function (box) {
                    box.addEventListener('mouseenter', function () {
                        var color = box.getAttribute('data-value');
                        box.style.backgroundColor = color;
                    });

                    box.addEventListener('mouseleave', function () {
                        if (!box.classList.contains('selected')) {
                            box.style.backgroundColor = '';
                        }
                    });
                });
            }

            function selectVariant3(element) {
                // Xóa class "selected" khỏi tất cả các hộp
                var variants = document.querySelectorAll('.variant-box3');
                variants.forEach(function (variant) {
                    variant.classList.remove('selected');
                });

                // Thêm class "selected" cho hộp được chọn
                element.classList.add('selected');

                // Đánh dấu radio button tương ứng
                var radioButton = element.querySelector('input[type="radio"]');
                radioButton.checked = true;

                // Lấy giá từ thuộc tính data-price và cập nhật giá sản phẩm
                var selectedPrice = element.getAttribute('data-price');
                bonho = parseInt(selectedPrice);
                totalPrice = parseInt(giaban) + parseInt(phienban) + parseInt(mausac) + parseInt(bonho);
                let formattedPrice = new Intl.NumberFormat('vi-VN').format(totalPrice);
                document.getElementById('product-price').innerText = formattedPrice;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            document.getElementById('hethang').addEventListener('click', function (event) {
                event.preventDefault(); // Ngăn trang không load lại
                alert("Sản phẩm đã hết hàng, vui lòng chọn sản phẩm khác");
            });
            $(document).ready(function () {
                $('#addToCartForm').on('submit', function (e) {
                    e.preventDefault(); // Ngăn form submit và tải lại trang

                    // Lấy URL và dữ liệu từ form
                    var form = $(this);
                    var actionUrl = form.attr('action');
                    var formData = form.serialize();

                    // Gửi AJAX request
                    $.ajax({
                        url: actionUrl,
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            // Xử lý khi request thành công
                            alert("Sản phẩm đã được thêm vào giỏ hàng!");
                        },
                        error: function (xhr, status, error) {
                            // Xử lý khi request thất bại
                            alert("Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng. Vui lòng thử lại!");
                            console.error(error);
                        }
                    });
                });
            });
            $(document).ready(function () {
                $('#reviewForm').on('submit', function (e) {
                    e.preventDefault(); // Ngăn chặn gửi form thông thường

                    let formData = new FormData(this); // Thu thập dữ liệu form

                    $.ajax({
                        url: $(this).attr('action'), // Lấy URL từ `action` của form
                        method: $(this).attr('method'), // Lấy method từ `method` của form
                        data: formData,
                        processData: false, // Không xử lý dữ liệu, vì ta dùng FormData
                        contentType: false, // Không đặt kiểu nội dung mặc định
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Thêm CSRF token
                        },
                        success: function (response) {
                            let newComment = `
                    <li class="epix-comment-item">
                        <div class="epix-comment-thumb">
                            <img src="${response.user_avatar || '{{ asset('laptop/assets/img/user/user-1.png') }}'}" alt="">
                        </div>
                        <div class="epix-comment-content">
                            <div class="epix-comment-top">
                                <div style="
    margin-bottom: 15px "class="rating">
                                    ${Array(5).fill(0).map((_, i) => i < response.star
                                ? '<i class="fas fa-star" style="color: gold;"></i>'
                                : '<i class="fas fa-star" style="color: lightgray;"></i>'
                            ).join('')}
                                </div>
                                <div class="user-name"><a href="#">${response.user_name || 'Unknown User'}</a></div>
                                <span class="date">– ${response.comment}</span>
                                <span class="date">– ${response.created_at}</span>
                            </div>
                        </div>
                    </li>
                `;

                            // Thêm bình luận mới vào đầu danh sách
                            $('#commentList').prepend(newComment);

                            // Xoá dữ liệu trong form
                            $('#reviewForm')[0].reset();
                        },
                        error: function (error) {
                            // Hiển thị thông báo lỗi
                            console.error(error);
                        }
                    });
                });
            });


        </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[type="radio"][name="product_variant_id"]').forEach(function(input) {
                input.addEventListener('change', function() {
                    document.querySelectorAll('.variant-details').forEach(function(detail) {
                        detail.style.display = 'none';
                    });
                    document.getElementById('selected_variant').value = this.value;

                    var selectedVariantId = this.value;
                    var detailElement = document.getElementById('details-' + selectedVariantId);
                    if (detailElement) {
                        detailElement.style.display = 'block';
                    }
                });
            });
        });
    </script>

@endsection
