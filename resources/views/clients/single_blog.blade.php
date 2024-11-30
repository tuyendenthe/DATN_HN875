@extends('clients.master')

@section('content')
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
{{--                            <h2>Chi tiết bài viết</h2>--}}
                            <span> <a href="{{route('home')}}">Trang chủ</a> / Chi tiết bài viết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog-details -->
    <section class="blog-details padding-tb-100">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div class="col-lg-12">
                    <div class="cr-blog-details d-flex justify-content-center">
{{--                        <div class="cr-blog-details-image">--}}
{{--                            <img width="20px" height="20px" src="{{asset('storage/' . $post->image)}}" alt="blog-1">--}}
{{--                        </div>--}}
                        <div class="cr-blog-details-content" style="width: 950px;">
                            <div class="cr-admin-date">
                                <span><code>Bởi Quản trị viên</code> / {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                            </div>
                            <div class="cr-banner">
                                <h2>{{$post->title}}</h2>
                            </div>
                            <p class="my-3">{{$post->content_short}}</p>
                            <div style="width: 100%;height: 1px;background-color: #c0bebe;margin-bottom: 50px;"></div>
{{--                            @php--}}
{{--                                $content = preg_replace('/src="\/storage\//', 'src="{{ asset("storage/', $post->content);--}}
{{--    $content = str_replace('"', '") }}"', $content);--}}
{{--                            @endphp--}}
                            <p class="mb-15">{!! $post->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- prealoder area start -->
{{--    <div id="loading">--}}
{{--        <div id="loading-center">--}}
{{--            <div id="loading-center-absolute">--}}
{{--                <div class="object" id="first_object"></div>--}}
{{--                <div class="object" id="second_object"></div>--}}
{{--                <div class="object" id="third_object"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- prealoder area end -->--}}
{{--    <!-- breadcrumb area start -->--}}
{{--    <div class="epix-breadcrumb-area">--}}
{{--        <div class="container">--}}
{{--            <h4 class="epix-breadcrumb-title">Single Product</h4>--}}
{{--            <div class="epix-breadcrumb">--}}
{{--                <ul>--}}
{{--                    <li><a href="index-3.html">Home</a></li>--}}
{{--                    <li><span>Single Product</span></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb area end -->--}}

{{--    <!-- blog product area start -->--}}
{{--    <section class="blog__area pt-100 pb-100">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-9 col-lg-8">--}}
{{--                    <div class="blog-content-left single-blog-content-left-padding">--}}
{{--                        <div class="postbox__title mb-55">--}}
{{--                            <h1>{{ $post->title }}</h1> <!-- Hiển thị tiêu đề bài viết -->--}}
{{--                            <div class="blog__meta">--}}
{{--                                <span>By <a href="blog.html">{{ $post->user->name }}</a></span> <!-- Hiển thị tên tác giả -->--}}
{{--                                <span>/ {{ $post->created_at->format('F j, Y') }}</span> <!-- Hiển thị ngày đăng -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="postbox__thumb w-img">--}}
{{--                            <img src="{{ asset('storage/' . $post->image) }}" alt=""> <!-- Hiển thị hình ảnh -->--}}
{{--                        </div>--}}
{{--                        <div class="postbox__wrapper mb-70">--}}
{{--                            <div class="postbox__text mt-65">--}}
{{--                                <p>{{ $post->content_short }}</p> <!-- Hiển thị nội dung bài viết -->--}}
{{--                            </div>--}}
{{--                            <!-- Nếu bạn có thêm các phần khác như hình ảnh hoặc quote, bạn có thể thêm vào đây -->--}}
{{--                        </div>--}}
{{--                        <div class="postbox__wrapper mb-70">--}}
{{--                            <div class="postbox__text mt-65">--}}
{{--                                <p>{{ $post->content }}</p> <!-- Hiển thị nội dung bài viết -->--}}
{{--                            </div>--}}
{{--                            <!-- Nếu bạn có thêm các phần khác như hình ảnh hoặc quote, bạn có thể thêm vào đây -->--}}
{{--                        </div>--}}

{{--                        <div class="postbox__line mt-65"></div>--}}
{{--                        <div class="postbox__comments pt-90">--}}
{{--                            <div class="postbox__comment-title mb-30">--}}
{{--                                <h3>Comments (32)</h3>--}}
{{--                            </div>--}}
{{--                            <div class="latest-comments mb-30">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <div class="comments-box">--}}
{{--                                            <div class="comments-avatar">--}}
{{--                                                <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="comments-text">--}}
{{--                                                <div class="avatar-name">--}}
{{--                                                    <h5>Siarhei Dzenisenka</h5>--}}
{{--                                                    <span> - 3 months ago </span>--}}
{{--                                                    <a class="reply" href="#">Leave Reply</a>--}}
{{--                                                </div>--}}
{{--                                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their--}}
{{--                                                    default model text, and a search for <span>“lorem ipsum”</span> will uncover many web--}}
{{--                                                    sites still in their infancy. Various versions have evolved over the years, sometimes by--}}
{{--                                                    accident, sometimes on purpose.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="children">--}}
{{--                                        <div class="comments-box">--}}
{{--                                            <div class="comments-avatar">--}}
{{--                                                <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="comments-text">--}}
{{--                                                <div class="avatar-name">--}}
{{--                                                    <h5>Julias Roy</h5>--}}
{{--                                                    <span> - 6 months ago </span>--}}
{{--                                                    <a class="reply" href="#">Leave Reply</a>--}}
{{--                                                </div>--}}
{{--                                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their--}}
{{--                                                    default model text, and a search for <span>“lorem ipsum”</span> will uncover many web--}}
{{--                                                    sites still in their infancy. </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="comments-box">--}}
{{--                                            <div class="comments-avatar">--}}
{{--                                                <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="comments-text">--}}
{{--                                                <div class="avatar-name">--}}
{{--                                                    <h5>Arista Williamson</h5>--}}
{{--                                                    <span> - 6 months ago </span>--}}
{{--                                                    <a class="reply" href="#">Leave Reply</a>--}}
{{--                                                </div>--}}
{{--                                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their--}}
{{--                                                    default model text, and a search for <span>“lorem ipsum”</span> will uncover many web--}}
{{--                                                    sites still in their infancy. Various versions have evolved over the years, sometimes by--}}
{{--                                                    accident, sometimes on purpose.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="postbox__line mb-95"></div>--}}
{{--                        <div class="post-comments-form mb-100">--}}
{{--                            <div class="post-comments-title mb-30">--}}
{{--                                <h3>Leave A Reply</h3>--}}
{{--                            </div>--}}
{{--                            <form id="contacts-form" class="conatct-post-form" action="#">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-6 col-lg-6 col-md-6">--}}
{{--                                        <div class="contact-icon p-relative contacts-name">--}}
{{--                                            <input type="text" placeholder="Name">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-6 col-lg-6 col-md-6">--}}
{{--                                        <div class="contact-icon p-relative contacts-name">--}}
{{--                                            <input type="email" placeholder="Email">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-12">--}}
{{--                                        <div class="contact-icon p-relative contacts-email">--}}
{{--                                            <input type="text" placeholder="Subject">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-12">--}}
{{--                                        <div class="contact-icon p-relative contacts-message">--}}
{{--                                            <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Comments"></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-12">--}}
{{--                                        <button class="os-btn os-btn-black" type="submit">Post comment</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4">--}}
{{--                    <div class="sidebar__wrapper">--}}
{{--                        <div class="sidebar__widget mb-55">--}}
{{--                            <div class="widget__search p-relative">--}}
{{--                                <form action="#">--}}
{{--                                    <input type="text" placeholder="Search...">--}}
{{--                                    <button type="submit"><i class="far fa-search"></i></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sidebar__widget mb-55">--}}
{{--                            <div class="sidebar__widget-title mb-25">--}}
{{--                                <h3>Product Categories</h3>--}}
{{--                            </div>--}}
{{--                            <div class="sidebar__widget-content">--}}
{{--                                <div class="categories">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="blog.html">Accessories</a></li>--}}
{{--                                        <li><a href="blog.html">Clothing</a></li>--}}
{{--                                        <li><a href="blog.html">Men's</a></li>--}}
{{--                                        <li><a href="blog.html">Music</a></li>--}}
{{--                                        <li><a href="blog.html">Decoration</a></li>--}}
{{--                                        <li><a href="blog.html">Chair</a></li>--}}
{{--                                        <li><a href="blog.html">Lighting</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sidebar__widget mb-55">--}}
{{--                            <div class="sidebar__widget-title mb-25">--}}
{{--                                <h3>Latest Posts</h3>--}}
{{--                            </div>--}}
{{--                            <div class="sidebar__widget-content">--}}
{{--                                <div class="rc__post-wrapper">--}}
{{--                                    <ul>--}}
{{--                                        <li class="d-flex">--}}
{{--                                            <div class="rc__post-thumb mr-20 ">--}}
{{--                                                <a href="https://devsnews.com/template/epixx-prev/epixx/blog-details.html/"><img src="{{asset('laptop/assets/img/blog/blog-sm-1.jpg')}}" alt="blog-1"></a>--}}
{{--                                            </div>--}}
{{--                                            <div class="rc__post-content">--}}
{{--                                                <h6>--}}
{{--                                                    <a href="https://devsnews.com/template/epixx-prev/epixx/blog-details.html/">Make your life easy</a>--}}
{{--                                                </h6>--}}
{{--                                                <div class="rc__meta">--}}
{{--                                                    <span> September 14, 2020</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li class="d-flex">--}}
{{--                                            <div class="rc__post-thumb mr-20 ">--}}
{{--                                                <a href="https://devsnews.com/template/epixx-prev/epixx/blog-details.html/"><img src="{{asset('laptop/assets/img/blog/blog-sm-2.png')}}" alt="blog-1"></a>--}}
{{--                                            </div>--}}
{{--                                            <div class="rc__post-content">--}}
{{--                                                <h6>--}}
{{--                                                    <a href="https://devsnews.com/template/epixx-prev/epixx/blog-details.html/">Feel like home</a>--}}
{{--                                                </h6>--}}
{{--                                                <div class="rc__meta">--}}
{{--                                                    <span>October 01, 2020</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li class="d-flex">--}}
{{--                                            <div class="rc__post-thumb mr-20 ">--}}
{{--                                                <a href="https://devsnews.com/template/epixx-prev/epixx/blog-details.html/"><img src="{{asset('laptop/assets/img/blog/blog-sm-3.png')}}" alt="blog-1"></a>--}}
{{--                                            </div>--}}
{{--                                            <div class="rc__post-content">--}}
{{--                                                <h6>--}}
{{--                                                    <a href="https://devsnews.com/template/epixx-prev/epixx/blog-details.html/">Best thing ever</a>--}}
{{--                                                </h6>--}}
{{--                                                <div class="rc__meta">--}}
{{--                                                    <span>October 05, 2020</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sidebar__widget mb-55">--}}
{{--                            <div class="sidebar__widget-title mb-25">--}}
{{--                                <h3>Recent Comments</h3>--}}
{{--                            </div>--}}
{{--                            <div class="sidebar__widget-content">--}}
{{--                                <div class="rc__comments">--}}
{{--                                    <ul>--}}
{{--                                        <li class="d-flex mb-20">--}}
{{--                                            <div class="rc__comments-avater mr-15">--}}
{{--                                                <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="rc__comments-content">--}}
{{--                                                <h6>Salim Rana</h6>--}}
{{--                                                <p>Hi, this is a comment....</p>--}}
{{--                                                <span>on <span class="highlight comment"> Hello world!</span></span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li class="d-flex mb-20">--}}
{{--                                            <div class="rc__comments-avater mr-15">--}}
{{--                                                <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="rc__comments-content">--}}
{{--                                                <h6>Hemal Akhand</h6>--}}
{{--                                                <p>Hi, this is a comment....</p>--}}
{{--                                                <span>on <span class="highlight comment"> Hello world!</span></span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li class="d-flex mb-20">--}}
{{--                                            <div class="rc__comments-avater mr-15">--}}
{{--                                                <img src="{{asset('laptop/assets/img/blog/comments/avater-3.png')}}" alt="">--}}
{{--                                            </div>--}}
{{--                                            <div class="rc__comments-content">--}}
{{--                                                <h6>John Deo</h6>--}}
{{--                                                <p>Hi, this is a comment....</p>--}}
{{--                                                <span>on <span class="highlight comment"> Hello world!</span></span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sidebar__widget mb-55">--}}
{{--                            <div class="sidebar__widget-title mb-25">--}}
{{--                                <h3>Archives</h3>--}}
{{--                            </div>--}}
{{--                            <div class="sidebar__widget-content">--}}
{{--                                <div class="sidebar__links">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="blog.html">December 2013</a></li>--}}
{{--                                        <li><a href="blog.html"> November 2013</a></li>--}}
{{--                                        <li><a href="blog.html"> September 2013</a></li>--}}
{{--                                        <li><a href="blog.html">November 2012</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sidebar__widget mb-55">--}}
{{--                            <div class="sidebar__widget-title mb-25">--}}
{{--                                <h3>Meta</h3>--}}
{{--                            </div>--}}
{{--                            <div class="sidebar__widget-content">--}}
{{--                                <div class="sidebar__links">--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="login.html">Log in</a></li>--}}
{{--                                        <li><a href="shop.html"> Entries RSS</a></li>--}}
{{--                                        <li><a href="shop.html"> Comments RSS</a></li>--}}
{{--                                        <li><a href="#">WordPress.org</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- blog product area end -->
@endsection
