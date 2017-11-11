@extends('frontend.base')

@section('title')
    {{ $page->title }}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page->title }}</h1>
            </div>
            <hr>
            <div class="col-md-12">
                {!! $page->body !!}
            </div>
        </div>
    </div>
@stop

@section('custom.html')
    @include('frontend.partials.footer')
@stop