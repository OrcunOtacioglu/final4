<table id="zoneTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th class="text-center">Image</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($zones as $zone)
        <tr>
            <td>{{ $zone->name }}</td>
            <td class="text-center">
                <img src="{{ env('APP_URL') }}/img/zone-images/thumbnails/{{ $zone->name }}.png" alt="" class="img-fluid img-thumbnail">
            </td>
            <td>
                <div class="row">
                    <a href="{{ action('ZoneController@edit', ['id' => $zone->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('ZoneController@generateSeats', ['id' => $zone->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit"
                                class="btn btn-sm btn-icon btn-flat btn-default"
                                data-toggle="tooltip"
                                data-original-title="Generate Seats">
                            <i class="icon ti-ruler-pencil text-primary"></i>
                        </button>
                    </form>
                    <form action="{{ action('ZoneController@getBackup', ['id' => $zone->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit"
                                class="btn btn-sm btn-icon btn-flat btn-default"
                                data-toggle="tooltip"
                                data-original-title="Backup Zone">
                            <i class="icon ti-save text-info"></i>
                        </button>
                    </form>
                    <form action="{{ action('ZoneController@destroy', ['id' => $zone->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit"
                                class="btn btn-sm btn-icon btn-flat btn-default"
                                data-toggle="tooltip"
                                data-original-title="Delete"
                        >
                            <i class="icon ti-trash text-danger" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>