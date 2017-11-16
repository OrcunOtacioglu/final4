@extends('dashboard.base')

@section('title', 'Edit Page')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <form action="{{ action('PageController@update', ['id' => $page->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-md-6">
                        <!-- Title Form Input -->
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" readonly value="{{ $page->slug }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" @if($page->status == 1)
                                selected
                                        @endif>Published</option>
                                <option value="0" @if($page->status == 0)
                                selected
                                        @endif>Draft</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="excerpt">Post Excerpt</label>
                            <textarea name="excerpt" id="excerpt" cols="30" rows="10" class="form-control">{!! $page->excerpt !!}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="body">Post Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{!! $page->body !!}</textarea>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-success" value="Update">
                <a href="{{ action('PageController@index') }}" class="text-muted">Cancel</a>
            </form>
        </div>
    </div>
@stop