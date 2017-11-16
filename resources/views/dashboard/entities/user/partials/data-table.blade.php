<table id="customerTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Country</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->country }}</td>
            <td>
                <div class="row">
                    <a href="{{ action('UserController@edit', ['id' => $customer->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('UserController@destroy', ['id' => $customer->id]) }}" method="POST">
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