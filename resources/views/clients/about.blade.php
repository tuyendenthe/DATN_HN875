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
    <div class="epix-breadcrumb-area mb-100">
        <div class="container">
            <h4 class="epix-breadcrumb-title">Giới Thiệu</h4>
            <div class="epix-breadcrumb">
                <ul>
                    <li><a href="index-3.html">Trang chủ</a></li>
                    <li><span>Trang giới thiệu</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <!-- about area start -->
    <div class="about-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="about-img">
                        <img src="{{asset('laptop/assets/img/about/about-2.jpg')}}" alt="big-image">
                        <div class="about-inner-img">
                            <img src="{{asset('laptop/assets/img/about/about-1.jpg')}}" alt="small-image">
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-md-100 mt-xs-100">
                    <div class="about-content pt-60 pt-lg-0 pt-xs-0">
                        <h2 class="about-title">
                            About Company </h2>
                        <h6 class="short-desc">
                            We Have Over 25+ Years Of Experience </h6>
                        <p class="mb-30">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu
                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia
                            deserunt mollit anim id est laborum. </p>
                        <ul class="about-list">
                            <li>
                                <i class="far fa-check-circle"></i>
                                Static Typing In TypeScript
                            </li>
                            <li>
                                <i class="far fa-check-circle"></i>
                                Create An Engaging And Useful Chatbot
                            </li>
                            <li>
                                <i class="far fa-check-circle"></i>
                                Developer-Friendly React Code In Minutes
                            </li>
                            <li>
                                <i class="far fa-check-circle"></i>
                                Making Remote Work Work Usefuls
                            </li>
                        </ul>
                        <a class="btn-theme home-btn btn-border btn-left-right mt-30"
                            href="https://devsnews.com/template/epixx-prev/epixx/%c3%82%c2%a3/">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->
    <!-- service area start -->
    <div class="service-area pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-12">`
                    <div class="asingle-feature" data-background="{{asset('laptop/assets/img/about/service-1.jpg')}}">
                        <h2>Need Any Helps</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                        <a class="feature-btn" href="contact.html">Contact Us</a>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-12">`
                    <div class="asingle-feature" data-background="{{asset('laptop/assets/img/about/service-2.jpg')}}">
                        <h2>367+ Product</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                        <a class="feature-btn" href="shop.html">Visit Our Shop</a>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-12">`
                    <div class="asingle-feature" data-background="{{asset('laptop/assets/img/about/service-3.jpg')}}">
                        <h2>24/7 Support</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                        <a class="feature-btn" href="shop.html">Get A Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->
    <!-- team area start -->
    <div class="team-area pb-100">
        <div class="container">
            <div class="row mb-70">
                <div class="col-xxl-12">
                    <div class="epix-section-title text-center">About Team</a></li>
                        <h5 class="s-title">Our Expert Team Members</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="bt-team mb-30">
                        <div class="team-img mb-30">
                            <img src="{{asset('laptop/assets/img/team/team4.jpg')}}" alt="img">
                            <div class="team-social">
                                <div class="team-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <a href="#"><i class="fal fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>
                                Nicolash Correia </h3>
                            <span>
                                CEO of Gocart </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="bt-team mb-30">
                        <div class="team-img mb-30">
                            <img src="{{asset('laptop/assets/img/team/team1.jpg')}}" alt="img">
                            <div class="team-social">
                                <div class="team-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <a href="#"><i class="fal fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>
                                Oliveira Barros </h3>
                            <span>
                                Head of Innovation </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="bt-team mb-30">
                        <div class="team-img mb-30">
                            <img src="{{asset('laptop/assets/img/team/team2.jpg')}}" alt="img">
                            <div class="team-social">
                                <div class="team-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <a href="#"><i class="fal fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>
                                Oliveira Barros </h3>
                            <span>
                                Director of Gocart </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="bt-team mb-30">
                        <div class="team-img mb-30">
                            <img src="{{asset('laptop/assets/img/team/team3.jpg')}}" alt="img">
                            <div class="team-social">
                                <div class="team-icon">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <a href="#"><i class="fal fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3>
                                Oliveira Barros </h3>
                            <span>
                                Manager of Gocart </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team area end -->
    <!-- testimonial area start -->
    <div class="testimonial-area pb-135">
        <div class="ml-50 mr-50 testimonial-bg pt-100 pb-100">
            <div class="container">
                <div class="row mb-45">
                    <div class="col-xxl-12">
                        <div class="epix-section-title text-center">Customer Reviews</a></li>
                            <h5 class="s-title">Our Happy Customers</h5>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xxl-10">
                        <div class="testimonial-active swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-slide text-center">
                                        <div class="rating">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i>
                                        </div>
                                        <div class="testimonial-text">
                                            <p>But I must explain to you how all mistaken idea denouncing pleasure
                                                and praising
                                                pain was born
                                                and will give
                                                complete</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="testimonial-author-img">
                                                <img src="{{asset('laptop/assets/img/user/user-1.png')}}" alt="image">
                                            </div>
                                            <div class="testimonial-author-content">
                                                <h3>Martha E. Smith</h3>
                                                <span>Programer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
@endsection