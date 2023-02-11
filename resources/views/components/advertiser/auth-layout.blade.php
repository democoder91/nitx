<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Nitx">
    <meta name="description" content=" Nitx, Let the world see you"/>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/png">
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
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme/colors-dark.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/theme/theme-dark.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom-rtl.css')}}">
    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layouts/sider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layouts/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.css')}}">
    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/authentication.css')}}">
    <title>Nitx</title>
</head>
<body>
<div class="row hp-authentication-page">
    <div class="col-12 col-lg-6 bg-primary-4 hp-bg-color-dark-90 position-relative">
        <div class="row hp-image-row h-100 px-8 px-sm-16 px-md-0 pb-32 pb-sm-0 pt-32 pt-md-0">
            <div class="col-12 hp-logo-item m-16 m-sm-32 m-md-64 w-auto px-0">
                <a href="{{route('index')}}"><img class="hp-dark-none" src="{{ asset('img/brand/logo_color.svg') }}" alt="Logo" style="width:40%"></a>
            </div>
            <div class="col-12">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-12 col-md-10 hp-bg-item text-center mb-32 mb-md-0" style="margin-top: 15em">
                        <img class="hp-dark-none m-auto" src="{{asset('assets/img/pages/authentication/authentication-bg.png')}}" alt="Background Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 py-sm-64 py-lg-0">
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
