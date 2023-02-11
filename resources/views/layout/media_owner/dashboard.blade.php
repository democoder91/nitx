<x-media_owner.layout :name="$name">
    @section('components.media_owner.sidebar')
    @section('active1', __('btn btn-primary-4'))
    @section('active-txt-1', __('hp-text-color-primary-1'))
@endsection
<div class="col-12">
    <!--adding screen-->
    <div class="card hp-card-1 hp-upgradePlanCardOne hp-upgradePlanCardOne-bg">
        <div class="position-absolute top-0 start-0 w-100 h-100 hp-dark-none"
            style="background-image: url('../../../assets/img/dasboard/analytics-payment-bg.svg'); background-size: cover; background-position: right center; z-index: -1;">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 hp-dark-block"
            style="background-image: url('../../../assets/img/dasboard/analytics-payment-bg-dark.png'); background-size: cover; background-position: right center; z-index: -1;">
        </div>
        <div class="card-body">
            <div class="row align-items-center mt-8">
                <div class="col-12 mb-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col flex-grow-1">
                            <h3 class="mb-8">{{ __('link dashboard text') }}</h3>
                            <p class="hp-p1-body mb-0">{{ __('link dashboard text2') }}</p>
                        </div>

                        <div class="col hp-flex-none w-auto">
                            <a type="button" href="{{ route('scanQR') }}"
                                class="btn mt-16 mt-sm-0 text-primary hp-bg-dark-primary-1 hp-border-color-dark-primary-1 hp-text-color-dark-0">
                                {{ __('Add New Screen') }} <i class="ri-add-box-line"
                                    style="margin-left: 0.5em; font-size:1em"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end of adding screen-->
<div class="mt-24 mb-12"></div>
<!--Dividers-->
<div class="col-12">
    <div class="row g-32">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div
                                class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle">
                                <i class="ri-advertisement-line text-primary hp-text-color-dark-primary-2"
                                    style="font-size: 24px;"></i>
                            </div>
                        </div>

                        <div class="col">
                            <h3 class="mb-4 mt-8">00</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">{{ __('Incoming Ads') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div
                                class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle">
                                <i class="ri-wallet-line text-primary hp-text-color-dark-primary-2"
                                    style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">00 SR</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">
                                {{ __('Total Earnings') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div
                                class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle">
                                <i class="ri-computer-line text-primary hp-text-color-dark-primary-2"
                                    style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{ $screens->count() }}</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">
                                {{ __('Screens linked') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div
                                class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle">
                                <i class="ri-database-2-line text-primary hp-text-color-dark-primary-2"
                                    style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{ $media_size_data['media_size'] }}
                                {{ $media_size_data['unit'] }}</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">{{ __('Data Storage') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-24 mb-12"></div>
<!--Dividers-->
<!--Empty Incoming Ads-->
<div class="col-12">
    <div class="card">
        <div class="row d-flex justify-content-center" style="margin-top: 4em; margin-bottom:4em;">
            <img src="{{ asset('assets/img/illustrations/empty-sheets.svg') }}" style="height:10em">
            <h5 style="text-align: center; margin-top: 2em;">{{ __('no ads message') }}</h5>
        </div>
    </div>
</div>
<!--End of Empty Incoming Ads-->
<!--Incoming Ads-->
<div class="col-12" hidden>
    <h2>Incoming Ads 📥</h2>
    <div class="card table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Ads</th>
                    <th scope="col">Status</th>
                    <th scope="col">Upload date</th>
                    <th scope="col">Earnings</th>
                    <th scope="col">Publish in</th>
                    <th scope="col">Ad info</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">name</th>
                    <td>In Review</td>
                    <td>7/22</td>
                    <td>82 SR</td>
                    <td>00:00</td>
                    <td><a class="text-primary font-weight-bold text-xs" data-bs-toggle="modal"
                            data-bs-target="#approval_card" style="cursor: pointer"">See more</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!--End of Incoming Ads-->
<div class="mt-24 mb-12"></div>
<!--Dividers-->
<!--Live Ads-->
<div class="col-12" hidden>
    <h2>Live Ads
        <div class="spinner-grow spinner-grow-sm text-danger" role="status" style="margin-bottom: 0.2em"></div>
    </h2>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <img class="img-thumbnail"
                src="https://images.unsplash.com/photo-1637002057991-d4880c4635e8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                style="  width:22em; height:12em; object-fit:cover; margin: 1em;">
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <img class="img-thumbnail"
                src="https://images.unsplash.com/photo-1621659911279-b08ce9ff421f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                style="  width:22em; height:12em; object-fit:cover; margin: 1em;">
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <img class="img-thumbnail"
                src="https://images.unsplash.com/photo-1622267224551-8063a2d4fbb4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                style="  width:22em; height:12em; object-fit:cover; margin: 1em;">
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <img class="img-thumbnail"
                src="https://images.unsplash.com/photo-1535568824865-a801351e8483?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                style="  width:22em; height:12em; object-fit:cover; margin: 1em;">
        </div>
    </div>
</div>
<!--End of Live Ads-->
<!--approvalad modal-->
<div class="modal fade" id="approval_card" tabindex="-1" aria-labelledby="approval_cardLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <img src="" alt="" id="ad_path" style="width: 100%">
                <video id="ad_path_video" src="" controls style="width: 100%; height: auto"></video>
                <div class="mt-24 mb-12"></div>
                <!--Dividers-->
                <div class="row">
                    <h4>Ad Info</h4>
                    <hr />
                    <div class="col">
                        <label>Headline</label><br />
                        <p id="ad_headline"></p>
                        <label>Url</label><br />
                        <p id="ad_url"></p>
                        <label>Status</label><br />
                        <p id="ad_status"></p>
                    </div>
                    <div class="col">
                        <label>Earnings</label><br />
                        <p id="ad_Earnings"></p>
                        <label>Start date</label><br />
                        <p id="ad_from"></p>
                        <label>End date</label><br />
                        <p id="ad_to"></p>
                    </div>
                </div>
                <br />
                <div class="col-12">
                    <div class="mb-3">
                        <label for="modal-screen-name" class="col-form-label">The ad will be live in:</label>
                        <p style="font-size: 4em; font-weight: 700; color:blue; text-align: center;">
                            00:00 <span style="color: black; font-size:0.4em; font-weight: bold;"> /hr</span>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-6" style="text-align: center;">
                            <form action="" method="post" id="approveAdForm">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                        </div>
                        <div class="col-6" style="text-align: center;">
                            <button class="btn btn-danger" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ader_massage" aria-expanded="false"
                                aria-controls="ader_massage">
                                Reject
                            </button>
                        </div>
                    </div>
                    <div class="mt-24 mb-12"></div>
                    <!--Divider-->
                    <div class="collapse" id="ader_massage">
                        <div class="card card-body">
                            <form action="" id="rejectAdForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="massage">Write a message for the advertiser</label>
                                    <textarea class="form-control" id="massage" rows="3" name="reason"></textarea>
                                </div>
                                </br>
                                <button type="submit" class="btn btn-primary">Send to advertiser</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end of approvalad modal-->
</x-media_owner.layout>
