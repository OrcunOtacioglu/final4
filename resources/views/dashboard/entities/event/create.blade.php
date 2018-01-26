@extends('layouts.dashboard')

@section('title', 'Create New Event')

@section('custom.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('container.type', 'container')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('EventController@store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <!-- Basic Information Setup -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary panel-line dashboard-panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Basic Information</h3>
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Event Name -->
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Make it a short and catchy title">
                                        </div>
                                        <!-- End Event Name -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Event Description -->
                                        <div class="form-group">
                                            <label for="description" class="mb-0">Description</label>
                                            <span class="text-help m-0">This description will appear on the event listing page.</span>
                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <!-- End Event Description -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="contact" class="mb-0">Contact details</label>
                                            <span class="text-help m-0">Your contact information is kept private and shown only to attendees who book a ticket.</span>
                                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter an email address or phone number">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Event Category -->
                                        <div class="form-group">
                                            <label for="category">Add a category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="">Select Category</option>
                                                <option value="1">Sport</option>
                                                <option value="2">Festival</option>
                                            </select>
                                        </div>
                                        <!-- End Event Category -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Event Listing -->
                                        <div class="form-group">
                                            <label for="listing">Who can see the event?</label>
                                            <select name="listing" id="listing" class="form-control">
                                                <option value="1">Public</option>
                                                <option value="0">Private</option>
                                            </select>
                                        </div>
                                        <!-- End Event Listing -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Allow Only Ticket Purchase -->
                                        <div class="form-group">
                                            <label for="allow_only_ticket_purchase">Allow only ticket purchase?</label>
                                            <select name="allow_only_ticket_purchase" id="allow_only_ticket_purchase" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <!-- End Allow Only Ticket Purchase -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Event Status -->
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="0">Draft</option>
                                                <option value="1">Published</option>
                                            </select>
                                        </div>
                                        <!-- End Event Status -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Basic Information Setup -->

                <!-- Rate Setup -->
                <div class="row">
                    <!-- Event Info -->
                    <div class="col-md-12">
                        <div class="panel panel-primary panel-line dashboard-panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">What tickets will be available?</h3>
                            </div>
                            <div class="panel-body">
                                <div class="rate-addition text-center">
                                    <button type="button" class="btn btn-outline-primary background-white">
                                        <i class="icon wb-plus" aria-hidden="true"></i> Add Paid Ticket
                                    </button>
                                    <button type="button" class="btn btn-outline-primary background-white">
                                        <i class="icon wb-plus" aria-hidden="true"></i> Add Free Ticket
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-light">
                                            <thead>
                                            <tr>
                                                <th>Ticket name</th>
                                                <th>Availability</th>
                                                <th>Cost</th>
                                                <th class="text-nowrap">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="rate" id="rate" placeholder="e.g. General Admission">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="qty" id="qty">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="price" id="price" placeholder="Cost">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-toolbar" aria-label="Toolbar with button groups" role="toolbar">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" class="btn btn-icon btn-pure btn-success">
                                                                <i class="icon ti-save" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-pure btn-default" data-toggle="collapse" data-target="#advancedSetup" aria-expanded="false" aria-controls="advancedRateSetup">
                                                                <i class="icon ti-settings" aria-hidden="true"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-pure btn-danger">
                                                                <i class="icon ti-trash color-red" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="collapse" id="advancedSetup">
                                                        <div class="card card-default">
                                                            <div class="card-block">
                                                                <p>
                                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson
                                                                    ad squid. Nihil anim keffiyeh helvetica, craft beer labore
                                                                    wes anderson cred nesciunt sapiente ea proident.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Event Info -->
                </div>
                <!-- End Rate Setup -->

                <!-- Location Setup -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary panel-line dashboard-panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">When and where is the event?</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <!-- Event Start Date -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="start_date">Event starts</label>
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
                                            <label for="end_date">Event ends</label>
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
                                            <label for="on_sale_date">Sales start</label>
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
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Event Seated or Not -->
                                        <div class="form-group">
                                            <label for="is_seated">Have seating map?</label>
                                            <select name="is_seated" id="is_seated" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <!-- End Event Seated or Not -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seat_map_id">Choose seatmap if seated</label>
                                            <select name="seat_map_id" id="seat_map_id" class="form-control">
                                                <option value="">Choose SeatMap</option>
                                                @foreach($seatMaps as $seatMap)
                                                    <option value="{{ $seatMap->id }}">{{ $seatMap->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">Host city</label>
                                            <input type="text" class="form-control" name="city" id="city">
                                        </div>

                                        <div class="form-group">
                                            <label for="country">Host country</label>
                                            <input type="text" class="form-control" name="country" id="country">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="longitude">Longitude</label>
                                                    <input type="text" class="form-control" name="longitude" id="longitude">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="latitude">Latitude</label>
                                                    <input type="text" class="form-control" name="latitude" id="latitude">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-help">Google maps placeholder</span>
                                        <img src="http://via.placeholder.com/500x330" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Location Setup -->
                <input type="submit" class="btn btn-success" value="Create">
                <a href="{{ action('EventController@index') }}" class="text-muted">Cancel</a>
            </form>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('admin/js/plugins/input-group-file.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('.dateTime', {
            enableTime: 1
        });
    </script>
@stop