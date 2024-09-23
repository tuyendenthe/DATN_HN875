@extends('clients.master')

@push('style')

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
        <div class="epix-breadcrumb-area">
            <div class="container">
                <h4 class="epix-breadcrumb-title">Sign up Page</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        <li><a href="index-3.html">Home</a></li>
                        <li><span>Sign up</span></li>
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
                            <h3 class="text-center mb-60">Signup From Here</h3>
                            <form action="#">
                                <label for="name">Username <span>**</span></label>
                                <input id="name" type="text" placeholder="Enter Username">
                                <label for="email-id">Email Address <span>**</span></label>
                                <input id="email-id" type="text" placeholder="Email address...">
                                <label for="pass">Password <span>**</span></label>
                                <input id="pass" type="password" placeholder="Enter password...">
                                <div class="mt-10"></div>
                                <button class="os-btn w-100">Register Now</button>
                                <div class="or-divide"><span>or</span></div>
                                <a href="login.html" class="os-btn os-btn-black w-100">login Now</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- register area end -->
    </main>
@endsection    

@push('script')
@endpush
