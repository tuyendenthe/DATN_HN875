@extends('clients.master')

@push('style')

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
        <!-- breadcrumb area start -->
        <div class="epix-breadcrumb-area mb-40">
            <div class="container">
                <h4 class="epix-breadcrumb-title">Cửa Hàng</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        <li><a href="index-3.html">Trang chủ</a></li>
                        <li><span>Trang cửa hàng</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <!-- shop product area start -->
        <div class="shop-product-area pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-lg-4">
                        <div class="epix-sidebar-area">
                            <div class="epix-sidebar-widget mb-40">
                                <h4 class="epix-s-widget-title">MUA SẮM THEO DANH MỤC</h4>
                                <div class="epix-taglist">
                                    <ul>
                                    @foreach ($categories as $item)
                                        <li><a href="{{ route('shopWithCategories', $item->id) }}">{{$item->name}}</a></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="epix-sidebar-widget">
                                <h4 class="epix-s-widget-title">GIÁ</h4>
                                <div class="slider-range mb-40">
                                    <div id="slider-range"></div>
                                    <div class="epix-color-scheme">
                                        <select class="nice-select form-control" id="price-range-select">
                                            <option class="form-control" value="all">Tất cả</option>
                                            <option class="form-control" value="<3000000">Dưới 3.000.000</option>
                                            <option class="form-control" value="3000000-5000000">3.000.000 - 5.000.000</option>
                                            <option class="form-control" value=">5000000">Trên 5.000.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="epix-sidebar-widget mb-40">
                                <h4 class="epix-s-widget-title">Màu</h4>
                                <div class="epix-color-scheme">
                                    <ul>
                                        <li>
                                            <a href="#" class="active" data-bg-color="#D1D1D1" data-color="grey"></a>
                                            <a href="#" data-bg-color="#161616" data-color="black"></a>
                                            <a href="#" data-bg-color="#F50000" data-color="red"></a>
                                            <a href="#" data-bg-color="#ffffff" data-color="white"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
{{--                            <div class="epix-sidebar-widget mb-40">--}}
{{--                                <h4 class="epix-s-widget-title">TAGS</h4>--}}
{{--                                <div class="tagcloud">--}}
{{--                                    <a href="shop.html">Ryzen</a>--}}
{{--                                    <a href="shop.html">Xeon</a>--}}
{{--                                    <a href="shop.html">Athlon</a>--}}
{{--                                    <a href="shop.html">Core i5</a>--}}
{{--                                    <a href="shop.html">Core i7</a>--}}
{{--                                    <a href="shop.html">Core i9</a>--}}
{{--                                    <a href="shop.html">Celeron</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="epix-sidebar-widget mb-40">
                                <h4 class="epix-s-widget-title">Sản Phẩm Gần Đây</h4>
                                @foreach($newProducts as $item)
                                <div class="epix-product-list mb-20">
                                    <div class="thumb">
                                        <a href="{{ route('single_product', $item -> id) }}"><img width="80px" height="100px" src="{{asset($item -> image)}}" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="epix-list-product-sm-title"><a href="{{ route('single_product', $item -> id) }}">{{ $item -> name }}</a></h4>
                                        <div class="price-box">
                                            @if($item->isOnFlashSale()) <!-- Kiểm tra nếu sản phẩm còn trong thời gian flash sale -->
                                            <span style="width: 100px" class="price flash-sale-price">{{ number_format($item->flashSale->price_sale, 0, ',', '.') }} VNĐ</span>
                                            <span  style="width: 100px" class="price original-price text-muted"><del>{{ number_format($item->price, 0, ',', '.') }} VNĐ</del></span>
                                            @else
                                                <span style="width: 120px" class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                            @endif
                                            <a href="{{ route('single_product', $item -> id) }}">+ Select Option</a>
                                          </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /. sidebar area -->
                    </div>
                    <div class="col-xxl-9 col-lg-8 epix-shop-order">
                        <div class="epix-shop-products-display">
                            <div class="epix-shop-product-topbar">
                                <div class="epix-content-header mb-55">
                                    <div class="epix-ch-left">
                                        <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#grid-view" type="button"><i class="fas fa-th"></i></button>
                                            <button class="" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#list-view" type="button"><i class="fas fa-list-ul"></i></button>
                                        </div>
                                        </nav>
                                    </div>
{{--                                    <div class="epix-ch-right">--}}
{{--                                        <div class="show-text">--}}
{{--                                            <span>Hiển thị 1–12 trong 20 kết quả</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="sort-wrapper">--}}
{{--                                            <select name="select" id="select">--}}
{{--                                                <option value="1">Short By New</option>--}}
{{--                                                <option value="2">Short By New</option>--}}
{{--                                                <option value="3">Short By New</option>--}}
{{--                                                <option value="4">Short By New</option>--}}
{{--                                                <option value="5">Short By New</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="epix-shop-product-main">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="grid-view">
                                            <div class="row" id="product-list">
                                                @foreach ($products as $item)
                                                <div class="col-xxl-3 col-sm-6 col-md-4">
                                                    <div class="epix-single-product-3 mb-40 style-2 text-center swiper-slide">
                                                        <div class="epix-product-thumb-3">
                                                            <div class="epix-action">
                                                                <a href="{{ route('single_product', $item->id) }}" class="p-cart product-popup-toggle">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                            </div>
                                                            <span class="sale">sale</span>
                                                            <a href="{{ route('single_product', $item->id) }}"><img width="223px" height="396px" src="{{asset($item->image)}}" alt=""></a>
                                                        </div>
                                                        <div class="price-box price-box-3">
                                                            @if($item->isOnFlashSale()) <!-- Kiểm tra nếu sản phẩm còn trong thời gian flash sale -->
                                                            <span style="width: 100px" class="price flash-sale-price">{{ number_format($item->flashSale->price_sale, 0, ',', '.') }} VNĐ</span>
                                                            <span  style="width: 100px" class="price original-price text-muted"><del>{{ number_format($item->price, 0, ',', '.') }} VNĐ</del></span>
                                                            @else
                                                                <span style="width: 120px" class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                                            @endif
                                                            <a style="width: 300px" href="{{ route('single_product', $item->id) }}">+ Select Option</a>
                                                        </div>
                                                        <h5 class="epix-p-title epix-p-title-3"><a href="{{ route('single_product', $item->id) }}">{{$item->name}}</a></h5>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="epix-list-product-single">
                                                @foreach($products as $item)
                                                <div class="row">
                                                    <div class="col-lg-4 col-xl-3">
                                                        <div class="epix-product-thumb-3 d-inline-block">
                                                            <div class="epix-action">
                                                                <a href="{{ route('single_product',$item->id)  }}" class="p-cart product-popup-toggle">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                            </div>
                                                            <span class="sale">sale</span>
                                                            <a href="{{ route('single_product',$item->id)  }}"><img height="210px" width="210px" src="{{asset($item -> image)}}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-xl-9">
                                                        <div class="epix-product-content d-inline-block">
                                                            <div class="mb-15">
                                                                <h5 class="epix-p-title"><a href="{{ route('single_product',$item->id)  }}">{{ $item -> name }}</a></h5>
                                                                <div class="wrap">
                                                                    <span class="epix-p-subtitle">Speakers</span>
                                                                </div>
                                                                <div class="price-box">
                                                                    @if($item->isOnFlashSale()) <!-- Kiểm tra nếu sản phẩm còn trong thời gian flash sale -->
                                                                    <span style="width: 100px" class="price flash-sale-price">{{ number_format($item->flashSale->price_sale, 0, ',', '.') }} VNĐ</span>
                                                                    <span  style="width: 100px" class="price original-price text-muted"><del>{{ number_format($item->price, 0, ',', '.') }} VNĐ</del></span>
                                                                    @else
                                                                        <span style="width: 120px" class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                                                    @endif
                                                                    <a href="{{ route('single_product',$item->id)  }}">+ Select Option</a>
                                                                </div>
                                                            </div>
                                                                <p>{{ $item -> content }}</p>
                                                            <a href="{{ route('single_product', $item -> id) }}" class="epix-btn-1" tabindex="0"><span>Show more<i class="fal fa-angle-right"></i></span></a>
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
                    </div>
                </div>
                <div class="row justify-content-xxl-end">
                    <div class="col-xxl-9">
                        <div class="epix-pagination pagination-area mt-40 mb-70">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center justify-xl-content-left">
                                    <li class="page-item disabled">
                                        <a class="page-link prev" href="shop.html" tabindex="-1"><i class="fal fa-angle-left"></i> Trước</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="shop.html">1</a></li>
                                    <li class="page-item"><a class="page-link" href="shop.html">2</a></li>
                                    <li class="page-item"><a class="page-link" href="shop.html">3</a></li>
                                    <li class="page-item"><a class="page-link" href="shop.html">4</a></li>
                                    <li class="page-item">
                                        <a class="page-link next" href="shop.html">Sau <i class="fal fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop product area end -->
    </main>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    data: { keyword: query },
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
    $(document).ready(function() {
        // Lắng nghe sự thay đổi của select
        $('#price-range-select').on('change', function() {
            var priceRange = $(this).val(); // Lấy giá trị của khoảng giá được chọn

            // Gửi Ajax request
            $.ajax({
                url: '/shop/filter-by-price/' + priceRange,  // Route của bạn
                method: 'GET',
                data: { price_range: priceRange },
                success: function(response) {
                    // Cập nhật phần tử #product-list với HTML mới
                    $('#product-list').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
    $(document).ready(function() {
        // Bắt sự kiện khi người dùng nhấp vào màu sắc
        $('.epix-color-scheme a').on('click', function(e) {
            e.preventDefault(); // Ngừng chuyển hướng mặc định của thẻ a

            var selectedColor = $(this).data('color'); // Lấy màu được chọn từ thuộc tính data-color
            $('.epix-color-scheme a').removeClass('active'); // Xóa lớp active cũ
            $(this).addClass('active'); // Thêm lớp active cho màu hiện tại

            // Gửi yêu cầu AJAX để lọc sản phẩm theo màu
            $.ajax({
                url: '/shop/filter-by-color/' + selectedColor, // Địa chỉ route mà bạn sẽ tạo ở bước tiếp theo
                type: 'GET',
                data: { color: selectedColor }, // Gửi màu được chọn
                success: function(response) {
                    // Cập nhật danh sách sản phẩm trong thẻ #product-list
                    $('#product-list').html(response);
                }
            });
        });
    });
</script>
@push('script')
@endpush

client single_product
@extends('clients.master')
@section('content')
    <style>
        .variant-container {
            display: flex;
            gap: 10px;
            margin-top: 10px;
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
            background-color: var(--selected-color); /* Màu nền từ variant */
            color: white; /* Đổi màu chữ thành trắng */
        }

        /* Đổi màu chữ của label khi variant-box được chọn */
        .variant-box.selected label {
            color: white; /* Màu chữ của label khi variant được chọn */
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
            transition: color 0.3s ease; /* Thêm hiệu ứng chuyển màu cho chữ */
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
    </style>
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
                                                <span>featured</span>
                                            </div>
                                            <img style="height: 400px;width: 400px;margin-left: 70px" src="{{asset($products->image)}}"
                                                 data-zoom-image="{{asset('laptop/assets/img/product/signle-product-1.jpg')}}"
                                                 class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-2">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>new</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-2.jpg')}}"
                                                 data-zoom-image="{{asset('laptop/assets/img/product/signle-product-2.jpg')}}"
                                                 class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-3">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>hot</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-3.jpg')}}"
                                                 data-zoom-image="{{asset('laptop/assets/img/product/signle-product-3.jpg')}}"
                                                 class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-4">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>featured</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-4.jpg')}}"
                                                 data-zoom-image="{{asset('laptop/assets/img/product/signle-product-4.jpg')}}"
                                                 class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                    <div class="epix-tab-content">--}}
                        {{--                        <ul class="nav nav-pills mb-3" id="epix-single-product-tab" role="tablist">--}}
                        {{--                            <li>--}}
                        {{--                                <button class="active" value="1" data-bs-toggle="pill" data-bs-target="#epix-single-1"--}}
                        {{--                                    type="button">--}}
                        {{--                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-1.jpg')}}" alt="">--}}
                        {{--                                </button>--}}
                        {{--                            </li>--}}
                        {{--                            <li>--}}
                        {{--                                <button data-bs-toggle="pill" value="2" data-bs-target="#epix-single-2"--}}
                        {{--                                    type="button">--}}
                        {{--                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-2.jpg')}}" alt="">--}}
                        {{--                                </button>--}}
                        {{--                            </li>--}}
                        {{--                            <li>--}}
                        {{--                                <button data-bs-toggle="pill" value="3" data-bs-target="#epix-single-3"--}}
                        {{--                                    type="button">--}}
                        {{--                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-3.jpg')}}" alt="">--}}
                        {{--                                </button>--}}
                        {{--                            </li>--}}
                        {{--                            <li>--}}
                        {{--                                <button data-bs-toggle="pill" value="4" data-bs-target="#epix-single-4"--}}
                        {{--                                    type="button">--}}
                        {{--                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-4.jpg')}}" alt="">--}}
                        {{--                                </button>--}}
                        {{--                            </li>--}}
                        {{--                        </ul>--}}
                        {{--                    </div>--}}
                    </div>
                    <!-- /. single product left -->
                </div>
                <div class="col-xxl-6 col-lg-6">




                    <div class="epix-single-product-right">
                        {{--                    <div class="rating">--}}
                        {{--                        <i class="fas fa-star active"></i>--}}
                        {{--                        <i class="fas fa-star active"></i>--}}
                        {{--                        <i class="fas fa-star active"></i>--}}
                        {{--                        <i class="fas fa-star-half"></i>--}}
                        {{--                        <i class="fas fa-star text-gray"></i>--}}
                        {{--                    </div>--}}
                        <h4 class="epix-single-product-title">{{ $products->name }}<br></h4>
                        <p class="epix-product-details-short-description">
                            {{ $products->content_short }}
                        </p>
                        <p class="epix-product-details-short-description">
                            {{ $products-> content }}
                        </p>
                        <div class="price-display">
                            Giá: <span id="product-price"
                                       name="product-price">{{ number_format($products->price, 0, ',', '.') }}</span>
                            VNĐ
                        </div>


                        <!-- Form để thêm vào giỏ hàng -->
                        <form style="margin-top: 10px" action="{{ route('cart.add', $products->id) }}" method="POST" class="epix-cart-variation">
                            @csrf
                            <div class="epix-product-label mb-35">
                                <a href="#" class="title">Chọn phiên bản</a>
                                <div style="padding-left: 0px" class="container">
                                    <div class="variant-container">
                                        @foreach($products->variants as $variant)
                                            @if ($variant->type == 1)
                                                <div class="variant-box variant-box1 tag-list"
                                                     data-value="{{ $variant->name }}"
                                                     data-price="{{ $variant->price }}"
                                                     onclick="selectVariant1(this)">
                                                    <input type="radio" name="variant_id_1" id="{{ $variant->id }}"
                                                           value="{{ $variant->id }}">
                                                    <label for="{{ $variant->id }}">{{ $variant->name }}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="epix-product-label mb-35">
                                <a href="#" class="title">Chọn mau </a>
                                <div style="padding-left: 0px" class="container">
                                    <div class="variant-container">
                                        @foreach($products->variants as $variant)
                                            @if ($variant->type == 2)
                                                <div class="variant-box variant-box2 tag-list"
                                                     data-value="{{ $variant->name }}"
                                                     data-price="{{ $variant->price }}"
                                                     onclick="selectVariant2(this)">
                                                    <input type="radio" name="variant_id_1" id="{{ $variant->id }}"
                                                           value="{{ $variant->id }}">
                                                    <label for="{{ $variant->id }}">{{ $variant->name }}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="epix-product-label mb-35">
                                <a href="#" class="title">Chọn bo nho</a>
                                <div style="padding-left: 0px" class="container">
                                    <div class="variant-container">
                                        @foreach($products->variants as $variant)
                                            @if ($variant->type == 3)
                                                <div class="variant-box variant-box3 tag-list"
                                                     data-value="{{ $variant->name }}"
                                                     data-price="{{ $variant->price }}"
                                                     onclick="selectVariant3(this)">
                                                    <input type="radio" name="variant_id_1" id="{{ $variant->id }}"
                                                           value="{{ $variant->id }}">
                                                    <label for="{{ $variant->id }}">{{ $variant->name }}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="buy-btn d-block d-sm-inline-block text-center text-sm-left">
                                Thêm vào giỏ hàng
                            </button>
                        </form>
                    </div>
                </div>
                </form>
            </div>
            <!-- /. single product right -->
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
                                        type="button">DESCRIPTION</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="pill" data-bs-target="#tab-1-2" type="button">Additional information</button>
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
                                    <div class="epix-rating-count-wrap">
                                        <div class="epix-rating-count-left-content">
                                            <h5>CUSTOMER REVIEWS</h5>
                                            <div class="epix-rating-flex-wrap">
                                                <div class="row g-0">
                                                    <div class="col-xxl-2 col-md-4">
                                                        <div class="epix-rating-count-number-box text-center">
                                                            <div class="epix-rating-count-number">
                                                                <h4>{{ number_format($averageRating, 1) }}</h4> <!-- Hiển thị trung bình số sao với 1 chữ số thập phân -->
                                                            </div>
                                                            <div class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $averageRating)
                                                                        <!-- Hiển thị sao đầy (màu vàng) -->
                                                                        <i class="fas fa-star" style="color: gold;"></i>
                                                                    @elseif ($i - 1 < $averageRating && $i > $averageRating)
                                                                        <!-- Hiển thị sao bán phần nếu giá trị trung bình có phần thập phân -->
                                                                        <i class="fas fa-star-half-alt" style="color: gold;"></i>
                                                                    @else
                                                                        <!-- Hiển thị sao rỗng -->
                                                                        <i class="fal fa-star" style="color: lightgray;"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <span class="review-subtitle">Based on {{$totalReviews}} reviews</span>
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
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                                <div class="epix-rating-progress">
                                                                    <div class="progress-count" data-width="72%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>{{ $ratingCounts[1] ?? 0 }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="single-progress-list">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="epix-rating-progress">
                                                                    <div class="progress-count" data-width="32%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>{{ $ratingCounts[2] ?? 0 }}</span>
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
                                                                    <div class="progress-count" data-width="44%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>{{ $ratingCounts[3] ?? 0 }}</span>
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
                                                                    <span>{{ $ratingCounts[4] ?? 0 }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="single-progress-list">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="epix-rating-progress">
                                                                    <div class="progress-count" data-width="65%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>{{ $ratingCounts[5] ?? 0 }}</span>
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
                                            @foreach ($reviews as $review)
                                                <li class="epix-comment-item">
                                                    <div class="epix-comment-thumb">
                                                        <img src="{{ asset('laptop/assets/img/user/user-1.png') }}" alt="">
                                                    </div>
                                                    <div class="epix-comment-content">
                                                        <div class="epix-comment-top">
                                                            <div class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $review->star)
                                                                        <!-- Hiển thị sao đầy màu vàng từ trái qua phải -->
                                                                        <i class="fas fa-star" style="color: gold;"></i>
                                                                    @else
                                                                        <!-- Hiển thị sao rỗng từ trái qua phải -->
                                                                        <i class="fas fa-star" style="color: lightgray;"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div class="user-name"><a href="#">{{ $review->user->name ?? 'Unknown User' }}</a></div>
                                                            <span class="date">– {{ $review->comment }}</span>
                                                            <span class="date">– {{ $review->created_at->format('F d, Y') }}</span>
                                                        </div>
                                                        <div class="epix-comment-bottom">
                                                            <p>{{ $review->content }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach


                                        </ul>
                                        <div class="epix-review-form-wrapper">
                                            <h4 class="epix-review-title">Add a review</h4>
                                            <form action="{{ route('post.review') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name='product_id' value="{{$products->id}}">

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
                                                <label for="comment">Comment:</label>
                                                <textarea name="comment" id="comment"></textarea>

                                                <button type="submit">Submit</button>
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

</div>
<!-- single product area end -->
<script>
    function selectVariant(element) {

        // Xóa class "selected" khỏi tất cả các hộp
        var variants = document.querySelectorAll('.variant-box');
        variants.forEach(function(variant) {
            variant.classList.remove('selected');

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        data: { keyword: query },
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
        variants.forEach(function(variant) {
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
        variants.forEach(function(variant) {
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


@endsection
