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
                        <a href="{{ action('ZoneController@edit', ['id' => $zone->id]) }}" class="text-muted">Edit</a>
                        <a href="#" class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop