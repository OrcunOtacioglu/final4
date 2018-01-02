<table id="eventTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th class="text-center">Slug</th>
        <th class="text-center">Status</th>
        <th class="text-center">Category</th>
        <th class="text-center">Sales Start</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td>{{ $event->name }}</td>
            <td class="text-center">{{ $event->slug }}</td>
            <td class="text-center">
                <i class="icon wb-power {{ $event->status == 1 ? 'text-success' : 'text-warning' }}"></i>
            </td>
            <td class="text-center">{{ $event->category }}</td>
            <td class="text-center">{{ $event->on_sale_date }}</td>
            <td>
                <div class="row">
                    <a href="{{ action('EventController@edit', ['id' => $event->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('EventController@destroy', ['id' => $event->id]) }}" method="POST">
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