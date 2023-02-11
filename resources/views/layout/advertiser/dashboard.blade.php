<x-advertiser.layout>
    <div class="col-12">
        <div class="row justify-content-end">
            <div class="col-12">
                <div class="card border-none hp-card-2 px-12 py-16 hp-upgradePlanCardOne">
                    <div class="position-absolute top-0 start-0 w-100 h-100 hp-dark-none" style="background-image: url(../../../assets/img/dasboard/analytics-download-bg.png); background-size: cover; background-position: right center; z-index: -1;"></div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 hp-dark-block mx-auto" style="background-image: url(../../../assets/img/dasboard/analytics-download-bg-dark.png); background-size: cover; background-position: right center; z-index: -1;"></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h1 class="mb-0 text-primary">Create creative ads that target your audience</h1>

                                <a href="{{ route('ad.create') }}" type="submit" class="btn mt-32 border-primary bg-black-0 hp-bg-color-dark-primary-1 text-primary hp-text-color-dark-0">
                                    <i class="ri-advertisement-fill" style="margin-right: 0.2em"></i>
                                    <span>Create Ad</span>
                                </a>
                            </div>

                            <div class="col hp-flex-none w-auto position-absolute top-0 end-0 h-100 pe-0">
                                <img src="../../../assets/img/dasboard/analytics-download-vector.svg" class="h-100 hp-dir-scale-x-n1" alt="Check the Best Prices of New Models &amp; Boost Your Business">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-danger">{{$error ?? ""}}</h3>

    <h2>My Ads</h2>
    <div class="card">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Ads</th>
                <th scope="col">Status</th>
                <th scope="col">Upload date</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($ads as $ad)
              <tr>
                <td scope="row">{{ $ad->name }}</td>
                <td scope="row">
                    @php ($class = $ad->screens[0]->pivot->status == 'Active' ? 'success' : ($ad->screens[0]->pivot->status == 'InReview' ? 'warning ' : 'danger'))
                    <span class="badge text-{{ $class }} bg-light hp-bg-dark-{{ $class }} border-{{ $class }}">{{ $ad->screens[0]->pivot->status }}</span>
                </td>
                <td scope="row">{{ $ad->created_at }}</td>
            @endforeach
              </tr>
            </tbody>
          </table>
    </div>

   
    
</x-advertiser.layout>

