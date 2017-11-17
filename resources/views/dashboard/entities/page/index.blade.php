@extends('dashboard.base')

@section('title', 'Manage Pages')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/plugins/data-table/datatables.min.css') }}">
@stop

@section('page-description')
    <p class="mb-0">This panel allows you to manage the settings for your pages.</p>
    <p class="mb-0">View, edit and delete pages or add new page.</p>
@stop

@section('page-header')
    <a href="{{ action('PageController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New Page" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New Page</span>
    </a>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($pages->count() == 0)
                <div class="alert alert-info" role="alert">
                    There are no pages to show!
                </div>
            @else
                <div class="panel">
                    <div class="panel-body">
                        @include('dashboard.entities.page.partials.data-table')
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
            $('#pageTable').DataTable({
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