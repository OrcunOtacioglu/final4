<table id="seatMapTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th class="text-center">Venue</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($seatmaps as $seatmap)
        <tr>
            <td>{{ $seatmap->venue->name }}</td>
            <td>
                <div class="row">
                    <a href="{{ action('SeatMapController@edit', ['id' => $seatmap->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('SeatMapController@destroy', ['id' => $seatmap->id]) }}" method="POST">
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