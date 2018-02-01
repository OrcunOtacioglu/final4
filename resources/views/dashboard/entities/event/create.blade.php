@extends('layouts.dashboard')

@section('title', 'Create New Event')

@section('page-description')
    <p class="page-description mb-0">Step 1 - Basic Information</p>
@stop

@section('container.type', 'container')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <step-one></step-one>
        </div>
    </div>
@stop