@extends('dashboard.base')

@section('title', 'Manage Pages')

@section('header.right')
    <a href="{{ action('PageController@create') }}" class="btn btn-dashboard">
        <i class="icon wb-plus-circle"></i> Add Page
    </a>
@stop

@section('content')
    @if($pages->count() == 0)
        <div class="alert alert-info" role="alert">
            There are no pages to show!
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr class="text-center">
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Status</th>
                <th scope="col" class="text-nowrap">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr class="text-center">
                    <td class="text-left">{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        <i class="icon wb-power {{ $page->status == true ? 'text-success' : 'text-danger' }}"></i>
                    </td>
                    <td>
                        <a href="{{ action('PageController@edit', ['id' => $page->id]) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop