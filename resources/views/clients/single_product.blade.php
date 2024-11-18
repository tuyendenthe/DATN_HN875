@extends('clients.master')
@section('content')
<style>
    .variant-container {
        display: flex;
        gap: 10px;
        margin-top: 30px;
        justify-content: center;
    }

    .variant-box {
        padding: 10px;
        /* Giảm padding để hộp nhỏ hơn */
        border: 2px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        /* Giảm kích thước chiều rộng */
        height: 70px;
        /* Giảm kích thước chiều cao */
        transition: 0.3s;
        position: relative;
        user-select: none;
        font-size: 12px;
        /* Giảm kích thước chữ */
    }

    .variant-box.selected {
        border-color: #007bff;
        background-color: #e7f1ff;
        color: #007bff;
        font-weight: bold;
    }

    .variant-box input[type="radio"] {
        display: none;
        /* Ẩn radio button */
    }

    .variant-box:hover {
        border-color: #007bff;
    }

    .price-display {
        text-align: center;
        margin-top: 20px;
        font-size: 24px;
        font-weight: bold;
    }

    .page-header {
    background-size: cover;
    background-position: center;
    padding: 50px 0;
    color: #fff;
    }

.page-header .page-title {
    font-size: 2.5rem;
    margin: 0;
}

.breadcrumb-nav {
    margin: 20px 0;
}

.breadcrumb-nav .breadcrumb {
    background: none;
    padding: 0;
}

.breadcrumb-nav .breadcrumb-item a {
    color: #007bff;
}

.breadcrumb-nav .breadcrumb-item.active {
    color: #6c757d;
}

/* Định dạng cho phần nội dung */
.page-content {
    padding: 30px 0;
}

.rating {
    direction: rtl;
    display: inline-block;
    font-size: 2rem;
}

.rating input[type="radio"] {
    display: none;
}

.rating label {
    color: #d3d3d3;
    cursor: pointer;
    font-size: 2rem;
    transition: color 0.3s;
}

.rating input[type="radio"]:checked ~ label {
    color: #f39c12;
}

.rating label:hover,
.rating label:hover ~ label {
    color: #f39c12;
}

textarea {
    width: 100%;
    height: 150px;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

</style>
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

    <!-- single product area start -->
    <div class="single-product-area mb-100">
        <div class="container">
            <div class="row mb-40">
                <div class="col-xxl-6 col-lg-6">
                    <div class="epix-single-product-left mr-35">
                        <div class="epix-tab-product mb-15">
                            <div class="epix-product-tab-content">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="epix-single-1">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>featured</span>
                                            </div>
                                            <img style="height: 400px;width: 400px;margin-left: 70px" src="{{ Storage::url($products->image) }}"
                                                 data-zoom-image="{{asset('laptop/assets/img/product/signle-product-1.jpg')}}"
                                                 class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-2">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>new</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-2.jpg')}}"
                                                 data-zoom-image="{{asset('laptop/assets/img/product/signle-product-2.jpg')}}"
                                                 class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-3">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>hot</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-3.jpg')}}"
                                                 data-zoom-image="{{asset('laptop/assets/img/product/signle-product-3.jpg')}}"
                                                 class="img-fluid zoom-img-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="epix-single-4">
                                        <div class="epix-single-product-thumb-4">
                                            <div class="epix-featured">
                                                <span>featured</span>
                                            </div>
                                            <img src="{{asset('laptop/assets/img/product/signle-product-4.jpg')}}"
                                                 data-zoom-image="{{asset('laptop/assets/img/product/signle-product-4.jpg')}}"
                                                 class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                    <div class="epix-tab-content">--}}
                        {{--                        <ul class="nav nav-pills mb-3" id="epix-single-product-tab" role="tablist">--}}
                        {{--                            <li>--}}
                        {{--                                <button class="active" value="1" data-bs-toggle="pill" data-bs-target="#epix-single-1"--}}
                        {{--                                    type="button">--}}
                        {{--                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-1.jpg')}}" alt="">--}}
                        {{--                                </button>--}}
                        {{--                            </li>--}}
                        {{--                            <li>--}}
                        {{--                                <button data-bs-toggle="pill" value="2" data-bs-target="#epix-single-2"--}}
                        {{--                                    type="button">--}}
                        {{--                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-2.jpg')}}" alt="">--}}
                        {{--                                </button>--}}
                        {{--                            </li>--}}
                        {{--                            <li>--}}
                        {{--                                <button data-bs-toggle="pill" value="3" data-bs-target="#epix-single-3"--}}
                        {{--                                    type="button">--}}
                        {{--                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-3.jpg')}}" alt="">--}}
                        {{--                                </button>--}}
                        {{--                            </li>--}}
                        {{--                            <li>--}}
                        {{--                                <button data-bs-toggle="pill" value="4" data-bs-target="#epix-single-4"--}}
                        {{--                                    type="button">--}}
                        {{--                                    <img width="98" height="98" src="{{asset('laptop/assets/img/product/single-product-sm-4.jpg')}}" alt="">--}}
                        {{--                                </button>--}}
                        {{--                            </li>--}}
                        {{--                        </ul>--}}
                        {{--                    </div>--}}
                    </div>
                    <!-- /. single product left -->
                </div>
                <div class="col-xxl-6 col-lg-6">

                <div class="epix-single-product-right">
                    <div class="rating">
                        <i class="fas fa-star active"></i>
                        <i class="fas fa-star active"></i>
                        <i class="fas fa-star active"></i>
                        <i class="fas fa-star-half"></i>
                        <i class="fas fa-star text-gray"></i>
                    </div>
                    <h4 class="epix-single-product-title">{{ $products->name }}<br></h4>
                    <p class="epix-product-details-short-description">
                        {{ $products->content_short }}
                    </p>

                    <div class="price-display">
                        Giá: <span id="product-price" name="product-price">0,000</span> VNĐ
                    </div>

                    <!-- Form để thêm vào giỏ hàng -->
                    <form action="{{ route('cart.add', $products->id) }}" method="POST" class="epix-cart-variation">
                        @csrf
                        <div class="epix-product-label mb-35">
                            <a href="#" class="title">Chọn màu sắc cho sản phẩm</a>
                            <div class="container">
                                <div class="variant-container">
                                    @foreach($products->variants as $variant)
                                    <div class="variant-box" data-value="{{ $variant->name }}" data-price="{{ $variant->price }}" onclick="selectVariant(this)">
                                        <input type="radio" name="variant_id" id="{{ $variant->id }}" value="{{ $variant->id }}">
                                        <label for="{{ $variant->id }}">{{ $variant->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        <div class="epix-quantity-validation">
                            <div class="wrap-2 d-block d-sm-inline-block mb-15 mb-sm-0">
                                <div class="d-inline-block border-gray mr-20">
                                    {{-- <div class="epix-quantity-form">
                                            <div class="cart-plus-minus"></div>
                                            <input type="text" value="2">
                                        </div> --}}

                                </div>
                                <button type="submit" class="buy-btn d-block d-sm-inline-block text-center text-sm-left">Thêm vào giỏ hàng</button>
                    </form>
                            </div>
                            <a href="checkout.html" class="buy-btn d-block d-sm-inline-block text-center text-sm-left">Buy Now</a>
                        </div>
                    </form>
                </div>
                <!-- /. single product right -->
            </div>
        </div>

    <div class="row ms-5">
        <div class="col-xxl-12">
            <div class="epix-single-product-description">
                <div class="epix-single-product-description-tabs-wrap mb-20">
                    <div class="epix-single-product-description-tab">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="active" data-bs-toggle="pill" data-bs-target="#tab-1-1"
                                        type="button">DESCRIPTION</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="pill" data-bs-target="#tab-1-2" type="button">Additional information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="pill" data-bs-target="#tab-1-3" type="button">Reviews (3)</button>
                            </li>
                        </ul>
                    </div>
                    <div class="epix-single-product-description-content-wrap">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="tab-1-1" role="tabpanel">
                                <div class="epix-single-product-content">
                                    {{ $products->content }}
                                    <div class="row">
                                        <div class="col-xxl-7">
                                            <div class="epix-featured-list">
                                                <h4 class="epix-featured-list-title">Technical Details</h4>
                                                <ul>
                                                    <li>
                                                        <span>Device Length :</span>
                                                        <span>Dimensions 2024*3068</span>
                                                    </li>
                                                    <li>
                                                        <span>Type :</span>
                                                        <span>Rechargeable Lithium battery</span>
                                                    </li>
                                                    <li>
                                                        <span>USB :</span>
                                                        <span>Type-C fast charge</span>
                                                    </li>
                                                    <li>
                                                        <span>USB:</span>
                                                        <span>Type-C fast charge</span>
                                                    </li>
                                                    <li>
                                                        <span>Warranty :</span>
                                                        <span>30 Days Warenty</span>
                                                    </li>
                                                    <li>
                                                        <span>Processor Count :</span>
                                                        <span>30 Days Warenty</span>
                                                    </li>
                                                    <li>
                                                        <span>Device Length :</span>
                                                        <span>Dimensions 2024*3068</span>
                                                    </li>
                                                    <li>
                                                        <span>Type :</span>
                                                        <span>Rechargeable Lithium battery</span>
                                                    </li>
                                                    <li>
                                                        <span>USB :</span>
                                                        <span>Type-C fast charge</span>
                                                    </li>
                                                    <li>
                                                        <span>USB:</span>
                                                        <span>Type-C fast charge</span>
                                                    </li>
                                                    <li>
                                                        <span>Warranty :</span>
                                                        <span>30 Days Warenty</span>
                                                    </li>
                                                    <li>
                                                        <span>Processor Count :</span>
                                                        <span>30 Days Warenty</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-1-2" role="tabpanel">
                                <div class="epix-additional-product-information">
                                    <div class="epix-product-table">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th>Color</th>
                                                <td>
                                                    <a href="shop.html">Yellow</a>
                                                    <a href="shop.html">Red</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Dimention</th>
                                                <td>
                                                    <a href="shop.html"><span>1200 * 500px</span></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>BRAND</th>
                                                <td>
                                                    <a href="shop.html">MANGO</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>LOOK AFTER ME</th>
                                                <td>
                                                    <a href="shop.html">Wipe clean only</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-1-3" role="tabpanel">
                                <div class="epix-review-content mb-40">
                                    <div class="epix-rating-count-wrap">
                                        <div class="epix-rating-count-left-content">
                                            <h5>CUSTOMER REVIEWS</h5>
                                            <div class="epix-rating-flex-wrap">
                                                <div class="row g-0">
                                                    <div class="col-xxl-2 col-md-4">
                                                        <div class="epix-rating-count-number-box text-center">
                                                            <div class="epix-rating-count-number">
                                                                <h4>4.33</h4>
                                                            </div>
                                                            <div class="rating">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                            <span class="review-subtitle">Based on 3 reviews</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-8 col-md-8">
                                                        <div class="epix-count-right-progress">
                                                            <div class="single-progress-list">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="epix-rating-progress">
                                                                    <div class="progress-count" data-width="72%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>55</span>
                                                                </div>
                                                            </div>
                                                            <div class="single-progress-list">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="epix-rating-progress">
                                                                    <div class="progress-count" data-width="32%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>32</span>
                                                                </div>
                                                            </div>
                                                            <div class="single-progress-list">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="epix-rating-progress">
                                                                    <div class="progress-count" data-width="44%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>44</span>
                                                                </div>
                                                            </div>
                                                            <div class="single-progress-list">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="epix-rating-progress">
                                                                    <div class="progress-count" data-width="93%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>93</span>
                                                                </div>
                                                            </div>
                                                            <div class="single-progress-list">
                                                                <div class="rating">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                    <i class="fal fa-star"></i>
                                                                </div>
                                                                <div class="epix-rating-progress">
                                                                    <div class="progress-count" data-width="65%"></div>
                                                                </div>
                                                                <div class="count">
                                                                    <span>65</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-10">
                                        <ul class="epix-commentlist mb-50">
                                            @foreach ($reviews as $review)
                                                <li class="epix-comment-item">
                                                    <div class="epix-comment-thumb">
                                                        <img src="{{ asset('laptop/assets/img/user/user-1.png') }}" alt="">
                                                    </div>
                                                    <div class="epix-comment-content">
                                                        <div class="epix-comment-top">
                                                            <div class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $review->star)
                                                                        <i class="fas fa-star"></i>
                                                                    @else
                                                                        <i class="fal fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div class="user-name"><a href="#">{{ $review->user->name ?? 'Unknown User' }}</a></div>
                                                            <span class="date">– {{ $review->comment }}</span>
                                                            <span class="date">– {{ $review->created_at->format('F d, Y') }}</span>
                                                        </div>
                                                        <div class="epix-comment-bottom">
                                                            <p>{{ $review->content }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach


                                        </ul>
                                        <div class="epix-review-form-wrapper">
                                            <h4 class="epix-review-title">Add a review</h4>
                                            <form action="{{ route('post.review') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name='product_id' value="{{$products->id}}">
                                    
                                                <div class="rating">
                                                    <input type="radio" name="star" id="star5" value="5">
                                                    <label for="star5" title="5 stars">★</label>
                                                    
                                                    <input type="radio" name="star" id="star4" value="4">
                                                    <label for="star4" title="4 stars">★</label>
                                                    
                                                    <input type="radio" name="star" id="star3" value="3">
                                                    <label for="star3" title="3 stars">★</label>
                                                    
                                                    <input type="radio" name="star" id="star2" value="2">
                                                    <label for="star2" title="2 stars">★</label>
                                                    
                                                    <input type="radio" name="star" id="star1" value="1">
                                                    <label for="star1" title="1 star">★</label>
                                                </div>
                                                <br>
                                                <label for="comment">Comment:</label>
                                                <textarea name="comment" id="comment"></textarea>
                                            
                                                <button type="submit">Submit</button>
                                            </form>
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
    </div>
</div>
<!-- single product area end -->
<script>
    function selectVariant(element) {
        // Xóa class "selected" khỏi tất cả các hộp
        var variants = document.querySelectorAll('.variant-box');
        variants.forEach(function(variant) {
            variant.classList.remove('selected');
        });

            // Thêm class "selected" cho hộp được chọn
            element.classList.add('selected');

            // Đánh dấu radio button tương ứng
            var radioButton = element.querySelector('input[type="radio"]');
            radioButton.checked = true;

        // Lấy giá từ thuộc tính data-price và cập nhật giá sản phẩm
        var selectedPrice = element.getAttribute('data-price');
        document.getElementById('product-price').innerText = selectedPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function updateQuantity(key, quantityChange) {
    let form = document.createElement('form');
    form.method = 'POST';
    form.action = `/cart/update/${key}`;

    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'quantity';
    input.value = quantityChange;

    let csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = '{{ csrf_token() }}';

    form.appendChild(input);
    form.appendChild(csrfInput);
    document.body.appendChild(form);
    form.submit();
}

</script>
@endsection
