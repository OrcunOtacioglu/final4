<table id="hotelTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th class="text-center">Availability</th>
        <th class="text-center">Online Availablity</th>
        <th class="text-center">Offline Availability</th>
        <th class="text-center">Is Available Online?</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($hotels as $hotel)
        <tr>
            <td>{{ $hotel->name }}</td>
            <td class="text-center">{{ $hotel->total_availability }}</td>
            <td class="text-center">{{ $hotel->online_availabilty }}</td>
            <td class="text-center">{{ $hotel->box_office_availabilty }}</td>
            <td class="text-center">
                <i class="icon wb-power {{ $hotel->available_online == true ? 'text-success' : 'text-danger' }}"></i>
            </td>
            <td>
                <div class="row">
                    <a href="{{ action('HotelController@edit', ['id' => $hotel->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('HotelController@destroy', ['id' => $hotel->id]) }}" method="POST">
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