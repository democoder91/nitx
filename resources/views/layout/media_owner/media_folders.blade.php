<x-media_owner.layout :name="$name">
    @section('components.media_owner.sidebar')
        @section('active4', __('btn btn-primary-4'))
        @section('active-txt-4', __('hp-text-color-primary-1'))
    @endsection
    <div class="col-12">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <style>
            /* Absolute Center Spinner */
            .loading {
                position: fixed;
                z-index: 999;
                height: 2em;
                width: 2em;
                overflow: show;
                margin: auto;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
            }
    
            /* Transparent Overlay */
            .loading:before {
                content: '';
                display: block;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
    
                background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
            }
    
            /* :not(:required) hides these rules from IE9 and below */
            .loading:not(:required) {
                /* hide "loading..." text */
                font: 0/0 a;
                color: transparent;
                text-shadow: none;
                background-color: transparent;
                border: 0;
            }
    
            .loading:not(:required):after {
                content: '';
                display: block;
                font-size: 10px;
                width: 1em;
                height: 1em;
                margin-top: -0.5em;
                -webkit-animation: spinner 150ms infinite linear;
                -moz-animation: spinner 150ms infinite linear;
                -ms-animation: spinner 150ms infinite linear;
                -o-animation: spinner 150ms infinite linear;
                animation: spinner 150ms infinite linear;
                border-radius: 0.5em;
                -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
                box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
            }
    
            /* Animation */
    
            @-webkit-keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
    
                100% {
                    -webkit-transform: rotate(360deg);
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -o-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
    
            @-moz-keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
    
                100% {
                    -webkit-transform: rotate(360deg);
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -o-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
    
            @-o-keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
    
                100% {
                    -webkit-transform: rotate(360deg);
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -o-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
    
            @keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
    
                100% {
                    -webkit-transform: rotate(360deg);
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -o-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
    
        </style>
        <div class="card pb-0 pb-sm-64">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center justify-content-between">
                            <div class="col flex-grow-1">
                                <h1 class="mb-8">{{ $folder->name }}</h1>
                                <h1>{{ __('') }}</h1>
                            </div>

                            <div class="col hp-flex-none w-auto dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="javascript:" role="button"
                                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="iconly-Light-Plus" style="margin-right: 0.5em; font-size:1em"></i>
                                    {{ __('Add') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="newMediaModal" data-bs-toggle="modal"
                                           data-bs-target="#newMediaModal">{{ __('New Media') }}</a></li>
                                    <li><a class="dropdown-item" href="#newFolderModal" data-bs-toggle="modal"
                                           data-bs-target="#newFolderModal">{{ __('New Folder') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('MOmedia') }}">main</a></li>
                                @foreach ($folder_path as $path)
                                    <li class="breadcrumb-item"><a
                                                href="{{ route('media_owner.get_folder', $path[0]) }}">{{ $path[1] }}</a>
                                    </li>
                                @endforeach
                            </ol>
                        </nav>
                        <div class="mt-24 mb-12"></div>
                        <!--Dividers-->
                        <!--End of Empty Media Folder-->
                        @if (count($folders) == 0 && count($media) == 0)
                            <div class="col-12">
                                <div class="card">
                                    <div class="row d-flex justify-content-center"
                                         style="margin-top: 4em; margin-bottom:4em;">
                                        <img src="{{ asset('assets/img/illustrations/empty-search.svg') }}"
                                             style="height:8em">
                                        <h5 style="text-align: center; margin-top: 2em;">{{ __('Empty folder') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <!--End of Empty Media Folder-->
                        @else
                            <div class="row spotlight-group">
                                @foreach ($folders as $folder)
                                    <!-- Folder -->
                                    <div class="col-6 col-md-2">
                                        <a href="{{ route('media_owner.get_folder', $folder->id) }}"
                                           class="d-flex align-items-center justify-content-between flex-column">
                                            <i class="ri-folder-fill hp-text-color-primary-2 folders"
                                               style=" font-size: 10em;" id="{{ $folder->id }}"></i>
                                            <h6>{{ $folder->name }}</h6>
                                        </a>
                                    </div>
                                    <!-- End of Folder -->
                                @endforeach
                                @foreach ($media as $item)
                                    <div class="col-6 col-md-2 media" style="margin-top:1em" id="{{ $item->id }}">
                                        <div class="card card-body" style="padding: 0.2em">
                                            @if ($item->type == 'image')
                                                <a class="spotlight"
                                                   href="{{ $item->compressed_media_path ?? ($item->media_aws_s3_url ?? asset('storage/' . $item->path)) }}">
                                                    <img src="{{$item->thumbnail_media_path ?? $item->media_aws_s3_url ??  asset('img/ad/mediaLoading3.gif') }}"
                                                         alt="{{ $item->name }}"
                                                         style="  width:100%; height:8em; object-fit:cover;">
                                                </a>
                                            @elseif($item->type =='video')
                                                <a class="spotlight" data-media="video"
                                                   data-src-webm="{{$item->video_path ?? $item->media_aws_s3_url ?? asset('storage/' . $item->path)}}"
                                                   data-src-ogg="{{$item->video_path ?? $item->media_aws_s3_url ?? asset('storage/' . $item->path)}}"
                                                   data-src-mp4="{{$item->video_path ?? $item->media_aws_s3_url ?? asset('storage/' . $item->path)}}"
                                                   data-autoplay="false" data-poster="">
                                                    <i class="iconly-Light-Play hp-text-color-primary-4"
                                                       style="font-size: 3em; position:absolute; top:25%; left:40%"></i>
                                                    <img src="{{$item->thumbnail_media_path ??  asset('/img/ad/nothumbnail.png')}}"
                                                         style="  width:100%; height:8em; object-fit:cover;">
                                                </a>
                                            @endif
                                            <div class="row">
                                                <h5 class="col-10 d-inline-block text-truncate" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="{{ $item->name }}">
                                                    {{ $item->name }}</h5>
                                                <i class="col-2 ri-more-2-fill hp-text-color-dark-0 remix-icon"
                                                   style="font-size: 15px; margin-top:0.5em; margin-left: 0em"
                                                   role="button"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--New Folder Modal-->
    <div class="modal fade" id="newFolderModal" tabindex="-1" aria-labelledby="newFolderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newFolderModalLabel">{{ __('New Folder 📁') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ $create_child_folder_url }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="folder_name" class="col-form-label">{{ __('Folder Name') }}</label>
                            <input type="text" name="folder_name" class="form-control" id="folder_name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End of New Folder Modal-->

    <!--New Media Modal-->
    <div class="modal fade" id="newMediaModal" tabindex="-1" aria-labelledby="newMediaModalLabel"
         aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMediaModalLabel">{{ __('Upload Media') }}xxxx</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-16">
                        <div class="col-6 hp-flex-none w-auto">
                            <div
                                    class="avatar-item d-flex align-items-center justify-content-center avatar-lg bg-primary-4 hp-bg-color-dark-primary rounded-circle">
                                <i class="ri-file-upload-fill text-primary hp-text-color-dark-primary-2"
                                   style="font-size: 24px;"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4 mt-8">{{ __('Upload a file 📺') }}</h3>
                            <p class="hp-p1-body mb-0 text-black-80 hp-text-color-dark-30">
                                {{ __('Attach the file below') }}</p>
                        </div>
                    </div>

                    <div class="mt-24 mb-12"></div>
                    <!--Dividers-->

                    <form action="{{route('media_owner.upload_media')}}" 
                    method="POST" enctype="multipart/form-data" d
                    ata-parsley-validate="true"
                    class="dropzone"
                    id="media_upload_form"
                    >
                        @csrf
                        {{-- dropzone for files  --}}
                        <div class="fallback">
                            <input name="file" type="file" id="media_file" required>
                        </div>

                        
                    </form>
                    <div id="spinner" style="background: rgba(0, 0, 0, 0.8);
                                            position: fixed; top: 0; left: 0; right: 0; bottom: 0;
                                            justify-content: center; align-items: center;" hidden>
                        <div style="display: inline-block; position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%);">
                            <h1 class=" text-nowrap text-center text-white    ">Please wait while processing your file ...</h1>
                            <h1 class=" text-nowrap text-center text-white    ">This can take up to 3 minuites</h1>
                        </div>
                        <div style="display: inline-block; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">
                            <div class="lds-ripple">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <style>
                            .lds-ripple {
                                display: inline-block;
                                position: relative;
                                width: 80px;
                                height: 80px;
                            }

                            .lds-ripple div {
                                position: absolute;
                                border: 4px solid rgb(255, 255, 255);
                                opacity: 1;
                                border-radius: 50%;
                                animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
                            }

                            .lds-ripple div:nth-child(2) {
                                animation-delay: -0.5s;
                            }

                            @keyframes lds-ripple {
                                0% {
                                    top: 36px;
                                    left: 36px;
                                    width: 0;
                                    height: 0;
                                    opacity: 0;
                                }

                                4.9% {
                                    top: 36px;
                                    left: 36px;
                                    width: 0;
                                    height: 0;
                                    opacity: 0;
                                }

                                5% {
                                    top: 36px;
                                    left: 36px;
                                    width: 0;
                                    height: 0;
                                    opacity: 1;
                                }

                                100% {
                                    top: 0px;
                                    left: 0px;
                                    width: 72px;
                                    height: 72px;
                                    opacity: 0;
                                }
                            }

                        </style>
                    </div>

                </div>
            </div>
        </div>
        <script>
                        
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
                params: {
                            parent_folder_id: {{ $parent_folder_id }}
                        },
                
            });
            dropzone.autoDiscover = false;
            
            dropzone.on('sending', function(file) {
                // hide the element with the id of media_upload_form
                document.getElementById('media_upload_form').style.display = 'none';
                // show the spinner by removing the hidden attribute
                document.getElementById('spinner').removeAttribute('hidden');



            });
            dropzone.on('success', function(file) {
                // hide the spinner
                document.getElementById('spinner').setAttribute('hidden', 'true');
                // close the modal
                $('#uploadmodal').modal('hide');
                // refresh the page 
                location.reload();
            });
            
            

            </script>
    </div>
    <!--End of New Media Modal-->

    <div class="modal fade" id="deleteMediaModal" tabindex="-1" aria-labelledby="deleteMediaModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMediaModal">{{ __('Delete Media') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteMediaForm" action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="folder_name" class="col-form-label">{{ __('delete media text') }}
                                <strong class="text-danger">delete</strong> </label>
                            <input type="text" name="confirm_delete" class="form-control" id="confirm_delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="renameMediaModal" tabindex="-1" aria-labelledby="renameMediaModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMediaModal">{{ __('Rename Media') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="renameMediaForm" action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="media_name" class="col-form-label">{{ __('rename media text') }}</label>
                            <input type="text" name="media_name" class="form-control" id="media_name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="renameFolderModal" tabindex="-1" aria-labelledby="renameFolderModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="renameFolderModal">{{ __('Rename Folder') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="renameFolderForm" action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="folder_name" class="col-form-label">{{ __('rename folder text') }}</label>
                            <input type="text" name="folder_name" class="form-control" id="folder_name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteFolderModal" tabindex="-1" aria-labelledby="deleteFolderModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteFolderModal">{{ __('Move Media') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteFolderForm" action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="folder_name" class="col-form-label">{{ __('delete folder text') }}
                                <strong class="text-danger">delete all</strong> </label>
                            <input type="text" name="confirm_delete" class="form-control" id="confirm_delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Move') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="moveFolderModal" tabindex="-1" aria-labelledby="moveFolderModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="moveFolderModal">{{ __('Move Media') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="moveFolderForm" action="" method="post">
                        @csrf
                        <select class="form-select" name="parent_folder_id">
                            <option value="select">{{ __('Select Folder') }}</option>
                            <option value="null">main</option>
                            @foreach ($all_folders as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Move') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="moveMediaModal" tabindex="-1" aria-labelledby="moveMediaModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="moveMediaModal">{{ __('Move Media') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="moveMediaForm" action="" method="post">
                        @csrf
                        <select class="form-select" name="parent_folder_id">
                            <option value="select">{{ __('Select Folder') }}</option>
                            <option value="null">main</option>
                            @foreach ($all_folders as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-text"
                                    data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Move') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Right Click Menu-->
    <ul id="rightmenuMedia" class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="display: none">
        <li>
            <a class="dropdown-item" id="#renameMediaModal" data-bs-toggle="modal"
               data-bs-target="#renameMediaModal">
                <i class="iconly-Curved-Edit me-8" style="font-size: 16px;"></i>
                {{ __('Rename') }}</a>
            </a>
        </li>
        <li><a class="dropdown-item" href="" id="downloadMedia">
                <i class="iconly-Light-Download me-8" style="font-size: 16px;"></i>
                {{ __('Download') }}</a>
        </li>
        <li>
            <a class="dropdown-item" id="#moveMediaModal" data-bs-toggle="modal" data-bs-target="#moveMediaModal">
                <i class="iconly-Curved-ArrowLeftSquare me-8" style="font-size: 16px;"></i>
                {{ __('Move') }}</a>
            </a>
        </li>
        <li>
            <a class="dropdown-item" id="#deleteMediaModal" data-bs-toggle="modal"
               data-bs-target="#deleteMediaModal">
                <i class="iconly-Curved-Delete me-8" style="font-size: 16px;"></i>
                {{ __('Delete') }}</a>
            </a>
        </li>
    </ul>
    <ul id="rightmenuFolder" class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="display: none">
        <li>
            <a class="dropdown-item" id="#renameFolderModal" data-bs-toggle="modal"
               data-bs-target="#renameFolderModal">
                <i class="iconly-Curved-Delete me-8" style="font-size: 16px;"></i>
                {{ __('Rename') }}</a>
            </a>
        </li>
        <li>
            <a class="dropdown-item" id="#moveFolderModal" data-bs-toggle="modal" data-bs-target="#moveFolderModal">
                <i class="iconly-Curved-ArrowLeftSquare me-8" style="font-size: 16px;"></i>
                {{ __('Move') }}</a>
            </a>
        </li>
        <li><a class="dropdown-item" href="" id="downloadFolder">
                <i class="iconly-Light-Download me-8" style="font-size: 16px;"></i>
                {{ __('Download') }}</a>
        </li>
        <li>
            <a class="dropdown-item" id="#deleteFolderModal" data-bs-toggle="modal"
               data-bs-target="#deleteFolderModal">
                <i class="iconly-Curved-ArrowLeftSquare me-8" style="font-size: 16px;"></i>
                {{ __('Delete') }}</a>
            </a>
        </li>
    </ul>
</x-media_owner.layout>


<script>
    var mediaId = null;
    var folderId = null;
    document.onclick = hideRightMenu;
    let medias = document.getElementsByClassName('media');
    for (let i = 0; i < medias.length; i++) {
        medias[i].oncontextmenu = rightClickMenuMedia;
    }
    let folders = document.getElementsByClassName('folders');
    for (let i = 0; i < folders.length; i++) {
        folders[i].oncontextmenu = rightClickMenuFolder;
    }

    function hideRightMenu() {
        document.getElementById("rightmenuMedia").style.display = "none"
        document.getElementById("rightmenuFolder").style.display = "none"
    }

    function rightClickMenuMedia(e) {
        e.preventDefault();
        mediaId = this.id
        var deleteMediaRoute = '{{ route('media_owner.delete_media', ':id') }}';
        var renameMediaRoute = '{{ route('media_owner.rename_media', ':id') }}';
        var downloadMediRoute = '{{ route('media_owner.download_media', ':id') }}';
        var moveMediaRoute = '{{ route('media_owner.move_media', ':id') }}';
        deleteMediaRoute = deleteMediaRoute.replace(':id', mediaId);
        renameMediaRoute = renameMediaRoute.replace(':id', mediaId);
        downloadMediRoute = downloadMediRoute.replace(':id', mediaId);
        moveMediaRoute = moveMediaRoute.replace(':id', mediaId);
        document.querySelector("#deleteMediaForm").action = deleteMediaRoute
        document.querySelector("#renameMediaForm").action = renameMediaRoute
        document.querySelector("#moveMediaForm").action = moveMediaRoute
        document.querySelector("#downloadMedia").href = downloadMediRoute
        if (document.getElementById("rightmenuMedia").style.display == "block") {
            hideRightMenu();
        } else {
            var menu = document.getElementById("rightmenuMedia")
            menu.style.display = 'block';
            menu.style.left = e.pageX - 250 + "px";
            menu.style.top = e.pageY - 110 + "px";
        }
    }

    function rightClickMenuFolder(e) {
        e.preventDefault();
        folderId = this.id
        var renameFolderRoute = '{{ route('media_owner.rename_folder', ':id') }}';
        var moveFolderRoute = '{{ route('media_owner.move_folder', ':id') }}';
        var deleteFolderRoute = '{{ route('media_owner.delete_folder', ':id') }}';
        var downloadFolderRoute = '{{ route('media_owner.download_folder', ':id') }}';
        renameFolderRoute = renameFolderRoute.replace(':id', folderId);
        moveFolderRoute = moveFolderRoute.replace(':id', folderId);
        deleteFolderRoute = deleteFolderRoute.replace(':id', folderId);
        downloadFolderRoute = downloadFolderRoute.replace(':id', folderId);
        console.log(downloadFolderRoute)
        console.log(downloadFolderRoute)
        console.log(downloadFolderRoute)
        console.log(downloadFolderRoute)
        console.log(downloadFolderRoute)
        document.querySelector("#renameFolderForm").action = renameFolderRoute
        document.querySelector("#deleteFolderForm").action = deleteFolderRoute
        document.querySelector("#moveFolderForm").action = moveFolderRoute
        document.querySelector("#downloadFolder").href = downloadFolderRoute
        if (document.getElementById("rightmenuFolder").style.display == "block") {
            hideRightMenu();
        } else {
            var menu = document.getElementById("rightmenuFolder")
            menu.style.display = 'block';
            menu.style.left = e.pageX - 250 + "px";
            menu.style.top = e.pageY - 110 + "px";
        }
    }
</script>
