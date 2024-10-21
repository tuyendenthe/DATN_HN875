@extends('clients.master')

@section('content')

    <!-- breadcrumb area start -->
    <div class="epix-breadcrumb-area mb-100">
        <div class="container">
            <h4 class="epix-breadcrumb-title">Cart PAGE</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><span>Cart Page</span></li>
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
                                <th class="product-thumbnail">Images</th>
                                <th class="cart-product-name">Product</th>
                                <th class="product-variant">Variant</th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
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

                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                @endphp

                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('product.details', $item['product_id']) }}">
                                                <img src="{{ asset('laptop/assets/img/product/product-1-1.jpg') }}" alt="">
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

                                                    <input type="number" min="1"
                                                     {{-- max=" {{ $item['quantity_variant'] }}" --}}
                                                     value="{{ $item['quantity'] }}" onkeydown="return false;">

                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</span>
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove', $item['product_id'] . '-' . $item['price'] ) }}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    @php
                                        $total = 0;
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
                                <form action="{{ route('cart.applyCoupon') }}" method="POST">

                                    @csrf
                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                {{-- <input type="hidden" name="total" id="total" value="{{ $total }}"> --}}
                                <button class="os-btn os-btn-black" name="apply_coupon" type="submit">Apply coupon</button>
                            </form>
                            </div>
                            <div class="coupon2">
                                <button class="os-btn os-btn-black" name="update_cart" type="submit">Update cart</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-5 ms-auto">
                        <div class="cart-page-total">
                            @php
                                    // dd($item);
                                    $discount=0;


                                    @endphp
                            <h2>Cart totals</h2>
                            <ul class="mb-20">
                                <li>Subtotal <span>{{ number_format($total ?? 0, 0, ',', '.') }} VNĐ</span></li>
                                <li>Voucher <span id="discount" name="discount">{{ number_format($discount ?? 0, 0, ',', '.') }}VNĐ</span> </li>
                                @php
                                     $totalAll = $total - $discount;
                                @endphp
                                <li>Total <span id="totalAll" name="totalAll" >{{ number_format($totalAll ?? 0, 0, ',', '.') }} VNĐ</span></li>
                            </ul>
                            <a class="os-btn" href="">Proceed to checkout</a>
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
        $('form').on('submit', function(e) {
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
                        $('#totalAll').text(response.totalAfterDiscount.toLocaleString('vi-VN') + ' VNĐ');
                        alert('Coupon applied successfully!');
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
    });
</script>






@endsection
