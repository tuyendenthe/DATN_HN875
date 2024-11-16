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
                                {{-- <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                    sit amet ipsum luctus.</p> --}}
                                {{-- <form action="#">
                                    <p class="form-row-first">
                                        <label>Username or email <span class="required">*</span></label>
                                        <input type="text" />
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="text" />
                                    </p>
                                    <p class="form-row">
                                        <button class="os-btn os-btn-black" type="submit">Login</button>
                                        <label>
                                            <input type="checkbox" />
                                            Remember me
                                        </label>
                                    </p>
                                    <p class="lost-password">
                                        <a href="register.html">Lost your password?</a>
                                    </p>
                                </form>
                            </div> --}}
                        </div>
                        <!-- ACCORDION END -->
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- <div class="coupon-accordion">
                        <!-- ACCORDION START -->
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input type="text" placeholder="Coupon Code" />
                                        <button class="os-btn os-btn-black" type="submit">Apply Coupon</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- ACCORDION END -->
                    </div> --}}
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
                                    {{-- <div class="country-select">
                                        <label>Country <span class="required">*</span></label>
                                        <select>
                                            <option value="volvo">bangladesh</option>
                                            <option value="saab">Algeria</option>
                                            <option value="mercedes">Afghanistan</option>
                                            <option value="audi">Ghana</option>
                                            <option value="audi2">Albania</option>
                                            <option value="audi3">Bahrain</option>
                                            <option value="audi4">Colombia</option>
                                            <option value="audi5">Dominican Republic</option>
                                        </select>
                                    </div> --}}
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Họ Và Tên <span class="required">*</span></label>
                                        <input type="text" name="name" placeholder="Nhập tên" />
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="" />
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa Chỉ Nhận Hàng <span class="required">*</span></label>
                                        <input type="text" name="add" placeholder="Nhập địa chỉ của bạn" />
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" placeholder="Town / City" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input type="text" placeholder="Postcode / Zip" />
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email  <span class="required">*</span></label>
                                        <input type="email" name="email" placeholder="Nhập Email" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Số Điện Thoại <span class="required">*</span></label>
                                        <input type="text" name="phone" placeholder="Nhập Số Điện Thoại" />
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list create-acc">
                                        <input id="cbox" type="checkbox" />
                                        <label for="cbox">Create an account?</label>
                                    </div>
                                    <div id="cbox_info" class="checkout-form-list create-account">
                                        <p>Create an account by entering the information below. If you are a returning
                                            customer please login at the top of the page.</p>
                                        <label>Account password <span class="required">*</span></label>
                                        <input type="password" placeholder="password" />
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="different-address">
                                <div class="ship-different-title">
                                    <h3>
                                        <label>Ship to a different address?</label>
                                        <input id="ship-box" type="checkbox" />
                                    </h3>
                                </div>
                                <div id="ship-box-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="country-select">
                                                <label>Country <span class="required">*</span></label>
                                                <select>
                                                    <option value="volvo">bangladesh</option>
                                                    <option value="saab">Algeria</option>
                                                    <option value="mercedes">Afghanistan</option>
                                                    <option value="audi">Ghana</option>
                                                    <option value="audi2">Albania</option>
                                                    <option value="audi3">Bahrain</option>
                                                    <option value="audi4">Colombia</option>
                                                    <option value="audi5">Dominican Republic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required">*</span></label>
                                                <input type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Company Name</label>
                                                <input type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Address <span class="required">*</span></label>
                                                <input type="text" placeholder="Street address" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Town / City <span class="required">*</span></label>
                                                <input type="text" placeholder="Town / City" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>State / County <span class="required">*</span></label>
                                                <input type="text" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Postcode / Zip <span class="required">*</span></label>
                                                <input type="text" placeholder="Postcode / Zip" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input type="email" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text" placeholder="Postcode / Zip" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> --}}
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
                                        @php
                                        $total = 0;
                                    @endphp
                                    @foreach(session('cart') as $key => $item)

                                    @php


                                        $subtotal = $item['price'] * $item['quantity'];
                                        $total += $subtotal;
                                    @endphp
                                        <tr class="cart_item">

                                            <td class="product-name">
                                                {{ $item['product_name'] }} <strong class="product-quantity"> × {{ $item['quantity'] }}</strong>
                                            </td>
                                            <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">
                                            <input type="hidden" name="id_product[]" value="{{ $item['product_id'] }}">
                                            <td class="product-total">
                                                <input type="hidden" name="subtotal[]" value="{{ $subtotal }}">
                                                <span class="amount">{{$subtotal  }} VNĐ</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @php



                                       @endphp
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tổng Cộng Giỏ Hàng</th>
                                            <td><span class="amount">{{ $request->total }}</span></td>
                                            <input type="hidden" name="total" value="{{ $request->total }}">
                                        </tr>
                                        <tr class="cart-voucher">
                                            <th>Mã Giảm Giá</th>
                                            <td><span class="amount">{{ $request->discount }}</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Vận Chuyển</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <input id="amount" type="radio" value="GHN" name="checkout" />
                                                        <label for="amount">
                                                            Giao Hàng Nhanh <span class="amount" >25,000 VNĐ</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input id="shipping" type="radio" value="HT" name="checkout" />
                                                        <label for="shipping"> Hỏa Tốc <span class="amount">25,000 VNĐ</span></label>
                                                    </li>
                                                    <li></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Tổng Tiền</th>
                                            <td><strong><span class="amount">{{ $request->totalAll }} VNĐ</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
{{--
                            <div class="payment-method">
                                <div class="" id="accordionExample">
                                    <div class="card ">
                                        <div class="" id="headingOne">

                                        </div> --}}

                                        {{-- <div id="collapseOne" class="collapse accordion-collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID
                                                as the payment
                                                reference. Your order won’t be
                                                shipped until the funds have cleared in our account.
                                            </div>
                                        </div> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="card accordion-item">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0 accordion-header">
                                                <button class="btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                                    Cheque Payment
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse accordion-collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                Please send your cheque to Store Name, Store Street, Store Town, Store
                                                State / County, Store
                                                Postcode.
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="card accordion-item">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0 accordion-header">
                                                <button class="btn-link" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false" >
                                                    PayPal
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse accordion-collapse" aria-labelledby="headingThree"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}

                                {{-- <div class="m-3"> --}}

                                {{-- </div> --}}
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
                </div>
            </form>
        </div>
    </section>
    <!-- checkout area end -->

@endsection
