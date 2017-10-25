@extends('dashboard.base')

@section('title', 'Manage Rates')

@section('header.right')
    <a href="{{ action('RateController@create') }}" class="btn btn-secondary">Add Rate</a>
@stop

@section('content')
    @if($rates->count() == 0)
        <div class="alert alert-info" role="alert">
            There are no rates to show!
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Available</th>
                <th scope="col" class="text-nowrap">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rates as $rate)
                <tr>
                    <td>{{ $rate->name }}</td>
                    <td>{{ $rate->price }}</td>
                    <td>{{ $rate->available }}</td>
                    <td class="text-nowrap">
                        <a href="{{ action('RateController@edit', ['id' => $rate->id]) }}" class="text-muted">Edit</a>
                        <a href="#" class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop