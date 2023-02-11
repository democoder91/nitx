<x-advertiser.layout>
    <!--Earnings-->
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-12 col-sm-2">
						<h5>Earnings</h5>
						<p class="hp-p1-body text-black-60 hp-text-color-dark-50 mb-0">This month</p>
						<h4 class="mb-0"> {{$wallet ? $wallet->current_balance : "000"}}SR</h4>
					</div>

					<div class="col-12 col-sm-10 overflow-hidden">
						<div id="earnings-chart" class="w-100"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Dividers-->
	<div class="mt-24 mb-12"></div>

	<div class="row g-32">
        <div class="col-6">
            <div class="p-16 p-sm-24 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100">
                <h3 class="mb-4 text-black-80 hp-text-color-dark-0">My Transactions</h3>
				<p class="mb-24 hp-p1-body text-black-60 hp-text-color-dark-30">Be sure to click on correct payment option</p>
                <div class="card">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Transaction Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(count($transactions) > 0)
                          @foreach($transactions as $transaction)
                          <tr>
                            <td scope="row">{{$transaction->id}}</td>
                            <td scope="row">{{$transaction->transaction_type}}</td>
                            <td scope="row {{$transaction->transaction_type == "deposit" ? "text-success" : ($transaction->transaction_type == "withdraw" ? "text-danger" : "text-info")}}">{{$transaction->amount}}</td>
                            <td scope="row">{{$transaction->created_at}}</td>
                         @endforeach
                        @endif
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>

        </div>
		<div class="col-6">
			<div class="p-16 p-sm-24 rounded border border-black-40 hp-border-color-dark-80 bg-black-0 hp-bg-color-dark-100">
				<h3 class="mb-4 text-black-80 hp-text-color-dark-0">Payment Options</h3>
				<p class="mb-24 hp-p1-body text-black-60 hp-text-color-dark-30">Be sure to click on correct payment option</p>

				<div class="accordion" id="accordionExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								<div class="row align-items-center">
									<div class="col pe-16">
										<p class="d-flex align-items-center hp-p1-body mb-0">
											<i class="ri-bank-card-2-line text-primary me-18 h3 mb-0"></i>
											<span>Credit Card</span>
											<span class="badge bg-success-4 hp-bg-dark-success border-success text-success ms-16">Tag</span>
										</p>
									</div>
								</div>
							</button>
						</h2>

						<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<div class="row g-12">
									<div class="col-12">
										<span class="fw-medium mb-8 d-block">Card Number:</span>
										<input type="text" class="form-control" id="payment-cardnumber">
									</div>

									<div class="col-12">
										<span class="fw-medium mb-8 d-block">Name on card:</span>
										<input type="text" class="form-control">
									</div>

									<div class="col-12 col-md-6">
										<span class="fw-medium mb-8 d-block">Expiration date (MM/YY):</span>
										<input type="text" class="form-control" id="payment-date">
									</div>

									<div class="col-12 col-md-6">
										<span class="fw-medium mb-8 d-block">CVC:</span>
										<input type="text" class="form-control" id="payment-cvc">
									</div>

									<div class="col-12 text-end">
										<button class="btn btn-primary mt-16">
											<i class="ri-check-fill remix-icon me-8"></i>
											<span>Confirmed</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="accordion-item">
						<h2 class="accordion-header" id="headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<div class="row align-items-center">
									<div class="col pe-16">
										<p class="d-flex align-items-center hp-p1-body mb-0">
											<i class="ri-hand-coin-line text-primary me-18 h3 mb-0"></i>
											<span>Bank transfer</span>
										</p>
									</div>
								</div>
							</button>
						</h2>

						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<div class="row g-16">
									<div class="col-12">
										<span class="fw-medium mb-8 d-block">Riyad Bank</span>
										<span class="fw-medium mb-8 d-block">شركة البرق الازرق لتقنية المعلومات</span>
									</div>
									<div class="col-12">
										<span class="fw-medium mb-8 d-block">Account Number:</span>
										<div class="input-group" data-copy-click="value">
											<input type="text" class="form-control border-end-0" data-copy-id="abank-iban" value="3213398369940" disabled>
											<span class="input-group-text border-start-0 bg-white">
												<i data-copy-click-id="abank-iban" class="ri-file-copy-line h5 mb-0 lh-normal hp-transition hp-hover-text-color-primary-3 hp-cursor-pointer remix-icon text-primary"></i>
											</span>
										</div>
									</div>

									<div class="col-12">
										<span class="fw-medium mb-8 d-block">IBAN:</span>
										<div class="input-group" data-copy-click="value">
											<input type="text" class="form-control border-end-0" data-copy-id="bbank-iban" value="SA9020000003213398369940" disabled>
											<span class="input-group-text border-start-0 bg-white">
												<i data-copy-click-id="bbank-iban" class="ri-file-copy-line h5 mb-0 lh-normal hp-transition hp-hover-text-color-primary-3 hp-cursor-pointer remix-icon text-primary"></i>
											</span>
										</div>
									</div>

									<div class="col-12">
										<p class="hp-badge-text fw-medium text-primary">Please send us a copy of the transfer at info@nitx.io </p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="accordion-item">
						<h2 class="accordion-header" id="headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<div class="row align-items-center">
									<div class="col pe-16">
										<p class="d-flex align-items-center hp-p1-body mb-0">
											<i class="ri-wallet-3-line text-primary me-18 h3 mb-0"></i>
											<span>Add Coupon </span>
											<span class="badge bg-success-4 hp-bg-dark-success border-success text-success ms-16">Available</span>
										</p>
									</div>
								</div>
							</button>
						</h2>

						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<div class="row g-12 align-items-end">
									<div class="col-12 col-md-9">
										<span class="fw-medium mb-8 d-block">Coupon Code:</span>
										<input type="text" class="form-control" placeholder="Please enter your coupon code">
									</div>

									<div class="col-12 col-md-3">
										<button class="btn btn-primary w-100">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Dividers-->
	<div class="mt-24 mb-12"></div>
     
	

</x-advertiser.layout>