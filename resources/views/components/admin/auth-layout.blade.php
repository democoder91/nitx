<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Nitx">
    <meta name="description" content=" Nitx, Let the world see you"/>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/brand/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/brand/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/brand/favicon.png') }}">
    <meta name="msapplication-TileColor" content="#0010f7">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugin/swiper-bundle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icons/iconly/index.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icons/remix-icon/index.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.css')}}">
    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/font-control.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/typography.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/base.css')}}">
    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.css')}}">
    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/page-lock-screen.css')}}">
    <title>Nitx | Admin</title>
</head>
<body>
<div class="row align-items-center justify-content-center hp-lock-screen bg-primary-1 hp-bg-color-dark-100">
    <div class="hp-screen-bg"
         style="background-image: url(../assets/img/pages/lock-screen/lock-pattern.svg);"></div>
    <div class="col-12 position-relative">
        <div class="mb-32 mb-sm-64 text-center">
            <a href="/">
                <img src="{{ asset('img/brand/logo.svg') }}" style="height: 60px;" alt="Nitx Logo">
            </a>
        </div>
        {{ $slot }}
    </div>
</div>
<!-- Plugin -->
<script src="{{asset('assets/js/plugin/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/moment.min.js')}}"></script>

<!-- Base -->
<script src="{{asset('assets/js/base/index.js')}}"></script>
</body>

</html>
