@extends('clients.master')
<style>
    input.error {
        border-color: red;
    }

    textarea.error {
        border-color: red;
    }

    span.error-message {
        font-size: 12px;
        color: red;
    }

</style>
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
            <form id="formCheckout" action="{{ route('checkout.store') }}" method="POST">
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
                                        <input type="text" id="name" name="name" placeholder="Nhập tên"/>
                                        <span class="error-message" id="error-name"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa Chỉ Nhận Hàng <span class="required">*</span></label>
                                        <input type="text" id="add" name="add" placeholder="Nhập địa chỉ của bạn"/>
                                        <span class="error-message" id="error-add"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" id="email" name="email" placeholder="Nhập Email"/>
                                        <span class="error-message" id="error-email"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Số Điện Thoại <span class="required">*</span></label>
                                        <input type="text" id="phone" name="phone" placeholder="Nhập Số Điện Thoại"/>
                                        <span class="error-message" id="error-phone"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Ghi Chú </label>
                                    <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="Nhập Nội Dung"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="your-order mb-30">
                            <h3>Thông Tin Đơn Hàng</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-name">Sản Phẩm</th>
                                        <th class="product-name">Số Lượng</th>
                                        <th class="product-total">Thành Tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <input type="hidden" name="products" id="listProducts" value="{{ json_encode($selectedProducts) }}">

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
                                                <div>{{ $item['product_name'] }}</div>
                                            </td>
                                            <td class="product-name align-items-center">
                                                <strong class="product-quantity align-items-center">× {{ $item['quantity'] }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Tổng Cộng Giỏ Hàng</th>
                                        <td><span class="amount">{{ number_format($totalProduct, 0, ',', '.') }}</span></td>
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
                                            <select name="checkout" id="checkout-gh">
                                                <option value="GHN" name="checkout">Giao Hàng Nhanh</option>
                                                <option value="HT" name="checkout">Hỏa Tốc</option>
                                            </select>
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <input id="amount" type="radio" value="GHN" name="checkout"/>--}}
{{--                                                    <label for="amount">Giao Hàng Nhanh <span class="amount">25,000 VNĐ</span></label>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <input id="shipping" type="radio" value="HT" name="checkout"/>--}}
{{--                                                    <label for="shipping"> Hỏa Tốc <span class="amount">25,000 VNĐ</span></label>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng Tiền</th>
                                        <td><strong><span class="amount">{{ number_format($total + 25000 - $discount, 0, ',', '.') }} VNĐ</span></strong></td>
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
                                <img id="qr-code" src="https://api.vietqr.io/image/mbbank-0362978755-fTpTJka.jpg?accountName=TRAN VAN TUYEN&amount={{ $total + 25000 - $discount }}&addInfo={{ session('noidung') }}" style="display: none; margin-left: auto; margin-right: auto; width: 500px; height: 500px;">
                            </div>
                            <div class="order-button-payment mt-20">
                                <button type="submit" class="os-btn os-btn-prymari">Thanh Toán</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="voucherId" name="voucherId" value="{{$voucherId}}">
            </form>

        </div>
    </section>
    <!-- checkout area end -->

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("formCheckout");
        form.addEventListener("submit", function (event) {
            let isValid = true;

            // Lấy các input
            const name = document.getElementById("name");
            const email = document.getElementById("email");
            const phone = document.getElementById("phone");
            const add = document.getElementById("add");

            // Xóa các lỗi cũ
            clearErrors();

            // Validate tên
            if (name.value.trim() === "") {
                showError("name", "Họ và tên không được để trống.");
                isValid = false;
            }

            // Validate email
            if (!validateEmail(email.value.trim())) {
                showError("email", "Email không hợp lệ.");
                isValid = false;
            }

            // Validate số điện thoại
            if (!validatePhone(phone.value.trim())) {
                showError("phone", "Số điện thoại không hợp lệ.");
                isValid = false;
            }

            // Validate địa chỉ
            if (add.value.trim() === "") {
                showError("add", "Địa chỉ không được để trống.");
                isValid = false;
            }

            // Nếu không hợp lệ, ngăn việc gửi form
            if (!isValid) {
                event.preventDefault();
            }
        });

        // Hàm hiển thị lỗi
        function showError(inputId, message) {
            const input = document.getElementById(inputId);
            const errorElement = document.getElementById(`error-${inputId}`);
            if (errorElement) {
                errorElement.textContent = message;
                errorElement.style.color = "red";
            }
            if (input) {
                input.classList.add("error");
            }
        }

        // Hàm xóa lỗi
        function clearErrors() {
            const errorMessages = document.querySelectorAll(".error-message");
            errorMessages.forEach((error) => {
                error.textContent = "";
            });
            const inputs = document.querySelectorAll("input, textarea");
            inputs.forEach((input) => {
                input.classList.remove("error");
            });
        }

        // Hàm kiểm tra email hợp lệ
        function validateEmail(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        // Hàm kiểm tra số điện thoại hợp lệ (Việt Nam)
        function validatePhone(phone) {
            const phonePattern = /^(03|05|07|08|09)\d{8}$/;
            return phonePattern.test(phone);
        }

    });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        const $qrCodeImage = $('#qr-code');

        $('input[name="payment_method"]').on('change', function () {
            var name = $('#name').val();
            var address = $('#add').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var note = $('#checkout-mess').val();
            var voucherId = $('#vouvoucherId').val();
            var products = $('#listProducts').val();
            var checkout = $('#checkout-gh').val();

            var tongtiengiohang = '{{ $total + 25000 - $discount }}';

            const selectedPaymentMethod = $('input[name="payment_method"]:checked').val();
            if (selectedPaymentMethod === 'online') {
                // Hiện ảnh QR Code
                $qrCodeImage.show();

                let urlCheckPay = "{{ route('checkPay') }}"

                let intervalId = setInterval(function(){
                    // $.post(urlCheckPay, {
                    //     name, address, email, phone, note, voucherId, products, tongtiengiohang, _token: $('input[name="_token"]').val(),
                    // }, function(data){
                    //     // if(!isNaN(data)){
                    //     //     // window.location.href = "{{ route('checkout.success') }}"
                    //     //     // clearInterval(intervalId); // Ngừng setInterval khi data trả về là mã đơn hàng
                    //     // }else{
                    //     //     console.log(data)
                    //     // }

                    //     console.log(data)
                    // });

                    $.ajax({
                        url: urlCheckPay,
                        type: 'POST',
                        data: {
                            name,
                            address,
                            email,
                            phone,
                            note,
                            voucherId,
                            products,
                            tongtiengiohang,
                            checkout,
                            _token: $('input[name="_token"]').val(),
                        },
                        success: function (data) {
                            // Xử lý khi thành công
                            if(!isNaN(data)){
                                window.location.href = "{{ route('checkout.success') }}"
                                clearInterval(intervalId); // Ngừng setInterval khi data trả về là mã đơn hàng
                            }
                        },
                        error: function (xhr, status, error) {
                            // Xử lý khi có lỗi
                            console.error('Error:', {
                                status: status,
                                error: error,
                                response: xhr.responseText
                            });
                        }
                    });
                }, 3000);
            } else {
                // Ẩn ảnh QR Code
                $qrCodeImage.hide();
            }
        });
    });
</script>

