<x-admin.layout>
    <div class="mt-24 mb-12"></div><!--Dividers-->
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
                                <h3 class="mb-4 mt-8">44</h3>
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
                                <h3 class="mb-4 mt-8">44MB</h3>
                                <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">{{ __('Data Storage') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-24 mb-12"></div><!--Dividers-->



    <h2>Ads table</h2>
    <div class="card">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Ads</th>
                <th scope="col">Name & Email of Advertiser</th>
                <th scope="col">Status</th>
                <th scope="col">Upload date</th>
                <th scope="col">Ad info</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($ads as $ad)
                <tr>
                    <th scope="row">{{ $ad->name }}</th>
                    <td><p class="text-xs font-weight-bold mb-0">{{ $ad->advertiser->name }}</p>
                        <p class="text-xs mb-0">{{ $ad->advertiser->email }}</p></td>
                    <td>In Review</td>
                    <td>{{ $ad->created_at }}</td>
                    <td><a class="text-secondary font-weight-bold text-xs"
                           data-bs-toggle="modal" data-bs-target="#approval_card" style="cursor: pointer"
                           onclick="updateAdModal({{ $ad->id }})">See more</a></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>


    <x-admin.approval_card/>


    <script>
        function updateAdModal(ad_id) {
            $.get(`/api/updateAdModal/${ad_id}`, (data, status) => {
                console.log(data);
                data = data[0];
                $('#ad_headline').html(data.headline)
                $('#ad_url').html(data.url)
                $('#ad_created_at').html(data.created_at)
                $('#advertiser_email').html(data.advertiser.email)
                $('#advertiser_name').html(data.advertiser.name)
                $('#ad_from').html(data.screens[0].pivot.from)
                $('#ad_to').html(data.screens[0].pivot.to)
                $('#ad_status').html(data.screens[0].pivot.status)
                $('#ad_path').attr('src', `${data.path}`)
                $('#ad_path_video').attr('src', data.path)
                $('#approveAdForm').attr('action', `/ad/approveAd/${data.id}`)
                $('#rejectAdForm').attr('action', `/ad/rejectAd/${data.id}`)
                if (data.type == 'video') {
                    $('#ad_path_video').css('display', 'block')
                    $('#ad_path').css('display', 'none')
                } else {
                    $('#ad_path').css('display', 'block')
                    $('#ad_path_video').css('display', 'none')
                }
            })
        }
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-admin.layout>

