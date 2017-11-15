@extends('dashboard.base')

@section('title', 'Manage Rates')

@section('page-description')
    <p class="mb-0">This panel allows you to manage the settings for your rates.</p>
    <p class="mb-0">View, edit and delete rates or add new rate.</p>
@stop

@section('page-header')
    <a href="{{ action('RateController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New Rate" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New Rate</span>
    </a>
@stop

@section('content')
    @if($rates->count() == 0)
        <div class="alert alert-info" role="alert">
            There are no rates to show!
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Total Available</th>
                <th scope="col">Available Online</th>
                <th scope="col">Available Box Office</th>
                <th scope="col" class="text-nowrap">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rates as $rate)
                <tr class="text-center" style="border-left: 3px solid #{{ $rate->color_code }};">
                    <td>{{ $rate->name }}</td>
                    <td>{{ $rate->price }}</td>
                    <td>{{ $rate->available }}</td>
                    <td>
                        <i class="icon wb-power {{ $rate->available_online == true ? 'text-success' : 'text-danger' }}"></i>
                    </td>
                    <td>
                        <i class="icon wb-power {{ $rate->available_box_office == true ? 'text-success' : 'text-danger' }}"></i>
                    </td>
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