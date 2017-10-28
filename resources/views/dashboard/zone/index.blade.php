@extends('dashboard.base')

@section('title', 'Manage Zones')

@section('header.right')
    <a href="{{ action('ZoneController@create') }}" class="btn btn-secondary">Add Zone</a>
@stop

@section('content')
    @if($zones->count() == 0)
        <div class="alert alert-info" role="alert">
            There are no zones to show!
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col" class="text-nowrap">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($zones as $zone)
                <tr>
                    <td>{{ $zone->name }}</td>
                    <td>
                        <img src="{{ $zone->image_path }}" alt="" class="img-fluid">
                    </td>
                    <td class="text-nowrap">
                        <a href="{{ action('ZoneController@edit', ['id' => $zone->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ action('ZoneController@generateSeats', ['id' => $zone->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-secondary">Generate Seats</button>
                        </form>
                        <form action="{{ action('ZoneController@destroy', ['id' => $zone->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop