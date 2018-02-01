@extends('layouts.dashboard')

@section('custom.meta')
    <meta name="event" content="{{ $event->id }}">
@stop

@section('title')
    Configure {{ $event->name }}
@stop

@section('page-description')
    <p class="page-description mb-0">Step 2 - Configure Your Event</p>
@stop

@section('container.type', 'container')

@section('custom.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content')
    <step-two></step-two>
@stop

@section('footer.scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('.dateTime', {
            enableTime: 1
        });
    </script>
@stop