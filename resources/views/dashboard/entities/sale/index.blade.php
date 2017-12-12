@extends('dashboard.base')

@section('title', 'Manage Sales')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/plugins/data-table/datatables.min.css') }}">
@stop

@section('page-description')
    <p class="mb-0">This panel allows you to inspect all of your sales.</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($sales->count() == 0)
                <div class="alert alert-info" role="alert">
                    There are no sales to show!
                </div>
            @else
                <div class="panel">
                    <div class="panel-body">
                        @include('dashboard.entities.sale.partials.data-table')
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('dashboard.entities.sale.partials.details')
@stop

@section('footer.scripts')
    <script src="{{ asset('js/dashboard/plugins/data-tables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#saleTable').DataTable({
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