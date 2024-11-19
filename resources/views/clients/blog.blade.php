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
            <h4 class="epix-breadcrumb-title">zTrang Tin Tức</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="index-3.html">Trang chủ</a></li>
                    <li><span>Trang tin tức</span></li>
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

                        @foreach ($posts as $post)
                            <div class="blog__item blog__border-bottom mb-60 pb-60">
                                <div class="blog__thumb fix">
                                    <a href="{{ route('single_blog', $post->id) }}" class="w-img">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="blog__content">
                                    <h4 class="blog__title">
                                        <a href="{{ route('single_blog', $post->id) }}">{{ $post->title }}</a>
                                    </h4>
                                    <div class="blog__meta">
                                        <span>By <a href="#">{{ $post->user->name }}</a></span>
                                        <span>/ {{ $post->created_at->format('F j, Y') }}</span>
                                    </div>
                                    <p>{{ Str::limit($post->content_short, 100) }}</p> <!-- Giới hạn 100 ký tự -->
                                    <a href="{{ route('single_blog', $post->id) }}" class="os-btn">Đọc thêm</a>
                                </div>
                            </div>
                        @endforeach


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
                                <h3>Danh mục sản phẩm</h3>
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
                                <h3>Bài viết mới nhất</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="rc__post-wrapper">
                                    <ul>
                                        <li class="d-flex">
                                            <div class="rc__post-thumb mr-20 ">
                                                <a href="single-blog.html"><img
                                                        src="{{ asset('laptop/assets/img/blog/blog-sm-1.jpg') }}"
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
                                                <a href="single-blog.html"><img
                                                        src="{{ asset('laptop/assets/img/blog/blog-sm-2.png') }}"
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
                                                <a href="single-blog.html"><img
                                                        src="{{ asset('laptop/assets/img/blog/blog-sm-3.png') }}"
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
                                <h3>Phản hồi gần đây</h3>
                            </div>
                            <div class="sidebar__widget-content">
                                <div class="rc__comments">
                                    <ul>
                                        <li class="d-flex mb-20">
                                            <div class="rc__comments-avater mr-15">
                                                <img src="{{ asset('laptop/assets/img/blog/comments/avater-3.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="rc__comments-content">
                                                <h6>Salim Rana</h6>
                                                <p>Hi, this is a comment....</p>
                                                <span>on <span class="highlight comment"> Hello world!</span></span>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-20">
                                            <div class="rc__comments-avater mr-15">
                                                <img src="{{ asset('laptop/assets/img/blog/comments/avater-3.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="rc__comments-content">
                                                <h6>Hemal Akhand</h6>
                                                <p>Hi, this is a comment....</p>
                                                <span>on <span class="highlight comment"> Hello world!</span></span>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-20">
                                            <div class="rc__comments-avater mr-15">
                                                <img src="{{ asset('laptop/assets/img/blog/comments/avater-3.png') }}"
                                                    alt="">
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
                                <h3>Lưu trữ</h3>
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
