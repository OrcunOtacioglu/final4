<table id="rateTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Name</th>
        <th class="text-center">Price</th>
        <th class="text-center">Available Online</th>
        <th class="text-center">Available Box Office</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rates as $rate)
        <tr>
            <td>{{ $rate->name }}</td>
            <td class="text-center">{{ $rate->price }}€</td>
            <td class="text-center">
                <i class="icon wb-power {{ $rate->available_online == true ? 'text-success' : 'text-danger' }}"></i>
            </td>
            <td class="text-center">
                <i class="icon wb-power {{ $rate->available_box_office == true ? 'text-success' : 'text-danger' }}"></i>
            </td>
            <td>
                <div class="row">
                    <a href="{{ action('RateController@edit', ['id' => $rate->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('RateController@destroy', ['id' => $rate->id]) }}" method="POST">
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