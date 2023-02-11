<x-media_owner.layout :name="$name">
    @section('components.media_owner.sidebar')
    @section('active5', __('btn btn-primary-4'))
    @section('active-txt-5', __('hp-text-color-primary-1'))
@endsection
<!--Subscription-->
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {!! implode('', $errors->all('<p>:message</p>')) !!}
    </div>
@endif
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<h2>{{ __('Subscription 💎') }}</h2>
<!--No Plan Subscription-->
@if (!$isSubscribed)
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center justify-content-between">
                    <div class="row col hp-flex-none w-auto">
                        <div class="col-6 hp-flex-none w-auto">
                            <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-info-4 hp-bg-color-dark-info rounded-circle"
                                style="padding: 2em">
                                <i class="iconly-Bold-TickSquare text-info hp-text-color-dark-info-2"
                                    style="font-size: 2em;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{ __('No Plan') }}</h3>
                            <h5 class="mb-0 text-black-80 hp-text-color-dark-30">{{ __('No plan message') }}</h5>
                        </div>
                    </div>
                    <div class="col hp-flex-none w-auto">
                        <div class="input-group mb-16" style="margin-top: 1em">
                            <button class="btn btn-outline-primary text-primary hp-hover-text-color-black-0"
                                type="button" data-bs-toggle="modal"
                                data-bs-target="#NewPlanModal">{{ __('Choose Plan') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of No Plan Subscription-->
@else
    <!--Subscription-->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center justify-content-between">
                    <div class="row col hp-flex-none w-auto">
                        <div class="col-6 hp-flex-none w-auto">
                            <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle"
                                style="padding: 2em">
                                <i class="iconly-Bold-TickSquare text-primary hp-text-color-dark-primary-2"
                                    style="font-size: 2em;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{ $subscription->name }}
                                @if (!$subscription->ended_at)
                                    <span
                                        class="m-5 badge bg-success-4 hp-bg-dark-success text-dark border-success"><strong>{{ __('Active') }}</strong></span>
                                @else
                                    <span
                                        class="m-5 badge bg-danger-4 hp-bg-dark-danger text-dark border-danger"><strong>{{ __('Not-Active') }}</strong></span>
                                @endif
                            </h3>
                            @if (!$subscription->ended_at)
                                <h5 class="mb-0 text-black-80 hp-text-color-dark-30">
                                    @if ($subscription->plan_id == 1 || $subscription->plan_id == 3 || $subscription->plan_id == 5)
                                        Billing Monthly &nbsp | &nbsp Next Invoice
                                        on
                                        {{ \Carbon\Carbon::create($subscription->subscribed_at)->addDays(30)->format('d/m/Y') }}
                                    @else
                                        Billing Yearly &nbsp | &nbsp Next Invoice
                                        on
                                        {{ \Carbon\Carbon::create($subscription->subscribed_at)->addDays(365)->format('d/m/Y') }}
                                    @endif
                                </h5>
                            @endif
                        </div>
                    </div>
                    <div class="col hp-flex-none w-auto">
                        <div class="input-group mb-16" style="margin-top: 1em">
                            <button class="btn btn-outline-primary text-primary hp-hover-text-color-black-0"
                                type="button" data-bs-toggle="modal" data-bs-target="#NewPlanModal">
                                <i class="iconly-Light-EditSquare" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit Plan"></i></button>
                            <button class="btn btn-outline-primary text-primary hp-hover-text-color-black-0"
                                type="button" data-bs-toggle="modal" data-bs-target="#CancelPlanModal">
                                <i class="iconly-Light-CloseSquare" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Cancel Plan"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Subscription-->
@endif

<div class="mt-24 mb-12"></div>
<!--Dividers-->
<div class="col-12">
    <h2>{{ __('Wallet 💰') }}</h2>
    <div class="row">
        <!--Ads Income-->
        <div class="col-12 col-md-6 mt-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="row col hp-flex-none w-auto">
                            <div class="col-6 hp-flex-none w-auto">
                                <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-success-4 hp-bg-color-dark-success rounded-circle"
                                    style="padding: 2em">
                                    <i class="ri-coins-fill text-success hp-text-color-dark-success-2"
                                        style="font-size: 2em;"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="mb-4 mt-8">{{ __('Ads Income') }}</h4>
                                <h1 class="mb-0"><strong>{{ number_format((float) $wallet * 23, 1, '.', '') }}
                                        SR</strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Ads Income-->
        <!--Subscription Fee-->
        <div class="col-12 col-md-6 mt-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="row col hp-flex-none w-auto">
                            <div class="col-6 hp-flex-none w-auto">
                                <div class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-secondary-4 hp-bg-color-dark-secondary rounded-circle"
                                    style="padding: 2em">
                                    <i class="ri-bank-card-fill text-secondary hp-text-color-dark-secondary-2"
                                        style="font-size: 2em;"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="mb-4 mt-8">{{ __('Subscription Fee') }}</h4>
                                <h1 class="mb-0"><strong>45SR</strong></h1>
                            </div>
                        </div>
                        <div class="col hp-flex-none w-auto">
                            <div class="input-group mb-16" style="margin-top: 1em">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                        id="PayBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ __('Pay Now') }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="PayBtn">
                                        <li><a class="dropdown-item"
                                                href="">{{ __('Pay from primary card') }}</a></li>
                                        <li><a class="dropdown-item"
                                                href="">{{ __('Pay from ads income') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Subscription Fee-->
    </div>
</div>
<div class="mt-24 mb-12"></div>
<!--Dividers-->
<!--Payment Method-->
<div class="col-12" hidden>
    <h2>{{ __('Payment Method 💳') }}</h2>
    <h5 class="mb-3 text-primary hp-text-color-dark-30"><strong>Primary card:</strong></h5>
    <div class="row g-32">
        @foreach ($cards as $card)
            <!--Payment Card-->
            <div class="col-6 col-md-3 ">
                <div class="card {{ $card->is_primary ? 'border-primary-1' : '' }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="mb-0 ms-4">
                                    <i class="ri-visa-line text-primary" style="font-size: 1.3em;"></i>&nbsp;
                                    **** {{ substr($card->number, -4) }}
                                </h2>
                            </div>
                            <div class="col-6">
                                <p class="mb-0 hp-caption text-black-80 hp-text-color-dark-30">Name</p>
                                <h4 class="mb-0 d-inline-block text-truncate" style="width: 90%">
                                    {{ $card->name_on_card }}</h4>
                            </div>
                            <div class="col-6">
                                <p class="mb-0 hp-caption text-black-80 hp-text-color-dark-30">Expires</p>
                                <h4 class="mb-0">{{ $card->expires }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$card->is_primary)
                    <div class="row align-items-center justify-content-between">
                        <button type="button" class="col-6 btn btn-link btn-sm" data-bs-toggle="modal"
                            data-bs-target="#PrimaryCardModal{{ $card->id }}">{{ __('Make it Primary') }}
                        </button>
                        <button type="button" class="col-6 btn btn-link btn-sm text-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#DelteCardModal{{ $card->id }}">{{ __('Delete Card') }}
                        </button>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
<!--End of Payment Method-->
<div class="mt-24 mb-12"></div>
<!--Dividers-->
<!--Transactions Table-->
<div class="col-12">
    <h2>{{ __('Transactions 💸') }}</h2>
    <div class="card table-responsive text-nowrap">
        <table class="table table-hover table-borderless">
            <thead>
                <tr>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('Description') }}</th>
                    <th scope="col">{{ __('Amount') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Invoice') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">June 10, 2020</th>
                    <td>{{ __('Subscription update') }}</td>
                    <td>45 SR</td>
                    <td>
                        <span class="badge bg-danger-4 hp-bg-dark-danger text-dark border-danger"
                            hidden>{{ __('Charge Back') }}</span>
                        <span class="badge bg-warning-4 hp-bg-dark-warning text-dark border-warning"
                            hidden>{{ __('Refund') }}</span>
                        <span
                            class="badge bg-success-4 hp-bg-dark-success text-dark border-success">{{ __('Paid') }}</span>
                    </td>
                    <td><a href="/"><i class="iconly-Light-Download"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!--End of Transactions Table-->
<div class="mt-24 mb-12"></div>
<!--Dividers-->
<!--Payment Options-->
<div class="row g-32">
    <div class="col-12">
        <div
            class="p-16 p-sm-24 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100">
            <h3 class="mb-4 text-black-80 hp-text-color-dark-0">{{ __('Payment Options') }}</h3>
            <p class="mb-24 hp-p1-body text-black-60 hp-text-color-dark-30">{{ __('Payment Options text') }}</p>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <div class="row align-items-center">
                                <div class="col pe-16">
                                    <p class="d-flex align-items-center hp-p1-body mb-0">
                                        <i class="ri-bank-card-2-line text-primary me-18 h3 mb-0"></i>
                                        <span>{{ __('Credit Card') }}</span>
                                    </p>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="{{ route('media_owner.save_card', $media_owner_id) }}" method="POST">
                                @csrf
                                <div class="row g-12">
                                    <div class="col-12">
                                        <span class="fw-medium mb-8 d-block">{{ __('Card Number:') }} </span>
                                        <input type="text" class="form-control" id="payment-card-number"
                                            name="payment-card-number" maxlength="16">
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-medium mb-8 d-block">{{ __('Name on card:') }}</span>
                                        <input type="text" class="form-control" id="payment-card-owner-name"
                                            name="payment-card-owner-name">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <span class="fw-medium mb-8 d-block">{{ __('Expiration date:') }}</span>
                                        <input type="text" class="form-control" id="payment-date"
                                            name="payment-card-expire-date">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <span class="fw-medium mb-8 d-block">CVC:</span>
                                        <input type="text" class="form-control" id="payment-card-cvc"
                                            name="payment-card-cvc" maxlength="3">
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary mt-16">
                                            <i class="ri-check-fill remix-icon me-8"></i>
                                            <span>{{ __('Save Card') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="row align-items-center">
                                <div class="col pe-16">
                                    <p class="d-flex align-items-center hp-p1-body mb-0">
                                        <i class="ri-hand-coin-line text-primary me-18 h3 mb-0"></i>
                                        <span>{{ __('Bank transfer') }}</span>
                                    </p>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row g-16">
                                <div class="col-12">
                                    <span class="fw-medium mb-8 d-block">{{ __('Riyad Bank') }}</span>
                                    <span class="fw-medium mb-8 d-block">شركة البرق الازرق لتقنية المعلومات</span>
                                </div>
                                <div class="col-12">
                                    <span class="fw-medium mb-8 d-block">{{ __('Account Number:') }}</span>
                                    <div class="input-group" data-copy-click="value">
                                        <input type="text" class="form-control border-end-0"
                                            data-copy-id="abank-iban" value="3213398369940" disabled>
                                        <span class="input-group-text border-start-0 bg-white">
                                            <i data-copy-click-id="abank-iban"
                                                class="ri-file-copy-line h5 mb-0 lh-normal hp-transition hp-hover-text-color-primary-3 hp-cursor-pointer remix-icon text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <span class="fw-medium mb-8 d-block">IBAN:</span>
                                    <div class="input-group" data-copy-click="value">
                                        <input type="text" class="form-control border-end-0"
                                            data-copy-id="bbank-iban" value="SA9020000003213398369940" disabled>
                                        <span class="input-group-text border-start-0 bg-white">
                                            <i data-copy-click-id="bbank-iban"
                                                class="ri-file-copy-line h5 mb-0 lh-normal hp-transition hp-hover-text-color-primary-3 hp-cursor-pointer remix-icon text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="hp-badge-text fw-medium text-primary">
                                        {{ __('bank transfer message') }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <div class="row align-items-center">
                                <div class="col pe-16">
                                    <p class="d-flex align-items-center hp-p1-body mb-0">
                                        <i class="ri-wallet-3-line text-primary me-18 h3 mb-0"></i>
                                        <span>{{ __('Add Coupon') }} </span>
                                    </p>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row g-12 align-items-end">
                                <div class="col-12 col-md-9">
                                    <span class="fw-medium mb-8 d-block">{{ __('Coupon Code:') }}</span>
                                    <input type="text" class="form-control"
                                        placeholder="Please enter your coupon code">
                                </div>

                                <div class="col-12 col-md-3">
                                    <button class="btn btn-primary w-100">{{ __('Submit Coupon') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Payment Options-->
<div class="mt-24 mb-12"></div>
<!--Dividers-->
<!--Withdraw Request Card-->
<div class="col-12">
    <div class="card hp-card-1 hp-upgradePlanCardOne">
        <div class="card-body d-flex align-items-center">
            <div class="row flex-grow-1 align-items-center justify-content-between">
                <div class="col">
                    <h4 class="mb-8">{{ __('Send withdraw request') }}</h4>
                    <h6 class="hp-p1-body mb-0">{{ __('withdraw text') }}</h6>
                </div>

                <div class="col hp-flex-none w-auto">
                    <button type="button" class="btn btn-primary btn-icon-only rounded-circle mt-16 mt-sm-0"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="ri-arrow-right-s-line remix-icon"></i>
                    </button>
                </div>
            </div>

            <div class="hp-dot-1 bg-black-20 hp-bg-color-primary-4"></div>
            <div class="hp-dot-2 bg-black-20 hp-bg-color-primary-4"></div>
            <div class="hp-dot-3 bg-success-4 hp-bg-color-dark-success"></div>
        </div>
    </div>
</div>
<!--End of Withdraw Request Card-->


<!--New Plan Modal-->
<div class="modal fade" id="NewPlanModal" tabindex="-1" aria-labelledby="NewPlanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="NewPlanModalLabel">{{ __('New Plan') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('media_owner.choose_plan') }}" method="post">
                    @csrf
                    <div class="mt-24 mb-12">
                        <select class="form-select form-select-sm" name="plan" id="plan">
                            <option value="monthly" selected>{{ __('Monthly') }}</option>
                            <option value="yearly">{{ __('Yearly') }}</option>

                        </select>
                    </div>
                    <div class="plans">
                        <div id="monthly">
                            @include('partials.plans.basic.basic_monthly')
                            <div class="mt-24 mb-12"></div>
                            <!--Dividers-->
                            @include('partials.plans.standard.standard_monthly')
                            <div class="mt-24 mb-12"></div>
                            <!--Dividers-->
                            @include('partials.plans.premium.premium_monthly')
                        </div>
                        <div id="yearly">
                            @include('partials.plans.basic.basic_yearly')
                            <div class="mt-24 mb-12"></div>
                            <!--Dividers-->
                            @include('partials.plans.standard.standard_yearly')
                            <div class="mt-24 mb-12"></div>
                            <!--Dividers-->
                            @include('partials.plans.premium.premium_yearly')
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-text"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save Plan') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End of New Plan Modal-->


<!--Cancel Plan Modal-->
<div class="modal fade" id="CancelPlanModal" tabindex="-1" aria-labelledby="CancelPlanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="CancelPlanModalLabel">{{ __('Cancel Plan') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row g-16">
                    <div class="col-6 hp-flex-none w-auto">
                        <div
                            class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-danger-4 hp-bg-color-dark-danger rounded-circle">
                            <i class="ri-spam-2-fill text-danger hp-text-color-dark-danger-2"
                                style="font-size: 24px;"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="mb-4 mt-8">{{ __('Are you sure you want to cancel your plan?') }}</h3>
                    </div>
                </div>
                <div class="mt-24 mb-12"></div>
                <!--Dividers-->
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3" style="margin-top: 1em">
                        <label for="Cancel"
                            class="col-form-label"><strong>{{ __('Cancel Plan') }}</strong></label>
                        <select class="form-select form-select-lg mb-16" aria-label="Cancel" name="Cancel"
                            required>
                            <option value="0">{{ __('No, keep my plan') }}</option>
                            <option value="1">{{ __('Yes, cancel my plan') }}</option>
                        </select>
                    </div>
                    <div class="mb-3" style="margin-top: 1em">
                        <label for="WhyCancel"
                            class="col-form-label"><strong>{{ __('cancel tell us why') }}</strong></label>
                        <select class="form-select form-select-lg mb-16" aria-label="WhyCancel" name="WhyCancel"
                            required>
                            <option value="not using the services">{{ __('not using the service') }}</option>
                            <option value="expensive">{{ __('expensive') }}</option>
                            <option value="different provider">{{ __('differnt provider') }}
                            </option>
                            <option value="other">{{ __('other') }}</option>
                        </select>
                    </div>
                    <div class="mb-3" style="margin-top: 1em">
                        <label for="CancelOther" class="col-form-label"><strong>If other: </strong></label>
                        <input type="text" class="form-control" name="CancelOther" id="CancelOther"
                            autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-text" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Cancel Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End of Cancel Plan Modal-->
<!--Withdraw Request Modal-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ __('Your bank info') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="bank-name" class="col-form-label">{{ __('Bank Name:') }}</label>
                        <input type="text" class="form-control" id="bank-name">
                    </div>
                    <div class="form-group">
                        <label for="iban" class="col-form-label">IBAN:</label>
                        <input type="text" class="form-control" id="iban">
                    </div>
                    <div class="form-group">
                        <label for="holder-name" class="col-form-label">{{ __('Account holder Name:') }}</label>
                        <input type="text" class="form-control" id="holder-name">
                    </div>
                    <div class="form-group">
                        <label for="swift" class="col-form-label">Swift Code:</label>
                        <input type="text" class="form-control" id="swift">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-text" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" class="btn btn-primary">{{ __('send withdraw request') }}</button>
            </div>
        </div>
    </div>
</div>
<!--End of Withdraw Request Modal-->
<!--Primary Card Modal-->
@foreach ($cards as $card)
    <div class="modal fade" id="PrimaryCardModal{{ $card->id }}" tabindex="-1"
        aria-labelledby="PrimaryCardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content">
                <div class="modal-body py-48 px-24">
                    <div class="text-center">
                        <div class="mb-8">
                            <i class="ri-bank-card-fill lh-normal text-primary" style="font-size: 86px"></i>
                        </div>
                        <span class="h1 d-block mb-8">{{ __('Primary!') }}</span>
                    </div>
                    <form action="{{ route('media_owner.make_card_primary', $card->id) }}" method="POST">
                        @csrf
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="Delete_Card"
                                class="col-form-label"><strong>{{ __('primary card text') }}</strong></label>
                            <select class="form-select form-select-lg mb-16" aria-label="make_card_primary"
                                name="make_card_primary" required>
                                <option value="no">{{ __('No, keep my old card as primary card') }}</option>
                                <option value="yes">{{ __('Yes, Make it my primary card') }}</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Make it primary') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End of Primary Card Modal-->
@endforeach
<!--Delete Card Modal-->
@foreach ($cards as $card)
    <div class="modal fade" id="DelteCardModal{{ $card->id }}" tabindex="-1"
        aria-labelledby="DelteCardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content">
                <div class="modal-body py-48 px-24">
                    <div class="text-center">
                        <div class="mb-8">
                            <i class="ri-alert-fill lh-normal text-danger" style="font-size: 86px"></i>
                        </div>
                        <span class="h1 d-block mb-8">{{ __('Warning!') }}</span>
                    </div>
                    <form action="{{ route('media_owner.delete_card', $card->id) }}" method="POST">
                        @csrf
                        <div class="mb-3" style="margin-top: 1em">
                            <label for="Delete_Card"
                                class="col-form-label"><strong>{{ __('delete card text') }}</strong></label>
                            <select class="form-select form-select-lg mb-16" aria-label="delete_card"
                                name="delete_card" required>
                                <option value="no">{{ __('No, keep my card') }}</option>
                                <option value="yes">{{ __('Yes, Delete my card') }}</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Delete Now') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End of Delete Card Modal-->
@endforeach

</x-media_owner.layout>
