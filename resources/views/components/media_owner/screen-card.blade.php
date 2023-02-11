<style>
    .card-icons {
        position: absolute;
        right: 0.2em;
        top: 0.3em;
        float: right;
        font-size: 4rem;
    }

    .description {
        text-align: left;
        position: absolute;
        bottom: 0.5em;
    }
</style>


@if ($type == 'regular')
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal" href="#screeninfo{{$id}}"
         style="cursor: pointer"
         onclick="fetchScreenGroupSequenceMediaWithTheirDuration('#live-screen-sequence-img-{{$id}}', {{$sequence}}, {{$id}})"
         id="screen-{{$id}}"
    >
        <div class="card hp-card-2">
            <div class="card-body p-16">
                <div class="row">
                    <div class="col-12 text-left">
                        <i class="ri-computer-line  hp-text-color-primary-1" style="left: 0.2em; font-size: 5em;"></i>
                        <div class="description">
                            <h2 style="margin-bottom: 0em"><strong>Active</strong></h2>
                            <p class="hp-text-color-primary-1" style="margin: 0em">Screen Name :</p>
                            <h4 class="d-inline-block text-truncate" style="max-width: 150px;">{{$name}}</h4>
                        </div>
                        <i class="card-icons ri-checkbox-circle-fill hp-text-color-success-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif ($status == 'InReview')
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3" onclick="clickedScreen({{$id}})" data-bs-toggle="modal" href="#screeninfo{{$id}}"
         style="cursor: pointer" id="screen-{{$id}}">
        <div class="card hp-card-2">
            <div class="card-body p-16">
                <div class="row">
                    <div class="col-12 text-left">
                        <i class="ri-computer-line  hp-text-color-primary-1" style="left: 0.2em; font-size: 5em;"></i>
                        <div class="description ">
                            <h2 style="margin-bottom: 0em"><strong>In Review</strong></h2>
                            <p class="hp-text-color-primary-1" style="margin: 0em">Screen Name :</p>
                            <h4 class="d-inline-block text-truncate" style="max-width: 150px;">{{$name}}</span></h4>
                        </div>
                        <i class="card-icons ri-information-fill hp-text-color-warning-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif ($status == 'Error')
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal" href="#screeninfo{{$id}}"
         style="cursor: pointer" id="screen-{{$id}}">
        <div class="card hp-card-2">
            <div class="card-body p-16">
                <div class="row">
                    <div class="col-12 text-left">
                        <i class="ri-computer-line  hp-text-color-primary-1" style="left: 0.2em; font-size: 5em;"></i>
                        <div class="description">
                            <h2 style="margin-bottom: 0em"><strong>Error</strong></h2>
                            <p class="hp-text-color-primary-1" style="margin: 0em">Screen Name :</p>
                            <h4 class="d-inline-block text-truncate" style="max-width: 150px;">{{$name}}</h4>
                        </div>
                        <i class="card-icons ri-close-circle-fill hp-text-color-danger-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif ($type = 'ad')
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal" href="#screeninfo{{$id}}"
         style="cursor: pointer" id="screen-{{$id}}">
        <div class="card hp-card-2">
            <div class="card-body p-16">
                <div class="row">
                    <div class="col-12 text-left">
                        <i class="ri-advertisement-line  hp-text-color-primary-1"
                           style="left: 0.2em; font-size: 5em;"></i>
                        <div class="description">
                            <h2 style="margin-bottom: 0em"><strong>Ad Screen</strong></h2>
                            <p class="hp-text-color-primary-1" style="margin: 0em">Screen Name :</p>
                            <h4 class="d-inline-block text-truncate" style="max-width: 150px;">{{$name}}</h4>
                        </div>
                        <i class="card-icons ri-money-dollar-circle-fill hp-text-color-success-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3" data-bs-toggle="modal" href="#screeninfo{{$id}}"
         style="cursor: pointer" id="screen-{{$id}}">
        <div class="card hp-card-2">
            <div class="card-body p-16">
                <div class="row">
                    <div class="col-12 text-left">
                        <i class="ri-computer-line  hp-text-color-dark-1" style="left: 0.2em; font-size: 5em;"></i>
                        <div class="description">
                            <h2 style="margin-bottom: 0em"><strong>Off</strong></h2>
                            <p class="hp-text-color-primary-1" style="margin: 0em">Screen Name :</p>
                            <h4 class="d-inline-block text-truncate" style="max-width: 150px;">{{$name}}</h4>
                        </div>
                        <i class="card-icons ri-indeterminate-circle-fill hp-text-color-dark-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

