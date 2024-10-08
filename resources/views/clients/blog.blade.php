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
        <div class="epix-breadcrumb-area">
            <div class="container">
                <h4 class="epix-breadcrumb-title">BLOG PAGE</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        <li><a href="index-3.html">Home</a></li>
                        <li><span>Blog Page</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
    
        <!-- blog product area start -->
        <section class="blog__area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 mb-40 mb-lg-0">
                        <div class="blog__wrapper mr-xl-20">
                            <div class="blog__item blog__border-bottom mb-60 pb-60">
                                <div class="blog__thumb fix">
                                    <a href="single-blog.html" class="w-img"><img src="{{asset('laptop/assets/img/blog/blog-1.jpg')}}"
                                            alt="blog"></a>
                                </div>
                                <div class="blog__content">
                                    <h4 class="blog__title"><a href="single-blog.html">Identify a ballpark value added
                                            activity to beta test</a></h4>
                                    <div class="blog__meta">
                                        <span>By <a href="blog.html">Md Hemal Akhand</a></span>
                                        <span>/ September 14, 2017</span>
                                    </div>
                                    <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                                        test. Override the digital divide with additional clickthroughs from DevOps.
                                        Nanotechnology immersion along the information highway will close the [...]</p>
                                    <a href="single-blog.html" class="os-btn">read more</a>
                                </div>
                            </div>
                            <div class="blog__item blog__border-bottom mb-60 pb-60">
                                <div class="blog__thumb fix">
                                    <a href="single-blog.html" class="w-img"><img src="{{asset('laptop/assets/img/blog/blog-2.jpg')}}"
                                            alt="blog"></a>
                                </div>
                                <div class="blog__content">
                                    <h4 class="blog__title"><a href="single-blog.html">Anteposuerit litterarum formas.</a>
                                    </h4>
                                    <div class="blog__meta">
                                        <span>By <a href="blog.html">Suraiya Akter Rika</a></span>
                                        <span>/ September 14, 2017</span>
                                    </div>
                                    <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                                        test. Override the
                                        digital divide with additional clickthroughs from DevOps. Nanotechnology immersion
                                        along the information
                                        highway will close the [...]</p>
                                    <a href="single-blog.html" class="os-btn">read more</a>
                                </div>
                            </div>
                            <div class="blog__item blog__border-bottom mb-60 pb-60">
                                <div class="blog__thumb fix">
                                    <a href="single-blog.html" class="w-img"><img src="{{asset('laptop/assets/img/blog/blog-3-1.png')}}"
                                            alt="blog"></a>
                                </div>
                                <div class="blog__content">
                                    <h4 class="blog__title"><a href="single-blog.html">Activity to beta test. Override the
                                            digital</a></h4>
                                    <div class="blog__meta">
                                        <span>By <a href="blog.html">Md Hemal Akhand</a></span>
                                        <span>/ September 14, 2017</span>
                                    </div>
                                    <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                                        test. Override the digital divide with additional clickthroughs from DevOps.
                                        Nanotechnology immersion along the information highway will close the [...]</p>
                                    <a href="single-blog.html" class="os-btn">read more</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="shop-pagination-wrapper">
                                        <div class="basic-pagination">
                                            <ul>
                                                <li><a href="blog.html"><i class="fal fa-angle-left"></i></a></li>
                                                <li><a href="blog.html">01</a></li>
                                                <li class="active"><a href="blog.html">02</a></li>
                                                <li><a href="blog.html">03</a></li>
                                                <li><a href="blog.html"><i class="fas fa-ellipsis-h"></i></a></li>
                                                <li><a href="blog.html"><i class="fal fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="sidebar__wrapper">
    
                            <div class="sidebar__widget mb-55">
                                <div class="widget__search p-relative">
                                    <form action="#">
                                        <input type="text" placeholder="Search...">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar__widget mb-55">
                                <div class="sidebar__widget-title mb-25">
                                    <h3>Product Categories</h3>
                                </div>
                                <div class="sidebar__widget-content">
                                    <div class="categories">
                                        <ul>
                                            <li><a href="single-product.html">Accessories</a></li>
                                            <li><a href="single-product.html">Clothing</a></li>
                                            <li><a href="single-product.html">Men's</a></li>
                                            <li><a href="single-product.html">Music</a></li>
                                            <li><a href="single-product.html">Decoration</a></li>
                                            <li><a href="single-product.html">Chair</a></li>
                                            <li><a href="single-product.html">Lighting</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__widget mb-55">
                                <div class="sidebar__widget-title mb-25">
                                    <h3>Latest Posts</h3>
                                </div>
                                <div class="sidebar__widget-content">
                                    <div class="rc__post-wrapper">
                                        <ul>
                                            <li class="d-flex">
                                                <div class="rc__post-thumb mr-20 ">
                                                    <a href="single-blog.html"><img src="{{asset('laptop/assets/img/blog/blog-sm-1.jpg')}}"
                                                            alt="blog-1"></a>
                                                </div>
                                                <div class="rc__post-content">
                                                    <h6>
                                                        <a href="single-blog.html">Make your life easy</a>
                                                    </h6>
                                                    <div class="rc__meta">
                                                        <span> September 14, 2020</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="rc__post-thumb mr-20 ">
                                                    <a href="single-blog.html"><img src="{{asset('laptop/assets/img/blog/blog-sm-2.png')}}"
                                                            alt="blog-1"></a>
                                                </div>
                                                <div class="rc__post-content">
                                                    <h6>
                                                        <a href="single-blog.html">Feel like home</a>
                                                    </h6>
                                                    <div class="rc__meta">
                                                        <span>October 01, 2020</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="rc__post-thumb mr-20 ">
                                                    <a href="single-blog.html"><img src="{{asset('laptop/assets/img/blog/blog-sm-3.png')}}"
                                                            alt="blog-1"></a>
                                                </div>
                                                <div class="rc__post-content">
                                                    <h6>
                                                        <a href="single-blog.html">Best thing ever</a>
                                                    </h6>
                                                    <div class="rc__meta">
                                                        <span>October 05, 2020</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__widget mb-55">
                                <div class="sidebar__widget-title mb-25">
                                    <h3>Recent Comments</h3>
                                </div>
                                <div class="sidebar__widget-content">
                                    <div class="rc__comments">
                                        <ul>
                                            <li class="d-flex mb-20">
                                                <div class="rc__comments-avater mr-15">
                                                    <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">
                                                </div>
                                                <div class="rc__comments-content">
                                                    <h6>Salim Rana</h6>
                                                    <p>Hi, this is a comment....</p>
                                                    <span>on <span class="highlight comment"> Hello world!</span></span>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-20">
                                                <div class="rc__comments-avater mr-15">
                                                    <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">
                                                </div>
                                                <div class="rc__comments-content">
                                                    <h6>Hemal Akhand</h6>
                                                    <p>Hi, this is a comment....</p>
                                                    <span>on <span class="highlight comment"> Hello world!</span></span>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-20">
                                                <div class="rc__comments-avater mr-15">
                                                    <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">
                                                </div>
                                                <div class="rc__comments-content">
                                                    <h6>John Deo</h6>
                                                    <p>Hi, this is a comment....</p>
                                                    <span>on <span class="highlight comment"> Hello world!</span></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__widget mb-55">
                                <div class="sidebar__widget-title mb-25">
                                    <h3>Archives</h3>
                                </div>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__links">
                                        <ul>
                                            <li><a href="single-blog.html">December 2013</a></li>
                                            <li><a href="single-blog.html"> November 2013</a></li>
                                            <li><a href="single-blog.html"> September 2013</a></li>
                                            <li><a href="single-blog.html">November 2012</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__widget mb-55">
                                <div class="sidebar__widget-title mb-25">
                                    <h3>Meta</h3>
                                </div>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__links">
                                        <ul>
                                            <li><a href="register.html">Log in</a></li>
                                            <li><a href="checkout.html"> Entries RSS</a></li>
                                            <li><a href="checkout.html"> Comments RSS</a></li>
                                            <li><a
                                                    href="https://devsnews.com/template/epixx-prev/epixx/wordPress.org/">WordPress.org</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog product area end -->
    
@endsection