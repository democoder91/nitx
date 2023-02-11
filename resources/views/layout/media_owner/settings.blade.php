<x-media_owner.layout :name="$name">
    @section('components.media_owner.sidebar')
    @section('active6', __('btn btn-primary-4'))
    @section('active-txt-6', __('hp-text-color-primary-1'))
@endsection
<!-- Phone Menu -->
<div
    class="ant-row hp-profile-mobile-menu-btn bg-black-0 hp-bg-color-dark-100 rounded py-12 px-8 px-sm-12 mb-16 mx-0">
    <div class="hp-faq-tabs bg-white hp-bg-dark-100 rounded py-12 px-24">
        <ul class="nav nav-pills hp-overflow-x-auto flex-nowrap" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-account-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-account" type="button" role="tab" aria-controls="pills-account"
                    aria-selected="true">
                    <span class="d-flex align-items-center d-inline-block text-truncate">
                        <i class="iconly-Curved-User me-12" style="font-size: 20px;"></i>
                        {{ __('Account Info') }}
                    </span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-security" type="button" role="tab" aria-controls="pills-security"
                    aria-selected="false">
                    <span class="d-flex align-items-center d-inline-block text-truncate">
                        <i class="iconly-Light-Lock me-16"></i>
                        {{ __('Security Settings') }}
                    </span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-activity-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-activity" type="button" role="tab" aria-controls="pills-activity"
                    aria-selected="false">
                    <span class="d-flex align-items-center d-inline-block text-truncate">
                        <i class="iconly-Light-Activity me-16"></i>
                        {{ __('Activity Monitor') }}
                    </span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-ads-tab" data-bs-toggle="pill" data-bs-target="#pills-ads"
                    type="button" role="tab" aria-controls="pills-ads" aria-selected="false">
                    <span class="d-flex align-items-center d-inline-block text-truncate">
                        <i class="iconly-Light-Filter me-16"></i>
                        {{ __('Ads Settings') }}
                    </span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-referral-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-referral" type="button" role="tab" aria-controls="pills-referral"
                    aria-selected="false">
                    <span class="d-flex align-items-center d-inline-block text-truncate">
                        <i class="iconly-Light-Discount me-16"></i>
                        {{ __('Referral Code') }}
                    </span>
                </button>
            </li>
        </ul>
    </div>
</div><!-- End of Phone Menu -->
<!-- Main -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="row bg-black-0 hp-bg-color-dark-100 rounded pe-16 pe-sm-32 mx-0">
    <!-- Desktop Sidebar -->
    <div class="col hp-profile-menu py-24" style="flex: 0 0 240px;">
        <div class="w-100">
            <div class="hp-profile-menu-header mt-16 mt-lg-0 text-center">
                <div class="hp-menu-header-btn mb-12 text-end">
                    <div class="d-inline-block" id="profile-menu-dropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <button type="button" class="btn btn-text btn-icon-only">
                            <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1"
                                style="font-size: 24px;"></i>
                        </button>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="profile-menu-dropdown">
                        <li>
                            <a class="dropdown-item" href="javascript:;">{{ __('Change Avatar') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="d-inline-block position-relative">
                        <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle"
                            style="width: 80px; height: 80px;">
                            <img src="{{ asset('assets/img/users/user-8.svg') }}">
                        </div>
                    </div>
                </div>


                <h3 class="mt-24 mb-4">{{ $user->name }}</h3>
                <a href="mailto:{{ $user->email }}" class="hp-p1-body">{{ $user->email }}</a>
            </div>
        </div>
        <!-- Desktop Menu -->
        <div class="hp-profile-menu-body w-100 text-start mt-48 mt-lg-0">
            <ul class="nav nav-pills me-n1 mx-lg-n12" role="tablist">
                <li class="mt-4 mb-16" role="presentation" style="width: 100%">
                    <a class="active position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center"
                        data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab"
                        aria-controls="pills-account" aria-selected="true">
                        <i class="iconly-Curved-User me-16"></i>
                        <span>{{ __('Account Info') }}</span>
                        <span
                            class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                            style="width: 2px;"></span>
                    </a>
                </li>
                <li class="mt-4 mb-16" role="presentation" style="width: 100%">
                    <a class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center"
                        data-bs-toggle="pill" data-bs-target="#pills-security" type="button" role="tab"
                        aria-controls="pills-security" aria-selected="false">
                        <i class="iconly-Light-Lock me-16"></i>
                        <span>{{ __('Security Settings') }}</span>
                        <span
                            class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                            style="width: 2px;"></span>
                    </a>
                </li>
                <li class="mt-4 mb-16" role="presentation" style="width: 100%">
                    <a class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center"
                        data-bs-toggle="pill" data-bs-target="#pills-activity" type="button" role="tab"
                        aria-controls="pills-activity" aria-selected="false">
                        <i class="iconly-Light-Activity me-16"></i>
                        <span>{{ __('Activity Monitor') }}</span>
                        <span
                            class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                            style="width: 2px;"></span>
                    </a>
                </li>
                <li class="mt-4 mb-16" role="presentation" style="width: 100%">
                    <a class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center"
                        data-bs-toggle="pill" data-bs-target="#pills-ads" type="button" role="tab"
                        aria-controls="pills-ads" aria-selected="false">
                        <i class="iconly-Light-Filter me-16"></i>
                        <span>{{ __('Ads Settings') }}</span>
                        <span
                            class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                            style="width: 2px;"></span>
                    </a>
                </li>
                <li class="mt-4 mb-16" role="presentation" style="width: 100%">
                    <a class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center"
                        data-bs-toggle="pill" data-bs-target="#pills-referral" type="button" role="tab"
                        aria-controls="pills-referral" aria-selected="false">
                        <i class="iconly-Light-Discount me-16"></i>
                        <span>{{ __('Referral Code') }}</span>
                        <span
                            class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                            style="width: 2px;"></span>
                    </a>
                </li>
            </ul>
        </div><!-- End of Desktop Menu -->
        <div class="hp-profile-menu-footer">
            <img src="{{ asset('assets/img/pages/error/503.svg') }}" alt="Profile Image">
        </div>
    </div><!-- End of Desktop Sidebar -->
    <div class="col ps-16 ps-sm-32 py-24 py-sm-32 overflow-hidden">
        <!--Start Tabs-->
        <div class="tab-content" id="pills-tabContent">
            <!--Account Info Tab-->
            <div class="tab-pane fade show active" id="pills-account" role="tabpanel"
                aria-labelledby="pills-account-tab">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12">
                                <h3>{{ __('Account Information') }}</h3>
                                <div class="divider border-black-40 hp-border-color-dark-80"></div>
                            </div>
                            <div class="col-12 hp-profile-content-list mt-8 pb-0 pb-sm-120">
                                <div class="col-12 hp-profile-action-btn text-end">
                                    <button class="btn btn-ghost btn-primary" id=edit_info type="button">Edit
                                    </button>
                                </div>
                                <form action="{{ route('media_owner.edit_account_info', $user->id) }}"
                                    method="post" style="margin-top: 1em">
                                    @csrf
                                    <div class="mb-24">
                                        <label for="name"
                                            class="form-label"><strong>{{ __('Full Name:') }}</strong></label>
                                        <input type="text" class="form-control" id="name"
                                            value="{{ $user->name }}" name="name" disabled>
                                    </div>
                                    <div class="mb-24">
                                        <label for="email"
                                            class="form-label"><strong>{{ __('Email:') }}</strong></label>
                                        <input type="email" class="form-control" id="email"
                                            value="{{ $user->email }}" name="email" disabled>
                                    </div>
                                    <div class="mb-24">
                                        <label for="commercial_record"
                                            class="form-label"><strong>{{ __('Commercial Record:') }}</strong></label>
                                        <input type="number" class="form-control" id="commercial_record"
                                            value="{{ $user->commercial_record }}" name="commercial_record"
                                            disabled>
                                    </div>
                                    <div class="col-12 text-md-end pe-0">
                                        <button class="btn btn-primary" id="edit-user-info" disabled
                                            type="submit">
                                            {{ __('Save Changes') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Account Info Tab-->
            <!--Security Settings Tab-->
            <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab">
                <div class="row">
                    <div class="col-12">
                        <h2>{{ __('Security Settings') }}</h2>
                        <p class="hp-p1-body mb-0">{{ __('Security settings text') }}</p>
                    </div>
                    <div class="divider border-black-40 hp-border-color-dark-80"></div>
                    <!--Dividers-->
                    <div class="col-12">
                        <div class="row align-items-center g-24">
                            <div class="col-12 col-md-6">
                                <h3>{{ __('Save my Activity Logs') }}</h3>
                                <p class="hp-p1-body mb-0">{{ __('activity log text') }}</p>
                            </div>

                            <div class="col-12 col-md-6 text-md-end pe-0">
                                <div class="form-check form-switch d-inline-block">
                                    <input class="form-check-input" type="checkbox" id="profile-settings-switch"
                                        checked>
                                    <label class="form-check-label" for="profile-settings-switch"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider border-black-40 hp-border-color-dark-80"></div>
                    <!--Dividers-->
                    <div class="col-12">
                        <div class="row align-items-center g-24">
                            <div class="col-12 col-md-6">
                                <h3>{{ __('Change Password') }}</h3>
                                <p class="hp-p1-body mb-0">{{ __('Change password text') }}</p>
                            </div>

                            <div class="col-12 col-md-6 text-md-end pe-0">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#ChangePasswordModal">{{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="divider border-black-40 hp-border-color-dark-80"></div>
                    <!--Dividers-->
                    <div class="col-12">
                        <div class="row align-items-center g-24">
                            <div class="col-12 col-md-6">
                                <h3>{{ __('2 Factor Auth') }}</h3>
                                <p class="hp-p1-body mb-0">{{ __('2 factor text') }}</p>
                            </div>
                            <div class="col-12 col-md-6 text-md-end pe-0">
                                <button class="btn btn-primary">{{ __('Disable') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Security Settings Tab-->
            <!--Activity Tab-->
            <div class="tab-pane fade" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                <div class="row">
                    <div class="col-12">
                        <h2>{{ __('Login Activity') }}</h2>
                        <p class="hp-p1-body mb-0">{{ __('login activity text') }}</p>
                    </div>
                    <div class="divider border-black-40 hp-border-color-dark-80"></div>
                    <div class="col-12">
                        <div
                            class="rounded-top border-start border-end border-top border-black-40 hp-border-color-dark-80">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-responsive mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>IP</th>
                                            <th>{{ __('Time') }}</th>
                                            <th class="text-end">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($login_activities as $activity)
                                            <tr>
                                                <td class="align-middle" style="min-width: 200px; width: 200px;">
                                                    <span
                                                        class="hp-p1-body text-black-100 hp-text-color-dark-0 fw-lighter">{{ $activity->browser_name }}</span>
                                                </td>

                                                <td class="align-middle" style="min-width: 200px; width: 200px;">
                                                    <span
                                                        class="hp-p1-body text-black-100 hp-text-color-dark-0 fw-lighter">{{ $activity->ip }}</span>
                                                </td>

                                                <td class="align-middle" style="min-width: 200px; width: 200px;">
                                                    <span
                                                        class="hp-p1-body text-black-100 hp-text-color-dark-0 fw-lighter">{{ $activity->time }}</span>
                                                </td>
                                                <td class="align-middle text-end">
                                                    <button type="button"
                                                        class="btn btn-text p-0 hp-p1-body text-black-100 hp-text-color-dark-0 fw-medium">
                                                        <span>Logout</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Activity Tab-->
            <!--Ads Settings Tab-->
            <div class="tab-pane fade" id="pills-ads" role="tabpanel" aria-labelledby="pills-ads-tab">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12">
                                <h2>{{ __('Ads Settings') }}</h2>
                            </div>
                            <div class="divider border-black-40 hp-border-color-dark-80"></div>
                            <!--Dividers-->
                            <div class="col-12">
                                <div class="row align-items-center g-24">
                                    <h3>{{ __('ad q') }}</h3>
                                    <ul class="row mb-5 justify-content-center text-center" required>
                                        <li class="col-12 col-md-4" style="margin-top: 1em">
                                            <div class="hp-select-box-item">
                                                <input type="radio" hidden="" name="ad"
                                                    value="12" id="radio-12" checked>
                                                <label class="d-block hp-cursor-pointer" for="radio-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="col-12" style="margin-top: 0.5em">
                                                                <span
                                                                    class="h2 d-block d-inline-block text-truncate"><strong>12
                                                                        ADs</strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="col-12 col-md-4" style="margin-top: 1em">
                                            <div class="hp-select-box-item">
                                                <input type="radio" hidden="" name="ad"
                                                    value="6" id="radio-6">
                                                <label class="d-block hp-cursor-pointer" for="radio-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="col-12" style="margin-top: 0.5em">
                                                                <span
                                                                    class="h2 d-block d-inline-block text-truncate"><strong>6
                                                                        ADs</strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="col-12 col-md-4" style="margin-top: 1em">
                                            <div class="hp-select-box-item">
                                                <input type="radio" hidden="" name="ad"
                                                    value="3" id="radio-3">
                                                <label class="d-block hp-cursor-pointer" for="radio-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="col-12" style="margin-top: 0.5em">
                                                                <span
                                                                    class="h2 d-block d-inline-block text-truncate"><strong>3
                                                                        ADs</strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="divider border-black-40 hp-border-color-dark-80"></div>
                            <!--Dividers-->
                            <div class="col-12">
                                <div class="col-12 col-md-6">
                                    <h3>{{ __('ad text') }}</h3>
                                </div>
                                <div class="row mb-5 justify-content-center text-center">
                                    @foreach ($categories as $category)
                                        <div class="col-6 col-md-3" style="margin-top:1.5em">
                                            <div class="hp-select-box-item">
                                                <input type="checkbox" hidden name="category[]"
                                                    value="{{ $category->category }}"
                                                    id="category{{ $category->id }}" checked>
                                                <label class="d-block hp-cursor-pointer"
                                                    for="category{{ $category->id }}">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row text-center">
                                                                <div class="col-12" style="margin-top: 0.5em">
                                                                    <i class="icon" style="font-size: 4em"></i>
                                                                </div>
                                                                <div class="col-12" style="margin-top: 0.5em">
                                                                    <span
                                                                        class="h6 d-block d-inline-block text-truncate"><strong>{{ $category->category }}</strong></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="divider border-black-40 hp-border-color-dark-80"></div>
                                <!--Dividers-->
                                <div class="col-12 text-md-end pe-0">
                                    <button class="btn btn-primary" type="submit">Change Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Ads Settings Tab-->
            <!--Referral Code Tab-->
            <div class="tab-pane fade" id="pills-referral" role="tabpanel" aria-labelledby="pills-referral-tab">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12">
                                <h3>{{ __('Referral Code') }}</h3>
                                <div class="divider border-black-40 hp-border-color-dark-80"></div>
                            </div>
                            <div class="col-12 hp-profile-content-list mt-8 pb-0 pb-sm-120">
                                <div class="row mb-5 justify-content-center text-center">
                                    <img src="{{ asset('img/svg/illustrations/promotional-image.svg') }}"
                                        style="width: 50%">
                                    <div class="col-12" style="margin: 1em">
                                        <h3>{{ __('referral code text1') }} <strong>300 SR</strong>
                                            {{ __('referral code text2') }}</h3>
                                    </div>
                                    <div class="rounded bg-primary-4" style="padding: 2em">
                                        <h1 id="referral_code" class="text-primary">
                                            <strong>{{ $user->referral_code }}</strong>
                                        </h1>
                                    </div>
                                    <a class="btn btn-outline-primary" style="margin-top: 2em"
                                        onclick="CopyToClipboard('referral_code');return false;">{{ __('Copy Referral Code') }}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--End of Referral Code Tab-->
        </div>
        <!--End Tabs-->
    </div>
</div><!-- End of Main -->
<!-- Change Password Modal -->
<div class="modal fade" id="ChangePasswordModal" tabindex="-1" aria-labelledby="ChangePasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h2>Change Password</h2>
                        <p class="hp-p1-body mb-0">Set a unique password to protect your account.</p>
                    </div>
                    <div class="divider border-black-40 hp-border-color-dark-80"></div>
                    <div class="col-12">
                        <div class="row">
                            <form method="post" action="{{ route('media_owner.change_password', $user->id) }}">
                                @csrf
                                <div class="mb-24">
                                    <label for="previous_password" class="form-label">Previous
                                        Password: </label>
                                    <input type="password" class="form-control" id="previous_password"
                                        name="previous_password" placeholder="previous password">
                                </div>
                                <div class="mb-24">
                                    <label for="password" class="form-label">New Password:</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="new password">
                                </div>

                                <div class="mb-24">
                                    <label for="password_confirmation" class="form-label">Confirm New Password
                                        :</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="confirm password">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End of Change Password Modal -->
<!-- Enabled Edit script  -->
<script>
    document.getElementById('edit_info').onclick = function() {
        var disabled = document.getElementById("name").disabled;
        if (disabled) {
            document.getElementById("name").disabled = false;
            document.getElementById("email").disabled = false;
            document.getElementById("commercial_record").disabled = false;
            document.getElementById("edit-user-info").disabled = false;
        } else {
            document.getElementById("name").disabled = true;
            document.getElementById("email").disabled = true;
            document.getElementById("commercial_record").disabled = true;
            document.getElementById("edit-user-info").disabled = true;
        }
    }
</script><!-- End of Enabled Edit script  -->
<!-- Copy To Clipboard script  -->
<script>
    function CopyToClipboard(id) {
        var r = document.createRange();
        r.selectNode(document.getElementById(id));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(r);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
    }
</script><!-- End of Copy To Clipboard script  -->

</x-media_owner.layout>
