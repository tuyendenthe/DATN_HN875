@extends('clients.master')
<style>
    /* Thiết kế chính cho nút */
    .epix-sidebar-widget .epix-taglist li a#flash-sales-link {
        display: inline-block;
        background-color: #ff5722; /* Màu nền nổi bật */
        color: #ffffff; /* Màu chữ trắng */
        font-weight: bold;
        font-size: 16px;
        padding: 12px 20px;
        border-radius: 30px; /* Bo góc tròn */
        text-transform: uppercase; /* Viết hoa toàn bộ */
        text-align: center;
        text-decoration: none; /* Loại bỏ gạch chân */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        transition: all 0.3s ease-in-out; /* Hiệu ứng chuyển động */
        animation: pulse 2s infinite; /* Hiệu ứng nhịp tim */
    }

    /* Hiệu ứng hover */
    .epix-sidebar-widget .epix-taglist li a#flash-sales-link:hover {
        background-color: #e64a19; /* Đổi màu nền khi hover */
        color: #ffffff; /* Đảm bảo màu chữ không đổi */
        transform: scale(1.1); /* Phóng to nhẹ khi hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Tăng đổ bóng khi hover */
    }

    /* Hiệu ứng nhấp nháy */
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        50% {
            transform: scale(1.05); /* Phóng to nhẹ */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Tăng đổ bóng */
        }
    }

    /* Loại bỏ dấu chấm đầu dòng */
    .epix-sidebar-widget .epix-taglist li {
        list-style: none;
    }


