@extends('dashboard.base')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Latest Sales</h2>
            @if($sales->count() == 0)
                <div class="alert alert-info" role="alert">
                    There are no purchases to show!
                </div>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Reference</th>
                        <th>User</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->reference }}</td>
                            <td>{{ $sale->user->email }}</td>
                            <td>{{ $sale->total }}€</td>
                            <td class="text-nowrap">
                                <button type="button" class="btn btn-xs btn-secondary" data-toggle="modal" data-target="#{{ $sale->reference }}">
                                    View Details
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
    @include('dashboard.sale.partials.details')
@stop