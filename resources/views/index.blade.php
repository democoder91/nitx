<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Nitx">
    <title>Nitx</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/png">
    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugin/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icons/iconly/index.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icons/remix-icon/index.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.css') }}">
    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/base/font-control.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/base/typography.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/base/base.css') }}">
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/colors-dark.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme/theme-dark.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom-rtl.css') }}">
    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/layouts/sider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/layouts/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.css') }}">
    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/page-landing.css') }}">
    <!--Meta Tags-->
    <meta name="msapplication-TileImage" content="{{ asset('img/brand/meta.jpg') }}">
    <meta property="og:site_name" content="Nitx">
    <meta property="og:title" content="Let the world see you">
    <meta property="og:description" content="It's time for you to shine">
    <meta property="og:image" content="{{ asset('img/brand/meta.jpg') }}">
    <meta property="og:type" content="website" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <!--Twitter Meta Tags-->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@nitx_io" />
    <meta name="twitter:title" content="Let the world see you" />
    <meta name="twitter:description" content="It's time for you to shine" />
    <meta name="twitter:image:src" content="{{ asset('img/brand/meta.jpg') }}" />
    <meta name="twitter:creator" content="@nitx_io">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200;300;400;500;600;700;800;900&family=Tajawal:wght@200;400;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Kufi Arabic',
                sans-serif;
        }
    </style>
</head>

