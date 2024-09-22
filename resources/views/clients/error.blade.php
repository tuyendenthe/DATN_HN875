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
        <div class="epix-breadcrumb-area">
            <div class="container">
                <h4 class="epix-breadcrumb-title">Error PAGE</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        <li><a href="index-3.html">Home</a></li>
                        <li><span>Error Page</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <!-- error-area start -->
        <section class="error__area pt-60 pb-100">
            <div class="container">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
                    <div class="error__content text-center">
                        <div class="error__number">
                            <h1>404</h1>
                        </div>
                        <span>component not found</span>
                        <h2>Nothing To See Here!</h2>
                        <p>The page are looking for has been moved or doesn’t exist anymore, if you like you can return to our
                            homepage. If the problem persists, please send us an email to <span class="highlight comment"><a
                                    href="https://www.devsnews.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="741615071d17001c111911341319151d185a171b19">[email&#160;protected]</a></span>
                        </p>

                        <div class="error__search">
                            <input type="text" placeholder="Enter Your Text...">
                            <button type="submit" class="os-btn os-btn-3 os-btn-black">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- error area end -->
    </main>

@endsection
