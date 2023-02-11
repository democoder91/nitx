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
    <!-- dselect -->
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">

    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/font-control.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/typography.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/base.css')}}">
    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layouts/sider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layouts/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.css')}}">
    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/page-profile.css')}}">
    <title>Nitx | Admin</title>
</head>

<body class="collapse-btn-none">
    <main class="hp-bg-color-dark-90 d-flex min-vh-100">
        
        <x-admin.sidebar/>
        <div class="hp-main-layout">
            <header>
                <div class="row w-100 m-0">
                    <div class="col ps-18 pe-16 px-sm-24">
                        <div class="row w-100 align-items-center justify-content-between position-relative">
                            <div class="col w-auto hp-flex-none hp-mobile-sidebar-button me-24 px-0" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                                <button type="button" class="btn btn-text btn-icon-only">
                                    <i class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                                </button>
                            </div>
                            <div class="hp-header-text-info col col-lg-14 col-xl-16 hp-header-start-text d-flex align-items-center hp-horizontal-none">
                                <div class="d-flex rounded-3 hp-text-color-primary-1 hp-text-color-dark-0 p-4 hp-bg-color-primary-4 hp-bg-color-dark-70" style="min-width: 18px">
                                    <i class="iconly-Curved-Document"></i>
                                </div>
                                <p class="hp-header-start-text-item hp-input-label hp-text-color-black-100 hp-text-color-dark-0 ms-16 mb-0 lh-1 d-flex align-items-center">
                                    Do you know the latest update of 2022? 🎉
                                </p>
                            </div>

                            <div class="col hp-flex-none w-auto pe-0">
                                <div class="row align-items-center justify-content-end">

                                    <div class="hover-dropdown-fade w-auto px-0 ms-6 position-relative hp-cursor-pointer">
                                        <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px;">
                                            <img src="../../../assets/img/users/user-8.svg">
                                        </div>

                                        <div class="hp-header-profile-menu dropdown-fade position-absolute pt-18" style="top: 100%; width: 260px;">
                                            <div class="rounded border hp-border-color-black-40 hp-bg-black-0 hp-bg-dark-100 hp-border-color-dark-80 p-24">
                                                <span class="d-block h5 hp-text-color-black-100 hp-text-color-dark-0 mb-6">Profile Settings</span>

                                                <a href="profile-information.html" class="hp-p1-body hp-text-color-primary-1 hp-text-color-dark-primary-2 hp-hover-text-color-primary-2">View Profile</a>

                                                <div class="divider my-12"></div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <a href="app-contact.html" class="d-flex align-items-center hp-p1-body py-4 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded" style="margin-left: -10px; margin-right: -10px;">
                                                            <i class="iconly-Curved-People me-8" style="font-size: 16px;"></i>

                                                            <span class="ml-8">Explore Creators</span>
                                                        </a>
                                                    </div>

                                                    <div class="col-12">
                                                        <a href="page-knowledge-base-1.html" class="d-flex align-items-center hp-p1-body py-4 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded" style="margin-left: -10px; margin-right: -10px;">
                                                            <i class="iconly-Curved-Game me-8" style="font-size: 16px;"></i>

                                                            <span class="hp-ml-8">Help Desk</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="divider my-12"></div>

                                                <a class="hp-p1-body" href="index.html">
                                                    <form action="{{ route('media_owner.logout') }}" method="post">
                                                        @csrf
                                                        <li>
                                                            <button type="submit" class="dropdown-item"
                                                                    style="color: rgb(224, 65, 65);">Logout
                                                            </button>
                                                        </li>
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="offcanvas offcanvas-start hp-mobile-sidebar" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 256px;">
                <div class="offcanvas-header justify-content-between align-items-end me-16 ms-24 mt-16 p-0">
                    <div class="w-auto px-0">
                        <div class="hp-header-logo d-flex align-items-end">
                            <a href="index.html">
                                <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="{{ asset('img/brand/logo_color.svg') }}" alt="logo">
                            </a>
                            <a href="{{ route('index') }}" target="_blank" class="d-flex">
                                <span class="hp-sidebar-hidden hp-p1-body fw-medium hp-text-color-primary-1 mb-16 ms-4" style="letter-spacing: -0.5px;">.beta</span>
                            </a>
                        </div>
                        <x-admin.sidebar/>
                    </div>
                </div>
            </div>

            <!-- Main -->
            <div class="hp-main-layout-content">
                <div class="row mb-32 gy-32">
                    <div class="col-12">
                        <h3>Welcome back, Edward 👋</h3>
                    </div>
                    <div class="col-12">
                        {{ $slot }}
                    </div>
                </div>
            </div>


            <footer class="w-100 py-18 px-16 py-sm-24 px-sm-32 hp-bg-color-black-10 hp-bg-color-dark-100">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-6">
                        <p class="hp-badge-text mb-0 text-center text-sm-start hp-text-color-dark-30">COPYRIGHT ©2022 Nitx, All rights Reserved</p>
                    </div>

                    <div class="col-12 col-sm-6 mt-8 mt-sm-0 text-center text-sm-end">
                        <a href="https://nitx.io" target="_blank" class="hp-badge-text hp-text-color-dark-30">❤️ Version: 1.3</a>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <div class="scroll-to-top">
        <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg">
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

    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
    <script>
        // search
        dselect(document.querySelector('#example-search'), {
          search: true,
          maxHeight: '10em'
        })
    </script>
    <script>
        // multiple
            dselect(document.querySelector('#example-multiple'),{
            maxHeight: '10em',
            size: 'sm',
        })
    </script>
</body>

</html>