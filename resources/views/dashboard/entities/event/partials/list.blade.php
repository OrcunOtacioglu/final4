@foreach($events as $event)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="/img/cover-photos/{{ $event->cover_photo }}" alt="" class="img-thumbnail">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{ $event->name }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted">{{ substr($event->description, 0, 150) }}...</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group" aria-label="Event Management" role="group">
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="icon wb-settings" aria-hidden="true"></i> Manage
                                        </button>
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="icon wb-pencil" aria-hidden="true"></i>Edit
                                        </button>
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="icon wb-trash" aria-hidden="true"></i>Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Quick Stats</h4>
                                    <p class="text-muted">
                                        <i class="icon wb-users"></i> 1207 Attendees
                                    </p>
                                    <p class="text-muted">
                                        <i class="icon ti-ticket"></i> 3750 Tickets Sold
                                    </p>
                                    <p class="text-muted">
                                        <i class="icon ti-money"></i> 357,750EUR Gross Sales
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach