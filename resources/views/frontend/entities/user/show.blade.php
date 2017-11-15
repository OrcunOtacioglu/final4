@extends('frontend.base')

@section('title', 'Your Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Profile Settings</h1>
            </div>
        </div>
        <div class="row">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="generalSettingsLink" data-toggle="pill" href="#generalSettings" role="tab" aria-controls="generalSettings" aria-selected="true">
                    <i class="icon ti-pencil-alt"></i> General Settings
                </a>
                <a class="nav-link" id="purchasesLink" data-toggle="pill" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">
                    <i class="icon ti-ticket"></i> Purchases
                </a>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="generalSettings" role="tabpanel" aria-labelledby="generalSettings">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ action('UserController@profileUpdate', ['id' => $user->id]) }}" method="POST">
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
                <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases">
                    <div class="row">
                        <div class="col-md-12">
                            @if($sales->count() == 0)
                                <div class="alert alert-info" role="alert">
                                    There are no purchases to show!
                                </div>
                            @else
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->user->email }}</td>
                                            <td>{{ $sale->total }}€</td>
                                            <td class="text-nowrap">
                                                <button type="button" class="btn btn-xs btn-secondary" data-toggle="modal" data-target="#{{ $sale->reference }}">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('dashboard.sale.partials.details')
    </div>
@stop