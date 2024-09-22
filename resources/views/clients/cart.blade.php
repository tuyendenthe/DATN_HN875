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
            <h4 class="epix-breadcrumb-title">Cart PAGE</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="index-3.html">Home</a></li>
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
                                <th class="product-price">Unit Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumbnail"><a href="https://devsnews.com/template/epixx-prev/epixx/product-details.html/"><img
                                            src="{{asset('laptop/assets/img/product/product-1-1.jpg')}}" alt=""></a></td>
                                <td class="product-name"><a href="https://devsnews.com/template/epixx-prev/epixx/product-details.html/">Bakix Furniture</a></td>
                                <td class="product-price"><span class="amount">$130.00</span></td>
                                <td>
                                    <div class="d-inline-block border-gray">
                                        <div class="epix-quantity-form">
                                            <button class="minus">-</button>
                                            <input type="text" value="2">
                                            <button class="plus">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td class="product-thumbnail"><a href="https://devsnews.com/template/epixx-prev/epixx/product-details.html/"><img
                                            src="{{asset('laptop/assets/img/product/product-1-2.jpg')}}" alt=""></a></td>
                                <td class="product-name"><a href="https://devsnews.com/template/epixx-prev/epixx/product-details.html/">Sujon Chair Set</a></td>
                                <td class="product-price"><span class="amount">$120.50</span></td>
                                <td>
                                    <div class="d-inline-block border-gray">
                                        <div class="epix-quantity-form">
                                            <button class="minus">-</button>
                                            <input type="text" value="2">
                                            <button class="plus">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-subtotal"><span class="amount">$120.50</span></td>
                                <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-all">
                            <div class="coupon">
                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code"
                                    type="text">
                                <button class="os-btn os-btn-black" name="apply_coupon" type="submit">Apply
                                    coupon</button>
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
                                <li>Subtotal <span>$250.00</span></li>
                                <li>Total <span>$250.00</span></li>
                            </ul>
                            <a class="os-btn" href="checkout.html">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart area end -->

@endsection