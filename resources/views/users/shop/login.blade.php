@extends('users.layouts.defaut')

@push('style')

@section('content')

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
                        <li><a href="index-3.html">Home</a></li>
                        <li><span>Login</span></li>
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
                            <h3 class="text-center mb-60">Login From Here</h3>
                            <form action="#">
                                <label for="name">Email Address <span>**</span></label>
                                <input id="name" type="text" placeholder="Email address..." />
                                <label for="pass">Password <span>**</span></label>
                                <input id="pass" type="password" placeholder="Enter password..." />
                                <div class="login-action mb-20 fix">
                                    <span class="log-rem f-left">
                                        <input id="remember" type="checkbox" />
                                        <label for="remember">Remember me!</label>
                                    </span>
                                    <span class="forgot-login f-right">
                                        <a href="register.html">Lost your password?</a>
                                    </span>
                                </div>
                                <button class="os-btn w-100">Login Now</button>
                                <div class="or-divide"><span>or</span></div>
                                <a href="register.html" class="os-btn os-btn-black w-100">Register Now</a>
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
