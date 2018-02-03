<!-- Rates of the Event -->
<div class="back-white p15">
    <h3>Package Categories</h3>
    <img src="{{ $event->seatMap->category_map_photo }}" alt="" class="img-responsive">
    <div class="rate-list">
        <div class="rate p10 mb10" style="border-left: 3px solid #e7983b">
            <div class="row">
                <div class="col-md-8">
                    <p class="rate-name">Hospitality Package</p>
                </div>
                <div class="col-md-4 text-center">
                    <a href="#" class="btn btn-xs btn-primary">Request Info</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <p class="text-muted m0" style="font-size: 12px">Starting from 1.150€</p>
                </div>
                <div class="col-md-4 text-center">
                    <small class="color-green">Available</small>
                </div>
            </div>
        </div>
        @foreach($rates as $rate)
            @if(\App\Entities\Rate::hasMultipleZones($rate))
                <div class="rate p10 mb10" style="border-left: 3px solid #{{ $rate->color_code }}">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="rate-name">{{ $rate->name }}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <a class="btn btn-xs btn-primary" role="button" data-toggle="collapse" href="#{{ $rate->color_code }}" aria-expanded="false" aria-controls="{{ $rate->name }}List">
                                Zone List
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-muted m0" style="font-size: 12px">Starting from {{ \Acikgise\Helpers\Helpers::formatMoney($rate->price/100) }}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <small class="color-green">Available</small>
                        </div>
                    </div>
                    <div class="collapse" id="{{ $rate->color_code }}">
                        @foreach(\App\Entities\Rate::listZones($rate->zones) as $zone)
                            <div class="well back-white p5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="/img/zone-images/thumbnails/{{ $zone }}.png" alt="">
                                    </div>
                                    <div class="col-md-4 text-center pt20">
                                        @if($zone == 2161)
                                            <p class="text-muted" style="font-size: 16px;">216-A</p>
                                        @elseif($zone == 2162)
                                            <p class="text-muted" style="font-size: 16px;">216-B</p>
                                        @else
                                            <p class="text-muted" style="font-size: 16px;">{{ $zone }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-4 text-center pt20">
                                        <button onclick="setSeatSelectionCookie({{ $zone }})" class="btn btn-xs btn-primary">Select Seats</button>
                                        <small class="color-green">Available</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="rate p10 mb10" style="border-left: 3px solid #{{ $rate->color_code }}">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="rate-name">{{ $rate->name }}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <button onclick="setSeatSelectionCookie({{ $rate->zones }})" class="btn btn-xs btn-primary">Select Seats</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-muted m0" style="font-size: 12px">Starting from {{ \Acikgise\Helpers\Helpers::formatMoney($rate->price/100) }}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <small class="color-green">Available</small>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<!-- End Rates of the Event -->