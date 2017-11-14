@extends('dashboard.base')

@section('header.right')
    <a href="{{ action('SaleController@generateSales') }}" class="btn btn-dashboard">
        <i class="icon wb-plus-circle"></i> Generate Sales
    </a>
@stop

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Reference</th>
            <th>User</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->reference }}</td>
                <td>{{ $sale->user->email }}</td>
                <td>{{ $sale->total }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop