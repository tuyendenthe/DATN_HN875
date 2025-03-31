@extends('clients.master')

@section('content')
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
        <!-- preloader area start -->
        {{-- <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="first_object"></div>
                    <div class="object" id="second_object"></div>
                    <div class="object" id="third_object"></div>
                </div>
            </div>
        </div> --}}
        <!-- preloader area end -->

        <!-- breadcrumb area start -->
        <div class="epix-breadcrumb-area mb-100">
            <div class="container">
                <h4 class="epix-breadcrumb-title">Giỏ Hàng</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        {{--                    <li><a href="{{ route('index') }}">Trang chủ</a></li> --}}
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
                                    <th class="product-checkbox"><input type="checkbox" id="select-all"></th>
                                    <th class="product-thumbnail">Hình Ảnh</th>
                                    <th class="cart-product-name">Sản Phẩm</th>
                                    <th class="product-variant">Thông số</th>
                                    <th class="product-price">Đơn Giá</th>
                                    <th class="product-quantity">Số Lượng</th>
                                    <th class="product-subtotal">Thành Tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('cart') && count(session('cart')) > 0)
                                    @foreach (session('cart', []) as $key => $item)
                                        @if (is_array($item))
                                            @php
                                                $subtotal = $item['price'] * $item['quantity'];
                                            @endphp
                                            <tr>
                                                <td class="product-remove">
                                                    <input type="checkbox" class="checkbox-cart"
                                                        data-price="{{ $item['price'] }}"
                                                        data-quantity="{{ $item['quantity'] }}"
                                                        data-productvariants-id="{{ $item['product_id'] }}"
                                                        data-product-name="{{ $item['product_name'] }}"
                                                        data-product-ram="{{ $item['ram'] }}"
                                                        data-product-memory="{{ $item['memory'] }}" />
                                                    <!-- Thêm data-product-name -->
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="{{ route('product.details', $item['id_products']) }}">
                                                        <img width="125px" height="125px" src="{{ asset($item['image']) }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name">
                                                    <a
                                                        href="{{ route('product.details', $item['id_products']) }}">{{ $item['product_name'] }}</a>
                                                </td>
                                                <td class="cart-product-variants">
                                                    <span>RAM:{{ $item['ram'] }}GB -
                                                        MEMORY:{{ $item['memory'] }}GB</span>
                                                </td>
                                                {{-- <td class="product-variant"> --}}
                                                {{-- <ul>
                                                @foreach ($item['variant_name'] as $variantKey => $name)
                                                    @if ($name != '')
                                                        @if ($variantKey == 0)
                                                            <li>Phiên bản: {{ $name }}</li>
                                                        @endif
                                                        @if ($variantKey == 1)
                                                            <li>Màu sắc: {{ $name }}</li>
                                                        @endif
                                                        @if ($variantKey == 2)
                                                            <li>Bộ nhớ: {{ $name }}</li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td> --}}

                                                <td class="product-price"><span
                                                        class="amount">{{ number_format($item['price'], 0, ',', '.') }}
                                                        VNĐ</span>
                                                </td>
                                                <td>
                                                    <div class="d-inline-block border-gray">
                                                        <div class="epix-quantity-form">
                                                            <input type="number" readonly min="1" max=""
                                                                value="{{ $item['quantity'] }}" onkeydown="return false;">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="amount">{{ number_format($subtotal, 0, ',', '.') }}
                                                        VNĐ</span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="{{ route('cart.remove', $key) }}"><i
                                                            class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">Giỏ hàng của bạn đang trống.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if (auth()->user())
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <form id="applyCouponForm" action="{{ route('cart.applyCoupon') }}" method="POST">

                                            @csrf
                                            <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                                placeholder="Nhập Mã Giảm Giá" type="text">
                                            <input type="hidden" name="id" id="id"
                                                value="{{ auth()->user()->id }}">
                                            {{-- <span id="discount"
                                                name="discount">{{ number_format($discount ?? 0, 0, ',', '.') }} VNĐ</span> --}}
                                            <button class="btn btn-primary" name="apply_coupon" type="submit">Áp
                                                Dụng</button>
                                        </form>
                                        @foreach ($vouchers as $vou)
                                        <div class="mt-3 border p-3">
                                        <span style="font-size: 13px; width: 550px;">
                                            Nhập mã <h6 class="mb-0" style="display: inline; color: blue">{{$vou->voucher_code}}</h6> giảm {{number_format($vou->price_sale)}}VNĐ cho đơn hàng từ {{number_format($vou->condition)}} VNĐ @if ($vou->quantity == 0)
                                                (Đã hết)
                                             @else

                                            @endif

                                        </span>
                                        <br>
                                    </div>
                                    @endforeach
                                    </div>
                                    <div class="coupon2">
                                        {{-- <button  type="submit">Tải
                                            Lại</button> --}}
                                            <a href="http://127.0.0.1:8000/cart" class="os-btn os-btn-info" name="update_cart">Tải Lại</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-5 ms-auto">
                            <div class="cart-page-total">


                                <h2>Tổng Tiền Giỏ Hàng</h2>
                                <form id="checkoutForm" action="{{ route('checkout.index') }}" method="POST">
                                    @csrf
                                    <ul class="mb-20">
                                        <li>Thành tiền <span id="totalSelected">0 VNĐ</span></li>
                                        <input type="hidden" name="totalSelected" id="check">
                                        <li>Mã Giảm Giá <span id="discount"
                                                name="discount">{{ number_format($discount ?? 0, 0, ',', '.') }}
                                                VNĐ</span></li>
                                        @php
                                            $discount = 0;
                                            $totalAll = 0; // Giá trị ban đầu là 0
                                        @endphp
                                        <li>Tổng Tiền <span id="totalAll">0 VNĐ</span></li>
                                    </ul>
                                    <!-- Các trường ẩn -->
                                    <input type="hidden" id="selectedProducts" name="selectedProducts" value="" />
                                    <input type="hidden" id="finalDiscount" name="finalDiscount" value="" />
                                    <input type="hidden" id="finalTotal" name="finalTotal" value="" />
                                    <input type="hidden" id="voucherId" name="voucherId" value="">
                                    <button type="submit" class="btn btn-primary">Thanh Toán</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                // Cập nhật tổng tiền và các sản phẩm được chọn
                function updateTotal() {
                    let total = 0;
                    let selectedProducts = [];

                    // Duyệt qua các checkbox đã chọn
                    $('.checkbox-cart:checked').each(function() {
                        const price = $(this).data('price');
                        const quantity = $(this).data('quantity');
                        const productVariantsId = $(this).data('productvariants-id');
                        const productName = $(this).data('product-name');
                        const productRam = $(this).data('product-ram');
                        const productMemory = $(this).data('product-memory');

                        if (price && quantity) {
                            total += price * quantity; // Cộng tổng tiền
                            selectedProducts.push({
                                productvariants_id: productVariantsId,
                                product_name: productName,
                                product_ram: productRam,
                                product_memory: productMemory,
                                price: price,
                                quantity: quantity
                            });
                        }
                    });

                    return {
                        total,
                        selectedProducts
                    };
                }

                // Cập nhật thông tin khi thay đổi checkbox
                function updateDisplay() {
                    const {
                        total,
                        selectedProducts
                    } = updateTotal();
                    const discount = parseInt($('#discount').text().replace(/[^0-9]/g, '')) || 0;
                    const finalTotal = total - discount;

                    $('#totalSelected').text(total.toLocaleString('vi-VN') + ' VNĐ');
                    $('#totalAll').text(finalTotal.toLocaleString('vi-VN') + ' VNĐ');

                    // Cập nhật các trường ẩn trong form
                    $('#selectedProducts').val(JSON.stringify(selectedProducts));
                    $('#finalDiscount').val(discount);
                    $('#finalTotal').val(finalTotal);
                }

                // Cập nhật thành tiền cho mỗi sản phẩm
                function updateSubtotal() {
                    $('.checkbox-cart').each(function() {
                        const price = $(this).data('price');
                        const quantity = $(this).data('quantity');
                        const subtotal = price * quantity;
                        const subtotalText = $(this).is(':checked') ? subtotal.toLocaleString('vi-VN') +
                            ' VNĐ' : '0 VNĐ';
                        $(this).closest('tr').find('.product-subtotal span').text(subtotalText);
                    });
                }

                // Khi thay đổi trạng thái checkbox, cập nhật tổng tiền và thông tin
                $('.checkbox-cart').on('change', function() {
                    updateSubtotal();
                    updateDisplay();
                });

                // Khi chọn/deselect all, cập nhật lại trạng thái checkbox và tổng tiền
                $('#select-all').on('change', function() {
                    $('.checkbox-cart').prop('checked', this.checked);
                    updateSubtotal();
                    updateDisplay();
                });



                $('#applyCouponForm').on('submit', function(e) {
                    e.preventDefault();

                    const couponCode = $('#coupon_code').val();
                    const token = $('input[name="_token"]').val();

                    // Lấy giá trị từ thẻ <span> và chuyển thành số
                    let totalSelected = $('#totalSelected').text(); // "0 VNĐ"
                    totalSelected = parseInt(totalSelected.replace(/\D/g,
                        '')); // Loại bỏ các ký tự không phải số

                    // Gán giá trị vào input
                    $('#check').val(totalSelected);

                    // Kiểm tra giá trị tổng tiền
                    if (totalSelected <= 0) {
                        alert('Vui lòng chọn sản phẩm trước khi áp dụng mã giảm giá!');
                        return;
                    }

                    // Gửi yêu cầu Ajax để áp dụng mã giảm giá
                    $.ajax({
                        url: "{{ route('cart.applyCoupon') }}",
                        method: 'POST',
                        data: {
                            _token: token,
                            coupon_code: couponCode,
                            // check: totalSelected
                            total: totalSelected
                        },
                        // console.log(data);
                        success: function(response) {
                            if (response.success) {
                                const discount = response.discount;

                                if (discount > totalSelected) {
                                    alert(
                                        'Mã giảm giá không vượt quá tổng tiền thanh toán! Mua thêm để sử dụng mã.'
                                    );
                                    return;
                                }

                                const idVoucher = response.idVoucher;
                                $('#discount').text(discount.toLocaleString('vi-VN') + ' VNĐ');
                                updateDisplay();
                                $('#voucherId').val(idVoucher);
                                alert('Đã áp dụng mã giảm giá thành công!');
                            } else {
                                alert(response
                                    .message); // Thông báo lỗi nếu mã giảm giá không hợp lệ
                                $('#discount').text(0 + ' VNĐ');
                                updateDisplay();

                            }
                        },
                        error: function(xhr) {
                            console.log('Có lỗi xảy ra:', xhr.responseText);
                        }
                    });
                });


                function formatCurrency(value) {

                    return value.replace(/\./g, '').replace(/ VNĐ/g, '').trim();
                }
                // Xử lý khi gửi form checkout
                $('#checkoutForm').on('submit', function(e) {
                    e.preventDefault();

                    const {
                        total,
                        selectedProducts
                    } = updateTotal();

                    if (selectedProducts.length === 0) {
                        alert('Vui lòng chọn sản phẩm trước khi thanh toán!');
                        return;
                    }

                    // Kiểm tra và gửi thông tin sản phẩm và tổng tiền
                    updateDisplay();
                    this.submit();
                });
            });
        </script>
    @endsection
