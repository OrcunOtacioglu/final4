@extends('dashboard.base')

@section('title', 'Manage Users')

@section('header.right')
    <a href="{{ action('UserController@create') }}" class="btn btn-dashboard">
        <i class="icon wb-plus-circle"></i> Add User
    </a>
@stop

@section('content')
    @if($customers->count() == 0)
        <div class="alert alert-info" role="alert">
            There are no customers to show!
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Country</th>
                <th scope="col" class="text-nowrap">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $user)
                <tr class="text-center">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->country }}</td>
                    <td class="text-nowrap">
                        <a href="{{ action('UserController@edit', ['id' => $user->id]) }}" class="text-muted">Edit</a>
                        <a href="#" class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop