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
                @include('frontend.partials.order-detail')
            </div>
        </div>
    </div>
@stop

@section('custom.html')
    @include('frontend.partials.footer')
@stop

@section('footer.scripts')
    <script>
        $(document).ready(function() {
            $('#country').select2();
        });
    </script>
@stop