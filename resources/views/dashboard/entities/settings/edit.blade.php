@extends('dashboard.base')

@section('title', 'Edit Settings')

@section('content')
    <form action="{{ action('SettingsController@update', ['id' => $settings->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="profile_name">Profile Name</label>
                    <input type="text" name="profile_name" id="profile_name" class="form-control" value="{{ $settings->profile_name }}">
                </div>

                <div class="form-group">
                    <label for="currency_code">Currency Code</label>
                    <input type="text" name="currency_code" id="currency_code" class="form-control" value="{{ $settings->currency_code }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="client_id">Client ID</label>
                    <input type="text" name="client_id" id="client_id" class="form-control" value="{{ $settings->client_id }}">
                </div>

                <div class="form-group">
                    <label for="storekey">Store Key</label>
                    <input type="text" name="storekey" id="storekey" class="form-control" value="{{ $settings->storekey }}">
                </div>
            </div>

            <div class="col-12">
                <input type="submit" class="btn btn-success" value="Create">
                <a href="{{ action('SettingsController@index') }}" class="text-muted">Cancel</a>
            </div>
        </div>
    </form>
@stop