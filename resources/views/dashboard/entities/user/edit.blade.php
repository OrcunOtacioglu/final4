@extends('dashboard.base')

@section('title')
    Edit {{ ucfirst($user->name) . ' ' . ucfirst($user->surname) }}
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form action="{{ action('UserController@update', ['id' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Name Form Input -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Surname Form Input -->
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_admin">Is Admin?</label>
                                    <select name="is_admin" id="is_admin" class="form-control">
                                        <option value="0" {{ $user->is_admin == false ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $user->is_admin == true ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">No Role</option>
                                        @foreach(\App\Entities\Authorization\Role::all() as $role)
                                            <option value="{{ $role->id }}"
                                                    {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <!-- Phone Form Input -->
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Citizenship Form Input -->
                                <div class="form-group">
                                    <label for="citizenship">Citizenship</label>
                                    <select name="citizenship" id="citizenship" class="form-control">
                                        <option value="TR" {{ $user->citizenship == 'TR' ? 'selected' : '' }}>Turkish</option>
                                        <option value="NonTR" {{ $user->citizenship == 'NonTR' ? 'selected' : '' }}>Non-Turkish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Identifier Form Input -->
                                <div class="form-group">
                                    <label for="identifier">Identifier</label>
                                    <input type="text" class="form-control" id="identifier" name="identifier" value="{{ $user->identifier }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Address Form Input -->
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Zip_code Form Input -->
                                <div class="form-group">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ $user->zip_code }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Province Form Input -->
                                <div class="form-group">
                                    <label for="province">Province</label>
                                    <input type="text" class="form-control" id="province" name="province" value="{{ $user->province }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Country Form Input -->
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Email Form Input -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Password Form Input -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password">
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Update">
                        <a href="{{ action('UserController@index') }}" class="text-muted">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop