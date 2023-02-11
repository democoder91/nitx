<x-page-layout>
    <div class="col-10" style="margin: 0 auto">
        <div class="mt-24 mb-12" style="margin-top: 3em;"></div><!--Dividers-->
        <!--Title-->
        <div class="col-12  mb-5 justify-content-center text-center">
            <a class="navbar-brand" href="/">
                <img alt="nitx logo" src="{{ asset('img/brand/logo_color.svg') }}" style="height: 60px;">
            </a>
            <h2 class="mt-4"><strong>Your Screen Info</strong></h2>
            <hr/>
        </div><!--End of Title-->
        <form action="{{ route('updateScreen', $screenId) }}" method="post">
            @csrf
            <div class="form-group">
                <div class="card" style="padding: 2em">
                    <h1><strong>Is this your screen name ?</strong></h1>
                    <h4>Note: the name of the screen will appear for the advertisers if your screen type is an ad
                        screen</h4>
                    <input type="text" class="form-control" name="name" value="{{$screen->name}}" required>
                </div>
            </div>
            <div class="mt-24 mb-12" style="margin-top: 3em;"></div><!--Dividers-->
            <div class="form-group">
                <div class="card" style="padding: 2em">
                    <h1><strong>Is this the correct orientation of your screen ?</strong></h1>
                    <h4>If not, please select the correct orientation of your screen</h4>
                    <ul class="row mb-5 justify-content-center text-center" required>
                        <li class="col-6" style="margin-top: 1em">
                            <div class="hp-select-box-item">
                                <input type="radio" hidden="" name="orientation" value="horizontal"
                                       id="radio-horizontal" {{($screen->orientation == "horizontal" ? ' checked' : '')}}>
                                <label class="d-block hp-cursor-pointer" for="radio-horizontal">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-12" style="margin-top: 0.5em">
                                                    <i class="ri-picture-in-picture-line" style="font-size: 5em"></i>
                                                </div>
                                                <div class="col-12" style="margin-top: 0.5em">
                                                    <span class="h5 d-block d-inline-block text-truncate"><strong>Horizontal</strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </li>
                        <li class="col-6" style="margin-top: 1em">
                            <div class="hp-select-box-item">
                                <input type="radio" hidden="" name="orientation" value="vertical" id="radio-vertical"
                                        {{($screen->orientation == "vertical" ? ' checked' : '')}}>
                                <label class="d-block hp-cursor-pointer" for="radio-vertical">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-12"
                                                     style="margin-top: 0.5em; transform: rotate(90deg);">
                                                    <i class="ri-picture-in-picture-line" style="font-size: 5em;"></i>
                                                </div>
                                                <div class="col-12" style="margin-top: 0.5em">
                                                    <span class="h5 d-block d-inline-block text-truncate"><strong>Vertical</strong></span>
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
            <div class="mt-24 mb-12" style="margin-top: 3em;"></div><!--Dividers-->
            <div class="form-group">
                <div class="card" style="padding: 2em">
                    <h1><strong>Is this your screen type ?</strong></h1>
                    <h4>If not, please select the correct type</h4>
                    <ul class="row mb-5 justify-content-center text-center" required>
                        <li class="col-6" style="margin-top: 1em">
                            <div class="hp-select-box-item">
                                <input type="radio" hidden="" name="type" value="regular" id="radio-screen"
                                        {{($screen->type == "regular" ? ' checked' : '')}}
                                >
                                <label class="d-block hp-cursor-pointer" for="radio-screen">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-12" style="margin-top: 0.5em">
                                                    <i class="ri-tv-2-line" style="font-size: 5em"></i>
                                                </div>
                                                <div class="col-12" style="margin-top: 0.5em">
                                                    <span
                                                            class="h5 d-block d-inline-block text-truncate"><strong>Screen</strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </li>
                        <li class="col-6" style="margin-top: 1em">
                            <div class="hp-select-box-item">
                                <input type="radio" hidden="" name="type" value="ad" id="radio-ad"
                                        {{($screen->type == "ad" ? ' checked' : '')}}
                                >
                                <label class="d-block hp-cursor-pointer" for="radio-ad">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-12" style="margin-top: 0.5em;">
                                                    <i class="ri-advertisement-line" style="font-size: 5em;"></i>
                                                </div>
                                                <div class="col-12" style="margin-top: 0.5em">
                                                    <span class="h5 d-block d-inline-block text-truncate"><strong>Ad Screen</strong></span>
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
            <div class="mt-24 mb-12" style="margin-top: 3em;"></div><!--Dividers-->
            <div class="form-group">
                <div class="card" style="padding: 2em">
                    <h1><strong>Assign a group to screen </strong></h1>
                    <h4>Note: if you are not sure if you can do it later</h4>
                    <select class="form-select" aria-label="Default" name="active_screen_group_id">
                        <option value="">No Screen Group</option>
                        @foreach($screen_groups as $screen_group)
                            @if($screen_group->id == $screen->active_screen_group_id)
                                <option value="{{$screen_group->id}}" checked>{{$screen_group->name}}</option>
                            @else
                                <option value="{{$screen_group->id}}">{{$screen_group->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-24 mb-12" style="margin-top: 3em;"></div><!--Dividers-->
            <div class="form-group">
                <div class="card" style="padding: 2em">
                    <h1><strong>Are there the right categories for your ?</strong></h1>
                    <h4>Note: please, uncheck the categories and you won't receive ads in these categories</h4>
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-6 col-md-3" style="margin-top:1.5em">
                                <div class="hp-select-box-item">
                                    <input type="checkbox" hidden="" name="category[]"
                                           value="{{ $category->id }}"
                                           id="category{{ $category->id }}"
                                            {!!collect($checkedCategories)->search($category->id) ? "checked" : ""!!}
                                    >
                                    <label class="d-block hp-cursor-pointer" for="category{{ $category->id }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row text-center">
                                                    <div class="col-12" style="margin-top: 0.5em">
                                                        <i class="icon {{ $category->icon }}"
                                                           style="font-size: 4em"></i>
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
                </div>
            </div>
            <div class="mt-24 mb-12" style="margin-top: 3em;"></div><!--Dividers-->
            <div class="form-group">
                <div class="card" style="padding: 2em">
                    <h1><strong>Is this the correct location of your Screen ?</strong></h1>
                    <h4>If not, adjust the pin to your correct location</h4>
                    <input type="hidden" name="latitude" value="{{$screen->latitude}}" id="latitude">
                    <input type="hidden" name="longitude" value="{{$screen->longitude}}" id="longitude">
                    <div class="row" hidden>
                        <div class="col">
                            <h2 class="card-title text-uppercase text-muted mb-0">The chosen location is:</h2>
                            <span class="h2 font-weight-bold mb-0" id="onIdlePositionView">No connections</span>
                        </div>
                        <button id="confirmPosition" type="submit" class="btn btn-style-1 btn-danger"
                                name="Update_Owner_Location" hidden>Update Location
                        </button>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div id="map" class="map-canvas"
                                 data-lat="40.748817"
                                 data-lng="-73.985428"
                                 style="height: 600px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <button class="btn btn-primary" type="submit"
                    onclick="setTimeDurationAfterSubmittingFormToDisableButton(2000, 'create-screen')"
                    id="create-screen">Submit
            </button>
        </form>
    </div>
</x-page-layout>
</div>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkscBmYJvNjGEj9rOrvRR3DiQd-BUBLxM"></script>
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>

<script type="text/javascript" src="{{asset('js/setTimeDurationAfterSubmittingFormToDisableButton.js')}}"></script>

<script>
    // Get element references
    var confirmBtn = document.getElementById('confirmPosition');
    var onClickPositionView = document.getElementById('onClickPositionView');
    var onIdlePositionView = document.getElementById('onIdlePositionView');
    var lat = document.getElementById('latitude');
    var long = document.getElementById('longitude');
    var map = document.getElementById('map');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
        console.log(navigator.geolocation.getCurrentPosition(showPosition, showError));
    } else {

    }

    function showError(error) {
        let submitBtn = document.getElementById('submit_screen')
        alert('Please turn on GPS then refresh')
        submitBtn.setAttribute('disabled', true)
        submitBtn.innerHTML = 'Please turn on GPS'
        submitBtn.style.backgroundColor = 'red'
    }

    // Initialize LocationPicker plugin
    function showPosition(position) {
        document.getElementById("latitude").value = position.coords.latitude
        document.getElementById("longitude").value = position.coords.longitude
        var lp = new locationPicker(map, {
            setCurrentPosition: true, // You can omit this, defaults to true
            lat: position.coords.latitude,
            lng: position.coords.longitude
        }, {
            zoom: 15 // You can set any google map options here, zoom defaults to 15
        });
        // Listen to button onclick event
        confirmBtn.onclick = function () {
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            onClickPositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
        };
        // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
        google.maps.event.addListener(lp.map, 'idle', function (event) {
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            onIdlePositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
        });
        // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
        google.maps.event.addListener(lp.map, 'idle', function (event) {
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            onIdlePositionView.innerHTML = location.lat + ',' + location.lng;
        });
        // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
        google.maps.event.addListener(lp.map, 'idle', function (event) {
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            lat.innerHTML = location.lat;
            document.getElementById("latitude").value = location.lat;
        });
        // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
        google.maps.event.addListener(lp.map, 'idle', function (event) {
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            long.innerHTML = location.lng;
            document.getElementById("longitude").value = location.lng;
        });
    }
</script>