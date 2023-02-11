<div class="hp-sidebar hp-bg-color-black-0 hp-bg-color-dark-100">
    <div class="hp-sidebar-container">
        <div class="hp-sidebar-header-menu">
            <div class="row justify-content-between align-items-end me-12 ms-24 mt-24">


                <div class="w-auto px-0">
                    <div class="hp-header-logo d-flex align-items-end">
                        <a href="{{ route('index') }}">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                                src="{{ asset('img/brand/logo_color.svg') }}" alt="logo">
                        </a>

                        <a href="{{ route('index') }}" target="_blank" class="d-flex">
                            <span class="hp-sidebar-hidden h3 fw-bold hp-text-color-primary-1 mb-6"></span>
                            <span class="hp-sidebar-hidden hp-p1-body fw-medium hp-text-color-primary-1 mb-16 ms-4"
                                style="letter-spacing: -0.5px;">.beta</span>
                        </a>
                    </div>
                </div>
            </div>

            <ul>
                <li>
                    <div class="menu-title">MAIN</div>
                    <ul>
                        <li>
                            <a href="{{ route('MODashboard') }}" class="submenu-item @yield('active1')">
                                <span> <i class="iconly-Curved-Home  @yield('active-txt-1')"></i><span
                                        class="@yield('active-txt-1')">{{ __('Dashboard') }}</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('MOScreens') }}" class="submenu-item @yield('active2')">
                                <span><i class="ri-computer-line @yield('active-txt-2')" style="font-size: 24px;"></i><span
                                        class="@yield('active-txt-2')">{{ __('Screens') }}</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('MOsequence') }}" class="submenu-item @yield('active3')">
                                <span><i
                                        class="ri-clapperboard-line @yield('active-txt-3')"style="font-size: 24px;"></i><span
                                        class="@yield('active-txt-3')">{{ __('Sequence') }}</span></span>
                            </a>
                        </li>
                        <li hidden>
                            <a href="{{ route('MOtemplate') }}" class="submenu-item @yield('active7')">
                                <span><i class="iconly-Light-PaperPlus @yield('active-txt-7')"></i><span
                                        class="@yield('active-txt-7')">Template</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('MOmedia') }}" class="submenu-item @yield('active4')">
                                <span><i class="iconly-Light-Image2 @yield('active-txt-4')"></i><span
                                        class="@yield('active-txt-4')">{{ __('Media') }}</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('wallet') }}" class="submenu-item @yield('active5')">
                                <span><i class="iconly-Light-Wallet @yield('active-txt-5')"></i><span
                                        class="@yield('active-txt-5')">{{ __('Billing') }}</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('MOSettings') }}" class="submenu-item @yield('active6')">
                                <span><i class="iconly-Light-Setting @yield('active-txt-6')"></i><span
                                        class="@yield('active-txt-6')">{{ __('Settings') }}</span></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>
