@extends('dashboard.base')

@section('title', 'Create Page')

@section('content')
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <form action="{{ action('PageController@store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Title Form Input -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Published</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="excerpt">Post Excerpt</label>
                                <textarea name="excerpt" id="excerpt" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="body">Post Body</label>
                                <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="Create">
                    <a href="{{ action('PageController@index') }}" class="text-muted">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@stop