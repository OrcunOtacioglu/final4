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
                    <a href="{{ action('HotelRoomController@edit', ['id' => $room->id]) }}" class="text-muted">Edit</a>
                    <a href="#" class="text-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif