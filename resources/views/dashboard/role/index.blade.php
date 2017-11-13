@extends('dashboard.base')

@section('title', 'Manage Roles & Permissions')

@section('header.right')
    <a href="{{ action('PermissionController@create') }}" class="btn btn-dashboard">
        <i class="icon wb-plus-circle"></i> Add Permission
    </a>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Users</h2>
            <table class="table table-hover">
                <thead>
                <tr class="text-center">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col" class="text-nowrap">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role != null ? $user->role->name : 'Empty' }}</td>
                        <td class="text-nowrap">
                            <a href="{{ action('UserController@edit', ['id' => $user->id]) }}" class="text-muted">Edit</a>
                            <a href="#" class="text-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h2>Roles</h2>
            <form action="{{ action('RoleController@store') }}" method="POST">
                {{ csrf_field() }}

                <!-- Name Form Input -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="0">Root</option>
                        <option value="1">Admin</option>
                        <option value="2">Finance</option>
                        <option value="3">Marketer</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-success" value="Create">
            </form>

            <hr>

            @if($roles->count() == 0)
                <div class="alert alert-info" role="alert">
                    There are no roles to show!
                </div>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">Name</th>
                        <th scope="col">Level</th>
                        <th scope="col" class="text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->level }}</td>
                            <td class="text-nowrap">
                                <a href="{{ action('RoleController@edit', ['id' => $role->id]) }}" class="text-muted">Edit</a>
                                <form action="{{ action('RoleController@destroy', ['id' => $role->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input type="submit" class="btn btn-secondary" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop