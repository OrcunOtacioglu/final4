<table id="pageTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Title</th>
        <th class="text-center">Slug</th>
        <th class="text-center">Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
        <tr>
            <td>{{ $page->title }}</td>
            <td class="text-center">{{ $page->slug }}</td>
            <td class="text-center">
                <i class="icon wb-power {{ $page->status == true ? 'text-success' : 'text-danger' }}"></i>
            </td>
            <td>
                <div class="row">
                    <a href="{{ action('PageController@edit', ['id' => $page->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                        <i class="icon ti-pencil"></i>
                    </a>
                    <form action="{{ action('PageController@destroy', ['id' => $page->id]) }}" method="POST">
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