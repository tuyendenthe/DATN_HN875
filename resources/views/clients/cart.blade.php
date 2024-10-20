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
                                    // dd($item);
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

                                                    <input type="number" min="1" value="{{ $item['quantity'] }}" onkeydown="return false;">

                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</span>
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove', $item['product_id'] . '-' . $item['price']) }}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
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
                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                <button class="os-btn os-btn-black" name="apply_coupon" type="submit">Apply coupon</button>
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
                            <h2>Cart totals</h2>
                            <ul class="mb-20">
                                <li>Subtotal <span>{{ number_format($total ?? 0, 0, ',', '.') }} VNĐ</span></li>
                                <li>Total <span>{{ number_format($total ?? 0, 0, ',', '.') }} VNĐ</span></li>
                            </ul>
                            <a class="os-btn" href="">Proceed to checkout</a>
                            {{-- <a class="os-btn" href="{{ route('checkout') }}">Proceed to checkout</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart area end -->

@endsection
