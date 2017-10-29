@extends('frontend.base')

@section('title', 'Your Order')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12 col-xs-12">
                <h1>Your Order</h1>
                <p class="description-text">
                    Please Login if you have an existing account. Otherwise, use the form below to Register.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-8 col-sm-12 col-xs-12">
                @include('auth.partials.authenticate')
            </div>
            <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                <table class="table text-left">
                    <thead class="detur-thead">
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td class="bt-none">{{ $item->type }}</td>
                                <td class="bt-none">{{ $item->unit_price }}€</td>
                                <td class="bt-none">{{ $item->quantity }}</td>
                                <td class="bt-none text-center">{{ $item->subtotal }}€</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="detur-details">
                        <tr>
                            <td colspan="3">Subtotal</td>
                            <td class="text-center">{{ $order->subtotal }}€</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="bt-none">Service Fees</td>
                            <td class="bt-none text-center">{{ $order->fee }}€</td>
                        </tr>
                        <tr class="detur-summary">
                            <td colspan="3">TOTAL</td>
                            <td class="text-center">{{ $order->total }}€</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('custom.html')
    @include('frontend.partials.footer')
@stop