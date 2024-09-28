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
        <div class="epix-breadcrumb-area mb-40">
            <div class="container">
                <h4 class="epix-breadcrumb-title">SHOP PAGE</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        <li><a href="index-3.html">Home</a></li>
                        <li><span>Shop Page</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <!-- shop product area start -->
        <div class="shop-product-area pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-lg-4">
                        <div class="epix-sidebar-area">
                            <div class="epix-sidebar-widget mb-40">
                                <h4 class="epix-s-widget-title">SHOP BY CATEGORIES</h4>
                                <div class="epix-taglist">
                                    <ul>
                                        <li><a href="shop.html">Accessories</a></li>
                                        <li><a href="shop.html">Cameras & Photos</a></li>
                                        <li><a href="shop.html">Computer & Laptop</a></li>
                                        <li><a href="shop.html">Electronic & Housewares</a></li>
                                        <li><a href="shop.html">Games & Accessories</a></li>
                                        <li><a href="shop.html">Smartphone & Tablet</a></li>
                                        <li><a href="shop.html">TV & Audio</a></li>
                                        <li><a href="shop.html">Uncategorized</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="epix-sidebar-widget">
                                <h4 class="epix-s-widget-title">PRICE</h4>
                                <div class="slider-range mb-40">
                                    <div id="slider-range"></div>
                                    <p>
                                        <label for="amount">Price :</label>
                                        <input type="text" id="amount" readonly>
                                    </p>
                                </div>
                            </div>
                            <div class="epix-sidebar-widget mb-40">
                                <h4 class="epix-s-widget-title">COLORS</h4>
                                <div class="epix-color-scheme">
                                    <ul>
                                        <li>
                                            <a href="#" class="active" data-bg-color="#D1D1D1"></a>
                                            <a href="#" data-bg-color="#FC7C8D"></a>
                                            <a href="#" data-bg-color="#FEE496"></a>
                                            <a href="#" data-bg-color="#161616"></a>
                                            <a href="#" data-bg-color="#00A651)"></a>
                                            <a href="#" data-bg-color="#F50000"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="epix-sidebar-widget mb-40">
                                <h4 class="epix-s-widget-title">TAGS</h4>
                                <div class="tagcloud">
                                    <a href="shop.html">Ryzen</a>
                                    <a href="shop.html">Xeon</a>
                                    <a href="shop.html">Athlon</a>
                                    <a href="shop.html">Core i5</a>
                                    <a href="shop.html">Core i7</a>
                                    <a href="shop.html">Core i9</a>
                                    <a href="shop.html">Celeron</a>
                                </div>
                            </div>
                            <div class="epix-sidebar-widget mb-40">
                                <h4 class="epix-s-widget-title">RECENT PRODUCTS</h4>
                                <div class="epix-product-list mb-20">
                                    <div class="thumb">
                                        <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/side-sm-img-2.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="epix-list-product-sm-title"><a href="single-product.html">Loose Oversized</a></h4>
                                        <div class="price-box">
                                            <span class="price">$125.99</span>
                                            <a href="single-product.html">+ Select Option</a>
                                          </div>
                                    </div>
                                </div>
                                <div class="epix-product-list mb-20">
                                    <div class="thumb">
                                        <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/side-sm-img-3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="epix-list-product-sm-title"><a href="single-product.html">Loose Oversized</a></h4>
                                        <div class="price-box">
                                            <span class="price">$125.99</span>
                                            <a href="single-product.html">+ Select Option</a>
                                          </div>
                                    </div>
                                </div>
                                <div class="epix-product-list mb-20">
                                    <div class="thumb">
                                        <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/side-sm-img-4.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="epix-list-product-sm-title"><a href="single-product.html">Loose Oversized</a></h4>
                                        <div class="price-box">
                                            <span class="price">$125.99</span>
                                            <a href="single-product.html">+ Select Option</a>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /. sidebar area -->
                    </div>
                    <div class="col-xxl-9 col-lg-8 epix-shop-order">
                        <div class="epix-shop-products-display">
                            <div class="epix-shop-product-topbar">
                                <div class="epix-content-header mb-55">
                                    <div class="epix-ch-left">
                                        <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#grid-view" type="button"><i class="fas fa-th"></i></button>
                                            <button class="" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#list-view" type="button"><i class="fas fa-list-ul"></i></button>
                                        </div>
                                        </nav>
                                    </div>
                                    <div class="epix-ch-right">
                                        <div class="show-text">
                                            <span>Showing 1–12 of 20 results</span>
                                        </div>
                                        <div class="sort-wrapper">
                                            <select name="select" id="select">
                                                <option value="1">Short By New</option>
                                                <option value="2">Short By New</option>
                                                <option value="3">Short By New</option>
                                                <option value="4">Short By New</option>
                                                <option value="5">Short By New</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="epix-shop-product-main">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="grid-view">
                                            <div class="row">
                                                @foreach ($products as $item)
                                                <div class="col-xxl-3 col-sm-6 col-md-4">
                                                    <div class="epix-single-product-3 mb-40 style-2 text-center swiper-slide">
                                                        <div class="epix-product-thumb-3">
                                                            <div class="epix-action">
                                                                <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                            <span class="sale">sale</span>
                                                            <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/appilience-1.png')}}" alt=""></a>
                                                        </div>
                                                        <div class="price-box price-box-3">
                                                            <span class="price">${{$item->price}}</span>
                                                            <a href="single-product.html">+ Select Option</a>
                                                        </div>
                                                        <h5 class="epix-p-title epix-p-title-3"><a href="single-product.html">{{$item->name}}</a></h5>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="epix-list-product-single">
                                                <div class="row">
                                                    <div class="col-lg-4 col-xl-3">
                                                        <div class="epix-product-thumb-3 d-inline-block">
                                                            <div class="epix-action">
                                                                <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                            <span class="sale">sale</span>
                                                            <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/appilience-1.png')}}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-xl-9">
                                                        <div class="epix-product-content d-inline-block">
                                                            <div class="mb-15">
                                                                <h5 class="epix-p-title"><a href="single-product.html">Multition Camer Stand</a></h5>
                                                                <div class="wrap">
                                                                    <span class="epix-p-subtitle">Speakers</span>
                                                                    <div class="rating">
                                                                        <i class="fal fa-star"></i>
                                                                        <span>2.5</span>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span class="price">$230.00</span>
                                                                    <a href="single-product.html">+ Select Option</a>
                                                                </div>
                                                            </div>
                                                                <p>intensive care to face - skin bright clear looking skin - luxury 24k gold ampoule is skin treatment effect
                                                                    give
                                                                    smooth
                                                                    skin - soothing rough skin giving silky glowing skin - give elasticity from inner for silky skin</p>
                                                            <a href="cart.html" class="epix-btn-1" tabindex="0"><span>Add To Cart<i class="fal fa-angle-right"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="epix-list-product-single">
                                                <div class="row">
                                                    <div class="col-lg-4 col-xl-3">
                                                        <div class="epix-product-thumb-3 d-inline-block">
                                                            <div class="epix-action">
                                                                <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                            <span class="sale">sale</span>
                                                            <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/appilience-2.png')}}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-xl-9">
                                                        <div class="epix-product-content d-inline-block">
                                                            <div class="mb-15">
                                                                <h5 class="epix-p-title"><a href="single-product.html">Purple NX Mini Aparat</a></h5>
                                                                <div class="wrap">
                                                                    <span class="epix-p-subtitle">Minicat</span>
                                                                    <div class="rating">
                                                                        <i class="fal fa-star"></i>
                                                                        <span>2.5</span>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span class="price">$230.00</span>
                                                                    <a href="single-product.html">+ Select Option</a>
                                                                </div>
                                                            </div>
                                                                <p>intensive care to face - skin bright clear looking skin - luxury 24k gold ampoule is skin treatment effect
                                                                    give
                                                                    smooth
                                                                    skin - soothing rough skin giving silky glowing skin - give elasticity from inner for silky skin</p>
                                                            <a href="cart.html" class="epix-btn-1" tabindex="0"><span>Add To Cart<i class="fal fa-angle-right"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="epix-list-product-single">
                                                <div class="row">
                                                    <div class="col-lg-4 col-xl-3">
                                                        <div class="epix-product-thumb-3 d-inline-block">
                                                            <div class="epix-action">
                                                                <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                            <span class="sale">sale</span>
                                                            <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/appilience-3.png')}}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-xl-9">
                                                        <div class="epix-product-content d-inline-block">
                                                            <div class="mb-15">
                                                                <h5 class="epix-p-title"><a href="single-product.html">Powerbank 11 Mh Blue</a></h5>
                                                                <div class="wrap">
                                                                    <span class="epix-p-subtitle">Minicat</span>
                                                                    <div class="rating">
                                                                        <i class="fal fa-star"></i>
                                                                        <span>2.5</span>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span class="price">$230.00</span>
                                                                    <a href="single-product.html">+ Select Option</a>
                                                                </div>
                                                            </div>
                                                                <p>intensive care to face - skin bright clear looking skin - luxury 24k gold ampoule is skin treatment effect
                                                                    give
                                                                    smooth
                                                                    skin - soothing rough skin giving silky glowing skin - give elasticity from inner for silky skin</p>
                                                            <a href="cart.html" class="epix-btn-1" tabindex="0"><span>Add To Cart<i class="fal fa-angle-right"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="epix-list-product-single">
                                                <div class="row">
                                                    <div class="col-lg-4 col-xl-3">
                                                        <div class="epix-product-thumb-3 d-inline-block">
                                                            <div class="epix-action">
                                                                <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                            <span class="sale">sale</span>
                                                            <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/appilience-4.png')}}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-xl-9">
                                                        <div class="epix-product-content d-inline-block">
                                                            <div class="mb-15">
                                                                <h5 class="epix-p-title"><a href="single-product.html">Powerbank 11 Mh Blue</a></h5>
                                                                <div class="wrap">
                                                                    <span class="epix-p-subtitle">Minicat</span>
                                                                    <div class="rating">
                                                                        <i class="fal fa-star"></i>
                                                                        <span>2.5</span>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span class="price">$230.00</span>
                                                                    <a href="single-product.html">+ Select Option</a>
                                                                </div>
                                                            </div>
                                                                    <p>intensive care to face - skin bright clear looking skin - luxury 24k gold ampoule is skin treatment
                                                                        effect give smooth
                                                                        skin - soothing rough skin giving silky glowing skin - give elasticity from inner for silky skin</p>
                                                            <a href="cart.html" class="epix-btn-1" tabindex="0"><span>Add To Cart<i class="fal fa-angle-right"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="epix-list-product-single">
                                                <div class="row">
                                                    <div class="col-lg-4 col-xl-3">
                                                        <div class="epix-product-thumb-3 d-inline-block">
                                                            <div class="epix-action">
                                                                <a href="single-product.html" class="p-cart product-popup-toggle">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="cart.html" class="p-cart">
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                    <i class="fal fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                            <span class="sale">sale</span>
                                                            <a href="single-product.html"><img src="{{asset('laptop/assets/img/product/appilience-5.png')}}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-xl-9">
                                                        <div class="epix-product-content d-inline-block">
                                                            <div class="mb-15">
                                                                <h5 class="epix-p-title"><a href="single-product.html">Widescreen 4K SUH</a></h5>
                                                                <div class="wrap">
                                                                    <span class="epix-p-subtitle">Minicat</span>
                                                                    <div class="rating">
                                                                        <i class="fal fa-star"></i>
                                                                        <span>2.5</span>
                                                                    </div>
                                                                </div>
                                                                <div class="price-box">
                                                                    <span class="price">$134.00</span>
                                                                    <a href="single-product.html">+ Select Option</a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xxl-10">
                                                                    <p>The luxury 24k gold ampoule helps the skin on your face by refining luxure and fresh clean skin. Enjoy it
                                                                        after
                                                                        treatment or anytime you want fresh clean feeling skinluluxury </p>
                                                                </div>
                                                            </div>
                                                            <a href="cart.html" class="epix-btn-1" tabindex="0"><span>Add To Cart<i class="fal fa-angle-right"></i></span></a>
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
                <div class="row justify-content-xxl-end">
                    <div class="col-xxl-9">
                        <div class="epix-pagination pagination-area mt-40 mb-70">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center justify-xl-content-left">
                                    <li class="page-item disabled">
                                        <a class="page-link prev" href="shop.html" tabindex="-1"><i class="fal fa-angle-left"></i> Prev</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="shop.html">1</a></li>
                                    <li class="page-item"><a class="page-link" href="shop.html">2</a></li>
                                    <li class="page-item"><a class="page-link" href="shop.html">3</a></li>
                                    <li class="page-item"><a class="page-link" href="shop.html">4</a></li>
                                    <li class="page-item">
                                        <a class="page-link next" href="shop.html">Next <i class="fal fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop product area end -->
    </main>
@endsection    

@push('script')
@endpush
