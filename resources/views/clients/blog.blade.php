<style>
    /* Đảm bảo các bài viết có không gian giữa chúng */
    .cr-blog-classic {
        margin-bottom: 30px; /* Khoảng cách dưới mỗi bài viết */
        border: 1px solid #ddd; /* Thêm border cho bài viết */
        border-radius: 8px; /* Bo góc bài viết */
        overflow: hidden; /* Đảm bảo các phần tử không tràn ra ngoài */
        background-color: #fff; /* Màu nền trắng cho bài viết */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ nhẹ */
    }

    /* Tăng khoảng cách giữa các thành phần trong bài viết */
    .cr-blog-classic-content {
        padding: 20px; /* Thêm padding cho phần nội dung bài viết */
    }

    /* Căn chỉnh chữ và khoảng cách cho tiêu đề */
    .cr-blog-classic-content h4 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    /* Cải thiện hiển thị đoạn mô tả */
    .cr-blog-classic-content p {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
    }

    /* Tạo hiệu ứng cho đường link "Đọc thêm" */
    .cr-blog-classic-content a {
        font-size: 16px;
        color: #007bff;
        text-decoration: none;
        margin-top: 10px;
        display: inline-block;
    }

    /* Hiệu ứng hover cho link "Đọc thêm" */
    .cr-blog-classic-content a:hover {
        text-decoration: underline;
        color: #0056b3;
    }

    /* Đảm bảo ảnh bài viết không bị co kéo, có viền tròn cho ảnh */
    .cr-blog-image img {
        object-fit: cover; /* Đảm bảo ảnh sẽ không bị kéo căng */
        border-radius: 8px 8px 0 0; /* Viền tròn cho ảnh ở góc trên */
    }

    /* Tạo khoảng cách giữa các bài viết */
    @media (min-width: 992px) {
        .col-lg-6 {
            padding: 0 15px; /* Khoảng cách giữa các bài viết */
        }
    }

    /* Cải thiện giao diện pagination */
    .cr-pagination {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    .cr-pagination .page-item {
        margin: 0 5px;
    }

    .cr-pagination .page-link {
        color: #007bff;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .cr-pagination .page-link:hover {
        background-color: #007bff;
        color: white;
    }

</style>
@extends('clients.master')

@section('content')
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Bài viết</h2>
                            <span><a href="{{route('home')}}">Trang chủ</a> / Bài viết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog-Classic -->
    <section class="section-blog-Classic padding-tb-100">
        <div class="container">
            <div class="row mb-minus-24">
                @foreach($posts as $post)
                    <div class="col-lg-6 mb-24">
                        <div class="cr-blog-classic" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                            <div class="cr-blog-classic-content">
                                <div class="cr-comment">
                                    <span>Bởi {{$post->user->name}} <code> / {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</code></span>
                                </div>
                                <h4>{{$post->title}}</h4>
                                <p style="display: -webkit-box;
                                            -webkit-line-clamp: 3; -webkit-box-orient: vertical;white-space: nowrap;
                                            overflow: hidden; text-overflow: ellipsis; word-wrap: break-word"
                                >{{$post->content_short}}</p>
                                <a href="{{route('single_blog', $post->id)}}">Đọc thêm</a>
                            </div>
                            <div class="cr-blog-image" style="width: 724px;height: 306px">
                                <img style="height: 100%; width: 100%;" src="{{asset('storage/' . $post->image)}}"
                                     alt="blog-1">
                            </div>
                        </div>
                    </div>
                @endforeach
                <nav aria-label="..." class="cr-pagination">
{{--                    {{$list->links()}}--}}
                </nav>
            </div>
        </div>
    </section>
@endsection
