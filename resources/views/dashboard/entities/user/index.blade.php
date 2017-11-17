@extends('dashboard.base')

@section('title', 'Manage Customers')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/plugins/data-table/datatables.min.css') }}">
@stop

@section('page-description')
    <p class="mb-0">This panel allows you to manage your customers.</p>
@stop

@section('page-header')
    <a href="{{ action('UserController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New User" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">New User</span>
    </a>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($customers->count() == 0)
                <div class="alert alert-info" role="alert">
                    There are no customers to show!
                </div>
            @else
                <div class="panel">
                    <div class="panel-body">
                        @include('dashboard.entities.user.partials.data-table')
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
            $('#customerTable').DataTable({
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