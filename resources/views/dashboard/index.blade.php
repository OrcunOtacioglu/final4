@extends('dashboard.base')

@section('title', 'Dashboard')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/custom/dashboard.css') }}">
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-block p-30 bg-red-600">
                <div class="card-watermark darker font-size-80 m-15"><i class="icon ti-money" aria-hidden="true"></i></div>
                <div class="counter counter-md counter-inverse text-left">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ \Acikgise\Helpers\Helpers::formatMoney(\App\Entities\Sale::getTotalSalesAmount()) }}</span>
                        <span class="counter-number-related text-capitalize">sales</span>
                    </div>
                    <div class="counter-label text-capitalize">in {{ $sales->count() }} orders</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-block p-30 bg-green-600">
                <div class="card-watermark darker font-size-80 m-15"><i class="icon ti-user" aria-hidden="true"></i></div>
                <div class="counter counter-md counter-inverse text-left">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ \Acikgise\Helpers\Helpers::formatMoney(\App\Entities\Sale::calculateTotalNetIncome()) }}</span>
                        <span class="counter-number-related text-capitalize">customers</span>
                    </div>
                    <div class="counter-label text-capitalize">in {{ $sales->count() }} orders</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-block p-30 bg-blue-600">
                <div class="card-watermark darker font-size-80 m-15"><i class="icon ti-receipt" aria-hidden="true"></i></div>
                <div class="counter counter-md counter-inverse text-left">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ $sales->count() }}</span>
                        <span class="counter-number-related text-capitalize">orders</span>
                    </div>
                    <div class="counter-label text-capitalize">from {{ $customers->count() }} customers</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-block p-30 bg-cyan-600">
                <div class="card-watermark darker font-size-80 m-15"><i class="icon ti-ticket" aria-hidden="true"></i></div>
                <div class="counter counter-md counter-inverse text-left">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ $totalAvailableSeats }}</span>
                        <span class="counter-number-related text-capitalize">available tickets</span>
                    </div>
                    <div class="counter-label text-capitalize">out of 447</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-block p-30 bg-purple-600">
                <div class="card-watermark darker font-size-80 m-15"><i class="icon ti-home" aria-hidden="true"></i></div>
                <div class="counter counter-md counter-inverse text-left">
                    <div class="counter-number-group">
                        <span class="counter-number">{{ $totalAvailableHotels }}</span>
                        <span class="counter-number-related text-capitalize">available hotels</span>
                    </div>
                    <div class="counter-label text-capitalize">out of 105</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h2 class="panel-title">Hotel Availabilities</h2>
                </div>
                <div class="panel-body">
                    <table id="hotelTable" class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Remaining Availabilty</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hotels as $hotel)
                            <tr>
                                <td>{{ $hotel->name }}</td>
                                <td>{{ $hotel->online_availability }}</td>
                                <td>
                                    <a href="{{ action('HotelController@edit', ['id' => $hotel->id]) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                                        <i class="icon ti-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    <h2 class="panel-title">Latest Sales</h2>
                    <ul class="panel-actions panel-actions-keep">
                        <li><a href="{{ action('SaleController@index') }}">See All Sales</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <table id="saleTable" class="table">
                        <thead>
                        <tr>
                            <th>Reference</th>
                            <th>User Email</th>
                            <th>Total Amount</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->reference }}</td>
                                <td>{{ $sale->user->email }}</td>
                                <td>{{ \Acikgise\Helpers\Helpers::formatMoney($sale->total) }}</td>
                                <td>
                                    <div class="row">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#{{ $sale->reference }}">
                                            <i class="icon ti-eye"></i> View Details
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.entities.sale.partials.details')
@stop