
</style>
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{ route('index') }}">
                <!-- Logo icon -->
                <b class="logo-icon p-l-10">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    {{-- <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" /> --}}
                    <img style="margin-top: 15px" width="46px" src="{{asset('admin/assets/images/techzone.jpg')}}"  alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    {{-- <img style="margin-top: 15px" src="{{asset('admin/assets/images/logo-text.png')}}" alt="homepage" class="light-logo" /> --}}

                </span>
                <!-- Logo icon -->
                <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                <!-- </b> -->
                <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                    <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> --}}
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                    </form>
                </li> --}}
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-bell font-24"></i>
                        @if(session('new_order')) <!-- Kiểm tra nếu có đơn hàng mới -->
                            <span class="badge badge-danger">New!</span> <!-- Hiển thị badge thông báo -->
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(session('new_order'))
                            <a class="dropdown-item" href="#">Có một đơn hàng mới!</a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link {{ $notifications->count() > 0 ? 'has-notification' : '' }}" href="{{ route('notifications.index') }}">
                        <i class="mdi mdi-bell font-24 icon-bell"></i> Thông Báo
                    </a>
                </li> --}}
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('notifications.index') }}">

                    <i class="mdi mdi-bell font-24"></i>

                    </a>

                    </li>

                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                        <ul class="list-style-none">
                            <li>
                                <div class="">
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Event today</h5>
                                                <span class="mail-desc">Just a reminder that event</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Settings</h5>
                                                <span class="mail-desc">You can customize this template</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Pavan kumar</h5>
                                                <span class="mail-desc">Just see the my admin!</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                        <div class="d-flex no-block align-items-center p-10">
                                            <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                            <div class="m-l-10">
                                                <h5 class="m-b-0">Luanch Admin</h5>
                                                <span class="mail-desc">Just see the my new admin!</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <div class="container">
                    @if (session('message'))
                        <div id="notification" class="notification alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session('message1'))
                    <div id="notification" class="notification1 alert alert-danger" role="alert">
                        {{ session('message1') }}
                    </div>
                @endif

                    <!-- Other content here -->
                </div>

                <style>
                    .notification1 {
                        display: none;
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        z-index: 1000;
                        padding: 15px;
                        border-radius: 5px;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                        background-color: #d4edda; /* Màu xanh nhạt */
                        color: #155724; /* Màu chữ xanh đậm */
                    }
                </style>
                <style>
                    .notification {
                        display: none;
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        z-index: 1000;
                        padding: 15px;
                        border-radius: 5px;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    }
                </style>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var notification = document.getElementById('notification');

                        if (notification) {
                            // Show the notification
                            notification.style.display = 'block';

                            // Hide the notification after 5 seconds
                            setTimeout(function() {
                                notification.style.display = 'none';
                            }, 5000);

                            // Optional: Add hover effect to keep it visible
                            notification.addEventListener('mouseenter', function() {
                                notification.style.display = 'block';
                            });

                            notification.addEventListener('mouseleave', function() {
                                notification.style.display = 'none';
                            });
                        }
                    });
                </script>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ Auth::user()->image ? Storage::url(Auth::user()->image) : asset('admin/assets/images/users/default.jpg') }}" alt="user" class="rounded-circle" width="31">
            </a>
            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                <a class="dropdown-item" href="{{ route('admin.users.edit', Auth::user()->id) }}">
                    <i class="fas fa-lock m-r-5 m-l-5"></i> Cập nhật tài khoản
                </a>
                <a class="dropdown-item" href="{{ route('admin.change.password.form') }}">
                    <i class="fas fa-lock m-r-5 m-l-5"></i> Đổi Mật Khẩu
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt m-r-5 m-l-5"></i> Đăng Xuất
                </a>
            </div>
        </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>

