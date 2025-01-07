<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li> --}}
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('chart')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Thống kê doanh thu</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('product_statistics')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Thống kê số lượng - giá tiền</span></a></li>
                <li class="sidebar-item">
                    @if(auth()->check())
                        <form method="GET" action="{{ route('admin1.check123') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            <input type="hidden" name="password" id="hiddenPassword" value="{{ session('user_password') }}">
                            <button modal="kmacb-form" type="submit" title="Перезвонить Вам" style="border:none !important; background:none !important;">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                                    <i class="mdi mdi-chart-bar"></i>
                                    <span class="hide-menu">Chăm sóc khách hàng</span>
                                </a>
                            </button>
                        </form>
                    @else
                        <script>
                            //  alert('Bạn không có quyền. Vui lòng đăng nhập trước!');
                             window.location.href = "{{ route('login') }}";
                            // alert('Vui lòng đăng nhập để tiếp tục.');
                            //  window.location.href = "{{ route('login', ['message' => 'Bạn không có quyền. Vui lòng đăng nhập trước!']) }}";
                        </script>
                    @endif
                </li>


                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Danh mục </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('category.index')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Danh mục</span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('category_post.index')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Danh mục bài viết</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Bài viết</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('post.index')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Danh sách bài viết</span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('post.create')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Bài viết mới</span></a></li>
                    </ul>
                </li>
                {{-- user --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Tài khoản</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('admin1.users.listuser')}}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Danh sách </span></a></li>
                        {{-- <li class="sidebar-item"><a href="{{route('admin1.users.adduser')}}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Thêm mới </span></a></li> --}}
                    </ul>
                </li>
                {{-- /* --------------------------------- COMMENT -------------------------------- */ --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Đánh giá </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('list-comment')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Danh sách</span></a></li>
                    </ul>
                </li>
                {{-- /* --------------------------------- PRODUCT -------------------------------- */ --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Sản phẩm </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('products.listProduct')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Danh sách</span></a></li>
                        {{-- <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('categories.index')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Loại sản phẩm</span></a></li> --}}

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('products.addProduct')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Thêm mới</span></a></li>
                    </ul>
                </li>
                  {{-- /* --------------------------------- đơn hàng -------------------------------- */ --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Quản Lý Đơn Hàng </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('checkout.list')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Đơn Hàng Đang Thực Hiện</span></a></li>
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('checkout.history')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Lịch Sử Đơn Hàng</span></a></li>
                    </ul>
                </li>
                {{-- /* --------------------------------- Banner -------------------------------- */ --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Banner </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('banner.index')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Banner chính</span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('banner_cover.index')}}" aria-expanded="false"><i class="fa-solid fa-bars"></i><span class="hide-menu">Banner phụ</span></a></li>
                    </ul>
                </li>

                {{-- /* --------------------------------- PRODUCT -------------------------------- */ --}}
                {{-- // --}}

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('contact.index')}}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Liên hệ</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('bookfix.index')}}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Lịch Sửa Chữa khách Hàng</span></a></li>



                {{-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('widgets')}}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Widgets</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('tables')}}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Tables</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('fullwidth')}}" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Full Width</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                     <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('form-basic')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Form Basic </span></a></li>
                        <li class="sidebar-item"><a href="{{route('form-wizard')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Form Wizard </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-buttons.html" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Buttons</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Icons </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Material Icons </span></a></li>
                        <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Font Awesome Icons </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-elements.html" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Elements</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Addons </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2 </span></a></li>
                        <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery </span></a></li>
                        <li class="sidebar-item"><a href="pages-calendar.html" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar </span></a></li>
                        <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice </span></a></li>
                        <li class="sidebar-item"><a href="pages-chat.html" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option </span></a></li>
                    </ul>
                </li> --}}
                 {{-- voucher --}}
                 <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Mã giảm giá </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{route('admin1.vouchers.index')}}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Danh sách </span></a></li>
                        <li class="sidebar-item"><a href="{{route('admin1.vouchers.create')}}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Thêm mới </span></a></li>
                    </ul>
                </li>
                {{-- user --}}

                {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Errors </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="error-403.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 403 </span></a></li>
                        <li class="sidebar-item"><a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 404 </span></a></li>
                        <li class="sidebar-item"><a href="error-405.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 405 </span></a></li>
                        <li class="sidebar-item"><a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Error 500 </span></a></li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
