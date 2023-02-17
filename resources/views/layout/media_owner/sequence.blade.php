<x-media_owner.layout :name="$name">
    @section('components.media_owner.sidebar')
        @section('active3', __('btn btn-primary-4'))    @section('components.media_owner.sidebar')
            @section('active3', __('btn btn-primary-4'))
            @section('active-txt-3', __('hp-text-color-primary-1'))
        @endsection
        <style>
            .highlight {
                background-color: #ebfafa !important;
                handle: '.handle', / / handle 's class
            }
        </style>

        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card pb-0 pb-sm-64">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row align-items-center justify-content-between">
                                <div class="col flex-grow-1">
                                    <h1 class="mb-8">{{ __('Sequence') }}</h1>
                                </div>
                                <div class="col hp-flex-none w-auto">
                                    <a class="btn btn-primary" data-bs-toggle="collapse"
                                       data-bs-target="#collapseExample"
                                       aria-expanded="false" aria-controls="collapseExample">
                                        <i class="iconly-Light-Plus" style="margin-right: 0.5em; font-size:1em"></i>
                                        Create New Sequence
                                    </a>
                                </div>
                            </div>
                            <div class="mt-24 mb-12"></div><!--Dividers-->
                            <!--Empty Sequence Group-->
                            <div class="col-12" hidden>
                                <div class="card">
                                    <div class="row d-flex justify-content-center"
                                         style="margin-top: 4em; margin-bottom:4em;">
                                        <img src="{{ asset('assets/img/illustrations/empty-forms.svg') }}"
                                             style="height:8em">
                                        <h5 style="text-align: center; margin-top: 2em;">There are no sequence yet!</h5>
                                    </div>
                                </div>
                            </div><!--End of Empty Sequence Group-->
                            <!--Create New Sequence-->
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body mt-16">
                                    <form action="{{route('media_owner.store_sequence')}}" method="post"
                                          id="store-sequence-form" data-parsley-validate
                                          {{-- onsubmit="setTimeDurationAfterSubmittingFormToDisableButton(30000, 'sequence-submit-id')" --}}
                                          >
                                        @csrf
                                        <div class="row">
                                            <div class="list-group" id="list">
                                                <div class="list-group-item list-group-item-action active"
                                                     aria-current="true">
                                                    <div class="row">
                                                        <h4 class="col-8" style="margin-top: 0.5em">{{ __('Sequence Content') }}</h4>
                                                        <a id="remove-media-to-sequence-btn" type="button"
                                                           class="col-2 btn btn-primary">
                                                            <i class="iconly-Light-Delete" style="font-size:2em"
                                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                               title="Delete Slot from Sequence"></i>
                                                        </a>
                                                        <a id="add-media-to-sequence-btn" type="button"
                                                           class="col-2 btn btn-primary">
                                                            <i class="iconly-Light-Plus" style="font-size:2em"
                                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                               title="Add Slot to Sequence"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <ul id="SequenceMedia" class="rounded-bottom">
                                                    <!--Sequence Slot-->
                                                    <li class="list-group-item" data-id="1">
                                                        <div class="row">
                                                            <div class="col-1 handle" style="margin-top: 1em;">
                                                                <a><i class="ri-arrow-up-down-fill"
                                                                      style="font-size:2em" data-bs-toggle="tooltip"
                                                                      data-bs-placement="bottom"
                                                                      title="Drag up & down "></i></a>
                                                            </div>
                                                            <div class="col-11">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-4">
                                                                        <div class="card" style="max-width: 340px;">
                                                                            <div class="col-md-12">
                                                                                <a href="" data-bs-toggle="modal"
                                                                                   data-bs-target="#mediaModal">
                                                                                    <img class="img-fluid rounded"
                                                                                         id="media-preview-1"
                                                                                         style="width:100%; height:13em; object-fit:cover;"
                                                                                         src="{{ asset('/img/ad/nomedia.png') }}">
                                                                                    <div class="media-inputs">
                                                                                        <input type="hidden"
                                                                                               name="media[]"
                                                                                               class="media-preview-1">
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6 col-sm-4">
                                                                        <label for="minutes" class="col-form-label">{{ __('Minutes') }}</label>
                                                                        <input type="number" name="minutes[]"
                                                                               class="form-control"
                                                                               id="minutes" placeholder="3 m" min="0"
                                                                               required="true">
                                                                    </div>
                                                                    <div class="col-6 col-sm-4">
                                                                        <label for="seconds" class="col-form-label">{{ __('Seconds') }}</label>
                                                                        <input type="number" name="seconds[]"
                                                                               class="form-control"
                                                                               id="seconds" placeholder="50 s" min="0"
                                                                               required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <a id="remove-media-to-sequence-btn" type="button"
                                                           class="col-12 col-md-5 btn btn-ghost btn-dark" style="margin: 0.6em">
                                                            <i class="iconly-Light-Delete" style="font-size:2em"
                                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                               title="Delete Slot from Sequence"></i>
                                                        </a>
                                                        <a id="add-media-to-sequence-btn" type="button"
                                                           class="col-12 col-md-5  btn btn-ghost btn-dark" style="margin: 0.6em">
                                                            <i class="iconly-Light-Plus" style="font-size:2em"
                                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                               title="Add Slot to Sequence"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-24 mb-12"></div><!--Dividers-->
                                            <!--Sequence Settings--->
                                            <h5 class="modal-title" id="newfoldermodalLabel">Sequence Settings:</h5>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="sequence_name" class="col-form-label">{{ __('Sequence Name') }}</label>
                                                    <input type="text" name="sequence_name" class="form-control"
                                                           id="sequence_name" required="true">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label for="sequence_start_date" class="col-form-label">{{ __('Sequence Start') }}</label>
                                                    <input type="date" name="sequence_start_date" class="form-control"
                                                           id="sequence_start_date" required="true">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label for="sequence_end_date" class="col-form-label">{{ __('Sequence End') }}</label>
                                                    <input type="date" name="sequence_end_date" class="form-control"
                                                           id="sequence_end_date" required="true">
                                                </div>
                                                <div class="col-12">
                                                    <label for="folder_name" class="col-form-label">{{ __('Repeat Time') }}</label>
                                                    <div class="row" style="margin-left: 1em">
                                                        <div class="col-12 col-md-3 form-check">
                                                            <label class="form-check-label" for="1">
                                                                Sunday</label>
                                                            <input class="form-check-input" name="days[]"
                                                                   type="checkbox" value="1" id="1">
                                                        </div>
                                                        <div class="col-12 col-md-3 form-check">
                                                            <label class="form-check-label" for="2">
                                                                Monday</label>
                                                            <input class="form-check-input" name="days[]"
                                                                   type="checkbox" value="2" id="2">
                                                        </div>
                                                        <div class="col-12 col-md-3 form-check">
                                                            <label class="form-check-label" name="days[]" for="3">
                                                                Tuesday</label>
                                                            <input class="form-check-input" name="days[]"
                                                                   type="checkbox" value="3" id="3">
                                                        </div>
                                                        <div class="col-12 col-md-3 form-check">
                                                            <label class="form-check-label" for="4">
                                                                Wednesday</label>
                                                            <input class="form-check-input" name="days[]"
                                                                   type="checkbox" value="4" id="4">
                                                        </div>
                                                        <div class="col-12 col-md-3 form-check">
                                                            <label class="form-check-label" for="5">
                                                                Thursday</label>
                                                            <input class="form-check-input" name="days[]"
                                                                   type="checkbox" value="5" id="5">
                                                        </div>
                                                        <div class="col-12 col-md-3 form-check">
                                                            <label class="form-check-label" for="6">
                                                                Friday</label>
                                                            <input class="form-check-input" name="days[]"
                                                                   type="checkbox" value="6" id="6">
                                                        </div>
                                                        <div class="col-12 col-md-3 form-check">
                                                            <label class="form-check-label" for="7">
                                                                Saturday</label>
                                                            <input class="form-check-input" name="days[]"
                                                                   type="checkbox" value="7" id="7">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-24 mb-12"></div><!--Dividers-->
                                                <div class="row align-items-center justify-content-between">
                                                    <div class="col hp-flex-none w-auto"></div>
                                                    <div class="col hp-flex-none w-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                   id="run-for-ever-switch" name="run_for_ever">
                                                            <label class="form-check-label" for="run-for-ever-switch">
                                                                <span class="ms-12">{{ __('Run forever ♾️') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!--End of Sequence Settings--->
                                        </div>
                                        <div class="mt-24 mb-12"></div><!--Dividers-->
                                        <div class="modal-footer">
                                            <button type="button" id="sequence-submit-id" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!--End of Create New Sequence-->
                            <div class="row">
                                <!--Sequence Card-->
                                @if(count($sequences) === 0)
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="row d-flex justify-content-center"
                                                 style="margin-top: 4em; margin-bottom:4em;">
                                                <img src="{{ asset('assets/img/illustrations/empty-groups.svg') }}"
                                                     style="height:8em">
                                                <h5 style="text-align: center; margin-top: 2em;">there are no sequences!</h5>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach($sequences as $sequence)
                                    @if($sequence->name != "Default Sequence")
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4" style="margin: 1em 0em 1em">
                                            <div class="card hp-card-1 border border-black-60">
                                                <div class="card-body py-16">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row align-items-center justify-content-between">
                                                                <div class="col hp-flex-none w-auto">
                                                                <span class="badge bg-primary-4 hp-bg-dark-primary text-primary hp-text-color-dark-primary-2 border-none w-auto py-4 fw-medium"
                                                                    style="margin-bottom: 1em">Sequence</span>
                                                                </div>
                                                                <div class="col hp-flex-none w-auto">
                                                                    @if($sequence->status == 'Ready' || $sequence->status == 'ready')
                                                                        <span class="badge bg-success-4 hp-bg-dark-success text hp-text-color-dark-success-2 border-success w-auto py-4 fw-medium"
                                                                                style="margin-bottom: 1em">
                                                                <strong>{{ucfirst($sequence->status)}}</strong>
                                                                        @elseif($sequence->status == 'live' || $sequence->status == 'Live')
                                                                        <span class="badge bg-danger-4 hp-bg-dark-danger text hp-text-color-dark-danger-2 border-danger w-auto py-4 fw-medium"
                                                                                style="margin-bottom: 1em">
                                                                    <strong>{{ucfirst($sequence->status)}}</strong>
                                                                        </span>

                                                                        @else
                                                                        <span class="badge bg-dark-4 hp-bg-dark-dark text hp-text-color-dark-dark-2 border-dark w-auto py-4 fw-medium"
                                                                                 style="margin-bottom: 1em">
                                                                <strong>{{ucfirst($sequence->status)}}</strong>
                                                                        @endif
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <i class="ri-clapperboard-line text-primary me-8"
                                                                   style="font-size: 24px;"></i>
                                                                <h4 class="mb-0">{{$sequence->name}}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row align-items-center justify-content-between">
                                                                <div class="col-12 hp-flex-none w-auto">
                                                                    <div class="avatar-group">
                                                                        @php
                                                                            $unit = null;
                                                                            $allSequenceTime = \App\Models\Sequence::getSequenceMedia(auth()->user()->id, $sequence->id)->sum('minutes') * 60 +\App\Models\Sequence::getSequenceMedia(auth()->user()->id, $sequence->id)->sum('seconds');
                                                                            if($allSequenceTime >= 60){
                                                                                $allSequenceTime /=  60;
                                                                                $unit = ' min';
                                                                            } else {
                                                                                $unit = ' sec';
                                                                            }
                                                                            $allSequenceTime = round($allSequenceTime, 3)
                                                                        @endphp
                                                                        <strong></strong>
                                                                        <h5 class="text-primary">
                                                                            {{$allSequenceTime}} {{$unit}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col hp-flex-none w-auto">
                                                                    <a href="{{route('media_owner.edit_sequence', $sequence->id)}}">
                                                                        <button type="button"
                                                                                class="btn btn-link text-black-100 hp-hover-text-color-primary-3 p-0 bg-transparent">
                                                                                <span>Edit Sequence</span>
                                                                                <i class="ri-arrow-right-s-line remix-icon"></i>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        
                                    @endif
                                        <!--End of Sequence Card-->
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>












        <!-- Add media Modal -->
        <div class="modal fade" id="mediaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">My Media</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb" id="treepath">
                                    <li class="breadcrumb-item"><a href="">media</a></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row media-tree">
                            @if(count($medias) == 0)
                                <!--Empty Media -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="row d-flex justify-content-center"
                                             style="margin-top: 4em; margin-bottom:4em;">
                                            <img src="{{ asset('assets/img/illustrations/empty-search.svg') }}"
                                                 style="height:8em">
                                            <h5 style="text-align: center; margin-top: 2em;">There are no media yat! go
                                                to
                                                <a href="{{ route('MOmedia') }}" class="tooltip-test"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top" title="click to media page "><strong>media
                                                        page</strong></a> to add media
                                            </h5>
                                        </div>
                                    </div>
                                </div><!--End of Empty Media -->
                            @else
                                @foreach($folders as $folder)
                                    <div class="col-6 col-md-3 ">
                                        <a href=""
                                           id="{{$folder->id}}"
                                           class="d-flex align-items-center justify-content-between flex-column files">
                                            <i class="ri-folder-fill hp-text-color-primary-2 folders"
                                               style=" font-size: 10em;"></i>
                                            <h6 class="d-inline-block text-truncate">{{$folder->name}}</h6>
                                        </a>
                                    </div>
                                @endforeach
                                @foreach($medias as $media)
                                    @foreach($media as $record)
                                        <div class="col-6 col-md-3" style="margin-top:1em">
                                            <div class="hp-select-box-item">
                                                <input type="radio" name="media[]" value="{{$record->id}}"
                                                       id="media{{$record->id}}" hidden="">
                                                <label class="d-block hp-cursor-pointer" for="media{{$record->id}}">
                                                    <div class="card card-body" style="padding: 0.2em">
                                                        @if($record->type == 'image')
                                                            <img id="media-{{$record->id}}"
                                                                 src="{{$record->thumbnail_media_path ?? $record->media_aws_s3_url ?? asset('storage/' . $record->path)}}"
                                                                 alt="{{$record->name}}"
                                                                 style="  width:100%; height:7em; object-fit:cover;">
                                                            <h6 class="d-inline-block text-truncate">{{$record->name}}</h6>
                                                        @elseif($record->type == 'video')
                                                            <i class="iconly-Light-Play hp-text-color-primary-4"
                                                               style="font-size: 3em; position:absolute; top:25%; left:35%"></i>
                                                            <video width="100%"
                                                                   style="  width:100%; height:7em; object-fit:cover;"
                                                                   id="media-{{$record->id}}"
                                                                   poster="{{$record->thumbnail_media_path}}">
                                                                <source src="{{$record->video_path ?? $record->media_aws_s3_url ?? asset('storage/' . $record->path)}}"
                                                                        alt="{{$record->name}}" type="video/mp4">
                                                            </video>
                                                            <h6 class="d-inline-block text-truncate">{{$record->name}}</h6>
                                                        @endif
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                    @endforeach
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="save-media-id">Add
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- End of Add media Modal -->

        <!-- Sequence Details Modal -->


        @foreach($sequences as $sequence)
            <div class="modal fade" id="SequenceDetailModal{{$sequence->id}}" data-bs-backdrop="static"
                 data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{$sequence->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div><strong>Sequence Status:</strong>
                                <strong class="text-primary">{{ucfirst($sequence->status)}}</strong>
                            </div>
                            <div class="mt-24 mb-12"></div><!--Dividers-->
                            <form action="{{route('media_owner.update_sequence', $sequence->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <ul class="list-group" id="list">
                                        <div class="list-group-item list-group-item-action active" aria-current="true">
                                            <div class="row">
                                                <h4 class="col-8" style="margin-top: 0.5em">Sequence Content</h4>
                                                <a id="modal-remove-media-slot-btn-{{$sequence->id}}"
                                                   onclick="removeMediaCeil({{$sequence->id}})" type="button"
                                                   class="col-2 btn btn-primary">
                                                    <i class="iconly-Light-Delete" style="font-size:2em"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="Delete Slot from Sequence"></i>
                                                </a>
                                                <a id="modal-add-media-slot-btn-{{$sequence->id}}"
                                                   onclick="addMediaCeil({{$sequence->id}})" type="button"
                                                   class="col-2 btn btn-primary">
                                                    <i class="iconly-Light-Plus" style="font-size:2em"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="Add Slot to Sequence"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="modal-list-media-{{$sequence->id}}" class="rounded-bottom">
                                            <!--Sequence Slot-->
                                            @foreach(\App\Models\Sequence::getSequenceMediaInfo($sequence->id) as $record)
                                                <li class="list-group-item" data-id="{{$record->order}}">
                                                    <div class="row">
                                                        <div class="col-1" style="margin-top: 1em;">
                                                            <a><i class="ri-arrow-up-down-fill" style="font-size:2em"
                                                                  data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                  title="Drag up & down "></i></a>
                                                        </div>
                                                        <div class="col-11">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-4">
                                                                    <div class="card" style="max-width: 340px;">
                                                                        <div class="col-md-12">
                                                                            <a href="" data-bs-toggle="modal"
                                                                               data-bs-target="#mediaModal">
                                                                                <img id="modal-media-preview-1"
                                                                                     src="{{$record->thumbnail_media_path ?? $record->media_aws_s3_url ?? asset('/storage/' . $record->path) }}"
                                                                                     class="img-fluid rounded">
                                                                                <div class="media-inputs">
                                                                                    <input type="hidden" name="media[]"
                                                                                           class="media-preview-1">
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-sm-4">
                                                                    <label for="minutes"
                                                                           class="col-form-label">Minutes</label>
                                                                    <input type="number" name="minutes[]"
                                                                           class="form-control"
                                                                           id="minutes" placeholder="3 m" min="0"
                                                                           value="{{$record->minutes}}"
                                                                           required="true">
                                                                </div>
                                                                <div class="col-6 col-sm-4">
                                                                    <label for="seconds"
                                                                           class="col-form-label">Seconds</label>
                                                                    <input type="number" name="seconds[]"
                                                                           class="form-control"
                                                                           id="seconds" placeholder="50 s" min="0"
                                                                           value="{{$record->seconds}}"
                                                                           required="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li><!--End of Sequence Slot-->
                                            @endforeach
                                        </div>
                                    </ul>
                                    <div class="mt-24 mb-12"></div><!--Dividers-->
                                    <!--Sequence Settings--->
                                    <h5 class="modal-title" id="newfoldermodalLabel">Sequence Settings:</h5>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="sequence_name" class="col-form-label">Sequence Name</label>
                                            <input type="text" name="sequence_name" class="form-control"
                                                   id="sequence_name" required="true" value="{{$sequence->name}}">
                                        </div>
                                        <div class="col-6">
                                            <label for="sequence_start_date" class="col-form-label">Sequence
                                                Start</label>
                                            <input type="date" name="sequence_start_date" class="form-control"
                                                   id="sequence_start_date" required="true"
                                                   value="{{$sequence->start_date}}">
                                        </div>
                                        <div class="col-6">
                                            <label for="sequence_end_date" class="col-form-label">Sequence End</label>
                                            <input type="date" name="sequence_end_date" class="form-control"
                                                   id="sequence_end_date" required="true"
                                                   value="{{$sequence->end_date ?? ''}}" {{is_null($sequence->end_date) ? 'disabled' : ''}}
                                            >
                                        </div>
                                        <div class="col-12">
                                            <label for="folder_name" class="col-form-label">Repeat Time</label>
                                            <div class="row" style="margin-left: 1em">
                                                @foreach(\App\Models\Sequence::getSequenceDays($sequence->id) as $record)
                                                    <div class="col-12 col-md-3 form-check">
                                                        <label class="form-check-label" for="">
                                                            {{$record->name}}</label>
                                                        <input class="form-check-input" name="days[]"
                                                               type="checkbox" value="{{$record->sequence_day_id}}"
                                                               id="sequence-{{$sequence->id}}-day-{{$record->id}}"
                                                               checked>
                                                    </div>
                                                @endforeach
                                                @foreach(\App\Models\Sequence::getSequenceDaysNotInSequence($sequence->id) as $record)
                                                    <div class="col-12 col-md-3 form-check">
                                                        <label class="form-check-label" for="">
                                                            {{$record->name}}</label>
                                                        <input class="form-check-input" name="days[]"
                                                               type="checkbox" value="{{$record->id}}"
                                                               id="sequence-{{$sequence->id}}-day-{{$record->id}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-24 mb-12"></div><!--Dividers-->
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col hp-flex-none w-auto"></div>
                                            <div class="col hp-flex-none w-auto">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                           id="sequence-{{$sequence->id}}-run-for-ever-switch"
                                                           name="sequence-{{$sequence->id}}-run-for-ever-switch"
                                                            {{$sequence->run_for_ever ? 'checked' : ''}}
                                                    >
                                                    <label class="form-check-label"
                                                           for="sequence-{{$sequence->id}}-run-for-ever-switch">
                                                        <span class="ms-12">Run forever ♾️</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!--End of Sequence Settings--->
                                </div>
                                <div class="mt-24 mb-12"></div><!--Dividers-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-ghost btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deletemodal-{{$sequence->id}}">Delete this Sequence
                                    </button>
                                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"
                                            data-bs-dismiss="modal">Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- Sequence Details Modal -->
        @endforeach

        <!-- Delete Modal -->

        @foreach($sequences as $sequence)
            <div class="modal fade" id="deletemodal-{{$sequence->id}}" data-bs-backdrop="static"
                 data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="deletemodalLabel-{{$sequence->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletemodalLabel-{{$sequence->id}}">Sequence Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('media_owner.delete_sequence', $sequence->id)}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="sequence-name-{{$sequence->id}}" class="col-form-label">Write down
                                        <strong>{{$sequence->name}}</strong></label>
                                    <input type="text" name="sequence-name" class="form-control"
                                           id="sequence-name-{{$sequence->id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div><!-- End ofDelete Modal -->
        @endforeach
</x-media_owner.layout>
