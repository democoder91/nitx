<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nitx</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet"/>
    <style>
        html,
        body {
            margin: 0;
            height: 100%;
            overflow: hidden;
        }

        iframe,
        img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            padding: 0;
            margin: 0;
        }

        .rotate-left-90 {
            transform: rotate(-90deg);
        }

        .rotate-left-180 {
            transform: rotate(-180deg);
        }

        .rotate-left-270 {
            transform: rotate(-270deg);
        }

        .rotate-left-360 {
            transform: rotate(-360deg);
        }

        .rotate-right-90 {
            transform: rotate(90deg);
        }

        .rotate-right-90 {
            transform: rotate(90deg);
        }

        .rotate-right-180 {
            transform: rotate(180deg);
        }

        .rotate-right-270 {
            transform: rotate(270deg);
        }

        .rotate-right-360 {
            transform: rotate(360deg);
        }


        .image-default {
            height: 100vh;
            width: 100%;
            object-fit: contain;
            margin: 0;
        }

        .image-fit {
            position: absolute; 
            right: 0; top: 0; 
            min-width:100%; 
            z-index: -100; 
            object-fit: fill;

        }

        .fade {
            -webkit-animation-name: fade-image;
            -webkit-animation-duration: 1s;
            animation-name: fade-image;
            animation-duration: 1s;
        }

        @-webkit-keyframes fade-image {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        /*fix*/
        @keyframes fade-image {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }
    </style>
</head>

<body>
<div class="container {{$screen->rotation_class}}" id="screen-view">
    <div class="d-flex flex-column">
        @if($type == 'ad' && $sequence_id == null)
            <div>
                @if ($orientation == "horizontal")
                    <img class="image-default" src="{{ asset('img/ad/AdScreen-horizontal.png') }}">
                @else
                    <img class="image-default" src="{{ asset('img/ad/AdScreen-vertical.png') }}">
                @endif
            </div>
        @elseif($type == 'regular' && $sequence_id == 0)
            <div>
                @if ($orientation == "horizontal")
                    <img class="image-default" src="{{ asset('img/ad/NoScreenMedia.png') }}">
                @else
                    <img class="image-default" src="{{ asset('img/ad/NoScreenMedia.png') }}">
                @endif
            </div>
        @endif
    </div>
    <div id="ads">
        @foreach ($ads as $ad)
            <div class="images fade">
                @if ($ad->type == "image")
                    <img class="image-default" src="{{ $ad->path }}">
                @else
                    <video autoplay muted playsinline loop width="100%"
                           plays-inline=""
                           style="position: absolute; right: 0; top: 0; min-width:100%; z-index: -100; object-fit: cover;">
                        <source src="{{$media->media_aws_s3_url ?? 'storage/' . $ad->path}}" type="video/mp4">
                    </video>
                @endif
            </div>
        @endforeach

        @foreach ($medias as $media)
            <div class="images fade">
                @if ($media->type == "image")
                    @if($media->id == 1)
                        <img class="image-fit" src="{{ $media->path ?? $media->media_aws_s3_url}}">
                    @else
                        <img class="image-fit"
                             src="{{ $media->compressed_media_path ?? $media->media_aws_s3_url ?? 'storage/' . $media->path }}">
                    @endif
                @else
                    <video id="vjs" class="video-js" width="1920" height="1080" preload="auto"
                            controls muted autoplay playsinline loop poster="{{$media->thumbnail_media_path}}">
                        <source src="{{ $media->video_path ?? $media->media_aws_s3_url ?? 'storage/' . $media->path}}" type="video/mp4">
                    </video>
                @endif
            </div>
        @endforeach
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    var media = @json($medias);
    const sanitizeTime = (media) => {
        media.forEach(elm => {
            elm.duration = elm.minutes * 60000 + elm.seconds * 1000;
        })
    }
    if (media.length > 0) {
        sanitizeTime(media)
    }
    window.Echo.channel(`screen.{{ $screenId }}`)
        .listen('ScreenAds', (e) => {
            cosnole.log(e)
            let html = ""
            console.log("Ads updated!!");
            e.ads.forEach(ad => {
                if (ad.type === 'image') {
                    html += `<div class="images fade"><img class="img-to-fit" src="${ad.media_aws_s3_url ? ad.media_aws_s3_url : `storage/${ad.path}`}"></div>`
                } else {
                    html += `<div class="images fade"><video autoplay muted playsinline loop width="100%"><source src="${ad.media_aws_s3_url ? ad.media_aws_s3_url : `storage/${ad.path}`}" type="video/mp4"></video></div>`
                }
            });
            document.getElementById('ads').innerHTML = html
        });
    window.Echo.channel(`forceRefresh`)
        .listen('forceRefresh', (e) => {
            console.log(e);
            document.location.reload()
        })

    window.Echo.channel(`screen-media-{{$screenId}}`)
        .listen('BroadcastScreenMedia', (e) => {
            let html = ""
            e.media.forEach(media => {
                console.log(media);
                // if (media.type === 'image') {
                //     html += `<div class="fade"><img style="width:100%; height:100%; object-fit:cover;" src="${media.media_aws_s3_url ? media.media_aws_s3_url : `storage/${media.path}`}"></div>`
                // } else {
                //     html += `<div class="images fade"><video autoplay muted playsinline loop width="100%"><source src="${media.media_aws_s3_url ? media.media_aws_s3_url : `storage/${media.path}`}}" type="video/mp4"></video></div>`
                // }
                document.getElementById('ads').innerHTML = html
                document.location.reload()
            });
        })

    var rotateToL = 0;
    var rotateToR = 0;

    window.Echo.channel(`screen-rotation-{{$screenId}}`)
        .listen('BroadcastScreenRotation', (e) => {
            let screenView = document.querySelector('#screen-view')
            if (e.rotation == 'rotate-right-90') {
                console.log(rotateToR)
                if (rotateToR === 0) {
                    screenView.classList.add('rotate-right-90')
                    screenView.classList.remove('rotate-right-180')
                    screenView.classList.remove('rotate-right-270')
                    screenView.classList.remove('rotate-right-360')
                    screenView.classList.remove('rotate-left-90')
                    screenView.classList.remove('rotate-left-180')
                    screenView.classList.remove('rotate-left-270')
                    screenView.classList.remove('rotate-left-360')
                } else if (rotateToR === 1) {
                    screenView.classList.remove('rotate-right-90')
                    screenView.classList.add('rotate-right-180')
                    screenView.classList.remove('rotate-right-270')
                    screenView.classList.remove('rotate-right-360')
                    screenView.classList.remove('rotate-left-90')
                    screenView.classList.remove('rotate-left-180')
                    screenView.classList.remove('rotate-left-270')
                    screenView.classList.remove('rotate-left-360')
                } else if (rotateToR === 2) {
                    screenView.classList.remove('rotate-right-90')
                    screenView.classList.remove('rotate-right-180')
                    screenView.classList.add('rotate-right-270')
                    screenView.classList.remove('rotate-right-360')
                    screenView.classList.remove('rotate-left-90')
                    screenView.classList.remove('rotate-left-180')
                    screenView.classList.remove('rotate-left-270')
                    screenView.classList.remove('rotate-left-360')
                } else {
                    screenView.classList.remove('rotate-right-90')
                    screenView.classList.remove('rotate-right-180')
                    screenView.classList.remove('rotate-right-270')
                    screenView.classList.add('rotate-right-360')
                    screenView.classList.remove('rotate-left-90')
                    screenView.classList.remove('rotate-left-180')
                    screenView.classList.remove('rotate-left-270')
                    screenView.classList.remove('rotate-left-360')
                    rotateToR = 0;
                    return
                }
                rotateToR++;
            } else if (e.rotation == 'rotate-left-90') {
                console.log(rotateToL)
                if (rotateToL === 0) {
                    screenView.classList.remove('rotate-right-90')
                    screenView.classList.remove('rotate-right-180')
                    screenView.classList.remove('rotate-right-270')
                    screenView.classList.remove('rotate-right-360')
                    screenView.classList.add('rotate-left-90')
                    screenView.classList.remove('rotate-left-180')
                    screenView.classList.remove('rotate-left-270')
                    screenView.classList.remove('rotate-left-360')
                } else if (rotateToL === 1) {
                    screenView.classList.remove('rotate-right-90')
                    screenView.classList.remove('rotate-right-180')
                    screenView.classList.remove('rotate-right-270')
                    screenView.classList.remove('rotate-right-360')
                    screenView.classList.remove('rotate-left-90')
                    screenView.classList.add('rotate-left-180')
                    screenView.classList.remove('rotate-left-270')
                    screenView.classList.remove('rotate-left-360')
                } else if (rotateToL === 2) {
                    screenView.classList.remove('rotate-right-90')
                    screenView.classList.remove('rotate-right-180')
                    screenView.classList.remove('rotate-right-270')
                    screenView.classList.remove('rotate-right-360')
                    screenView.classList.remove('rotate-left-90')
                    screenView.classList.remove('rotate-left-180')
                    screenView.classList.add('rotate-left-270')
                    screenView.classList.remove('rotate-left-360')
                } else {
                    screenView.classList.remove('rotate-right-90')
                    screenView.classList.remove('rotate-right-180')
                    screenView.classList.remove('rotate-right-270')
                    screenView.classList.remove('rotate-right-360')
                    screenView.classList.remove('rotate-left-90')
                    screenView.classList.remove('rotate-left-180')
                    screenView.classList.remove('rotate-left-270')
                    screenView.classList.add('rotate-left-360')
                    rotateToL = 0;
                    return
                }
                rotateToL++;
            } else if (e.rotation == 'default') {
                screenView.classList.remove('rotate-right-90')
                screenView.classList.remove('rotate-right-180')
                screenView.classList.remove('rotate-right-270')
                screenView.classList.remove('rotate-right-360')
                screenView.classList.remove('rotate-left-90')
                screenView.classList.remove('rotate-left-180')
                screenView.classList.remove('rotate-left-270')
                screenView.classList.remove('rotate-left-360')
            }
        })

    window.Echo.channel(`screen-orientation-{{$screenId}}`)
        .listen('BroadcastScreenOrientation', (e) => {
            let screenView = document.querySelector('#screen-view')
            if (e.orientation == 'image-fit') {
                screenView.classList.add('image-fit')
                screenView.classList.remove('image-default')
            } else if (e.orientation == 'image-default') {
                screenView.classList.remove('image-fit')
                screenView.classList.add('image-default')
            }
        })

    var slideIndex = 0;
    showPics();

    function showPics() {
        var i;
        var slides = document.getElementsByClassName("images");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        if (slideIndex >= media.length) {
            slideIndex = 0;
        }
        for (i = 0; i < slides.length; i++) {
            slides[slideIndex].style.display = "block";
        }
        if (media.length > 0) {
            setTimeout(showPics, (media[slideIndex++].duration));
        }
    }


</script>

<script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>

<script>
    var options, player;
    options = {
        controls: true,
        autoplay: true,
        muted: true
    };
    player = videojs(document.getElementById('vjs'), options, function () {
        this.play();
    });
</script>


<script>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script>
    // Check that service workers are supported
    if ('serviceWorker' in navigator) {
        // Use the window load event to keep the page load performant
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js');
        });
    }
</script>
</body>

</html>