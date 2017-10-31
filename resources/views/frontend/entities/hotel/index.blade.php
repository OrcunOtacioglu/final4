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
    @foreach($hotels as $hotel)
        <section class="fdb-block" style="padding: 25px 0;">
            <div class="container" style=" border-bottom: 2px solid #EEEEEE;">
                <div class="row text-center align-items-center">
                    <div class="col-8 col-md-4">
                        <img src="/img/hotel-images/{{ $hotel->media_path }}/1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="row">
                            <div class="col-12">
                                <img src="/img/hotel-images/{{ $hotel->media_path }}/2.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <img src="/img/hotel-images/{{ $hotel->media_path }}/3.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 pt-5 pt-md-0">
                        <div class="row text-left">
                            <div class="col-9">
                                <h2 class="hotel-name">{{ $hotel->name }}</h2>
                                <small class="text-muted">{{ $hotel->location }}</small>
                            </div>
                            <div class="col-3 text-right pt10">
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
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-6 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-secondary">
                                        <i class="wb-info-circle"></i> More Info
                                    </button>
                                    <button class="btn btn-secondary">
                                        <i class="wb-gallery"></i> Gallery
                                    </button>
                                    <button class="btn btn-secondary">
                                        <i class="wb-map"></i> Show On Map
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <form action="{{ action('HotelController@addHotel', ['id' => $hotel->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-8 col-md-8">
                                    <div class="form-group">
                                        {{--<label for="roomType">Select your room type</label>--}}
                                        <select name="roomType" id="roomType" class="form-control">
                                            <option value="">Select Room Type</option>
                                            <option value="0">Single</option>
                                            <option value="1">Double</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4 col-md-4">
                                    <input type="submit" class="btn btn-sm btn-detur" value="Book Now">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
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
