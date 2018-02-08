@extends('layouts.dashboard')

@section('custom.meta')
    <meta name="event" content="{{ $event->id }}">
@stop

@section('title')
    Configure {{ $event->name }}
@stop

@section('custom.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/plugins/dropzone.css') }}">
@stop

@section('page-description')
    <p class="page-description mb-0">Step 2 - Configure Your Event</p>
@stop

@section('container.type', 'container')

@section('content')
    <step-two></step-two>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary panel-line dashboard-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Design your event</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="/dashboard/event/{{ $event->id }}/photo/category-map-photo" class="dropzone needsclick dz-clickable" id="category-map" enctype="multipart/form-data">
                                <div class="dz-message needsclick">
                                    <i class="icon-4x wb-upload"></i><br>
                                    Upload category mapping photo
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <form action="/dashboard/event/{{ $event->id }}/photo/cover_photo" class="dropzone needsclick dz-clickable" id="cover-photo">
                                <div class="dz-message needsclick">
                                    <i class="icon-4x wb-upload"></i><br>
                                    Upload cover photo for your event
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('.dateTime', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
    <script src="{{ asset('admin/js/plugins/dropzone.min.js') }}"></script>
    <script>
        Dropzone.options.categoryMap = {
            paramName: 'photo',
            maxFilesize: 2
        };
        Dropzone.options.coverPhoto = {
            paramName: 'photo',
            maxFilesize: 2
        }
    </script>
@stop