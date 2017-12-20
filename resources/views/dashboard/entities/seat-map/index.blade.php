@extends('dashboard.base')

@section('title', 'Create SeatMap')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/plugins/data-table/datatables.min.css') }}">
@stop

@section('page-header')
    <a href="{{ action('SeatMapController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New SeatMap" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New SeatMap</span>
    </a>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($seatmaps->count() == 0)
                <div class="alert alert-info" role="alert">
                    There are no seatmaps to show!
                </div>
            @else
                <div class="panel">
                    <div class="panel-body">
                        @include('dashboard.entities.seat-map.partials.data-table')
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/dashboard/plugins/data-tables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#seatMapTable').DataTable({
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