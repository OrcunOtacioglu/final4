@extends('frontend.base')

@section('title', 'Payment Failed!')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <h1>Payment Failed!</h1>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Payment Failed!</h4>
                    <p>There was a problem occured during your payment! Error message: {{ $error }}</p>
                    <hr>
                    <p class="mb-0">Please get in touch with us at info@deturf4.com</p>
                </div>
            </div>
        </div>
    </div>
@stop