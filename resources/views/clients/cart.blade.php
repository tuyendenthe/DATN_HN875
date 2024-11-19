@extends('clients.master')

@section('content')
    <!-- preloader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="first_object"></div>
                <div class="object" id="second_object"></div>
                <div class="object" id="third_object"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- breadcrumb area start -->
    <div class="epix-breadcrumb-area mb-100">
        <div class="container">
            <h4 class="epix-breadcrumb-title">Giỏ Hàng</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li><span>Giỏ Hàng</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart area start -->
    <div class="cart-area pb-100">
        <div class="container">
            <div class="cart-box">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Hình Ảnh</th>
                                <th class="cart-product-name">Sản Phẩm</th>
                                <th class="product-variant">Loại</th>
                                <th class="product-price">Đơn Giá</th>
                                <th class="product-quantity">Số Lượng</th>
                                <th class="product-subtotal">Thành Tiền</th>
                                <th class="product-remove">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart') && count(session('cart')) > 0)
                                @php
                                    $total = 0;
                                @endphp
                                @foreach(session('cart') as $key => $item)
                                @if(is_array($item))
                                @php
                                $discount=0;

                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('product.details', $item['product_id']) }}">
                                                <img width="125px" height="125px" src="{{ asset($item['image']) }}" alt="">
                                            </a>
                                        </td>
                                        <td class="cart-product-name">
                                            <a href="{{ route('product.details', $item['product_id']) }}">{{ $item['product_name'] }}</a>
                                        </td>
                                        <td class="product-variant">
                                            <ul>
                                                @foreach ($item['variant_name'] as $key => $name)
                                                    @if ($name != "")
                                                        @if ($key == 0)
                                                            <li>Phiên bản: {{ $name }}</li>
                                                        @endif
                                                        @if ($key == 1)
                                                            <li>Màu sắc: {{ $name }}</li>
                                                        @endif
                                                        @if ($key == 2)
                                                            <li>Bộ nhớ: {{ $name }}</li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td class="product-price"><span class="amount">{{ number_format($item['price'], 0, ',', '.') }} VNĐ</span></td>
                                        <td>
                                            <div class="d-inline-block border-gray">
                                                <div class="epix-quantity-form">

                                                    <input type="number" min="1" max="" value="{{ $item['quantity'] }}" onkeydown="return false;">

                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</span>
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove', $key) }}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    @php
                                        $total = 0;
                                        $discount=0;

                                    @endphp
                                    <td colspan="7" class="text-center">Giỏ hàng của bạn đang trống.</td>
                                </tr>
                           @endif
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="coupon-all">
                            <div class="coupon">
                                <form id="applyCouponForm" action="{{ route('cart.applyCoupon') }}" method="POST">

                                    @csrf
                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Nhập Mã Giảm Giá" type="text">
                                {{-- <input type="hidden" name="total" id="total" value="{{ $total }}"> --}}
                                <button class="btn btn-primary" name="apply_coupon" type="submit">Áp Dụng</button>
                            </form>
                            </div>
                            <div class="coupon2">
                                <button class="os-btn os-btn-info" name="update_cart" type="submit">Tải Lại</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-5 ms-auto">
                        <div class="cart-page-total">
                            @php
                                    // dd($item);



                                    @endphp
                                    {{-- <form id="checkoutForm" action="{{ route('checkout.index') }}" method="POST">
                                        @csrf --}}
                            <h4>Tổng Tiền Giỏ Hàng</h2>
                            <ul class="mb-20">
                                <li>Thành tiền <span>{{ number_format($total ?? 0, 0, ',', '.') }} VNĐ</span></li>
                                <li>Mã Giảm Giá <span id="discount" name="discount">{{ number_format($discount ?? 0, 0, ',', '.') }}VNĐ</span> </li>
                                @php
                                $sale = $discount;
                                     $totalAll = $total - $discount;

                                @endphp

                                <li>Tổng Tiền <span id="totalAll" name="totalAll" >{{ number_format($totalAll ?? 0, 0, ',', '.') }} VNĐ</span></li>

                            </ul>
                            {{-- <a class="btn btn-primary"
                            href="{{ route('checkout.index', ['total' => $total, 'discount' => $discount, 'totalAll' => $totalAll]) }}">
                            Thanh Toán
                         </a> --}}
                         <a id="checkoutLink" class="btn btn-primary" href="#">Thanh Toán</a>

                            {{-- <button type="submit" class="btn btn-primary">Thanh Toán</button>
                        </form> --}}
                            {{-- <a class="os-btn" href="{{ route('checkout') }}">Proceed to checkout</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Xử lý áp dụng voucher
        $('#applyCouponForm').on('submit', function(e) {
            e.preventDefault();

            var couponCode = $('#coupon_code').val();
            var token = $('input[name="_token"]').val();
            var total = {{ $total ?? 0 }};

            $.ajax({
                url: "{{ route('cart.applyCoupon') }}",
                method: 'POST',
                data: {
                    _token: token,
                    coupon_code: couponCode,
                    total: total
                },
                success: function(response) {
                    console.log('AJAX response:', response); // Kiểm tra dữ liệu trả về từ AJAX
                    if (response.success) {
                        $('#discount').text(response.discount.toLocaleString('vi-VN') + ' VNĐ');
                        var totalAll = total - response.discount;
                        $('#totalAll').text(totalAll.toLocaleString('vi-VN') + ' VNĐ');
                    //    $('#totalAll').text(response.totalAll.toLocaleString('vi-VN') + ' VNĐ');
                        alert('Đã áp dụng mã giảm giá thành công !');
                    } else {
                        alert(response.message);
                    }
                }
            });
        });

        // Xử lý xóa sản phẩm
        // $('.product-remove a').on('click', function(e) {
        //     e.preventDefault();

        //     var url = $(this).attr('href');
        //     var row = $(this).closest('tr'); // Giả sử sản phẩm nằm trong thẻ <tr>

        //     $.ajax({
        //         url: url,
        //         method: 'DELETE',
        //         data: {
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response) {
        //             console.log('AJAX response:', response); // Kiểm tra dữ liệu trả về từ AJAX
        //             if (response.success) {
        //                 row.remove();
        //                 alert('Product removed successfully!');
        //             } else {
        //                 alert('Failed to remove product.');
        //             }
        //         }
        //     });
        // });
        document.getElementById('checkoutLink').addEventListener('click', function(event) {
    event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

    // Lấy giá trị discount từ thẻ span
    var discount = parseFloat($('#discount').text().replace(/[^\d.-]/g, '')); // Chuyển đổi thành số
    var total = {{ $total ?? 0 }};
    var totalAll = total - discount;

    // Tạo URL với query string
    var url = "{{ route('checkout.index') }}?total=" + total + "&discount=" + discount + "&totalAll=" + totalAll;

    // Chuyển hướng đến URL mới
    window.location.href = url;
});

    });
</script>






@endsection
