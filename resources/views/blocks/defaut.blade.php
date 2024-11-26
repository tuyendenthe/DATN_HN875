<!DOCTYPE html>
<html class="no-js" lang="">


<!-- Mirrored from www.devsnews.com/template/epixx-prev/epixx/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 16:31:01 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>LAPTOP TECHZONE</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">

    <link rel="manifest" href="https://devsnews.com/template/epixx-prev/epixx/site.webmanifest/" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('laptop/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/fontawesome-all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/ui-range-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/meanmenu.css')}}" />
    <link rel="stylesheet" href="{{asset('laptop/assets/css/swipper.css')}}" />
    @stack('style')
</head>

<body>
<!-- header area start -->
        @include('users.layouts.header')
    <!-- /. mobile header -->
    <!-- slide-bar start -->

    <!-- slide-bar end -->
    @include('users.layouts.sidebar')

    <main>
        @yield('content')
    </main>

    <!-- footer area start -->
    @include('users.layouts.footer')
    <!-- footer copyright end -->

    <!-- JS here -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
    <script src="{{asset('laptop/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/swipper-bundle.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/nice-select.js')}}"></script>
    <script src="{{asset('laptop/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/jquery-ui-slider-range.js')}}"></script>
    <script src="{{asset('laptop/assets/js/jquery.elevatezoom.js')}}"></script>
    <script src="{{asset('laptop/assets/js/countdown.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/mouse-wheel.min.js')}}"></script>
    <script src="{{asset('laptop/assets/js/main.js')}}"></script>

    @static('script')
</body>


<!-- Mirrored from www.devsnews.com/template/epixx-prev/epixx/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 16:31:03 GMT -->
</html>
