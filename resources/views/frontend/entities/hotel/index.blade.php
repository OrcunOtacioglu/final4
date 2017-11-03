@extends('frontend.base')

@section('title', 'Choose your hotel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1>Please choose your hotel</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                @foreach($hotels as $hotel)
                    <section class="fdb-block p0 mb-10">
                        <div class="container p0" style=" border: 2px solid #EEEEEE;">
                            <div class="row text-center pt10 pl10 pr10">

                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/img/hotel-images/{{ $hotel->media_path }}/1.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="/img/hotel-images/{{ $hotel->media_path }}/2.jpg" alt="" class="img-fluid">
                                                </div>
                                                <div class="col-6">
                                                    <img src="/img/hotel-images/{{ $hotel->media_path }}/3.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-6 pt-5 pt-md-0">
                                    <div class="row text-left">
                                        <div class="col-8">
                                            <h2 class="hotel-name">{{ $hotel->name }}</h2>
                                            <small class="text-muted">{{ $hotel->location }}</small>
                                        </div>
                                        <div class="col-4 text-right pt10">
                                            @for($i = 0; $i < $hotel->stars; $i++)
                                                <i class="wb-star text-detur"></i>
                                            @endfor
                                        </div>
                                    </div>

                                    <div class="row text-left align-items-center mb-15">
                                        <div class="col-6">
                                            <span class="review-points">{{ $hotel->review_point }}/10</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <small class="user-reviews">Based on {{ $hotel->review_count }} reviews</small>
                                        </div>
                                    </div>

                                    <div class="row text-left">
                                        <div class="col-12">
                                            <p>{{ $hotel->description }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-secondary">
                                                    <i class="wb-info-circle"></i> More Info
                                                </button>
                                                <button type="button" class="btn btn-secondary">
                                                    <i class="wb-gallery"></i> Gallery
                                                </button>
                                                <button type="button" class="btn btn-secondary">
                                                    <i class="wb-map"></i> Show On Map
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 mt-10 pt-4" style="background: #eeeeee">
                                    <form action="{{ action('HotelController@addHotel', ['id' => $hotel->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-4 col-md-4">
                                                <div class="form-group">
                                                    {{--<label for="roomType">Select your room type</label>--}}
                                                    <select name="roomType" id="roomType" class="form-control">
                                                        <option value="">Select Room Type</option>
                                                        <option value="0">Single Use</option>
                                                        <option value="1">Double Use</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-4 col-md-4">
                                                <select name="roomQty" id="roomQty" class="form-control">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                </select>
                                            </div>

                                            <div class="col-4 col-md-4 ml-auto mr-auto">
                                                <input type="submit" class="btn btn-block btn-detur" value="Add to Package">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </section>
                @endforeach

            </div>
            <div class="col-4">
                @include('frontend.partials.order-detail')

                @if(!\App\Entities\Order::hasHotel($order))
                    <div class="alert alert-warning" role="alert">
                        <i class="wb-warning"></i> Please add at least one hotel to your package!
                    </div>
                @else
                    <a href="{{ action('OrderController@completeOrder', ['reference' => $order->reference]) }}" class="btn btn-block btn-success">Proceed to Checkout</a>
                @endif
            </div>
        </div>
    </div>
@stop

@section('custom.html')
    @include('frontend.partials.footer')
@stop

@section('footer.scripts')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        swal({
            title: "Success!",
            text: "Your seats have been reserved. You have 20 minutes to complete your order!",
            icon: "success",
            button: "I understand",
            closeOnClickOutside: false,
            closeOnEsc: false
        });
    </script>
@stop
