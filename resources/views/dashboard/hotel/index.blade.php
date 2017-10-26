@extends('dashboard.base')

@section('header.right')
    <a href="{{ action('HotelController@create') }}" class="btn btn-secondary">Create Hotel</a>
@stop

@section('title', 'Manage Hotels')

@section('content')
    @if($hotels->count() == 0)
        <div class="alert alert-info" role="alert">
            There are no hotels to show!
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Stars</th>
                <th scope="col">Location</th>
                <th scope="col" class="text-nowrap">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->name }}</td>
                    <td>
                        <img src="{{ $hotel->media_path }}/1.jpg" alt="">
                    </td>
                    <td>{{ $hotel->stars }}</td>
                    <td>{{ $hotel->location }}</td>
                    <td class="text-nowrap">
                        <a href="{{ action('HotelController@edit', ['id' => $hotel->id]) }}" class="text-muted">Edit</a>
                        <a href="#" class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop