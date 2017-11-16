@extends('dashboard.base')

@section('title', 'Manage Rates')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/plugins/data-table/datatables.min.css') }}">
@stop

@section('page-description')
    <p class="mb-0">This panel allows you to manage the settings for your rates.</p>
    <p class="mb-0">View, edit and delete rates or add new rate.</p>
@stop

@section('page-header')
    <a href="{{ action('RateController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New Rate" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New Rate</span>
    </a>
@stop

@section('content')
    <div class="col-md-12">
        @if($rates->count() == 0)
            <div class="alert alert-info" role="alert">
                There are no rates to show!
            </div>
        @else
            <div class="panel">
                <div class="panel-body">
                    @include('dashboard.entities.rate.partials.data-table')
                </div>
            </div>
        @endif
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/dashboard/plugins/data-tables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#rateTable').DataTable({
                ordering: true,
                paging: true,
                autoWidth: true,
                colReorder: true,
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'print',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                searching: true,
                toolbar: true
            });
        });
    </script>
@stop