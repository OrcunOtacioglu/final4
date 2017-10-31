@extends('dashboard.base')

@section('title', 'Manage Your Settings')

@section('header.right')
    <a href="{{ action('SettingsController@create') }}" class="btn btn-secondary">Add Settings</a>
@stop

@section('content')
    @if($settings->count() == 0)
        <div class="alert alert-info" role="alert">
            There are no settings to show!
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Profile Name</th>
                <th scope="col">Client ID</th>
                <th scope="col" class="text-nowrap">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td>{{ $setting->profile_name }}</td>
                    <td>{{ $setting->client_id }}</td>
                    <td class="text-nowrap">
                        <a href="{{ action('SettingsController@edit', ['id' => $setting->id]) }}" class="text-muted">Edit</a>
                        <a href="#" class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop