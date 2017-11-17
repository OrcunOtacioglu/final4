@extends('dashboard.base')

@section('title', 'Create New Zone')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form action="{{ action('ZoneController@store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="screen_name">Screen Name</label>
                                    <input type="text" name="screen_name" id="screen_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image_path">Image</label>
                                    <input type="file" id="image_path" name="image_path" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-success" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop