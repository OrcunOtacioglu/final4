@if($hotel->rooms->count() == 0)
    <div class="alert alert-info" role="alert">
        There are no rooms to show!
    </div>
@else
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Availability</th>
            <th scope="col">Type</th>
            <th scope="col" class="text-nowrap">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($hotel->rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->availability }}</td>
                <td>{{ $room->type }}</td>
                <td class="text-nowrap">
                    <div class="row">
                        <a href="{{ action('HotelRoomController@edit', ['id' => $room->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                            <i class="icon ti-pencil"></i>
                        </a>
                        <form action="{{ action('HotelRoomController@destroy', ['id' => $room->id]) }}" method="POST">
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
@endif