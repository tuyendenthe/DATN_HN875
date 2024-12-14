<!DOCTYPE html>
<html class="no-js" lang="">


<!-- Mirrored from www.devsnews.com/template/epixx-prev/epixx/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 16:30:41 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Laptop TechZone</title>
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
    <style>
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
</head>

<body>
    <!-- header area start -->
    @include('blocks.header')
    <!-- header area end -->
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
            background-color: #d4edda; /* Màu xanh nhạt */
            color: #155724; /* Màu chữ xanh đậm */
        }
    </style>
    <!-- slide-bar start -->
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


        <div class=" m-3" style="background-color: rgb(230, 230, 230);">
        <header>
            <h3 class="text-center">Chi Tiết Đơn Hàng</h3>
        </header>
        <main>
            <div class="border bg-light  m-3">
                <div class="m-3 border p-3">
                <h5>#1.Thông Tin Đơn Hàng</h5>
                <div class="my-2">
                <label for="">Mã Đơn Hàng</label> <br>
                <input type="text" name="code_bill" class="form-control" id="" value="{{ $data->bill_code }}" disabled>

                 </div>
                <div class="my-2">
                <label for="">Trạng Thái</label> <br>
                <input type="text" name="code_bill" class="form-control" id="" value="  {{ $data->status_name }}" disabled>


                    @if ($data->status==1)


                    <button type="submit" class="btn btn-danger mt-2"> Hủy Đơn Hàng</button>
                    @endif
                 </div>
                 <hr>
                 <div class="my-2">
                    <label for="">Tên Khách Hàng</label> <br>
                    <input type="text" name="code_bill" id="" class="form-control" value="{{ $data->name }}" disabled>

                     </div>
                 <div class="my-2">
                    <label for="">Số Điện Thoại</label> <br>
                    <input type="text" name="code_bill" id="" class="form-control" value="{{ $data->phone }}" disabled>

                     </div>
                 <div class="my-2">
                    <label for="">Địa Chỉ</label> <br>
                    <input type="text" name="code_bill" id="" class="form-control" value="{{ $data->address }}" disabled>

                     </div>
                 <div class="my-2">
                    <label for="">Ngày Đặt Hàng</label> <br>
                    <input type="datetime" name="code_bill" id="" class="form-control" value="{{ $data->created_at }}" disabled>

                     </div>

            </div>
            <div class="border   m-3" >
                <div class="m-3">
                    <h5>#2.Thông Tin Sản Phẩm</h5>
                    <table class="table my-2  " >
                        <thead>
                            <tr>
                                <td>STT</td>
                                <td>Tên Sản Phẩm</td>
                                <td>Ảnh</td>
                                <td>Giá</td>
                                <td>Số Lượng</td>
                                <td>Thành Tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $key => $value)


                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td> <img  src="{{ asset($value->image) }}"  alt="" width="100px"></td>
                                <td>{{ number_format($value->price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ number_format($value->subtotal, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            @endforeach
                            <tr>

                                <td></td>
                                <td>Tổng Tiền</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{number_format($data->total, 0, ',', '.') }} VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </main>
    </div>






    </body>


<script>
    function filterByCategory(categoryId) {
        const url = categoryId === 'all' ? '{{ route('shop') }}' : '{{ url('/shop/filter-by-category') }}' + '/' + categoryId;
        window.location.href = url;
    }
</script>


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
                                        <li><a href="{{ route('shop') }}">Thông tin giao hàng</a></li>
                                        <li><a href="{{ route('shop') }}">Sản phẩm mới</a></li>
                                        <li><a href="{{ route('shop') }}">Hàng tốt nhất</a></li>
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
                                        <li><a href="{{ route('shop') }}">Giá giảm</a></li>
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
                                        <li><a href="{{ route('shop') }}">Đặc biệt</a></li>
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

    <script>
        $(document).ready(function() {
            // Khi người dùng nhập từ khóa
            $('#search-input').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: '/search-products',
                        method: 'GET',
                        data: {
                            keyword: query
                        },
                        success: function(data) {
                            $('#search-results').html(data).removeClass('hidden');
                        }
                    });
                } else {
                    $('#search-results').addClass('hidden');
                }
            });

            // Ẩn kết quả khi nhấn ra ngoài khung tìm kiếm
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#search-form, #search-results').length) {
                    $('#search-results').addClass('hidden');
                }
            });
        });
    </script>
</body>


<!-- Mirrored from www.devsnews.com/template/epixx-prev/epixx/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 16:30:49 GMT -->

</html>
