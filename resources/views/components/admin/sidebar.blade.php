<div class="hp-sidebar hp-bg-color-black-0 hp-bg-color-dark-100">
    <div class="hp-sidebar-container">
        <div class="hp-sidebar-header-menu">
            <div class="row justify-content-between align-items-end me-12 ms-24 mt-24">
                <div class="w-auto px-0">
                    <div class="hp-header-logo d-flex align-items-end">
                        <a href="{{ route('index') }}">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none" src="{{ asset('img/brand/logo_color.svg') }}" alt="logo">
                        </a>
    
                        <a href="{{ route('index') }}" target="_blank" class="d-flex">
                            <span class="hp-sidebar-hidden h3 fw-bold hp-text-color-primary-1 mb-6"></span>
                            <span class="hp-sidebar-hidden hp-p1-body fw-medium hp-text-color-primary-1 mb-16 ms-4" style="letter-spacing: -0.5px;">.beta</span>
                        </a>
                    </div>
                </div>
            </div>
            <ul>
                <li>
                    <div class="menu-title">MAIN</div>
                    <ul>
                        <li>
                            <a  href="{{ route('admin.index') }}" class="submenu-item">
                                <span> <i class="ri-dashboard-line" style="font-size: 24px;"></i><span>Dashboard</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.inbox') }}" class="submenu-item">
                                <span><i class="ri-chat-download-line" style="font-size: 24px;"></i><span>Inbox</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.subscriptions') }}" class="submenu-item">
                                <span><i class="ri-exchange-dollar-line" style="font-size: 24px;"></i> <span>Subscriptions</span></span>
                            </a> 
                        </li>
                        <li>
                            <a href="{{ route('admin.wallets') }}" class="submenu-item">
                                <span><i class="ri-wallet-3-line" style="font-size: 24px;"></i> <span>Wallets</span></span>
                            </a> 
                        </li>
                        <li>
                            <a href="{{ route('admin.chargeWallets') }}" class="submenu-item">
                                <span><i class="ri-coupon-line" style="font-size: 24px;"></i><span>Promo codes</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings') }}" class="submenu-item">
                                <span><i class="ri-settings-4-line" style="font-size: 24px;"></i><span>Settings</span></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>       
        </div>
    </div>
</div>