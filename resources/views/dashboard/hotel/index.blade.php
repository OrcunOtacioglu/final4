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
                <th scope="col">Availabilty</th>
                <th scope="col">Online Availability</th>
                <th scope="col">Offline Availabilty</th>
                <th scope="col">Is Available Online?</th>
                <th scope="col" class="text-nowrap">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->total_availabity }}</td>
                    <td>{{ $hotel->online_availability }}</td>
                    <td>{{ $hotel->box_office_availability }}</td>
                    <td>{{ $hotel->available_online }}</td>
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