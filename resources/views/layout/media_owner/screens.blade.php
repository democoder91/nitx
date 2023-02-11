<x-media_owner.layout :name="$name">
    @section('components.media_owner.sidebar')
        @section('active2', __('btn btn-primary-4'))
        @section('active-txt-2', __('hp-text-color-primary-1'))
    @endsection
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

    <div class="col-12">
        <div class="card pb-0 pb-sm-64">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center justify-content-between">
                            <div class="col flex-grow-1">
                                <h1 class="mb-8">{{ __('Screen Groups') }}</h1>
                                <p class="hp-p1-body mb-0">{{ __('Screen text') }}</p>
                            </div>
                            <div class="col hp-flex-none w-auto">
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CreateGroupModal">
                                    <i class="iconly-Light-Plus" style="margin-right: 0.5em; font-size:1em"></i>
                                    {{ __('Create New Group') }}
                                </a>
                            </div>
                        </div>
                        <div class="mt-24 mb-12"></div>
                        <!--Dividers-->
                        <!--Empty Screen Group-->
                        @if (count($screen_groups) === 0)
                            <div class="col-12">
                                <div class="card">
                                    <div class="row d-flex justify-content-center"
                                         style="margin-top: 4em; margin-bottom:4em;">
                                        <img src="{{ asset('assets/img/illustrations/empty-groups.svg') }}"
                                             style="height:8em">
                                        <h5 style="text-align: center; margin-top: 2em;">{{ __('Epty screen group') }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <!--End of Empty Screen Group-->
                        @else
                            <div class="row">
                                @foreach ($screen_groups as $screen_group)
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4" style="margin: 1em 0em 1em">
                                        <div class="card hp-card-1 border border-black-60">
                                            <div class="card-body py-16">
                                                <div class="row">
                                                    <div class="col-12 mb-8">
                                                        <div class="row align-items-center justify-content-between">
                                                            <div class="col hp-flex-none w-auto">
                                                                <span class="badge bg-primary-4 hp-bg-dark-primary text-primary hp-text-color-dark-primary-2 border-none w-auto py-4 fw-medium"
                                                                        style="margin-bottom: 1em">{{ __('Screen Group') }}
                                                                </span>
                                                            </div>
                                                            <div class="col hp-flex-none w-auto">
                                                                @if ($screen_group->is_active)
                                                                    <span class="badge bg-success-4 hp-bg-dark-success text hp-text-color-dark-success-2 border-success w-auto py-4 fw-medium"
                                                                            style="margin-bottom: 1em">
                                                                    <strong>{{ __('Active') }}</strong>
                                                                    </span>
                                                                @else
                                                                    <span class="badge bg-danger-4 hp-bg-dark-success text hp-text-color-dark-danger-2 border-danger w-auto py-4 fw-medium"
                                                                            style="margin-bottom: 1em"><strong>{{ __('Not-Active') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <i class="ri-computer-line text-primary me-8"
                                                               style="font-size: 24px;"></i>
                                                            <h5 class="mb-0">{{ $screen_group->name }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row align-items-center justify-content-between">
                                                            <div class="col hp-flex-none w-auto">
                                                                <div class="avatar-group" data-max="5">
                                                                    <h6 class="text-primary">
                                                                        <strong>{{ $screen_group->screens()->count() }}
                                                                        </strong>{{ __('Screen in group') }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col hp-flex-none w-auto">
                                                                <button type="button"
                                                                        class="btn btn-link text-black-100 hp-hover-text-color-primary-3 p-0 bg-transparent"
                                                                        data-bs-toggle="modal"
                                                                        onclick="fetchScreenGroupSequenceMediaWithTheirDuration('#live-group-sequence-img-{{ $screen_group->id }}', {{ $screen_group->sequence_id }})"
                                                                        data-bs-target="#screengroupinfo{{ $screen_group->id }}">
                                                                    <span>{{ __('View details') }}</span>
                                                                    <i class="ri-arrow-right-s-line remix-icon"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        {{-- Screen Group Card End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-24 mb-12"></div>
    <!--Dividers-->
    <!--Tab Menu-->
    @if (count($screens) != 0)
        <div class="col-12">
            <div class="hp-faq-tabs bg-white hp-bg-dark-100 rounded py-12 px-24">
                <ul class="nav nav-pills hp-overflow-x-auto flex-nowrap">
                    <li class="nav-item me-4">
                        <button class="nav-link py-4 active" id="menu-1-tab" data-bs-toggle="pill"
                                data-bs-target="#menu-1" type="button" role="tab" aria-controls="menu-1"
                                aria-selected="true">
                        <span class="d-flex align-items-center d-inline-block text-truncate">
                            <i class="ri-computer-line me-12" style="font-size: 20px;"></i>
                            {{ __('All Screens') }}
                        </span>
                        </button>
                    </li>
                    <li class="nav-item me-4">
                        <button class="nav-link py-4" id="menu-2-tab" data-bs-toggle="pill" data-bs-target="#menu-2"
                                type="button" role="tab" aria-controls="menu-2" aria-selected="false">
                        <span class="d-flex align-items-center d-inline-block text-truncate">
                            <i class="ri-computer-fill me-12" style="font-size: 20px;"></i>
                            {{ __('Screens') }}
                        </span>
                        </button>
                    </li>
                    <li class="nav-item me-4">
                        <button class="nav-link py-4" id="menu-3-tab" data-bs-toggle="pill" data-bs-target="#menu-3"
                                type="button" role="tab" aria-controls="menu-3" aria-selected="false">
                        <span class="d-flex align-items-center d-inline-block text-truncate">
                            <i class="ri-advertisement-fill me-12" style="font-size: 20px;"></i>
                            {{ __('Ad Screens') }}
                        </span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!--End of Tab Menu-->
    @endif
    <div class="mt-24 mb-12"></div>
    <!--Dividers-->
    <!--TAB-->
    <div class="col-12">
        <div class="tab-content">
            <!--All Screens Tab-->
            <div class="tab-pane fade show active" id="menu-1" role="tabpanel" aria-labelledby="menu-1-tab">
                <div class="row g-32">
                    @foreach ($screens as $screen)
                        <x-media_owner.screen-card status="{{ $screen->status }}" type="{{ $screen->type }}"
                                                   name="{{ $screen->name }}" id="{{ $screen->id }}"
                                                   sequence="{{ $screen->sequence_id }}"/>
                    @endforeach
                </div>
            </div>
            <!--End of All Screens Tab-->
            <!--Screens Tab-->
            <div class="tab-pane fade" id="menu-2" role="tabpanel" aria-labelledby="menu-2-tab">
                <div class="row g-32">
                    @foreach ($regular_screens as $screen)
                        <x-media_owner.screen-card status="{{ $screen->status }}" type="{{ $screen->type }}"
                                                   name="{{ $screen->name }}" id="{{ $screen->id }}"
                                                   sequence="{{ $screen->sequence_id }}"/>
                    @endforeach
                </div>
            </div>
            <!--End of Screens Tab-->
            <!--Ad Screens Tab-->
            <div class=" tab-pane fade" id="menu-3" role="tabpanel" aria-labelledby="menu-3-tab">
                <div class="row g-32">
                    <div class="col-12">
                        <div class="row g-32">
                            @foreach ($ad_screens as $screen)
                                <x-media_owner.screen-card status="{{ $screen->status }}" type="{{ $screen->type }}"
                                                           name="{{ $screen->name }}" id="{{ $screen->id }}"
                                                           sequence="{{ $screen->sequence_id }}"/>
                            @endforeach
                        </div>
                    </div>
                    <!--End of Ad Screens Tab-->
                    <!--Ad Report-->
                    <div class=" col-12">
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading hp-text-color-dark-info-1">
                                <i class="ri-alert-line"
                                   style="font-size: 1em; margin-right: 0.6em"></i>{{ __('Ad report') }}
                            </h4>
                            <h5>{{ __('Ad report 2') }}</h5>
                            <div class="d-grid gap-2 col-3">
                                <button class="btn btn-sm btn-ghost btn-primary" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#ReportAd" aria-expanded="false"
                                        aria-controls="ReportAd">
                                    <strong>{{ __('Report Now!') }}</strong>
                                </button>
                            </div>
                            <div class="divider hp-border-color-dark-info-1"></div>
                            <div class="collapse" id="ReportAd">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="row justify-content-between align-item-start">
                                            <h4 class="mb-24">{{ __('Report an Ad:') }}</h4>
                                            <form action="{{ route('media_owner.store_ad_issue') }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="advertiser_name"
                                                           class="col-form-label"><strong>{{ __('Advertiser name:') }}</strong></label>
                                                    <input type="text" class="form-control"
                                                           name="advertiser_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="advertiser_email"
                                                           class="col-form-label"><strong>{{ __('Advertiser Email:') }}</strong></label>
                                                    <input type="email" class="form-control"
                                                           name="advertiser_email">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date_of_issue"
                                                           class="col-form-label"><strong>{{ __('Date of issue:') }}</strong></label>
                                                    <input type="date" class="form-control" name="date_of_issue">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description"
                                                           class="col-form-label"><strong>{{ __('Description:') }}</strong></label>
                                                    <textarea class="form-control" rows="3"
                                                              name="description"></textarea>
                                                </div>
                                                <div class="mb-3 modal-footer">
                                                    <button type="submit"
                                                            class="btn btn-primary">{{ __('Send') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of Ad Report-->
                </div>
            </div>
        </div>
    </div><!-- End of TAB -->

    <!--modal for create new group-->
    <div class="modal fade" id="CreateGroupModal" tabindex="-1" aria-labelledby="CreateGroupModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="CreateGroupModalLabel">{{ __('Create New Group') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('media_owner.createScreenGroup') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="screen_group_name" class="col-form-label">{{ __('Group Name') }}</label>
                            <input type="text" class="form-control" name="screen_group_name"
                                   id="screen_group_name">
                        </div>
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="group_screens" class="col-form-label">{{ __('My Screens') }}</label>
                            <div class="mt-5"></div>
                            <div class="row">
                                @foreach ($screens as $screen)
                                    <div class="col-6 col-md-4" style="margin-top: 0.6em"
                                         onclick="checkIsScreenInOneGroup({{ $screen->id }})">
                                        <input type="checkbox" class="btn-check" name="screens[]"
                                               id="{{ $screen->id }}" autocomplete="off"
                                               value="{{ $screen->id }}">
                                        <label class="btn btn-primary" for="{{ $screen->id }}">
                                            <i class="ri-computer-line" style="font-size: 1.2em;"></i></br>
                                            <span class="text-truncate" id="screen-name-{{ $screen->id }}"
                                                  style="width: 70px;">{{ $screen->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="sequence_id" class="col-form-label">{{ __('Create group sequence') }}</label>
                            <select class="form-select form-select-lg mb-16" aria-label="sequence_id"
                                    name="sequence_id">
                                @foreach ($all_sequences as $sequence)
                                    <option value="{{ $sequence->id }}">{{ $sequence->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="screenIsInMoreThanOneGroupAlert" style="display: none"
                             class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="ri-alert-fill me-8" style="font-size:1.8em;"></i>
                            <strong>{{ __('Waring!') }}</strong>
                            {{ __('waring message') }}
                            <p>
                                {{ __('Screens in other groups:') }} <span id="duplicateScreens"></span>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <i class="ri-alert-fill me-8" style="font-size:2em; margin-bottom:1.7em"></i>
                            <div>
                                <p>{{ __('Create group note') }}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary" id="create-group-btn"
                                    onclick="setTimeDurationAfterSubmittingFormToDisableButton('30000', 'create-group-btn')">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end of modal for create new group-->

    <!-- modal for View details-->
    @foreach ($screen_groups as $screen_group)
        <div class="modal fade" id="screengroupinfo{{ $screen_group->id }}" tabindex="-1"
             aria-labelledby="screengroupinfo{{ $screen_group->id }}" data-bs-backdrop="static"
             data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-screen-group-name-title" id="modal-screen-group-name-title">
                            {{ $screen_group->name }}</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6" style="margin-bottom: 5%">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row mx-0 align-items-start justify-content-between">
                                        <span
                                                class="badge bg-danger-4 hp-bg-dark-danger text-danger border-none w-auto py-8 px-16 fw-medium">{{ __('Live Sequence') }}🚨</span>
                                            <div class="spinner-grow text-danger" role="status"></div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img 
                                        
                                        id="live-group-sequence-img-{{ $screen_group->id }}" --}}
                                            src="{{ asset('img/ad/NoScreenMedia.png') }}"
                                            style="  width:100%; height:20em; object-fit:cover; border:solid 5px black;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        {{ __('Group info') }}
                                    </div>
                                    <div class="card-body">
                                        <form id="update-screen-group"
                                              action="{{ route('media_owner.update_screen_group', $screen_group->id) }}"
                                              method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="modal-screen-group-name"
                                                       class="col-form-label">{{ __('Group Name') }}</label>
                                                <input type="text" class="form-control"
                                                       name="modal-screen-group-name" id="modal-screen-group-name"
                                                       value="{{ $screen_group->name }}">
                                            </div>
                                            <div class="mb-3" style="margin-bottom: 4%">
                                                <label for="screens" class="col-form-label">{{ __('Screens in Group') }}:</label>
                                                <div class="row" id="screens">
                                                    @foreach ($screen_group->screens as $screen)
                                                        <div class="col-6 col-sm-6 col-md-4" style="margin-top: 0.6em"
                                                             onclick="checkIsScreenInOneGroup({{ $screen->id }}, {{ $screen_group->id }})">
                                                            <input type="checkbox" class="btn-check" name="screens[]"
                                                                   id="screen-group-{{ $screen_group->id . '-screen-' . $screen->id }}"
                                                                   autocomplete="off" value="{{ $screen->id }}" checked>
                                                            <label class="btn btn-primary" for="screen-group-{{ $screen_group->id . '-screen-' . $screen->id }}">
                                                                <i class="ri-computer-line" style="font-size: 1.2em;"></i></br>
                                                                <span class="text-truncate" style="width: 70px;">{{ $screen->name }}</span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <label for="screens" class="col-form-label" style="margin-top: 2%">Sceeens Not in the group:</label>
                                                    @foreach (\App\Models\Screen::getScreensNotInScreenGroup(auth()->user()->id, $screen_group->id) as $screen)
                                                    <div class="col-6 col-sm-6 col-md-4" style="margin-top: 0.6em">
                                                            <input type="checkbox" class="btn-check" name="screens[]"
                                                                   id="not-in-screen-group-{{ $screen_group->id . '-screen-' . $screen->id }}"
                                                                   autocomplete="off" value="{{ $screen->id }}">
                                                            <label class="btn btn-dark" for="not-in-screen-group-{{ $screen_group->id . '-screen-' . $screen->id }}">
                                                                <i class="ri-computer-line" style="font-size: 1.2em;"></i></br>
                                                                <span class="text-truncate" style="width: 70px;">{{ $screen->name }}</span>
                                                            </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="modal-sequence-id" class="col-form-label">{{ __('Sequence assign') }}
                                                    <a href="{{ route('MOsequence') }}"  class="btn btn-text text-primary">
                                                        <i class="iconly-Light-Plus" style="font-size: 1.2em; margin: 0.2em"></i>Create Sequence</a>
                                                </label>
                                                <select class="form-select form-select-lg mb-16"
                                                        aria-label="modal-sequence-id" name="modal-sequence-id">
                                                    @foreach ($all_sequences as $sequence)
                                                        <option value="{{ $sequence->id }}"
                                                                {{ $sequence->id == $screen_group->sequence_id ? 'selected="selected"' : '' }}>
                                                            {{ $sequence->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col hp-flex-none w-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="flexSwitchCheckDefault2-{{ $screen_group->id }}"
                                                           name="is_active"
                                                            {{ $screen_group->is_active ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                           for="flexSwitchCheckDefault2-{{ $screen_group->id }}">
                                                        <span class="ms-12">{{ __('make active') }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <br/>
                                            <div id="screenIsInMoreThanOneGroupAlert{{ $screen_group->id }}"
                                                 style="display: none"
                                                 class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="ri-alert-fill me-8" style="font-size:1.8em;"></i>
                                                <strong>{{ __('Waring!') }}</strong>
                                                {{ __('waring message') }}
                                                <p> {{ __('Screens in other groups:') }} <span id="duplicateScreens"></span></p>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-text" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                            <button type="submit" class="btn btn-ghost btn-danger">
                                                <a href="{{ route('media_onwer.delete_screen_group', $screen_group->id) }}">{{ __('Delete Screen Group') }}</a></button>
                                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end of modal for View details-->
    @endforeach
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkscBmYJvNjGEj9rOrvRR3DiQd-BUBLxM&callback=initMap"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>

    <!-- Screens Modal-->
    @foreach ($screens as $screen)
        <div class="modal fade" id="screeninfo{{ $screen->id }}" tabindex="-1"
             aria-labelledby="screeninfo{{ $screen->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
             aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-screen-group-name-title" id="modal-screen-group-name-title">
                            {{ $screen->name }}</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="update-screens" action="{{ route('media_onwer.update_screen', $screen->id) }}"
                              method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6" style="margin-bottom: 5%">
                                    <div class="col-12" style="margin-bottom: 2%">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row mx-0 align-items-start justify-content-between">
                                                <span class="badge bg-danger-4 hp-bg-dark-danger text-danger border-none w-auto py-8 px-16 fw-medium">{{ __('Live Sequence') }}
                                                </span>
                                                    <div class="spinner-grow text-danger" role="status"></div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <img id="live-screen-sequence-img-{{ $screen->id }}"
                                                     src="{{ asset('img/ad/NoScreenMedia.png') }}"
                                                     style="  width:100%; height:20em; object-fit:cover; border:solid 5px black;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6">
                                    <div class="accordion">
                                        <!--Screen info-->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="ScreeninfoPanels">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#ScreeninfoPanels-collapseOne" aria-expanded="true"
                                                        aria-controls="ScreeninfoPanels-collapseOne">
                                                    <strong>{{ __('Screen info 🖥️') }}</strong>
                                                </button>
                                            </h2>
                                            <div id="ScreeninfoPanels-collapseOne" class="accordion-collapse collapse"
                                                 aria-labelledby="ScreeninfoPanels">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="mb-3">
                                                                <label for="modal-screen-name">
                                                                    <h4>{{ __('Screen ID:') }}</h4>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                       value="{{ $screen->id }}" id="screen-id" disabled>
                                                            </div>
                                                            <div class="mb-3" style="margin-top: 0.8em">
                                                                <label for="modal-screen-name">
                                                                    <h4>{{ __('Screen Name:') }}</h4>
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                       name="modal-screen-name" id="modal-screen-name"
                                                                       value="{{ $screen->name }}">
                                                            </div>
                                                            <div class="mb-3" style="margin-top: 0.8em">
                                                                <label for="modal-screen-name">
                                                                    <h4>{{ __('Screen location:') }}</h4>
                                                                </label>
                                                                <div class=" col-12 card">
                                                                    <div id="map{{ $screen->id }}"
                                                                         data-lat="{{ $screen->latitude }}"
                                                                         data-lng="{{ $screen->longitude }}"
                                                                         style="height: 200px;"></div>
                                                                    <script>
                                                                        // Get element references
                                                                        var map = document.getElementById('map{{ $screen->id }}');
                                                                        // Initialize LocationPicker plugin
                                                                        var lp = new locationPicker(map, {
                                                                            setCurrentPosition: false,
                                                                            lat: `{{ $screen->latitude }}`,
                                                                            lng: `{{ $screen->longitude }}`,
                                                                        }, {
                                                                            zoom: 18,
                                                                            zoomControl: false,
                                                                            scaleControl: false,
                                                                            fullscreenControl: false,
                                                                            streetViewControl: false,
                                                                            mapTypeControl: false,
                                                                            draggable: false,
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            @if ($screen->type == 'ad')
                                                                <div class="mb-3" style="margin-top: 2em">
                                                                    <label for="modal-screen-name">
                                                                        <h4>{{ __('Screen Earnings:') }}</h4>
                                                                    </label>
                                                                    <p
                                                                            style="font-size: 4em; font-weight: 700; color:blue; text-align: center;">
                                                                        {{ number_format((float) $screen->getEarning() * 23, 2, '.', '') }}
                                                                        <span
                                                                                style="color: black; font-size:0.4em; font-weight: bold;">
                                                                        SR</span>
                                                                    </p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End of Screen info-->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                                        aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                    <strong>{{ __('Screen Control🛠️') }}</strong>
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                                 aria-labelledby="panelsStayOpen-headingTwo">
                                                <!--Content Size Card-->
                                                <div class="card hp-card-1" style="margin-top:1.5em">
                                                    <div class="card-body py-16">
                                                        <div class="row">
                                                            <div class="col-12 mb-8">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="ri-aspect-ratio-fill text-primary me-8"
                                                                       style="font-size: 2em;"></i>
                                                                    <h3 class="mb-0 text-primary me-8">
                                                                        <strong>{{ __('Content Size') }}</strong>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row align-items-center justify-content-between">
                                                                    <h6>{{ __('What is your screen orientation?') }}</h6>
                                                                    <ul class="row mb-5 justify-content-center text-center"
                                                                        required>
                                                                        <li class="col-12" style="margin-top: 1em"
                                                                            id="rotate-default">
                                                                            <div class="hp-select-box-item">
                                                                                <input type="radio" hidden=""
                                                                                       name="rotate-value"
                                                                                       value="rotate-default">
                                                                                <label class="d-block hp-cursor-pointer"
                                                                                       for="radio-horizontal">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row text-center">
                                                                                                <div class="col-12"
                                                                                                     style="margin-top: 0.5em">
                                                                                                    <i class="ri-picture-in-picture-line"
                                                                                                       style="font-size: 2em;"></i>
                                                                                                    <span
                                                                                                            class="d-block d-inline-block text-truncate"><strong>{{ __('Default Horizontal') }}</strong></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                        <li class="col-12 col-sm-6" style="margin-top: 1em">
                                                                            <div class="hp-select-box-item">
                                                                                <input type="radio" hidden=""
                                                                                       name="rotate-value"
                                                                                       value="rotate-left-90"
                                                                                       id="rotate-left-90">
                                                                                <label class="d-block hp-cursor-pointer"
                                                                                       for="rotate-left-90">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row text-center">
                                                                                                <div class="col-12"
                                                                                                     style="margin-top: 0.5em">
                                                                                                    <i class="ri-anticlockwise-line"
                                                                                                       style="font-size: 2em;"></i>
                                                                                                    <span
                                                                                                            class="d-block d-inline-block text-truncate"><strong>{{ __('Rotate to Left 90°') }}</strong></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                        <li class="col-12 col-sm-6" style="margin-top: 1em">
                                                                            <div class="hp-select-box-item">
                                                                                <input type="radio" hidden=""
                                                                                       name="rotate-value"
                                                                                       value="rotate-right-90"
                                                                                       id="rotate-right-90">
                                                                                <label class="d-block hp-cursor-pointer"
                                                                                       for="rotate-right-90">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row text-center">
                                                                                                <div class="col-12"
                                                                                                     style="margin-top: 0.5em">
                                                                                                    <div
                                                                                                            style="transform: rotate(180deg);">
                                                                                                        <i class="ri-anticlockwise-line"
                                                                                                           style="font-size: 2em"></i>
                                                                                                    </div>
                                                                                                    <span
                                                                                                            class="d-block d-inline-block text-truncate"><strong>{{ __('Rotate to Right 90°') }}</strong></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <h6 style="margin-top: 1em">
                                                                        {{ __('Is this the correct size?') }}</h6>
                                                                    <ul class="row mb-5 justify-content-center text-center"
                                                                        required>
                                                                        <li class="col-12 col-sm-6" style="margin-top: 1em"
                                                                            id="img-default-size">
                                                                            <div class="hp-select-box-item">
                                                                                <input type="radio" hidden=""
                                                                                       name="size" value="horizontal"
                                                                                       id="radio-horizontal" checked>
                                                                                <label class="d-block hp-cursor-pointer"
                                                                                       for="radio-horizontal">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row text-center">
                                                                                                <div class="col-12"
                                                                                                     style="margin-top: 0.5em">
                                                                                                    <i class="ri-aspect-ratio-line"
                                                                                                       style="font-size: 2em;"></i>
                                                                                                    <span
                                                                                                            class="d-block d-inline-block text-truncate"><strong>{{ __('default size') }}</strong></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                        <li class="col-12 col-sm-6" style="margin-top: 1em"
                                                                            id="img-fit">
                                                                            <div class="hp-select-box-item">
                                                                                <input type="radio" hidden=""
                                                                                       name="size" value="vertical-left"
                                                                                       id="radio-vertical-left">
                                                                                <label class="d-block hp-cursor-pointer"
                                                                                       for="radio-vertical-left">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="row text-center">
                                                                                                <div class="col-12"
                                                                                                     style="margin-top: 0.5em">
                                                                                                    <i class="ri-aspect-ratio-line"
                                                                                                       style="font-size: 2em;"></i>
                                                                                                    <span
                                                                                                            class="d-block d-inline-block text-truncate"><strong>{{ __('imge fit') }}</strong></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Content Size Card-->
        
                                                <!--Make Profit Card-->
                                                <div class="card hp-card-1" style="margin-top:1.5em">
                                                    <div class="card-body py-16">
                                                        <div class="row">
                                                            <div class="col-12 mb-8">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="ri-money-dollar-circle-line text-primary me-8"
                                                                       style="font-size: 2em;"></i>
                                                                    <h3 class="mb-0 text-primary me-8">
                                                                        <strong>{{ __('Want to make a profit?') }}</strong>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row align-items-center justify-content-between">
                                                                    <h4>{{ __('Switch your screen to ad screen now!') }}</h4>
                                                                    <div class="form-check form-switch ms-12">
                                                                        @if ($screen->type == 'ad')
                                                                            <input class="form-check-input" type="checkbox"
                                                                                   id="switch-screen-to-ad{{ $screen->id }}"
                                                                                   name="switch-screen-to-ad" checked>
                                                                            <label class="form-check-label"
                                                                                   for="switch-screen-to-ad{{ $screen->id }}">
                                                                                @else
                                                                                    <input class="form-check-input"
                                                                                           type="checkbox"
                                                                                           id="switch-screen-to-ad{{ $screen->id }}"
                                                                                           name="switch-screen-to-ad">
                                                                                    <label class="form-check-label"
                                                                                           for="switch-screen-to-ad{{ $screen->id }}">
                                                                                        @endif
                                                                                        <span class="ms-12"><strong>Switch to
                                                                            {{ $screen->type == 'ad' ? 'Regular' : 'Ad' }}
                                                                            Screen</strong></span>
                                                                                    </label>
                                                                            </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End of Make Profit Card-->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="alert alert-primary d-flex">
                                <div>
                                    {{ __('Having trouble with your screen?') }}
                                    <button id="relinkScreenBtn-{{$screen->id}}" class="btn btn-link text-primary relinkScreenBtn">
                                        <strong>{{ __('Relink it now') }}</strong>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-text" data-bs-dismiss="modal">
                                    {{ __('Close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!--end of Screens Modal-->


    <!--Ad Warning Modal-->
    <div class="modal fade" id="AdWarningModal" tabindex="-1" aria-labelledby="AdWarningModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content">
                <div class="modal-body py-48 px-24">
                    <div class="text-center">
                        <div class="mb-8">
                            <i class="ri-alert-fill lh-normal text-warning" style="font-size: 86px"></i>
                        </div>
                        <span class="h1 d-block mb-8">{{ __('Warning!') }}</span>
                        <h4 class="mb-0  fw-medium text-black-80">{{ __('waring message switch') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Ad Warning Modal-->


</x-media_owner.layout>
