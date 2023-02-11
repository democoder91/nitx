<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Nitx">
    <meta name="description" content="Responsive, Highly Customizable Dashboard Template"/>

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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/page-profile.css')}}">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/pages/widgets-selectbox.css">

    <!-- Dropzone -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!-- Tempus Dominus Styles -->
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css"
          rel="stylesheet" crossorigin="anonymous">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Nitx</title>
</head>

<body class="collapse-btn-none">
    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        <div class="hp-main-layout-content">
            <div class="row mb-32 gy-32">
                <div class="mt-24 mb-12"></div><!--Dividers-->
                <div class="col-12">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>


<div class="scroll-to-top">
    <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px"
             xmlns="http://www.w3.org/2000/svg">
            <g>
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"></path>
            </g>
        </svg>
    </button>
</div>

<!-- Plugin -->
<script src="{{asset('assets/js/plugin/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/moment.min.js')}}"></script>

<!-- Base -->
<script src="{{asset('assets/js/base/index.js')}}"></script>

<!-- Cards -->
<script src="{{asset('assets/js/cards/card-advance.js')}}"></script>

<!-- Dropzone -->
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"
        integrity="sha512-f6WsaafWFia+glfiIH85UyfdCVDyJScsVDM70lJhKr2lt2cYyptkiqtVxcxPnh/CduM/FpfL0eC4liTwZMb58g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>
