@extends('dashboard.base')

@section('title', 'Create Event')

@section('custom.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('EventController@store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                        <!-- End Event Name -->
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Event SLUG -->
                                        <div class="form-group">
                                            <label for="slug">URL Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Can be left blank if the event-title is unique.">
                                        </div>
                                        <!-- End Event Slug -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Event Description -->
                                        <div class="form-group">
                                            <label for="description">Event Description</label>
                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
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
                                                <input type="text" name="start_date" id="start_date" class="form-control dateTime">
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
                                                <input type="text" name="end_date" id="end_date" class="form-control dateTime">
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
                                                <input type="text" name="on_sale_date" id="on_sale_date" class="form-control dateTime">
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
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
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
                                                    <option value="{{ $seatMap->id }}">{{ $seatMap->name }}</option>
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
                                        <option value="1">Sport</option>
                                        <option value="2">Festival</option>
                                    </select>
                                </div>
                                <!-- End Event Category -->
                                <!-- Event Status -->
                                <div class="form-group">
                                    <label for="status">Event Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">Draft</option>
                                        <option value="1">Published</option>
                                    </select>
                                </div>
                                <!-- End Event Status -->
                                <!-- Event Listing -->
                                <div class="form-group">
                                    <label for="listing">Event Listing</label>
                                    <select name="listing" id="listing" class="form-control">
                                        <option value="1">Public</option>
                                        <option value="0">Private</option>
                                    </select>
                                </div>
                                <!-- End Event Listing -->
                                <!-- Allow Only Ticket Purchase -->
                                <div class="form-group">
                                    <label for="allow_only_ticket_purchase">Allow Only Ticket Purchase?</label>
                                    <select name="allow_only_ticket_purchase" id="allow_only_ticket_purchase" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <!-- End Allow Only Ticket Purchase -->
                                <!-- Event Photo -->
                                <img src="http://via.placeholder.com/350x150" alt="" class="img-thumbnail">

                                <div class="form-group">
                                    <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                        <input type="text" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <i class="icon wb-upload"></i>
                                                <input type="file" name="cover_photo" id="cover_photo">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <!-- End Event Photo -->

                                <input type="submit" class="btn btn-success" value="Create">
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