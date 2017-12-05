<table id="bookingTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Reference</th>
        <th class="text-center">User</th>
        <th class="text-center">Cost</th>
        <th class="text-center">Profit</th>
        <th class="text-center">Offer</th>
        <th class="text-center">Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->reference }}</td>
            <td class="text-center">{{ $booking->user->name . ' ' . $booking->user->surname }}</td>
            <td class="text-center text-danger">{{ \Acikgise\Helpers\Helpers::formatMoney($booking->cost) }}</td>
            <td class="text-center text-success">{{ \Acikgise\Helpers\Helpers::formatMoney($booking->profit) }}</td>
            <td class="text-center">{{ \Acikgise\Helpers\Helpers::formatMoney($booking->offer) }}</td>
            <td class="text-center">{{ $booking->status == 0 ? 'Pending' : 'Converted' }}</td>
            <td>
                <div class="row">
                    <a href="{{ action('BookingController@edit', ['reference' => $booking->reference]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('BookingController@destroy', ['id' => $booking->id]) }}" method="POST">
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