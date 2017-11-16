@extends('dashboard.base')

@section('title', 'Manage Your Settings')

@section('header.right')
    <a href="{{ action('SettingsController@create') }}" class="btn btn-secondary">Add Settings</a>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
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
                                    <div class="row">
                                        <a href="{{ action('SettingsController@edit', ['id' => $setting->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                            <i class="icon ti-pencil"></i>
                                        </a>
                                        <form action="{{ action('SettingsController@destroy', ['id' => $setting->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit"
                                                    class="btn btn-sm btn-icon btn-flat btn-default"
                                                    data-toggle="tooltip"
                                                    data-original-title="Delete"
                                            >
                                                <i class="icon ti-trash text-danger" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@stop