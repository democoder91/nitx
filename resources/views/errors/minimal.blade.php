<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Hypeople">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template"/>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/png">

    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/plugin/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/icons/iconly/index.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/icons/remix-icon/index.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/colors.css">

    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/base/font-control.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/base/typography.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/base/base.css">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/theme/colors-dark.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/theme/theme-dark.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/custom-rtl.css">

    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/layouts/sider.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/layouts/header.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/components.css">

    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/pages/page-error.css">

    <title>@yield('title')</title>
</head>


<body style="overflow: hidden;">
<div class="row bg-primary-4 hp-bg-color-dark-90 text-center" style="height: 105vh;">
    <div class="col-12 hp-error-content py-32">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-12">
                <a href="{{ route('index') }}">
                    <img class="justify-content-center" src="{{ asset('img/brand/logo_color.svg') }}" alt="logo"
                         style="height:4em; margin-left:5%;">
                </a>
                <div class="position-relative mt-0 mt-sm-64 mb-32">
                    <div class="hp-error-content-circle hp-bg-dark-100"></div>
                    <img class="position-relative d-block mx-auto" src=" @yield('img')">
                </div>
                <h1 class="hp-error-content-title mb-0 mb-sm-8 fw-light"> @yield('code')</h1>
                <h2 class="h1 mb-0 mb-sm-16">@yield('message')</h2></br>
                <a href="{{ route('index') }}">
                    <h2 class="text-primary">Back to Home</h2>
                </a>
                <div class="col-12" style="margin-top: 2em;">
                    <p class=" hp-badge-text">COPYRIGHT ©2022 Nitx, All rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Plugin -->
<script src="../../../assets/js/plugin/jquery.min.js"></script>
<script src="../../../assets/js/plugin/bootstrap.bundle.min.js"></script>
<script src="../../../assets/js/plugin/swiper-bundle.min.js"></script>
<script src="../../../assets/js/plugin/jquery.mask.min.js"></script>
<script src="../../../assets/js/plugin/moment.min.js"></script>

<!-- Base -->
<script src="../../../assets/js/base/index.js"></script>


</body>

</html>
