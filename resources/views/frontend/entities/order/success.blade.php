@extends('frontend.base')

@section('title', 'Success!')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <h1>Payment Successfull!</h1>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Payment Successful! Order Reference: {{ $order->reference }}</h4>
                    <p>We have sent you an email regarding to your purchase information!</p>
                    <hr>
                    <p class="mb-0">For further questions please refer to FAQ</p>
                </div>

                @include('frontend.partials.order-detail')
            </div>
        </div>
    </div>
@stop
