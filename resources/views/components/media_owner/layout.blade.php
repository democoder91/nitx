<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Nitx">
    <meta name="description" content=" Nitx, Let the world see you"/>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/brand/favicon.png') }}">
    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugin/swiper-bundle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icons/iconly/index.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icons/remix-icon/index.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.css')}}">
    <!-- Base -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/font-control.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/typography.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/base.css')}}">

    <!-- Layouts -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layouts/sider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/layouts/header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.css')}}">
    <!-- Pages -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/app-contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/page-profile.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/widgets-selectbox.css')}}">
    <!-- Dropzone -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
    <!-- spotlight -->
    <link rel="stylesheet" href="https://rawcdn.githack.com/nextapps-de/spotlight/0.7.8/dist/css/spotlight.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <!-- Latest Sortable -->
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
    <!-- Tempus Dominus Styles -->
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/nitx.css')}}">
    <link
    href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200;300;400;500;600;700;800;900&family=Tajawal:wght@200;400;700;800&display=swap"
    rel="stylesheet">
<style>
    body {
        font-family: 'Noto Kufi Arabic',
            sans-serif;
    }
</style>
    <title>Nitx</title>
</head>

<body class="collapse-btn-none">
<main class="hp-bg-color-dark-90 d-flex min-vh-100">

    <x-media_owner.sidebar/>
    <div class="hp-main-layout">
        <header>
            <div class="row w-100 m-0">
                <div class="col ps-18 pe-16 px-sm-24">
                    <div class="row w-100 align-items-center justify-content-between position-relative">
                        <div class="col w-auto hp-flex-none hp-mobile-sidebar-button me-24 px-0"
                             data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                            <button type="button" class="btn btn-text btn-icon-only">
                                <i class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1"
                                   style="font-size: 24px;"></i>
                            </button>
                        </div>

                        <div
                                class="hp-header-text-info col col-lg-14 col-xl-16 hp-header-start-text d-flex align-items-center hp-horizontal-none">
                            <div
                                    class="d-flex rounded-3 hp-text-color-primary-1 hp-text-color-dark-0 p-4 hp-bg-color-primary-4 hp-bg-color-dark-70"
                                    style="min-width: 18px">
                                <i class="iconly-Curved-Document"></i>
                            </div>

                            <p class="hp-header-start-text-item hp-input-label hp-text-color-black-100 hp-text-color-dark-0 ms-16 mb-0 lh-1 d-flex align-items-center">
                                Welcome to Nitx Blink, stay tuned for our next updates 🎉🔥⚡
                            </p>
                        </div>


                        <div class="col hp-flex-none w-auto pe-0">
                            <div class="row align-items-center justify-content-end">


                                <div class="hover-dropdown-fade w-auto px-0 ms-6 position-relative hp-cursor-pointer">
                                    <div
                                            class="avatar-item d-flex align-items-center justify-content-center rounded-circle"
                                            style="width: 40px; height: 40px;">
                                        <img src="../../../assets/img/users/user-8.svg">
                                    </div>

                                    <div class="hp-header-profile-menu dropdown-fade position-absolute pt-18"
                                         style="top: 100%; width: 260px;">
                                        <div
                                                class="rounded border hp-border-color-black-40 hp-bg-black-0 hp-bg-dark-100 hp-border-color-dark-80 p-24">
                                            <span class="d-block h5 hp-text-color-black-100 hp-text-color-dark-0 mb-6">Profile Settings</span>

                                            <a href="{{ route('MOSettings') }}"
                                               class="hp-p1-body hp-text-color-primary-1 hp-text-color-dark-primary-2 hp-hover-text-color-primary-2">View
                                                Profile</a>

                                            <div class="divider my-12"></div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="{{ route('help') }}"
                                                       class="d-flex align-items-center hp-p1-body py-4 px-10 hp-transition hp-hover-bg-primary-4 hp-hover-bg-dark-primary hp-hover-bg-dark-80 rounded"
                                                       style="margin-left: -10px; margin-right: -10px;">
                                                        <i class="iconly-Curved-Game me-8" style="font-size: 16px;"></i>
                                                        <span class="hp-ml-8">Help Desk</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="divider my-12"></div>

                                            <a class="hp-p1-body" href="index.html">
                                                <form action="{{ route('media_owner.logout') }}" method="post">
                                                    @csrf
                                                    <li>
                                                        <button type="submit" class="dropdown-item"
                                                                style="color: rgb(224, 65, 65);">Logout
                                                        </button>
                                                    </li>
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="offcanvas offcanvas-start hp-mobile-sidebar" tabindex="-1" id="mobileMenu"
             aria-labelledby="mobileMenuLabel" style="width: 256px;">
            <div class="offcanvas-header justify-content-between align-items-end me-16 ms-24 mt-16 p-0">
                <div class="w-auto px-0">
                    <div class="hp-header-logo d-flex align-items-end">
                        <a href="{{route('index')}}">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                                 src="{{ asset('img/brand/logo_color.svg') }}" alt="logo">
                        </a>
                        <a href="{{ route('index') }}" target="_blank" class="d-flex">
                            <span class="hp-sidebar-hidden hp-p1-body fw-medium hp-text-color-primary-1 mb-16 ms-4"
                                  style="letter-spacing: -0.5px;">.beta</span>
                        </a>
                    </div>
                    <x-media_owner.sidebar/>
                </div>
            </div>
        </div>

        <!-- Main -->
        <div class="hp-main-layout-content">
            <div class="row mb-32 gy-32">
                <div class="col-12">
                    <h3>Welcome back, {{$name}} 👋</h3>
                </div>
                <div class="col-12">
                    {{ $slot }}
                </div>
            </div>
        </div>


        <footer class="w-100 py-18 px-16 py-sm-24 px-sm-32 hp-bg-color-black-10 hp-bg-color-dark-100">
            <div class="row align-items-center">
                <div class="col-12 col-sm-6">
                    <p class="hp-badge-text mb-0 text-center text-sm-start hp-text-color-dark-30">COPYRIGHT ©2022
                        Nitx,All rights Reserved</p>
                </div>
                <div class="col-12 col-sm-6 mt-8 mt-sm-0 text-center text-sm-end">
                    <a href="https://nitx.io" target="_blank" class="hp-badge-text hp-text-color-dark-30">❤️
                        Version: {{env('APP_VERSION')}}</a>
                </div>
            </div>
        </footer>
    </div>
</main>

<div class="scroll-to-top">
    <button type="button" class="btn btn-primary btn-icon-only rounded-circle hp-primary-shadow">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px"
             xmlns="http://www.w3.org/2000/svg">
            <g>
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"></path>
            </g>
        </svg>
    </button>
</div>

<!-- Plugin -->
<script src="{{asset('assets/js/plugin/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/parsley.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/moment.min.js')}}"></script>

<!-- Base -->
<script src="{{asset('assets/js/base/index.js')}}"></script>


<!-- Cards -->
<script src="{{asset('assets/js/cards/card-advance.js')}}"></script>


<!-- Customizer -->
<script src="{{asset('assets/js/customizer.js')}}"></script>

<!-- Dropzone -->
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<!-- spotlight -->
<script src="https://rawcdn.githack.com/nextapps-de/spotlight/0.7.8/dist/spotlight.bundle.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js"
        integrity="sha512-f6WsaafWFia+glfiIH85UyfdCVDyJScsVDM70lJhKr2lt2cYyptkiqtVxcxPnh/CduM/FpfL0eC4liTwZMb58g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--wickedpicker-->
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<!-- Popperjs -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
<!-- Tempus Dominus JavaScript -->
<script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"
        crossorigin="anonymous"></script>

<script src="{{asset('/js/file-explore.js')}}"></script>
<script src="{{ asset('js\sequnce.js') }}"></script>





<script>
    $(document).ready(function () {
        $(document).on('click', '#add-media-to-sequence-btn', function (e) {
            order_id = order_id + 1;
            e.preventDefault();
            let id = Date.now();
            let nodes = $.parseHTML(
                `<li class="list-group-item" data-id="${order_id}">
                                                    <div class="row">
                                                        <div class="col-1 handle" style="margin-top: 1em;">
                                                            <a><i class="ri-arrow-up-down-fill" style="font-size:2em"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Drag up & down "></i></a>
                                                        </div>
                                                        <div class="col-11">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-2" hidden>
                                                                    <label for="orders" class="col-form-label">Order</label>
                                                                    <input type="number" name="orders[]" class="form-control"
                                                                           id="orders" value="${order_id}" disabled>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <div class="card" style="max-width: 340px;">
                                                                        <div class="col-md-12">
                                                                            <a href="" data-bs-toggle="modal" data-bs-target="#mediaModal">
                                                                                <img class="img-fluid rounded" id="media-preview-${id}"
                                                                                style="width:100%; height:13em; object-fit:cover;" src="{{ asset('/img/ad/nomedia.png') }}">
                                                                                 <div class="media-inputs">
                                                                                      <input type="hidden" name="media[]" value="1">
                                                                                 </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-sm-4">
                                                                    <label for="minutes" class="col-form-label">Minutes</label>
                                                                    <input type="number" name="minutes[]" class="form-control"
                                                                           id="minutes" placeholder="3 m" min="0" required="true">
                                                                </div>
                                                                <div class="col-6 col-sm-4">
                                                                    <label for="seconds" class="col-form-label">Seconds</label>
                                                                    <input type="number" name="seconds[]" class="form-control"
                                                                           id="seconds" placeholder="50 s" min="0" required="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>`
            )
            $('#SequenceMedia').append(nodes)
            $(`#media-preview-${id}`).click(function () {
                shownMedia = this.id
                shownMediaContainer = document.getElementById(shownMedia).parentNode
            });
        })

        $(document).on('click', '#remove-media-to-sequence-btn', function (e) {
            if (order_id > 1) {
                order_id = order_id - 1;
            }
            if ($('#SequenceMedia').children().length <= 2) {
                $('#SequenceMedia > li').attr('data-id', 1);
            }
            if ($('#SequenceMedia').children().length <= 1) {
                return
            }
            $('#SequenceMedia').children().last().remove()
        })

    })
    var shownMedia = null;
    var shownMediaContainer = null;
    $("a > img").click(function () {
        shownMedia = this.id
        console.log(shownMedia);
        console.log(`##############`)
        console.log(shownMedia);
        shownMediaContainer = document.getElementById(shownMedia).parentNode
    });

    var selectedMedia = null;
    $("div > div > label > div > img").click(function () {
        selectedMedia = this.id
        let id = Date.now();
        let isVideo = shownMediaContainer.querySelector('video')
        if (isVideo) {
            let selectedMediaSource = $(`#${selectedMedia}`).attr('src')
            shownMediaContainer.innerHTML = `<img class="img-fluid rounded" id="media-preview-${id}"
                style="width:100%; height:13em; object-fit:cover;" src="${selectedMediaSource}">
                <div class="media-inputs">
                <input type="hidden" name="media[]" value="1" class="media-preview-1">
                </div>`
            $(`#media-preview-${id}`).click(function () {
                shownMedia = this.id
                shownMediaContainer = document.getElementById(shownMedia).parentNode
            });
        }
    });

    $("div > div > label > div > video").click(function () {
        selectedMedia = this.id
        console.log(selectedMedia)
        let parts = selectedMedia.split('-')
        let selectedMediaNode = document.getElementById(selectedMedia);
        shownMediaContainer.innerHTML = `<video loop width="100%" id="${selectedMedia}">
                                            <source src="${selectedMediaNode.querySelector('source').src}" alt="" type="video/mp4">
                                         </video>
                                         <div class="media-inputs">
                                            <input type="hidden" name="media[]" id="${parts[1]}" value="${parts[1]}">
                                         </div> `
    });

    var media = [];
    $(document).ready(function () {
        $(document).on('click', '#save-media-id', function (e) {
            let selectedMediaSource = $(`#${selectedMedia}`).attr('src')
            $(`#${shownMedia}`).attr('src', selectedMediaSource)
            let p = $(`#${shownMedia}`).parent();
            p.find('.media-inputs').empty();
            if (media.includes(shownMedia)) {
                $('<input>').attr({
                    type: 'hidden',
                    id: $('input[name="media[]"]:checked').val(),
                    name: 'media[]',
                    value: $('input[name="media[]"]:checked').val(),
                }).addClass(`${shownMedia}`).appendTo(p.children()[1]);
                return
            }
            $('<input>').attr({
                type: 'hidden',
                id: $('input[name="media[]"]:checked').val(),
                name: 'media[]',
                value: $('input[name="media[]"]:checked').val(),
            }).addClass(`${shownMedia}`).appendTo(p.children()[1]);
            media.push(shownMedia);
        })
    });

    const removeSequenceEndValidation = (id) => {
        if ($(id).is(":checked")) {
            $("#sequence_end_date").val('')
            $("#sequence_end_date").attr('disabled', 'disabled');
            $("#sequence_end_date").removeAttr('required');
            $("#parsley-id-15").hide()
        } else {
            $("#sequence_end_date").removeAttr('disabled');
            $("#sequence_end_date").attr('required', 'true');
            $("#parsley-id-15").show()
        }
    }

    $(document).ready(function () {
        $("#run-for-ever-switch").change(function () {
            if (this.checked) {
                $("#sequence_end_date").val('')
                $("#sequence_end_date").attr('disabled', 'disabled');
                $("#sequence_end_date").removeAttr('required');
                $("#parsley-id-15").hide()
            } else {
                $("#sequence_end_date").removeAttr('disabled');
                $("#sequence_end_date").attr('required', 'true');
                $("#parsley-id-15").show()
            }
        });
    })

    $(document).ready(function () {
        $("#run-for-ever-switch").change(function () {
            if (this.checked) {
                $("#sequence_end_date").val('')
                $("#sequence_end_date").attr('disabled', 'disabled');
                $("#sequence_end_date").removeAttr('required');
                $("#parsley-id-15").hide()
            } else {
                $("#sequence_end_date").removeAttr('disabled');
                $("#sequence_end_date").attr('required', 'true');
                $("#parsley-id-15").show()
            }
        });
    })

    var checked = false;
    const check = ($id) => {
        document.getElementById($id).checked = !checked
        checked = !checked;
    }

    var order_id = 1;
</script>

<script>
    var sortable = {
        swap: true,
        swapClass: "highlight",
        handle: '.handle',
        animation: 150,
        store: {
            set: () => {
                let input = document.getElementsByName('orders[]');
                for (let i = 0; i < input.length; i++) {
                    input[i].value = i + 1;
                    order_id = i + 1
                }
            }
        }
    };
    Sortable.create(SequenceMedia, sortable);
</script>
<!--Dropzone Script-->
<script>
    Dropzone.autoDiscover = false;
    var dropzone = new Dropzone(".dropzone", {
        maxFilesize: 100,
        
        //createImageThumbnails: true,

        acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4",
        addRemoveLinks: true,
        removedfile: function (file) {
            var fileName = file.name;
            $.ajax({
                type: 'POST',
                url: "{{route('media_owner.remove_media')}}",
                data: {"_token": "{{ csrf_token() }}", fileName: fileName},
                sucess: function (data) {
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        chunking: true,
        chunkSize: 500000,
        retryChunks: true,
        retryChunksLimit: 3,
        parallelUploads: 2,
        dictFileTooBig: "File is too big, Max filesize:100 MiB.",
        dictInvalidFileType: "You can't upload files of this type.",

    });
</script><!--End of Dropzone Script-->


<script>
    $(document).ready(function () {
        $(document).on('click', '#sequence-submit-id', function (e) {
            document.querySelectorAll('[data-id]').forEach((elm) =>
                $('<input>').attr({
                    type: 'hidden',
                    name: 'orders[]',
                    value: elm.getAttribute('data-id')
                }).addClass(`${shownMedia}`).appendTo('#sequence-submit-id')
            )
            $('#store-sequence-form').submit();
        })
    })
</script>


<script>
    var screenId = null;
    const fetchScreenGroupSequenceMediaWithTheirDuration = (imgId, sequenceId, screenId) => {
        this.screenId = screenId;
        $.ajax({
            url: "/MediaOwner/fetch-screen-group-media-info/" + sequenceId,
            type: 'GET',
            success: function (res) {
                console.log(res)
                var count = document.querySelector(`${imgId}`).parentNode
                function showImages(currentImage) {
                    let img = res[currentImage];
                    if (img.type === "video") {
                        count.innerHTML = `
                        <video class="image-default" width="100%">
                            <source src="${img.video_path ? img.video_path : img.media_aws_s3_url ? img.media_aws_s3_url : `/storage/${img.path}`}" type="video/mp4">
                        </video>
                        `
                    } else {
                        $(imgId).attr('src', `${img.compressed_media_path ? img.compressed_media_path : img.media_aws_s3_url ? img.media_aws_s3_url : `/storage/${img.path}`}`)
                    }
                    setTimeout(function () {
                        currentImage++;
                        if (currentImage < res.length) {
                            showImages(currentImage);
                        } else {
                            showImages(0)
                        }
                    }, img.minutes * 60000 + img.seconds * 1000);
                }
                showImages(0)
            }
        });
    }

    document.querySelectorAll('.files').forEach(function (file) {
        file.addEventListener('click', function (e) {
            e.preventDefault();
            fetchFolderData(file.id);
        })
    });

    const fetchFolderData = async (id) => {
        let mediaTree = document.querySelector('.media-tree');
        mediaTree.innerHTML = "";
        $.ajax({
            url: "/MediaOwner/get-folders-ajax/" + id,
            type: 'GET',
            success: function (res) {
                let html = "";
                res.forEach(function (folder) {
                    html += `
                       <div class="col-6 col-md-2">
                                        <a href=""
                                           id="${folder.id}"
                                            onclick="openFolder(event, ${folder.id})"
                                           class="d-flex align-items-center justify-content-between flex-column files">
                                            <i class="ri-folder-fill hp-text-color-primary-2 folders"
                                               style=" font-size: 10em;"></i>
                                            <h6>${folder.name}</h6>
                                        </a>
                                    </div>`
                })
                mediaTree.innerHTML = html;
                document.querySelectorAll('.files').forEach(function (file) {
                    file.addEventListener('click', function (e) {
                        e.preventDefault();
                        fetchFolderData(e, file.id);
                    })
                });
            }
        });

        let treepath = document.getElementById('treepath')
        $.ajax({
            url: "/MediaOwner/get-folders-path-ajax/" + id,
            type: 'GET',
            success: function (res) {
                let treePathHtml = "";
                treePathHtml += `
                <li class="breadcrumb-item"><a
                    onclick="fetchMainFolder(event)"
                    href="">media</a>
                </li>
                `
                res.forEach(function (path) {
                    treePathHtml += `
                    <li class="breadcrumb-item"><a
                    onclick="openPreFolder(event, ${id})"
                    href="">${path[1]}</a>
                    </li>
                    `
                });
                treepath.innerHTML = treePathHtml;
            }
        })
        $.ajax({
            url: "/MediaOwner/get-media-ajax/" + id,
            type: 'GET',
            success: function (res) {
                let html = "";
                res.forEach(function (media) {
                    html += `<div class="col-6 col-md-3" style="margin-top:1em">
                                            <div class="hp-select-box-item">
                                                <input type="radio" name="media[]" value="${media.id}"
                                                       id="media${media.id}" hidden="">
                                                <label class="d-block hp-cursor-pointer" for="media${media.id}">
                                                    <div class="card card-body" style="padding: 0.2em">
                                                              ${media.type === 'image' ? `
                                                                 <img id="media-${media.id}"
                                                                 src="${media.thumbnail_media_path ? media.thumbnail_media_path : media.media_aws_s3_url ? media.media_aws_s3_url : `/storage/${media.path}`}"
                                                                 alt="${media.name}"
                                                                 style="  width:100%; height:7em; object-fit:cover;">
                                                                 <h6 class="d-inline-block text-truncate">${media.name}</h6>` : `
                                                                 <video loop width="100%" id="media-${media.id}">
                                                                    <source
                                                                    src="${media.video_path ? video_path : media.media_aws_s3_url ? media.media_aws_s3_url : `/storage/${media.path}`}"
                                                                    alt="${media.name}"
                                                                    type="video/mp4">
                                                                    <h6 class="d-inline-block text-truncate">${media.name}</h6>
                                                                 </video>`}
                                        </div>
                                    </label>
                                </div>
                            </div>`
                })
                mediaTree.innerHTML += html;
                $("div > div > label > div > img").click(function () {
                    selectedMedia = this.id
                    console.log(selectedMedia)
                    let id = Date.now();
                    let isVideo = shownMediaContainer.querySelector('video')
                    if (isVideo) {
                        let selectedMediaSource = $(`#${selectedMedia}`).attr('src')
                        shownMediaContainer.innerHTML =
                            `<img class="img-fluid rounded" id="media-preview-${id}"
                            style="width:100%; height:13em; object-fit:cover;"  src="${selectedMediaSource}">
                            <div class="media-inputs">
                                <input type="hidden" name="media[]" value="1" class="media-preview-1">
                            </div>`
                        $(`#media-preview-${id}`).click(function () {
                            shownMedia = this.id
                            shownMediaContainer = document.getElementById(shownMedia).parentNode
                        });
                    }
                });

                $("div > div > label > div > video").click(function () {
                    selectedMedia = this.id
                    console.log(selectedMedia)
                    let parts = selectedMedia.split('-')

                    let selectedMediaNode = document.getElementById(selectedMedia);
                    shownMediaContainer.innerHTML = `<video loop width="100%" id="${selectedMedia}" >
                                                          <source src="${selectedMediaNode.querySelector('source').src}"
                                                                        alt="" type="video/mp4">
                                                        </video>
                                                        <div class="media-inputs">
                                                        <input type="hidden" name="media[]" id="${parts[1]}" value="${parts[1]}">
                                                        </div>`
                });
            }
        });
    }

    function openFolder(e, id) {
        e.preventDefault();
        fetchFolderData(id)
    }

    function openPreFolder(e, id) {
        e.preventDefault();
        let parentFolderId;
        $.ajax({
            url: "/MediaOwner/get-parent-folder-id-ajax/" + id,
            type: 'GET',
            success: function (res) {
                parentFolderId = res.data[0].parent_folder
                fetchFolderData(parentFolderId);
            }
        })
    }

    function sleep(time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }

    const fetchMainFolder = (e) => {
        let mediaTree = document.querySelector('.media-tree');
        mediaTree.innerHTML = "";
        e.preventDefault();
        $.ajax({
            url: "/MediaOwner/get-main-folder-content-ajax",
            type: 'GET',
            success: function (res) {
                let treepath = document.getElementById('treepath')
                let treePathHtml = "";
                treePathHtml += `
                <li class="breadcrumb-item"><a
                    onclick="fetchMainFolder(event)">media</a>
                </li>
                `
                treepath.innerHTML = treePathHtml;
                let html = "";
                let folders = res.folders
                folders.forEach(function (folder) {
                    html += `
                       <div class="col-6 col-md-3">
                                        <a href=""
                                           id="${folder.id}"
                                            onclick="openFolder(event, ${folder.id})"
                                           class="d-flex align-items-center justify-content-between flex-column files">
                                            <i class="ri-folder-fill hp-text-color-primary-2 folders"
                                               style=" font-size: 10em;"></i>
                                            <h6>${folder.name}</h6>
                                        </a>
                                    </div>`
                })

                document.querySelectorAll('.files').forEach(function (file) {
                    file.addEventListener('click', function (e) {
                        e.preventDefault();
                        fetchFolderData(e, file.id);
                    })
                });
                let medias = res.medias
                medias.forEach(function (media) {
                    html += `<div class="col-6 col-md-3" style="margin-top:1em">
                                            <div class="hp-select-box-item">
                                                <input type="radio" name="media[]" value="${media.id}"
                                                       id="media${media.id}" hidden="">
                                                <label class="d-block hp-cursor-pointer" for="media${media.id}">
                                                    <div class="card card-body" style="padding: 0.2em">
                                                              ${media.type == 'image' ? `
                                                                 <img id="media-${media.id}"
                                                                 src="${media.thumbnail_media_path ? media.thumbnail_media_path : media.media_aws_s3_url ? media.media_aws_s3_url : `/storage/${media.path}`}"
                                                                 alt="${media.name}"
                                                                 style="  width:100%; height:7em; object-fit:cover;">
                                                                 <h6 class="d-inline-block text-truncate">${media.name}</h6>` : `
                                                                 <i class="iconly-Light-Play hp-text-color-primary-4"
                                                                    style="font-size: 3em; position:absolute; top:25%; left:35%"></i>
                                                                 <video muted playsinline width="100%" 
                                                                 style="width:100%; height:7em; object-fit:cover;"id="media-${media.id}">
                                                                    <source src="${media.video_path ? media.video_path : media.media_aws_s3_url ? media.media_aws_s3_url : `/storage/${media.path}`}"
                                                                    alt="${media.name}"type="video/mp4">
                                                                 </video>
                                                                 <h6 class="d-inline-block text-truncate">${media.name}</h6>`}
                            </div>
                        </label>
                    </div>
                </div>`
                })
                mediaTree.innerHTML = html;

                $("div > div > label > div > img").click(function () {
                    selectedMedia = this.id
                    let id = Date.now();
                    let isVideo = shownMediaContainer.querySelector('video')
                    if (isVideo) {
                        let selectedMediaSource = $(`#${selectedMedia}`).attr('src')
                        shownMediaContainer.innerHTML =
                            `<img  class="img-fluid rounded" id="media-preview-${id}"
                            style="width:100%; height:13em; object-fit:cover;" src="${selectedMediaSource}">
                                <div class="media-inputs">
                                <input type="hidden" name="media[]" value="1" class="media-preview-1">
                            </div>`
                        $(`#media-preview-${id}`).click(function () {
                            shownMedia = this.id
                            shownMediaContainer = document.getElementById(shownMedia).parentNode
                        });
                    }

                });

                $("div > div > label > div > video").click(function () {
                    selectedMedia = this.id
                    let parts = selectedMedia.split('-')
                    let selectedMediaNode = document.getElementById(selectedMedia);
                    shownMediaContainer.innerHTML = `<video loop width="100%" id="${selectedMedia}">
                                                                <source src="${selectedMediaNode.querySelector('source').src}"
                                                                        alt="" type="video/mp4">
                                                        </video>
                                                        <div class="media-inputs">
                                                        <input type="hidden" name="media[]" id="${parts[1]}" value="${parts[1]}">
                                                        </div>`
                });
            }
        })
    }

</script>

<script>
    $('#monthly').show();
    $('#yearly').hide();
    $(document).ready(function () {
        $(document).on('change', '#plan', function (e) {
            console.log($('#plan').val())
            if ($('#plan').val() === 'monthly') {
                $('#monthly').show();
                $('#yearly').hide();
            } else if ($('#plan').val() === 'yearly') {
                $('#yearly').show();
                $('#monthly').hide();
            } else {
            }
        })
    })
</script>

<script>
    var rotateR = 0;
    var rotateL = 0;
    $(document).ready(function () {
        $(document).on('click', '#rotate-default', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: `/MediaOwner/change-screen-rotation/` + screenId,
                data: {"_token": "{{ csrf_token() }}", rotation: 'default', rotationClass: 'null'},
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: 'You have rotated the screen to the default rotation',
                    })
                }
            });
        })
        $(document).on('click', '#rotate-right-90', function (e) {
            let rotationClass = findRotationDegree(rotateR, 'right');
            rotateR++;
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: `/MediaOwner/change-screen-rotation/` + screenId,
                data: {"_token": "{{ csrf_token() }}", rotation: 'rotate-right-90', rotationClass: rotationClass},
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: 'You have rotated the screen 90 degrees to right',
                    })
                }
            });
        })
        $(document).on('click', '#rotate-left-90', function (e) {
            let rotationClass = findRotationDegree(rotateL, 'left');
            rotateL++;
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: `/MediaOwner/change-screen-rotation/` + screenId,
                data: {"_token": "{{ csrf_token() }}", rotation: 'rotate-left-90', rotationClass: rotationClass},
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: 'You have rotated the screen 90 degrees to left',
                    })
                }
            });
        })
    })

    const findRotationDegree = (counter, direction) => {
        if (counter === 0) {
            return `rotate-${direction}-90`;
        } else if (counter === 1) {
            return `rotate-${direction}-180`;
        } else if (counter === 2) {
            return `rotate-${direction}-270`;
        } else if (counter === 3) {
            return `rotate-${direction}-360`;
        }
        if (direction === 'left' && counter === 4) {
            rotateL = 0;
            return `rotate-${direction}-90`;
        } else if (direction === 'right' && counter === 4) {
            rotateR = 0;
            return `rotate-${direction}-90`;
        }
    }

</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#img-default-size', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: `/MediaOwner/change-screen-orientation/` + screenId,
                data: {"_token": "{{ csrf_token() }}", orientation: 'image-default'},
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: 'You have changed screen orientation to image-default',
                    })
                }
            });
        })
        $(document).on('click', '#img-fit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: `/MediaOwner/change-screen-orientation/` + screenId,
                data: {"_token": "{{ csrf_token() }}", orientation: 'image-fit'},
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: 'You have changed screen orientation to image-fit',
                    })
                }
            });
        })
    });
</script>


<script>
    const checkIsScreenInOneGroup = (screenId, groupId) => {
        html = document.getElementById('duplicateScreens').innerHTML
        $.ajax({
            type: 'GET',
            url: `/MediaOwner/check-is-screen-in-one-group/` + screenId,
            success: function (res) {
                if (res.active_screen_group_id !== null) {
                    document.getElementById('screenIsInMoreThanOneGroupAlert').style.display = 'block'
                    document.getElementById('screenIsInMoreThanOneGroupAlert' + groupId).style.display = 'block'
                    document.getElementById('duplicateScreens').innerHTML = document.getElementById(`screen-name-${screenId}`).innerText + ', '
                }
            }
        });
    }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Check that service workers are supported
    if ('serviceWorker' in navigator) {
        // Use the window load event to keep the page load performant
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js');
        });
    }
</script>

<script type="text/javascript" src="{{asset('js/setTimeDurationAfterSubmittingFormToDisableButton.js')}}"></script>
<script type="text/javascript" src="{{asset('js/Screen/Screen.js')}}"></script>

</body>

</html>
