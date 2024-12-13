@extends('clients.master')
@section('content')
<style>
    .error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
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
    <div class="epix-breadcrumb-area mb-100">
        <div class="container">
            <h4 class="epix-breadcrumb-title">Trang Đặt lịch</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="index-3.html">Trang chủ</a></li>
                    <li><span>Trang đặt lịch</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <!-- contact area start -->
    <section class="contact__area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__info">
                        <h3>Tìm chúng tôi ở đây.</h3>
                        <ul class="mb-55">
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Địa chỉ:</h6>
                                    <span>99 Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</span>


                                </div>

                            </li>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8072392756894!2d105.73740897471473!3d21.04039748737984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134548b4f605b53%3A0xa3df2329d242ca08!2zOTkgUC4gVHLhu4tuaCBWxINuIELDtCwgWHXDom4gUGjGsMahbmcsIE5hbSBU4burIExpw6ptLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1733773686018!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Email:</h6>
                                    <!-- <span><a href="https://www.devsnews.com/cdn-cgi/l/email-protection#6e070008012e0b160f031e020b400d0103"
                                                class="__cf_email__"
                                                data-cfemail="a7e4c8c9d3c6c4d3e7c2d5c2c9d3cfc2cac289c4c8ca"><span
                                                    class="__cf_email__"
                                                    data-cfemail="f39a9d959cb3968b929e839f96dd909c9e">tuyentvph40779@fpt.edu.vn</span></a></span> -->
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=tuyentvph40779@fpt.edu.vn">tuyentvph40779@fpt.edu.vn</a>

                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Số điện thoại:</h6>
                                    <a href="tel:0362978755">0362978755</a>,
                                    <a href="tel:0325561001">0325561001</a>

                                </div>
                            </li>
                        </ul>


                        <div class="contact__social">

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__form">
                        <h3>Đặt lịch sửa chữa</h3>
                        <form action="{{ route('bookfix.send') }}" method="POST" id="bookfix-form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="contact__input">
                <label>Tên <span class="required">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="contact__input">
                <label>Email <span class="required">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="contact__input">
                <label>Số điện thoại (Ưu tiên sử dụng Zalo) <span class="required">*</span></label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="contact__input">
                <label>Ghi chú (thông tin bạn muốn gửi)</label>
                <textarea name="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                @error('content')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="contact__submit">
                <button type="submit" class="btn btn-primary">Gửi tin nhắn</button>
            </div>
        </div>
    </div>
</form>


                        @if(session('success'))
                        <p class="ajax-response">{{ session('success') }}</p>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->
</main>

@endsection
