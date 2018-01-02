<table id="venueTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th class="text-center">City / Country</th>
        <th class="text-center">Longitude</th>
        <th class="text-center">Latitude</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($venues as $venue)
        <tr>
            <td>{{ $venue->name }}</td>
            <td class="text-center">{{ $venue->city }} | {{ $venue->country }}</td>
            <td class="text-center">{{ $venue->longitude }}</td>
            <td class="text-center">{{ $venue->latitude }}</td>
            <td>
                <div class="row">
                    <a href="{{ action('VenueController@edit', ['id' => $venue->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('VenueController@destroy', ['id' => $venue->id]) }}" method="POST">
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