<body style="margin-top: 2%">
    <div class="hp-landing bg-black-0 hp-bg-dark-90 overflow-hidden">
        <header class="my-16">
            <div class="hp-landing-container w-100">
                <div class="row align-items-center justify-content-between">
                    <div class="col hp-flex-none w-auto">
                        <div class="hp-header-logo d-flex align-items-end">
                            <a href="{{ route('index') }}">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                                    src="img/brand/logo_color.svg" alt="logo" style="height: 45px;">
                            </a>
                        </div>
                    </div>

                    <div class="col hp-flex-none w-auto hp-landing-header-mobile-button">
                        <button type="button" class="btn btn-text btn-icon-only" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ri-menu-fill text-black-80 hp-text-color-dark-30" style="font-size: 24px;"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end" style="width: 200px;">
                            <li>
                                <a class="dropdown-item" href="#features"><strong>{{ __('Features') }}</strong></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#partner"><strong>{{ __('Partners') }}</strong></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#pricing"><strong>{{ __('Pricing') }}</strong></a>
                            </li>
                            <li>
                                <ul class="d-flex justify-content-between py-8 px-16">
                                    <li>
                                        <button type="button" class="btn btn-primary px-16 py-8 px-sm-32 py-sm-16"
                                            data-bs-toggle="modal" data-bs-target="#xxlFullModal">
                                            <span>{{ __('Login') }}</span>
                                        </button>
                                    </li>

                                    <li>
                                        <button type="button"
                                            class="btn btn-text px-16 py-8 px-sm-32 py-sm-16 text-black-80 hp-text-color-dark-30">
                                            <span>{{ __('SignUp') }}</span>
                                        </button>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="col hp-landing-header-menu">
                        <ul class="d-flex align-items-center justify-content-center hp-bg-dark-90">
                            <li class="mx-18">
                                <a href="#features"
                                    class="text-black-80 hp-hover-text-color-primary-1 hp-text-color-dark-30 hp-hover-text-color-dark-primary-2"><strong>{{ __('Features') }}</strong></a>
                            </li>
                            <li class="mx-18">
                                <a href="#partner"
                                    class="text-black-80 hp-hover-text-color-primary-1 hp-text-color-dark-30 hp-hover-text-color-dark-primary-2"><strong>{{ __('Partners') }}</strong></a>
                            </li>
                            <li class="mx-18">
                                <a href="#pricing"
                                    class="text-black-80 hp-hover-text-color-primary-1 hp-text-color-dark-30 hp-hover-text-color-dark-primary-2"><strong>{{ __('Pricing') }}</strong></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col hp-flex-none w-auto hp-landing-header-buttons">
                        <button data-bs-toggle="dropdown" aria-expanded="false" type="button"
                            class="btn btn-text px-16 px-sm-32 py-8 py-sm-16 ms-8 ms-sm-0 text-black-80 hp-text-color-dark-30">
                            <span>{{ __('Language') }}</span>
                        </button>

                        <ul class="dropdown-menu">
                            @include('partials/language_switcher')
                        </ul>

                        <button type="button"
                            class="btn btn-primary px-16 px-sm-32 py-8 py-sm-16 ms-8 text-black-80 hp-text-color-dark-30"
                            data-bs-toggle="modal" data-bs-target="#xxlFullModal">
                            <span>{{ __('Login') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <section class="hp-landing-hero pt-16">
            <div class="hp-landing-hero-title text-center mt-64 px-24">
                <h1 class=""><strong>{{ __('Hero') }}</strong></h1>
                <p class="h4 fw-normal text-black-80">{{ __('Hero 2') }}
                </p>
            </div>

            <div class="hp-landing-hero-img mt-96">
                <div class="hp-landing-hero-rectangle" style="background-color: #00E6BB"></div>
                <div class="hp-landing-hero-circle bg-primary" style="background-color: #00E6BB"></div>
                <div class="hp-landing-hero-img-container">
                    <div class="hp-landing-hero-img-item">
                        <img src="{{ 'assets\img\pages\landing\hero-image.png' }}">
                    </div>
                </div>
            </div>

            <div class="hp-landing-hero-img-left">
                <div class="hp-landing-hero-img-emoji">🖥️</div>
                <div class="hp-landing-hero-img-emoji">
                    <img src="../../../assets/img/pages/landing/emoji-1.png" alt="Emoji">
                </div>
                <div class="hp-landing-hero-img-emoji">✌️</div>
                <div class="hp-landing-hero-img-emoji">
                    <img src="../../../assets/img/pages/landing/emoji-2.png" alt="Emoji">
                </div>
            </div>

            <div class="hp-landing-hero-img-right">
                <div class="hp-landing-hero-img-emoji">💎</div>
                <div class="hp-landing-hero-img-emoji">👌</div>
                <div class="hp-landing-hero-img-emoji">
                    <img src="../../../assets/img/pages/landing/emoji-3.png" alt="Emoji">
                </div>
                <div class="hp-landing-hero-img-emoji">
                    <img src="../../../assets/img/pages/landing/emoji-4.png" alt="Emoji">
                </div>
            </div>
        </section>

        <section class="hp-landing-companies overflow-hidden pt-64 pb-64 pb-sm-120"></section>
        <!--Dividers-->

        <section class="hp-landing-features pt-24" id="features">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-7 col-xl-8 text-center px-16 mb-64 mb-sm-96">
                    <h2 class="h1 mb-32">{{ __('Features h2') }}</h2>
                </div>
                <div class="col-12">
                    <div class="swiper hp-landing-features-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="rounded bg-black-10 hp-bg-dark-100 p-18">
                                    <div class="row">
                                        <div class="col hp-flex-none w-auto">
                                            <div class="avatar-item text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center bg-black-0 hp-bg-dark-90 rounded-circle"
                                                style="width: 55px; height: 55px;">
                                                <i class="ri-signal-wifi-off-fill" style="font-size: 27px;"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h4 class="fw-medium mb-8">{{ __('Features card1 h4') }}</h4>
                                            <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                                {{ __('Features card1 p') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rounded bg-black-10 hp-bg-dark-100 p-18">
                                    <div class="row">
                                        <div class="col hp-flex-none w-auto">
                                            <div class="avatar-item text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center bg-black-0 hp-bg-dark-90 rounded-circle"
                                                style="width: 55px; height: 55px;">
                                                <i class="ri-customer-service-2-fill" style="font-size: 27px;"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h4 class="fw-medium mb-8">{{ __('Features card2 h4') }}</h4>
                                            <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                                {{ __('Features card2 p') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rounded bg-black-10 hp-bg-dark-100 p-18">
                                    <div class="row">
                                        <div class="col hp-flex-none w-auto">
                                            <div class="avatar-item text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center bg-black-0 hp-bg-dark-90 rounded-circle"
                                                style="width: 55px; height: 55px;">
                                                <i class="ri-hard-drive-2-fill" style="font-size: 27px;"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h4 class="fw-medium mb-8">{{ __('Features card3 h4') }}</h4>
                                            <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                                {{ __('Features card3 p') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rounded bg-black-10 hp-bg-dark-100 p-18">
                                    <div class="row">
                                        <div class="col hp-flex-none w-auto">
                                            <div class="avatar-item text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center bg-black-0 hp-bg-dark-90 rounded-circle"
                                                style="width: 55px; height: 55px;">
                                                <i class="iconly-Bold-Graph" style="font-size: 27px;"></i>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <h4 class="fw-medium mb-8">{{ __('Features card4 h4') }}</h4>
                                            <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                                {{ __('Features card4 p') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center" style="margin-top: 3em">
                <div class="col-12">
                    <div class="swiper hp-landing-features-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="rounded bg-black-10 hp-bg-dark-100 p-18">
                                    <div class="row">
                                        <div class="col hp-flex-none w-auto">
                                            <div class="avatar-item text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center bg-black-0 hp-bg-dark-90 rounded-circle"
                                                style="width: 55px; height: 55px;">
                                                <i class="iconly-Bold-Graph" style="font-size: 27px;"></i>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <h4 class="fw-medium mb-8">{{ __('Features card4 h4') }}</h4>
                                            <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                                {{ __('Features card4 p') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rounded bg-black-10 hp-bg-dark-100 p-18">
                                    <div class="row">
                                        <div class="col hp-flex-none w-auto">
                                            <div class="avatar-item text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center bg-black-0 hp-bg-dark-90 rounded-circle"
                                                style="width: 55px; height: 55px;">
                                                <i class="ri-hard-drive-2-fill" style="font-size: 27px;"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h4 class="fw-medium mb-8">{{ __('Features card3 h4') }}</h4>
                                            <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                                {{ __('Features card3 p') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rounded bg-black-10 hp-bg-dark-100 p-18">
                                    <div class="row">
                                        <div class="col hp-flex-none w-auto">
                                            <div class="avatar-item text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center bg-black-0 hp-bg-dark-90 rounded-circle"
                                                style="width: 55px; height: 55px;">
                                                <i class="ri-customer-service-2-fill" style="font-size: 27px;"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h4 class="fw-medium mb-8">{{ __('Features card2 h4') }}</h4>
                                            <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                                {{ __('Features card2 p') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rounded bg-black-10 hp-bg-dark-100 p-18">
                                    <div class="row">
                                        <div class="col hp-flex-none w-auto">
                                            <div class="avatar-item text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center bg-black-0 hp-bg-dark-90 rounded-circle"
                                                style="width: 55px; height: 55px;">
                                                <i class="ri-signal-wifi-off-fill" style="font-size: 27px;"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h4 class="fw-medium mb-8">{{ __('Features card1 h4') }}</h4>
                                            <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                                {{ __('Features card1 p') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section
            class="hp-landing-content-1 border-top hp-border-color-dark-80 overflow-hidden mt-64 mt-sm-120 py-64 py-sm-120">
            <div class="hp-landing-container me-lg-120">
                <div class="row aling-items-center justify-content-between">
                    <div class="col-12 col-md-9 col-lg-8 col-xl-6">
                        <h2 class="h1 mb-32">{{ __('index product 2ed-sec-A title') }}👌</h2>
                        <p class="h5 fw-normal text-black-80 hp-text-color-dark-30 mb-48 pe-120">
                            {{ __('index product 2ed-sec-A subtitle') }}</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col hp-flex-none w-auto">
                                        <div class="avatar-item bg-primary-4 hp-bg-dark-primary text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 60px; height: 60px;">
                                            <i class="iconly-Bold-Game" style="font-size: 24px;"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                            {{ __('index product 2ed-sec-B list-A') }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-16">
                                <div class="row align-items-center">
                                    <div class="col hp-flex-none w-auto">
                                        <div class="avatar-item bg-primary-4 hp-bg-dark-primary text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 60px; height: 60px;">
                                            <i class="iconly-Bold-TimeCircle" style="font-size: 24px;"></i>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <h3 class="fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                            {{ __('index product 2ed-sec-B list-B') }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-16">
                                <div class="row align-items-center">
                                    <div class="col hp-flex-none w-auto">
                                        <div class="avatar-item bg-primary-4 hp-bg-dark-primary text-primary hp-text-color-dark-0 d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 60px; height: 60px;">
                                            <i class="iconly-Bold-Location" style="font-size: 24px;"></i>
                                        </div>
                                    </div>

                                    <div class="col d-flex align-items-center">
                                        <h3 class="fw-medium text-black-80 hp-text-color-dark-30 mb-0">
                                            {{ __('index product 2ed-sec-B list-C') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-5 mt-64 mt-lg-0 position-relative">
                        <div class="hp-landing-content-1-circle bg-success"></div>
                        <div class="hp-landing-content-1-img">
                            <img src="../../../assets/img/pages/landing/content-1.png"
                                alt="Perfect Solution For Small Business" class="hp-dir-scale-x-n1">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hp-landing-content-2 pt-sm-120 pb-64 pb-sm-120 overflow-hidden">
            <div class="hp-landing-container mt-sm-64 mb-64">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-lg-7">
                        <div class="hp-landing-content-2-circle position-relative bg-info">
                            <img src="../../../assets/img/pages/landing/content-2.png"
                                alt="Work anywhere, with any device" class="position-absolute">
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-5">
                        <h2 class="h1 mb-32">{{ __('index product 3ed-sec-A title') }}</h2>
                        <p class="h5 fw-normal text-black-80 hp-text-color-dark-30 mb-48">
                            {{ __('index product 3ed-sec-A p') }}</p>
                        <div class="row hp-landing-content-2-list">
                            <div class="col-12">
                                <div class="row align-items-center border hp-border-color-dark-80 rounded p-24">
                                    <div class="col hp-flex-none w-auto">
                                        <div class="avatar-item bg-primary-4 hp-bg-dark-primary text-primary d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 55px; height: 55px;">
                                            <i class="iconly-Bold-Image2" style="font-size: 27px;"></i>
                                        </div>
                                    </div>

                                    <div class="col ms-18">
                                        <h4 class="fw-medium mb-0">{{ __('index product 3ed-sec-A card') }}</h4>
                                        <h4 class="fw-normal mb-0">{{ __('index product 3ed-sec-A card 2') }}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-16">
                                <div class="row align-items-center border hp-border-color-dark-80 rounded p-24">
                                    <div class="col hp-flex-none w-auto">
                                        <div class="avatar-item bg-success-4 hp-bg-dark-success text-success d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 55px; height: 55px;">
                                            <i class="ri-computer-fill" style="font-size: 27px;"></i>
                                        </div>
                                    </div>

                                    <div class="col ms-18">
                                        <h4 class="fw-medium mb-0">{{ __('index product 3ed-sec-A card-2') }}</h4>
                                        <h4 class="fw-normal mb-0">{{ __('index product 3ed-sec-A card-2 2') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hp-landing-content  overflow-hidden mt-64 mt-sm-120 py-64 py-sm-120">
            <div class="hp-landing-container ">
                <div class="row aling-items-center justify-content-between">
                    <div class="col-12 col-md-9 col-lg-8 col-xl-6">
                        <h2 class="h1 mb-32">{{ __('index product 4ed-sec-A title') }}</h2>
                        <p class="h5 fw-normal text-black-80 hp-text-color-dark-30 mb-48 pe-120">
                            {{ __('index product 4ed-sec-A text') }}
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-5 mt-64 mt-lg-0 position-relative">
                        <div class="hp-landing-content-1-circle bg-success"></div>
                        <div class="hp-landing-content-1-img">
                            <img src="../../../assets/img/pages/landing/content-3.gif">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hp-landing-content bg-black-10 hp-bg-dark-100 overflow-hidden mt-64 mt-sm-120 py-64 py-sm-120"
            id="partner">
            <div class="hp-landing-container ">
                <div class="row aling-items-center justify-content-between">
                    <div class="col-12 col-md-9 col-lg-8 col-xl-6">
                        <h2 class="h1 mb-32">{{ __('Become a partner') }}💪</h2>
                        <p class="h5 fw-normal text-black-80 hp-text-color-dark-30 mb-48 pe-120">
                            {{ __('Partner text') }}
                        </p>
                        <form action="{{ route('marketer.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-lg" type="text" name="name"
                                    placeholder="{{ __('Your name') }}" required>
                            </div>
                            <div class="form-group py-10">
                                <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    type="email" placeholder="email@example.com" name="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group py-10">
                                <input class="form-control form-control-lg" type="text"
                                    placeholder="+966505555555" name="phone" required>
                            </div>
                            <div class="text-center d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-lg btn-primary mt-4">
                                    <strong>{{ __('Become a partener') }}</strong></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-5 mt-64 mt-lg-0 position-relative">
                        <div class="hp-landing-content-1-circle">
                            <img src="img/svg/illustrations/Artboard 5.svg">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="hp-landing-pricing py-64 pt-sm-96 pb-sm-120" id="pricing">
            <div class="hp-landing-container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="h1 mb-4">{{ __('Pricing title') }}</h2>
                        <p class="hp-p1-body mt-sm-32 mb-0">{{ __('Pricing subtitle') }}</p>
                    </div>

                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center mt-64 mb-32 w-100">
                            <span
                                class="hp-caption text-black-100 hp-text-color-dark-0">{{ __('Billed monthly') }}</span>

                            <div class="form-check form-switch mx-8">
                                <input class="form-check-input" type="checkbox" id="pricing-switch" checked>
                                <label class="form-check-label" for="pricing-switch"></label>
                            </div>

                            <span class="hp-caption text-primary">{{ __('Billed annually') }}</span>
                        </div>
                        <div class="row mx-auto w-100 gy-24">
                            <div class="col-12 col-md-4 px-0 px-sm-12">
                                <div class="hp-landing-pricing-item p-24 rounded bg-black-10 hp-bg-dark-100">
                                    <div>
                                        <div class="row justify-content-between">
                                            <div class="col-7">
                                                <h5 class="mb-0">Basic</h5>
                                            </div>
                                        </div>
                                        <span class="h1 d-block mt-8 mt-sm-18 annually-text">180.0 SR</span>
                                        <span class="h1 d-block mt-8 mt-sm-18 monthly-text d-none">15.0 SR</span>
                                        <p class="hp-caption mt-sm-4 mb-0 text-black-60 annually-text">per screen per
                                            year</p>
                                        <p class="hp-caption mt-sm-4 mb-0 text-black-60 monthly-text d-none">per screen
                                            per
                                            month</p>
                                        <ul class="mt-24">
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">1
                                                    Screen</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">1
                                                    Group</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">1
                                                    sequence</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">0.5
                                                    GB Storage</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">User
                                                    On-Boarding</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Full
                                                    Control of your Screens</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a type="button" class="btn btn-ghost btn-primary w-100 mt-64"
                                        href="{{ route('MOLogin') }}">
                                        <span>Try it now!</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 px-0 px-sm-12">
                                <div class="hp-landing-pricing-item p-24 rounded bg-black-10 hp-bg-dark-100">
                                    <div>
                                        <div class="row justify-content-between">
                                            <div class="col-7 col-md-4 col-lg-7">
                                                <h5 class="mb-0">Standard</h5>
                                            </div>

                                            <div class="col hp-flex-none w-auto">
                                                <span
                                                    class="hp-caption rounded py-4 px-16 bg-primary-4 text-primary">Best
                                                    Price</span>
                                            </div>
                                        </div>
                                        <span class="h1 d-block mt-8 mt-sm-18 annually-text">265 SR</span>
                                        <span class="h1 d-block mt-8 mt-sm-18 monthly-text d-none">24.5 SR</span>
                                        <p class="hp-caption mt-sm-4 mb-0 text-black-60 annually-text">per screen per
                                            year</p>
                                        <p class="hp-caption mt-sm-4 mb-0 text-black-60 monthly-text d-none">per screen
                                            per month</p>
                                        <ul class="mt-24">
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Unlimited
                                                    Screen</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">10
                                                    Group</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">10
                                                    sequence</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">1
                                                    GB Storage</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">User
                                                    On-Boarding</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Full
                                                    Control of your Screens</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Access
                                                    to E-Manual</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a type="button" class="btn btn-ghost btn-primary w-100 mt-64"
                                        href="{{ route('MOLogin') }}">
                                        <span>Try it now!</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 px-0 px-sm-12">
                                <div class="hp-landing-pricing-item p-24 rounded bg-black-10 hp-bg-dark-100">
                                    <div>
                                        <div class="row justify-content-between">
                                            <div class="col-7">
                                                <h5 class="mb-0">Premium</h5>
                                            </div>
                                        </div>

                                        <span class="h1 d-block mt-8 mt-sm-18 annually-text">378 SR</span>
                                        <span class="h1 d-block mt-8 mt-sm-18 monthly-text d-none">35.0 SR</span>
                                        <p class="hp-caption mt-sm-4 mb-0 text-black-60 annually-text">per screen per
                                            year</p>
                                        <p class="hp-caption mt-sm-4 mb-0 text-black-60 monthly-text d-none">per screen
                                            per month</p>
                                        <ul class="mt-24">
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Unlimited
                                                    Screen</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Unlimited
                                                    Group</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Unlimited
                                                    sequence</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Unlimited
                                                    templates</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">5
                                                    GB Storage</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">User
                                                    On-Boarding</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Full
                                                    Control of your Screens</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Access
                                                    to E-Manual</span>
                                            </li>
                                            <li class="d-flex align-items-center mt-8">
                                                <i class="iconly-Curved-TickSquare text-primary-1"></i>
                                                <span
                                                    class="d-block ms-8 hp-caption fw-normal hp-text-color-dark-0">Support
                                                    via Email/Call</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a type="button" class="btn btn-ghost btn-primary w-100 mt-64"
                                        href="{{ route('MOLogin') }}">
                                        <span>Try it now!</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-24 mb-12"></div>
            <!--Dividers-->
            <div class="hp-landing-container">
                <div class="col-12">
                    <div class="card border-none hp-card-2 px-12 py-16 hp-upgradePlanCardOne">
                        <div class="position-absolute top-0 start-0 w-100 h-100 hp-dark-none"
                            style="background-image: url(../../../assets/img/dasboard/dogecoin-bg.svg); background-size: cover; background-position: right center; z-index: -1;">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-7">
                                    <h2 class="mb-0 text-black-0"><strong>{{ __('Boost') }}</strong></h2>
                                    <h5 class="mb-0 text-black-0">{{ __('Boost text') }}</h5>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#inquiryModal"
                                        class="btn btn-success-1 mt-32 bg-black-0">
                                        <span>{{ __('inquiry') }}</span>
                                    </button>
                                </div>

                                <div
                                    class="col d-none d-sm-block hp-flex-none w-auto position-absolute top-0 end-0 h-100 pe-0">
                                    <img src="../../../assets/img/dasboard/analytics-download-vector.svg"
                                        class="h-100 hp-dir-scale-x-n1"
                                        alt="Check the Best Prices of New Models &amp; Boost Your Business">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer -->
        <footer class="position-relative bg-black-20 hp-bg-dark-100 pt-64 pt-sm-120 pb-24 overflow-hidden">
            <div class="hp-landing-container position-relative">
                <div class="row justify-content-between mb-64 mb-sm-120">
                    <div class="col-12 col-md-7 col-lg-4">
                        <p class="h5 fw-medium text-black-80 hp-text-color-dark-30 mb-32">{{ __('Our messages') }}</p>
                    </div>
                    <div class="col-12 col-lg-7 mt-64 mt-lg-0">
                        <div class="row">
                            <div class="col">
                                <span class="hp-p1-body fw-medium mb-16"> <strong>{{ __('Company') }}</strong></span>

                                <a href="#"
                                    class="d-block h5 fw-normal text-black-80 hp-text-color-dark-30 mt-16">{{ __('Help center') }}</a>
                                <a href="#"
                                    class="d-block h5 fw-normal text-black-80 hp-text-color-dark-30 mt-16">{{ __('Support') }}</a>
                            </div>

                            <div class="col">
                                <span class="hp-p1-body fw-medium mb-16"><strong>{{ __('About') }}</strong></span>

                                <a href="#"
                                    class="d-block h5 fw-normal text-black-80 hp-text-color-dark-30 mt-16">{{ __('Services') }}</a>
                                <a href="#"
                                    class="d-block h5 fw-normal text-black-80 hp-text-color-dark-30 mt-16">{{ __('Careers') }}</a>
                                <a href="/terms"
                                    class="d-block h5 fw-normal text-black-80 hp-text-color-dark-30 mt-16">
                                    {{ __('Terms') }}</a>
                            </div>
                            <div class="col mt-32 mt-sm-0" style="flex: 0 0 260px;">
                                <span class="hp-p1-body fw-medium mb-16"><strong>{{ __('Contacts') }}</strong></span>
                                <p class="h5 fw-normal text-black-80 hp-text-color-dark-30 my-16">
                                    {{ __('Contacts text') }}</p>
                                <a href="mailto:info@nitx.io">info@nitx.io</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="row align-items-center justify-content-between hp-landing-footer-copyright border-top hp-border-color-dark-80 pt-24 mt-24">
                    <div class="col hp-flex-none w-auto">
                        <p class="hp-p1-body mb-16 mb-sm-0">© Nitx {{ __('reserved-date') }}
                            , {{ __('All rights reserved') }} </p>
                    </div>
                    <div class="col hp-flex-none w-auto">
                        <div class="row g-18 align-items-center">
                            <a href="https://twitter.com/nitx_io" class="col hp-flex-none w-auto">
                                <i class="ri-twitter-fill" style="font-size: 1.5em;"></i>
                            </a>
                            <a href="https://www.instagram.com/nitx_io" class="col hp-flex-none w-auto">
                                <i class="ri-instagram-fill" style="font-size: 1.5em;"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/nitx/" class="col hp-flex-none w-auto">
                                <i class="ri-linkedin-box-fill" style="font-size: 1.5em;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- end of footer -->
    </div>

    <!--Full Screen Modal-->
    <div class="modal fade" id="xxlFullModal" tabindex="-1" aria-labelledby="xxlFullModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xxl-down">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <a class="navbar-brand" href="{{ route('index') }}">
                                <img alt="nitx logo" src="img/brand/logo_color.svg"
                                    style="height: 45px; margin-bottom: 2em; ">
                            </a>
                            <h2 class="h1 mb-4">{{ __('Login As') }}</h2>
                            <p class="h5 fw-normal text-black-80 hp-text-color-dark-30 mt-sm-32 mb-0">
                                {{ __('welcome login') }}</p>
                            <img src="{{ 'assets\img\pages\error\maintenance.svg' }}" style="width: 70%">
                            <div class="mt-24 mb-12"></div>
                            <!--Dividers-->
                            <div class="row">
                                <div class="col-12 col-sm-6" style="margin-bottom: 0.2em">
                                    <a href="{{ route('ADLogin') }}" class="btn btn-outline-primary">
                                        <i class="ri-advertisement-line" style="font-size: 24px;"></i>
                                        <strong style="margin-left:0.2em;">{{ __('Advertiser') }}</strong>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <a href="{{ route('MOLogin') }}" class="btn btn-outline-primary">
                                        <i class="ri-computer-line" style="font-size: 24px;"></i>
                                        <strong style=" margin-left:0.2em;">{{ __('Media Owner') }}</strong>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-24 mb-12" style="margin-bottom: 5em;"></div>
                            <!--Dividers-->
                            <button type="button" class="btn btn-text"
                                data-bs-dismiss="modal">{{ __('Go Back') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Full Screen Modal-->

    <!--inquiry Modal-->
    <div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="inquiryModalLabel">inquiry</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="name" class="col-form-label"><strong>Your name: </strong></label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="phone" class="col-form-label"><strong>Phone number: </strong></label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="email" class="col-form-label"><strong>Email: </strong></label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="screen" class="col-form-label"><strong>Number of screen you have:
                                </strong></label>
                            <input type="text" class="form-control" name="screen" id="screen">
                        </div>
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="screen" class="col-form-label"><strong>Tell us more about your business::
                                </strong></label>
                            <textarea class="form-control" id="massage" rows="3" name="reason"></textarea>
                        </div>
                    </form>

                    <div class="mt-24 mb-12"></div>
                    <!--Dividers-->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of inquiry Modal-->



<!-- Plugin -->
<script src="../../../assets/js/plugin/jquery.min.js"></script>
<script src="../../../assets/js/plugin/bootstrap.bundle.min.js"></script>
<script src="../../../assets/js/plugin/swiper-bundle.min.js"></script>
<script src="../../../assets/js/plugin/jquery.mask.min.js"></script>
<script src="../../../assets/js/plugin/moment.min.js"></script>

    <!-- Base -->
    <script src="../../../assets/js/base/index.js"></script>

    <!-- Pages -->
    <script src="../../../assets/js/pages/landing-page.js"></script>
</body>

</html>
