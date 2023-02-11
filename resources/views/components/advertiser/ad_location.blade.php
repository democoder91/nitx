<div class="row">
    <div class="col-12 col-sm-12 col-md-6" style="margin-bottom: 5%">
        <div class="card">
            <div class="card-header">
                <h5>Screens for your Ad:</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-warning" id="screens_selected">
                    You have selected <span id="screens_counter">0</span> out of <span id="number_screens">3</span>
                    screens
                </div>
                <div class="list-group">

                    <table class="mdl-data-table mdl-shadow--2dp">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="mdl-data-table__cell--non-numeric">Screen</th>
                                <th>Availability</th>
                            </tr>
                        </thead>
                        <tbody id="screens">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Map:</h5>
            </div>
            <div class="card-body">
                <div id="map" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 500px;"></div>
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkscBmYJvNjGEj9rOrvRR3DiQd-BUBLxM&callback=initMap&v=weekly" defer></script>
                <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
                <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                <div id="mapview"></div>

            </div>
        </div>
    </div>
</div>

    <script>
        let table = document.querySelector('table');
        let headerCheckbox = table.querySelector('thead .mdl-data-table__select input');
        let boxes = table.querySelectorAll('tbody .mdl-data-table__select');
        let headerCheckHandler = function(event) {
            if (event.target.checked) {
                for (let i = 0, length = boxes.length; i < length; i++) {
                    boxes[i].MaterialCheckbox.check();
                }
            } else {
                for (let i = 0, length = boxes.length; i < length; i++) {
                    boxes[i].MaterialCheckbox.uncheck();
                }
            }
        };
        if (headerCheckbox)
            headerCheckbox.addEventListener('change', headerCheckHandler);
    </script>

    <script>
        // Get element references
        var map = document.getElementById('map');


        const image = "{{ asset('img/svg/icon_screen.png') }}";

        function initMap() {
            // console.log(locations);
            if (locations.length > 0) {
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 12,
                    center: {
                        lat: parseFloat(locations[0][1]),
                        lng: parseFloat(locations[0][2])
                    },
                    styles,
                });

                for (let i = 0; i < locations.length; i++) {
                    // console.log(locations[i]);
                    const marker = new google.maps.Marker({
                        position: {
                            lat: parseFloat(locations[i][1]),
                            lng: parseFloat(locations[i][2])
                        },
                        map,
                        title: locations[i][0],
                        icon: image,
                    });
                };
            }
        }

        window.initMap = initMap;
    </script>
    <script>
        const styles = [{
                "featureType": "landscape.natural",
                "elementType": "geometry.fill",
                "stylers": [{
                        "visibility": "on"
                    },
                    {
                        "color": "#e0efef"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [{
                        "visibility": "on"
                    },
                    {
                        "hue": "#1900ff"
                    },
                    {
                        "color": "#c0e8e8"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{
                        "lightness": 100
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [{
                        "visibility": "on"
                    },
                    {
                        "lightness": 700
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "color": "#7dcdcd"
                }]
            },
        ];
    </script>