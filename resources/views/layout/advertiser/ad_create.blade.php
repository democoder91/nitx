<x-page-layout>
<style>
    input[type="radio"]:checked + label  .icon {
        animation: grow 0.5s;
        color: #0f2ee0;
    }
    @keyframes grow {
        50% {
            font-size: 80px;
        }
    }
</style>


    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.min.js"></script>
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.indigo-pink.min.css">

    <div class="col-12 mb-5 justify-content-center text-center">
        <a class="navbar-brand" href="/">
            <img alt="Nitx logo" src="{{asset('img/brand/logo_color.svg')}}" style="height: 60px;">
        </a>
        <h2 class="mt-4">Create Ads</h2>
        <h5>What type of audience is your product trying to target?</h5>
    </div>

    <form action="{{ route('ad.store') }}" method="post" id="myForm" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="container">
                <div class="alert alert-danger">
                    {!! implode('', $errors->all('<p class="text-white">:message</p>')) !!}
                </div>
            </div>
        @endif
        <input type="hidden" id="token" value="{{ csrf_token() }}">
        <div id="categories">
            <div class="container mt-5">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-12 col-md-3"  style="margin-top:1em">
                            <div class="hp-select-box-item">
                                <input  type="radio" hidden="" name="category[]" value="{{ $category->id }}" id="category{{ $category->id }}">
                                <label class="d-block hp-cursor-pointer" for="category{{ $category->id }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-12" style="margin-top: 0.5em">
                                                    <i class="icon {{ $category->icon }}" style="font-size: 4em"></i>
                                                </div>
                                                <div class="col-12" style="margin-top: 0.5em">
                                                    <span class="h6 d-block"><strong>{{ $category->category }}</strong></span>
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

        <div id="preview" style="display: none">
            <x-advertiser.ad_preview/>
        </div>


        <div id="location" style="display: none">
            <x-advertiser.ad_location/>
        </div>

    </form>

<x-advertiser.ad_navCtrl/>




{{-- It is temp, it wil not be used when transfer to Vue or React --}}