</style>
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
                                    <div class="epix-taglist">
                                                <li><a id="flash-sales-link" href="#">Flash Sales</a></li>
                                    </div>
                                </div>
                                {{-- <div class="epix-sidebar-widget">
                                    <h4 class="epix-s-widget-title">MUA SẮM THEO DANH MỤC</h4>
                                    <div class="slider-range mb-40">
                                        <div id="slider-range"></div>
                                        <div class="epix-color-scheme">
                                            <select class="nice-select form-control" id="filter-by-category">
                                                <option class="form-control" value="all">Tất cả</option>
                                                @foreach ($categories as $item)
                                                    <option class="form-control" value="{{$item->id}}"> {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="epix-sidebar-widget">
                                    <h4 class="epix-s-widget-title">MUA SẮM THEO DANH MỤC</h4>
                                    <div class="slider-range mb-40">
                                        <div id="slider-range"></div>
                                        <div class="epix-color-scheme">
                                            <select class="nice-select form-control" id="filter-by-category" onchange="filterByCategory(this.value)">
                                                <option class="form-control" value="all">Tất cả</option>
                                                @foreach ($categories as $item)
                                                    <option class="form-control" value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function filterByCategory(categoryId) {
                                        const url = categoryId === 'all' ? '{{ route('shop') }}' : '{{ url('/shop/filter-by-category') }}' + '/' + categoryId;
                                        window.location.href = url;
                                    }
                                </script>
                                <br>
                                <br>
                                <br>
                                <div class="epix-sidebar-widget">
                                    <h4 class="epix-s-widget-title">GIÁ</h4>
                                    <div class="slider-range mb-40">
                                        <div id="slider-range"></div>
                                        <div class="epix-color-scheme">
                                            <select class="nice-select form-control" id="price-range-select">
                                                <option class="form-control" value="all">Tất cả</option>
                                                <option class="form-control" value="<3000000">Dưới 3.000.000</option>
                                                <option class="form-control" value="3000000-5000000">3.000.000 - 5.000.000</option>
                                                <option class="form-control" value="5000000-10000000">5.000.000 - 10.000.000</option>
                                                <option class="form-control" value="10000000-15000000">10.000.000 - 15.000.000</option>
                                                <option class="form-control" value="15000000-20000000">15.000.000 - 20.000.000</option>
                                                <option class="form-control" value="20000000-25000000">20.000.000 - 25.000.000</option>
                                                <option class="form-control" value="25000000-30000000">25.000.000 - 30.000.000</option>
                                                <option class="form-control" value="30000000-35000000">30.000.000 - 35.000.000</option>
                                                <option class="form-control" value="35000000-40000000">35.000.000 - 40.000.000</option>
                                                <option class="form-control" value="40000000-50000000">40.000.000 - 50.000.000</option>
                                                <option class="form-control" value=">50000000">Trên 50.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>

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
                                                        <span style="width: 150px" class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                                    @endif

                                                    <a href="{{ route('single_product', $item -> id) }}">Chi tiết sản phẩm</a>

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
                                                                    {{-- <span class="sale">sale</span> --}}
                                                                    <a href="{{ route('single_product', $item->id) }}"><img width="223px" height="396px" src="{{asset($item->image)}}" alt=""></a>
                                                                </div>
                                                                <div class="price-box price-box-3">
                                                                    @if($item->isOnFlashSale()) <!-- Kiểm tra nếu sản phẩm còn trong thời gian flash sale -->
                                                                    <span style="width: 100px" class="price flash-sale-price">{{ number_format($item->flashSale->price_sale, 0, ',', '.') }} VNĐ</span>
                                                                    <span  style="width: 100px" class="price original-price text-muted"><del>{{ number_format($item->price, 0, ',', '.') }} VNĐ</del></span>
                                                                    @else
                                                                        <span style="width: 120px" class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                                                    @endif
                                                                    <a style="width: 300px" href="{{ route('single_product', $item->id) }}">Chi tiết sản phẩm</a>
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
                                                                            <span class="epix-p-subtitle"></span>
                                                                        </div>
                                                                        <div class="">
                                                                            @if($item->isOnFlashSale()) <!-- Kiểm tra nếu sản phẩm còn trong thời gian flash sale -->
                                                                            <span style="width: 100px" class="price flash-sale-price">{{ number_format($item->flashSale->price_sale, 0, ',', '.') }} VNĐ</span>
                                                                            <span  style="width: 100px" class="price original-price text-muted"><del>{{ number_format($item->price, 0, ',', '.') }} VNĐ</del></span>
                                                                            @else
                                                                                <span style="width: 120px" class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                                                            @endif
                                                                            <!-- <a href="{{ route('single_product',parameters: $item->id)  }}">+ Select Option</a> -->
                                                                        </div>
                                                                    </div>
                                                                    <p>{{ $item -> content_short }}</p>
                                                                    <a href="{{ route('single_product', $item -> id) }}" class="epix-btn-1" tabindex="0"><span>Chi tiết sản phẩm<i class="fal fa-angle-right"></i></span></a>
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
                                        <!-- Nút "Trước" -->
                                        <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link prev" href="{{ $products->previousPageUrl() }}" tabindex="-1">
                                                <i class="fal fa-angle-left"></i> Trước
                                            </a>
                                        </li>

                                        <!-- Các số trang -->
                                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                                            <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        <!-- Nút "Sau" -->
                                        <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link next" href="{{ $products->nextPageUrl() }}">
                                                Sau <i class="fal fa-angle-right"></i>
                                            </a>
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
            $('#flash-sales-link').on('click', function (e) {
                $.ajax({
                    url: '/filter-flash-sales', // Đường dẫn tới route xử lý
                    type: 'GET',
                    success: function (response) {
                        // console.log(response)
                        $('#product-list').html(response);
                    },
                    error: function () {
                        $('#product-list').html('<div class="error">Unable to load products. Please try again later.</div>');
                    }
                });
            });
            // $('#filter-by-category').on('click', function (e) {
            //     var id = $(this).data('id');
            //     $.ajax({
            //         url: '/shop/' + id, // Đường dẫn tới route xử lý
            //         type: 'GET',
            //         success: function (response) {
            //             // console.log(response)
            //             $('#product-list').html(response);
            //         },
            //         error: function () {
            //             $('#product-list').html('<div class="error">Unable to load products. Please try again later.</div>');
            //         }
            //     });
            //
            // });
            $('#filter-by-category').on('change', function() {
                var id = $(this).val(); // Lấy giá trị của khoảng giá được chọn

                // Gửi Ajax request
                $.ajax({
                    url: '/shop/filter-by-category/' + id,  // Route của bạn
                    method: 'GET',
                    data: { id: id },
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
    </script>
    @push('script')
    @endpush
