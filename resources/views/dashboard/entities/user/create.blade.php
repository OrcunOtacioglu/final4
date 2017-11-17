@extends('dashboard.base')

@section('title', 'Create New User')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form action="{{ action('UserController@store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Name Form Input -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Surname Form Input -->
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_admin">Is Admin?</label>
                                    <select name="is_admin" id="is_admin" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">No Role</option>
                                        @foreach(\App\Entities\Authorization\Role::all() as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Citizenship Form Input -->
                                <div class="form-group">
                                    <label for="citizenship">Citizenship</label>
                                    <select name="citizenship" id="citizenship" class="form-control">
                                        <option value="TR">Turkish</option>
                                        <option value="NonTR">Non-Turkish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Identifier Form Input -->
                                <div class="form-group">
                                    <label for="identifier">Identifier</label>
                                    <input type="text" class="form-control" id="identifier" name="identifier">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Address Form Input -->
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Zip_code Form Input -->
                                <div class="form-group">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" class="form-control" id="zip_code" name="zip_code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Province Form Input -->
                                <div class="form-group">
                                    <label for="province">Province</label>
                                    <input type="text" class="form-control" id="province" name="province">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Country Form Input -->
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Email Form Input -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email">
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

                        <input type="submit" class="btn btn-success" value="Create">
                        <a href="{{ action('UserController@index') }}" class="text-muted">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop