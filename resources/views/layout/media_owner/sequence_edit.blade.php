<x-media_owner.layout :name="$name">
    {{--    @section('components.media_owner.sidebar') --}}
    {{--        @section('active3', __('btn btn-primary-4')) --}}
    @section('components.media_owner.sidebar')
    @section('active3', __('btn btn-primary-4'))
    @section('active-txt-3', __('hp-text-color-primary-1'))
@endsection
<style>
    .highlight {
        background-color: #ebfafa !important;
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
                    </div>
                    <div class="mt-24 mb-12"></div>
                    <!--Dividers-->
                    <div class="card card-body mt-16">
                        <form action="{{ route('media_owner.update_sequence', $sequence->id) }}" method="post"
                            id="store-sequence-form" data-parsley-validate>
                            @csrf
                            <div class="row">
                                <div class="list-group" id="list">
                                    <div class="list-group-item list-group-item-action active" aria-current="true">
                                        <div class="row">
                                            <h4 class="col-8" style="margin-top: 0.5em">
                                                {{ __('Sequence Content') }}</h4>
                                            <a id="remove-media-to-sequence-btn" type="button"
                                                class="col-2 btn btn-primary" onclick="">
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
                                        @foreach (\App\Models\Sequence::getSequenceMediaInfo($sequence->id) as $record)
                                            <li class="list-group-item" id="{{ $record->order }}"
                                                data-id="{{ $record->order }}">
                                                <div class="row">
                                                    <div class="col-1 handle" style="margin-top: 1em;">
                                                        <a><i class="ri-arrow-up-down-fill" style="font-size:2em"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Drag up & down "></i></a>
                                                    </div>
                                                    <div class="col-11">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-2" hidden>
                                                                <label for="orders"
                                                                    class="col-form-label">Order</label>
                                                                <input type="number" class="form-control"
                                                                    id="orders" value="{{ $record->order }}"
                                                                    disabled>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <div class="card" style="max-width: 340px;">
                                                                    <div class="col-md-12">
                                                                        <a href="" data-bs-toggle="modal"
                                                                            data-bs-target="#mediaModal">
                                                                            @if ($record->type == 'image')
                                                                                <img class="img-fluid rounded"
                                                                                    id="modal-media-preview-{{ $record->order }}"
                                                                                    src="{{ $record->thumbnail_media_path ?? ($record->media_aws_s3_url ?? '/img/ad/nomedia.png') }}"
                                                                                    style="width:100%; height:13em; object-fit:cover;">
                                                                                <div class="media-inputs">
                                                                                    <input type="hidden"
                                                                                        id="{{ $record->media_id }}"
                                                                                        name="media[]"
                                                                                        value="{{ $record->media_id }}"
                                                                                        class="media-preview-{{ $record->order }}">
                                                                                </div>
                                                                            @elseif($record->type == 'video')
                                                                                <video loop width="100%"
                                                                                    id="media-{{ $record->id }}"
                                                                                    poster="{{ $record->thumbnail_media_path }}">
                                                                                    <source
                                                                                        src="{{ $record->video_path ?? ($record->media_aws_s3_url ?? asset('storage/' . $record->path)) }}"
                                                                                        alt="{{ $record->name }}"
                                                                                        type="video/mp4">
                                                                                </video>
                                                                                <div class="media-inputs">
                                                                                    <input type="hidden"
                                                                                        id="{{ $record->media_id }}"
                                                                                        name="media[]"
                                                                                        value="{{ $record->media_id }}"
                                                                                        class="media-preview-{{ $record->order }}">
                                                                                </div>
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-sm-4">
                                                                <label for="minutes"
                                                                    class="col-form-label">{{ __('Minutes') }}</label>
                                                                <input type="number" name="minutes[]"
                                                                    class="form-control" id="minutes"
                                                                    placeholder="3 m" min="0"
                                                                    value="{{ $record->minutes }}"
                                                                    data-parsley-range="[1, 60]"
                                                                    required="true">
                                                            </div>
                                                            <div class="col-6 col-sm-4">
                                                                <label for="seconds"
                                                                    class="col-form-label">{{ __('Seconds') }}</label>
                                                                <input type="number" name="seconds[]"
                                                                    class="form-control" id="seconds"
                                                                    placeholder="50 s" min="0"
                                                                    data-parsley-range="[1, 60]"
                                                                    value="{{ $record->seconds }}"
                                                                    required="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--End of Sequence Slot-->
                                        @endforeach
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
                                <div class="mt-24 mb-12"></div>
                                <!--Dividers-->
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="sequence_name"
                                            class="col-form-label">{{ __('Sequence Name') }}</label>
                                        <input type="text" name="sequence_name" class="form-control"
                                            id="sequence_name" data-parsley-maxlength="128" required="true" value="{{ $sequence->name }}">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="sequence_start_date"
                                            class="col-form-label">{{ __('Sequence Start') }}</label>
                                        <input type="date" name="sequence_start_date" class="form-control"
                                            id="sequence_start_date" required="true"
                                            value="{{ $sequence->start_date }}">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="sequence_end_date"
                                            class="col-form-label">{{ __('Sequence End') }}</label>
                                        <input type="date" name="sequence_end_date" class="form-control"
                                            id="sequence_end_date"
                                            {{ !is_null($sequence->end_date) ? 'required="true" ' : '' }}
                                            value="{{ $sequence->end_date ?? '' }}"
                                            {{ is_null($sequence->end_date) ? 'disabled' : '' }}>
                                    </div>
                                    <div class="col-12">
                                        <label for="folder_name"
                                            class="col-form-label">{{ __('Repeat Time') }}</label>
                                        <div class="row" style="margin-left: 1em">
                                            <div class="my_parsley_error_container"></div>

                                            @foreach (\App\Models\Sequence::getSequenceDays($sequence->id) as $record)
                                                <div class="col-12 col-md-3 form-check">
                                                    <label class="form-check-label" for="">
                                                        {{ $record->name }}</label>
                                                    <input class="form-check-input" name="days[]"
                                                    data-parsley-multiple="days"
                                                    data-parsley-mincheck="1" 
                                                    data-parsley-errors-container=".my_parsley_error_container" 
                                                    data-parsley-class-handler=".my_parsley_error_container"
                                                    data-parsley-required-message="The sequence should have day/days for repetition"
                                                    required
                                                        type="checkbox" value="{{ $record->sequence_day_id }}"
                                                        id="sequence-{{ $sequence->id }}-day-{{ $record->id }}"
                                                        checked>
                                                </div>
                                            @endforeach
                                            @foreach (\App\Models\Sequence::getSequenceDaysNotInSequence($sequence->id) as $record)
                                                <div class="col-12 col-md-3 form-check">
                                                    <label class="form-check-label" for="">
                                                        {{ $record->name }}</label>
                                                    <input class="form-check-input" name="days[]"
                                                    type="checkbox" value="{{ $record->id }}"
                                                    id="sequence-{{ $sequence->id }}-day-{{ $record->id }}"
                                                        data-parsley-multiple="days"
                                                        data-parsley-mincheck="1" 
                                                        data-parsley-errors-container=".my_parsley_error_container" 
                                                        data-parsley-class-handler=".my_parsley_error_container"
                                                        data-parsley-required-message="The sequence should have day/days for repetition"
                                                        required>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mt-24 mb-12"></div>
                                    <!--Dividers-->
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col hp-flex-none w-auto"></div>
                                        <div class="col hp-flex-none w-auto">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="sequence-{{ $sequence->id }}-run-for-ever-switch"
                                                    name="run_for_ever"
                                                    {{ $sequence->run_for_ever ? 'checked' : '' }}
                                                    onchange="removeSequenceEndValidation('#sequence-{{ $sequence->id }}-run-for-ever-switch')">
                                                <label class="form-check-label"
                                                    for="sequence-{{ $sequence->id }}-run-for-ever-switch">
                                                    <span class="ms-12">{{ __('Run forever ♾️') }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End of Sequence Settings--->
                            </div>
                            <div class="mt-24 mb-12"></div>
                            <!--Dividers-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-ghost btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deletemodal">{{ __('Delete this Sequence') }}
                                </button>
                                <button type="button" id="sequence-submit-id"
                                    class="btn btn-primary">{{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
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
                    @if (count($medias) == 0)
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
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="click to media page "><strong>media
                                                page</strong></a>
                                        to add media
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <!--End of Empty Media -->
                    @else
                        @foreach ($folders as $folder)
                            <div class="col-6 col-md-3 ">
                                <a href="" id="{{ $folder->id }}"
                                    class="d-flex align-items-center justify-content-between flex-column files">
                                    <i class="ri-folder-fill hp-text-color-primary-2 folders"
                                        style=" font-size: 10em;"></i>
                                    <h6 class="d-inline-block text-truncate">{{ $folder->name }}</h6>
                                </a>
                            </div>
                            @endforeach
                            @foreach($medias as $record)
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
                                                           style="width:100%; height:7em; object-fit:cover;"
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
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        id="save-media-id">{{ __('Add') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- End of Add media Modal -->


<div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deletemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletemodalLabel">{{ __('Sequence Name') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('media_owner.delete_sequence', $sequence->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="sequence-name" class="col-form-label">{{ __('Write down') }}
                            <strong>{{ $sequence->name }}</strong></label>
                        <input type="text" name="sequence-name" class="form-control" id="sequence-name">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div><!-- End ofDelete Modal -->
<script src="{{ asset('js\sequnce.js') }}"></script>
</x-media_owner.layout>