<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        let status = ['categories', 'preview', 'location']
        let i = 0
        // screens, catorire, location, price, from to - to data, url


        var locations = [];

        function next() {
            if (i == 1) {

                let cates = []
                let html = ''

                document.querySelectorAll('input[name="category[]"]').forEach(c => {
                    if (c.checked)
                        cates.push(c.value)
                })

                function dist({
                                  latitude: lat1,
                                  longitude: lon1
                              }, {
                                  latitude: lat2,
                                  longitude: lon2
                              }) {
                    lon1 = lon1 * Math.PI / 180;
                    lon2 = lon2 * Math.PI / 180;
                    lat1 = lat1 * Math.PI / 180;
                    lat2 = lat2 * Math.PI / 180;

                    // Haversine formula
                    let dlon = lon2 - lon1;
                    let dlat = lat2 - lat1;
                    let a = Math.pow(Math.sin(dlat / 2), 2) +
                        Math.cos(lat1) * Math.cos(lat2) *
                        Math.pow(Math.sin(dlon / 2), 2);

                    let c = 2 * Math.asin(Math.sqrt(a));

                    // Radius of earth in kilometers. Use 3956
                    // for miles
                    let r = 6371;

                    // calculate the result
                    return (c * r);
                }

                $.post('{{ route('getScreensData') }}', {
                        _token: document.getElementById('token').value,
                        from: document.getElementById('from').value,
                        to: document.getElementById('to').value,
                        categories: cates,
                        orientation: document.querySelector('input[name=orientation]:checked').value,
                    },
                    async function (data, s) {
                        await navigator.geolocation.getCurrentPosition(async ({coords}) => {
                            console.log(coords);
                            coords.latitude = parseFloat(coords.latitude)
                            coords.longitude = parseFloat(coords.longitude)

                            let sorted_screens = await data.screens.sort((p1, p2) => dist(coords, {
                                    latitude: parseFloat(p1.latitude),
                                    longitude: parseFloat(p1.longitude)
                                }) -
                                dist(coords, {
                                    latitude: parseFloat(p2.latitude),
                                    longitude: parseFloat(p2.longitude)
                                }))
                            sorted_screens.map((screen) => {
                                console.log({
                                    screen
                                });
                                locations.push([screen.name, screen.latitude, screen.longitude])
                                html +=
                                    `
                            <tr>
                                 <td>
                                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-data-table__select" for="screen${screen.id}">
                                        <input type="checkbox" id="screen${screen.id}" name="screen[]" value="${screen.id}" ${!screen.available ? "disabled" : ""} onclick="updateCounter(this)" />
                                    </label>
                                </td>
                                <td class="mdl-data-table__cell--non-numeric" for="screen${screen.id}">${screen.name}</td>
                                <td for="screen${screen.id}">${screen.available ? "available" : "not available"}</td>
                                </tr>
                                `
                            })
                            initMap()
                            document.getElementById('screens').innerHTML = html
                        })
                    })
                $('#screens_counter').html(0)
                $('#next').hide()
                $('#submit').show()

                //

                //

            }
            if (i < 2) {
                $(`#${status[i]}-process`).addClass('is-complete').removeClass('is-active')
                $(`#${status[i + 1]}-process`).addClass('is-active')
                $(`#${status[i]}`).hide()
                $(`#${status[i + 1]}`).show()
                i++
            }
        }

        function back() {
            if (i > 0) {
                $(`#${status[i - 1]}-process`).addClass('is-active').removeClass('is-complete')
                $(`#${status[i]}-process`).removeClass('is-active')

                $(`#${status[i]}`).css("display", "none")
                $(`#${status[i - 1]}`).css("display", "block")
                i--

                $('#next').show()
                $('#submit').hide()
            }
        }

        function submit() {
            document.getElementById('myForm').submit()
            console.log(diffDays1)
        }

        function updateCounter(input) {
            let counter = $('#screens_counter').html()
            let num_screens = $('#number_screens').html()
            console.log(num_screens)
            input.checked ? counter++ : counter--
            $("#screens_counter").html(counter)
            if (parseInt(counter) === parseInt(num_screens)) {
                document.querySelector("#screens_selected").classList.remove('alert-warning');
                document.querySelector("#screens_selected").classList.add('alert-success');
            } else {
                document.querySelector("#screens_selected").classList.add('alert-warning');
                document.querySelector("#screens_selected").classList.remove('alert-success');
            }
        }

        let browseFile = $('#browseFile');


        let resumable = new Resumable({
            target: '{{ route('ad.uploadVideo') }}',
            query: {
                _token: '{{ csrf_token() }}'
            },
            fileType: ['mp4', 'png', 'jpg'],
            chunkSize: 10 * 1024 * 1024,
            headers: {
                'Accept': 'application/json'
            },
            testChunks: false,
            maxChunkRetries: 1000,
            chunkRetryInterval: 2000,
            throttleProgressCallbacks: 1,
        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function (file) {
            showProgress();
            resumable.upload()
        });

        resumable.on('fileProgress', function (file) {
            updateProgress(Math.floor(file.progress() * 100));
        });
        resumable.on('fileSuccess', function (file, response) {
            response = JSON.parse(response)
            $('#ad_file').val(response.path)
            console.log($('#ad_file'))
            const fileName = file.fileName
            const fileNameParts = fileName.split('.')
            const extension = fileNameParts[fileNameParts.length - 1]
            hideProgress();
            if (extension === 'png' || extension === 'jpg' || extension === 'svg') {
                $('.wrapper').show();
                $('.card-footer').hide();
                $('#ad_type').val('image')
                const wrapper = document.querySelector('.wrapper');
                const img = document.querySelector('#img-upload');
                const cancelBtn = document.querySelector('#cancel-btn i');
                img.src = response.path

                function getMeta(url, callback) {

                    let img = new Image();
                    img.src = url;
                    img.onload = function () {
                        callback(this.width, this.height);
                    }
                }

                getMeta(img.src, function (width, height) {
                        const orientation = document.querySelector('input[name=orientation]:checked').value
                        checkDimensionsRatio(height, width, orientation)
                    }
                );

                cancelBtn.addEventListener("click", function () {
                    img.src = "";
                    img.style.display = 'none';
                    wrapper.classList.remove("active");
                })
            } else if (extension === 'mp4' || extension === 'mkv' || extension === 'wmv') {
                $('#videoPreview').attr('src', response.path);
                let videoPreview = document.getElementById('videoPreview');
                let duration = videoPreview.duration
                if (duration > 10) {
                    window.alert('you cannot upload video longer than 10 seconds')
                }
                document.getElementById('ad_type').value = "video"
                $('.card-footer').show();
                $('.wrapper').hide();
            } else {
                console.log(`not allowed file!`)
            }


        });

        resumable.on('fileError', function (file, response) {
            window.alert(response)
        });

        const checkDimensionsRatio = (height, width, orientation) => {
            const wrapper = document.querySelector(".wrapper");
            const img = document.querySelector("#img-upload");
            switch (orientation) {
                case 'horizontal':
                    if ((height / width) <= 0.5625 + (0.5625 * 5 / 100) && (height / width) >= 0.5625 - (0.5625 * 5 / 100)) {
                        img.style.display = 'initial';
                        wrapper.classList.add("active");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success...',
                            text: 'You have uploaded an image with right dimensions 🔥',
                        })
                        return
                    }
                    img.style.display = 'none';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'You have uploaded an image with wrong dimensions. The correct dimensions for horizontal are h: 1080, w: 1920',
                    })
                    img.src = "";
                    wrapper.classList.remove("active");
                    break;
                case 'vertical': {
                    if ((height / width) <= (1.777777778 + (1.777777778 * 5 / 100)) && (height / width) >= (1.777777778 - (1.777777778 * 5 / 100))) {
                        img.classList.add('nitx-initial')
                        wrapper.classList.add("active");
                        Swal.fire({
                            icon: 'success',
                            title: 'Success...',
                            text: 'You have uploaded an image with right dimensions 🔥',
                        })
                        return
                    }
                    img.style.display = 'none';
                    img.classList.add('nitx-initial')
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'You have uploaded an image with wrong dimensions. The correct dimensions for vertical are h: 1920, w: 1080',
                    })
                    img.src = "";
                    img.style.display = 'none';
                    wrapper.classList.remove("active");
                    break
                }
            }
        }


        let progress = $('.progress');

        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            progress.find('.progress-bar').html('0%');
            progress.find('.progress-bar').removeClass('bg-success');
            progress.show();
        }

        function updateProgress(value) {
            progress.find('.progress-bar').css('width', `${value}%`)
            progress.find('.progress-bar').html(`${value} % `)
        }

        function hideProgress() {
            progress.hide();
        }
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</x-page-layout>
