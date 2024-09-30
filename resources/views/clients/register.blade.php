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
                        <li><a href="{{route('home')}}">Home</a></li>
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
                            <form action="{{ route('postRegister') }}" method="post">
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

                                <label for="name">Username <span>**</span></label>
                                <input id="name" name="name" type="text" placeholder="Enter Username...">

                                <label for="email">Email Address <span>**</span></label>
                                <input id="email" name="email" type="text" placeholder="Email address...">

                                <label for="password">Password <span>**</span></label>
                                <input id="password" name="password" type="password" placeholder="Enter password...">
                                <label for="password_confirmation">Password Confirmation: <span>**</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter password confirmation...">


                                <button class="btn btn-success w-100">Register Now</button>
                                <div class="or-divide"><span>or</span></div>
                                <a href="{{route('login')}}" class="os-btn os-btn-black w-100">login Now</a>
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
