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
    <div class="epix-breadcrumb-area mb-100">
        <div class="container">
            <h4 class="epix-breadcrumb-title">Thanh Toán</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="/">TGiỏ hàng</a></li>
                    <li><span>Thanh Toán</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <!-- checkout area start -->
    <!-- coupon-area start -->
    <section class="coupon-area coupon-space pt-100 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        {{-- <h3>Returning customer? <span id="showlogin">Click here to login</span></h3> --}}
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">

                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- coupon-area end -->
    <!-- checkout-area start -->
    <section class="checkout-area pb-70">
        <div class="container">
            <form action="{{ route('checkout.store')  }} " method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Thông Tin Thanh Toán</h3>
                            <div class="row">
                                <div class="col-md-12">
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Họ Và Tên <span class="required">*</span></label>
                                        <input type="text" value="{{auth() -> user() ? auth() -> user() -> name : '' }}"
                                               name="name" placeholder="Nhập tên"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa Chỉ Nhận Hàng <span class="required">*</span></label>
                                        <input type="text" name="add" placeholder="Nhập địa chỉ của bạn"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email"
                                               value="{{auth() -> user() ? auth() -> user() -> email : '' }}"
                                               name="email" placeholder="Nhập Email"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Số Điện Thoại <span class="required">*</span></label>
                                        <input type="text" name="phone" placeholder="Nhập Số Điện Thoại"/>
                                    </div>
                                </div>
                            </div>
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Ghi Chú </label>
                                    <textarea id="checkout-mess" name="note" cols="30" rows="10"
                                              placeholder="Nhập Nội Dung"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Thông Tin Đơn Hàng</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-name">Sản Phẩm</th>
                                        <th class="product-total">Thành Tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <input type="hidden" name="products" value="{{ json_encode($selectedProducts) }}">

                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach($selectedProducts as $key => $item)
                                        @php
                                            $subtotal = $item['price'] * $item['quantity'];
                                            $total += $subtotal;
                                        @endphp
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $item['product_name'] }} <strong class="product-quantity">
                                                    × {{ $item['quantity'] }}</strong>
                                            </td>
{{--                                            <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">--}}
{{--                                            <input type="hidden" name="id_product[]" value="{{ $item['product_id'] }}">--}}
{{--                                            <input type="hidden" name="price[]" value="{{ $item['price'] }}">--}}

                                            <td class="product-total">
{{--                                                <input type="hidden" name="subtotal[]" value="{{ $subtotal }}">--}}
                                                <span
                                                    class="amount">{{ number_format($subtotal, 0, ',', '.') }}VNĐ</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @php
                                        @endphp
                                    </tbody>
                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Tổng Cộng Giỏ Hàng</th>
                                        <td><span class="amount">{{ number_format($totalProduct, 0, ',', '.')  }}</span>
                                        </td>
                                        <input type="hidden" name="total" value="{{ $totalProduct }}">
                                    </tr>
                                    @if(auth()->user())
                                    <tr class="cart-voucher">
                                        <th>Mã Giảm Giá</th>
                                        <td><span class="amount">{{ $discount }}</span></td>
                                    </tr>
                                    @endif
                                    <tr class="shipping">
                                        <th>Vận Chuyển</th>
                                        <td>
                                            <ul>
                                                <li>
                                                    <input id="amount" type="radio" value="GHN" name="checkout"/>
                                                    <label for="amount">
                                                        Giao Hàng Nhanh <span class="amount">25,000 VNĐ</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input id="shipping" type="radio" value="HT" name="checkout"/>
                                                    <label for="shipping"> Hỏa Tốc <span
                                                            class="amount">25,000 VNĐ</span></label>
                                                </li>
                                                <li></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng Tiền</th>
                                        <td><strong><span class="amount">{{ number_format($total + 25000 - $discount, 0, ',', '.') }} VNĐ</span></strong>
                                        </td>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <h5>Chọn phương thức thanh toán:</h5>
                                <label>
                                    <input type="radio" name="payment_method" value="cod" checked>
                                    Thanh toán khi nhận hàng
                                </label>
                                <br>
                                <label>
                                    <input type="radio" name="payment_method" value="online">
                                    Thanh toán online
                                </label>
                            </div>
                            <div class="order-button-payment mt-20">
                                <button type="submit" class="os-btn os-btn-prymari">Thanh Toán</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="voucherId" name="voucherId" value="{{$voucherId}}" >
            </form>
        </div>
    </section>
    <!-- checkout area end -->

@endsection
