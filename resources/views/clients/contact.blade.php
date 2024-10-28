@extends('clients.master')
@section('content')

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
    <!-- contact area start -->
    <section class="contact__area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__info">
                        <h3>Find us here.</h3>
                        <ul class="mb-55">
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Address:</h6>
                                    <span>1234 Heaven Stress, Beverly Hill, Melbourne, USA.</span>
                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Email:</h6>
                                    <span><a href="https://www.devsnews.com/cdn-cgi/l/email-protection#6e070008012e0b160f031e020b400d0103" class="__cf_email__" data-cfemail="a7e4c8c9d3c6c4d3e7c2d5c2c9d3cfc2cac289c4c8ca"><span class="__cf_email__" data-cfemail="f39a9d959cb3968b929e839f96dd909c9e">[email&#160;protected]</span></a></span>
                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Number Phone:</h6>
                                    <span>(800) 123 456 789, (800) 987 654 321</span>
                                </div>
                            </li>
                        </ul>
                        <p>Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable,
                            easy to use and fully responsive and retina ready. Vel illum dolore eu feugiat nulla facilisis
                            at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit
                            augue duis dolore te feugait nulla facilisi.</p>

                        <div class="contact__social">
                            <ul>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__form">
                        <h3>Liên hệ chúng tôi</h3>
                        <form action="{{ route('contact.send') }}" method="POST" id="contact-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__input">
                                        <label>Tên <span class="required">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__input">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__input">
                                        <label>Số điện thoại <span class="required">*</span></label>
                                        <input type="text" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__input">
                                        <label>Ghi chú (thông tin bạn muốn gửi)</label>
                                        <textarea name="content" cols="30" rows="10">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__submit">
                                        <button type="submit" class="os-btn os-btn-black">Gửi tin nhắn</button>
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
