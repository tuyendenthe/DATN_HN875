

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
                }, 7000);

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
                <h4 class="epix-breadcrumb-title">Login Page</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><span>Forgot password</span></li>
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
                            <h3 class="text-center mb-60">Khôi phục mật khẩu</h3>
                            @if(session('status'))
                            <p>{{ session('status') }}</p>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <label for="email">Email <span>**</span></label>
                                <input id="email" name="email" type="email" required>
                                <label for="password">Mật khẩu mới: <span>**</span></label>
                                <input id="password" name="password" type="password" required>
                                <label for="password_confirmation">Xác nhận mật khẩu: <span>**</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required>


                                <button class="btn btn-success" type="submit">Khôi phục mật khẩu</button>
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
