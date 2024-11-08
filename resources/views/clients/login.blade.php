@extends('clients.master')

@push('style')

@section('content')



    <div class="container">
        @if (session('message'))
            <div id="notification" class="notification alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <!-- Other content here -->
    </div>

    <style>
        .notification {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var notification = document.getElementById('notification');

            if (notification) {
                // Show the notification
                notification.style.display = 'block';

                // Hide the notification after 5 seconds
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 8000);

                // Optional: Add hover effect to keep it visible
                notification.addEventListener('mouseenter', function() {
                    notification.style.display = 'block';
                });

                notification.addEventListener('mouseleave', function() {
                    notification.style.display = 'none';
                });
            }
        });
    </script>

<body>


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
        <div class="epix-breadcrumb-area">
            <div class="container">
                <h4 class="epix-breadcrumb-title">Trang Đăng nhập</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        <li><a href="{{route('index')}}">Trang chủ</a></li>
                        <li><span>Đăng nhập</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <!-- register-area start -->
        <section class="login-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="basic-login">
                            <h3 class="text-center mb-60">Đăng Nhập </h3>
                            <form action="{{ route('postLogin') }}" method="post">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif



                                <label for="email">Địa chỉ email <span>**</span></label>
                                <input id="email" name="email" type="text" placeholder="Địa chỉ email...">

                                <label for="password">Mật khẩu <span>**</span></label>
                                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu...">


                                <a href="{{ route('password.request') }}" class="forgot-password w-100">Quên mật khẩu?</a>
                                <button type="submit" class="btn btn-success w-100">Đăng nhập ngay</button>



                                <div class="or-divide"><span>hoặc</span></div>
                                <a href="{{route('register')}}" class="os-btn os-btn-black w-100">Đăng ký ngay</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- register area end -->
    </main>

</main>
@endsection

@push('script')
@endpush
