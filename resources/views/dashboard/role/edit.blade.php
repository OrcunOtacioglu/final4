@extends('dashboard.base')

@section('title', 'Edit Role')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ action('RoleController@update', ['id' => $role->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Name Form Input -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                </div>

                <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="0" {{ $role->level == 0 ? 'selected' : '' }}>Root</option>
                        <option value="1" {{ $role->level == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $role->level == 2 ? 'selected' : '' }}>Marketer</option>
                        <option value="3" {{ $role->level == 3 ? 'selected' : '' }}>Finance</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-success" value="Update">
            </form>
        </div>
        <div class="col-md-4">
            <h2>Permissions</h2>
            @foreach($role->permissions as $permission)
                <p>{{ $permission->name }}</p>
                <hr>
            @endforeach
        </div>
    </div>
@stop