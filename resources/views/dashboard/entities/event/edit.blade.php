@extends('dashboard.base')

@section('title', 'Edit Event')

@section('custom.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form action="{{ action('EventController@update', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Event Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $event->name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Event Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                        <option value="1"
                                            @if($event->category == 1)
                                                selected
                                            @endif>Sport</option>
                                        <option value="2"
                                            @if($event->category == 2)
                                            selected
                                            @endif>Festival</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="slug">URL Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $event->slug }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Event Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="0"
                                                    @if($event->status === 0)
                                                    selected
                                                    @endif>Draft</option>
                                                <option value="1"
                                                    @if($event->status === 1)
                                                    selected
                                                    @endif>Published</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="listing">Event Listing</label>
                                            <select name="listing" id="listing" class="form-control">
                                                <option value="1"
                                                    @if($event->listing === 1)
                                                    selected
                                                    @endif>Public</option>
                                                <option value="0"
                                                    @if($event->listing === 0)
                                                    selected
                                                    @endif>Private</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <img src="/img/cover-photos/{{ $event->cover_photo }}" alt="" class="img-thumbnail">

                                        <div class="form-group">
                                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                                <input type="text" class="form-control" readonly value="{{ $event->cover_photo }}">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-primary btn-file">
                                                        <i class="icon wb-upload"></i>
                                                        <input type="file" name="cover_photo" id="cover_photo" value="{{ $event->cover_photo }}">
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Event Description</label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $event->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <div class="input-group">
                                        <input type="text" name="start_date" id="start_date" class="form-control dateTime" value="{{ $event->start_date }}">
                                        <div class="input-group-addon">
                                            <i class="icon wb-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <div class="input-group">
                                        <input type="text" name="end_date" id="end_date" class="form-control dateTime" value="{{ $event->end_date }}">
                                        <div class="input-group-addon">
                                            <i class="icon wb-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="on_sale_date">On Sale Date</label>
                                    <div class="input-group">
                                        <input type="text" name="on_sale_date" id="on_sale_date" class="form-control dateTime" value="{{ $event->on_sale_date }}">
                                        <div class="input-group-addon">
                                            <i class="icon wb-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Create">
                        <a href="{{ action('EventController@index') }}" class="text-muted">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('.dateTime', {
            enableTime: 1
        });
    </script>
@stop