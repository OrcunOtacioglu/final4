@extends('dashboard.base')

@section('title')
    Edit {{ $event->name }}
@stop

@section('custom.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('EventController@update', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <!-- General Event Details -->
                    <div class="col-md-8">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h3 class="panel-title">General Event Details</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <!-- Event Name -->
                                        <div class="form-group">
                                            <label for="name">Event Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $event->name }}">
                                        </div>
                                        <!-- End Event Name -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Event SLUG -->
                                        <div class="form-group">
                                            <label for="slug">URL Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" value="{{ $event->slug }}">
                                        </div>
                                        <!-- End Event Slug -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Event Description -->
                                        <div class="form-group">
                                            <label for="description">Event Description</label>
                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $event->description }}</textarea>
                                        </div>
                                        <!-- End Event Description -->
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Event Start Date -->
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
                                    <!-- End Event Start Date -->
                                    <!-- Event End Date -->
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
                                    <!-- End Event End Date -->
                                    <!-- Event OnSale Date -->
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
                                    <!-- End Event OnSale Date -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Event Seated or Not -->
                                        <div class="form-group">
                                            <label for="is_seated">Is Seated</label>
                                            <select name="is_seated" id="is_seated" class="form-control">
                                                <option value="0" {{ $event->is_seated == 0 ? 'selected' : ''}}>No</option>
                                                <option value="1" {{ $event->is_seated == 1 ? 'selected' : ''}}>Yes</option>
                                            </select>
                                        </div>
                                        <!-- End Event Seated or Not -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seat_map_id">Choose SeatMap If Seated</label>
                                            <select name="seat_map_id" id="seat_map_id" class="form-control">
                                                <option value="">Choose SeatMap</option>
                                                @foreach($seatMaps as $seatMap)
                                                    <option value="{{ $seatMap->id }}"
                                                        {{ $event->seat_map_id == $seatMap->id
                                                                ? 'selected'
                                                                : ''}}>
                                                        {{ $seatMap->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End General Event Details -->
                    <!-- Event Info -->
                    <div class="col-md-4">
                        <div class="panel panel-primary panel-line">
                            <div class="panel-heading">
                                <h3 class="panel-title">Event Info</h3>
                            </div>
                            <div class="panel-body">
                                <!-- Event Category -->
                                <div class="form-group">
                                    <label for="category">Event Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                        <option value="1" {{ $event->category == 1 ? 'selected' : ''}}>Sport</option>
                                        <option value="2" {{ $event->category == 2 ? 'selected' : ''}}>Festival</option>
                                    </select>
                                </div>
                                <!-- End Event Category -->
                                <!-- Event Status -->
                                <div class="form-group">
                                    <label for="status">Event Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0" {{ $event->status == 0 ? 'selected' : ''}}>Draft</option>
                                        <option value="1" {{ $event->status == 1 ? 'selected' : ''}}>Published</option>
                                    </select>
                                </div>
                                <!-- End Event Status -->
                                <!-- Event Listing -->
                                <div class="form-group">
                                    <label for="listing">Event Listing</label>
                                    <select name="listing" id="listing" class="form-control">
                                        <option value="1" {{ $event->listing == 1 ? 'selected' : ''}}>Public</option>
                                        <option value="0" {{ $event->listing == 0 ? 'selected' : ''}}>Private</option>
                                    </select>
                                </div>
                                <!-- End Event Listing -->
                                <!-- Allow Only Ticket Purchase -->
                                <div class="form-group">
                                    <label for="allow_only_ticket_purchase">Allow Only Ticket Purchase?</label>
                                    <select name="allow_only_ticket_purchase" id="allow_only_ticket_purchase" class="form-control">
                                        <option value="0" {{ $event->allow_only_ticket_purchase == 0 ? 'selected' : ''}}>No</option>
                                        <option value="1" {{ $event->allow_only_ticket_purchase == 1 ? 'selected' : ''}}>Yes</option>
                                    </select>
                                </div>
                                <!-- End Allow Only Ticket Purchase -->
                                <!-- Event Photo -->
                                <img src="/img/cover-photos/{{ $event->cover_photo }}" alt="" class="img-thumbnail">

                                <div class="form-group">
                                    <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                        <input type="text" class="form-control" readonly value="{{ $event->cover_photo }}">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <i class="icon wb-upload"></i>
                                                <input type="file" name="cover_photo" id="cover_photo">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <!-- End Event Photo -->

                                <input type="submit" class="btn btn-success" value="Update">
                                <a href="{{ action('EventController@index') }}" class="text-muted">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Event Info -->
                </div>
            </form>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/dashboard/plugins/input-group-file.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('.dateTime', {
            enableTime: 1
        });
    </script>
@stop