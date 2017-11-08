<div class="categories-wrapper" id="categories">
    <div class="categories">
        <div class="categories-header">
            <h3 class="sidebar-text">
                Package Categories
            </h3>
        </div>
        <div class="categories-content">
            <ul class="categories-list">

                <li class="category-item mb-15" style="border-color: #e7983b;">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="category-info">
                                <p class="category-name mb-0">
                                    <i class="ti-ticket"></i> Hospitality Package
                                </p>
                                <span class="category-availability">Available</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="category-price">
                                <small class="text-muted">Get in touch</small>
                                <p>More Info</p>
                            </div>
                        </div>
                    </div>
                </li>

                @foreach($rates as $rate)
                        <li class="category-item mb-15" style="border-color: {{ '#' . $rate->color_code }};">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="category-info">
                                        <p class="category-name mb-0">
                                            <i class="ti-ticket"></i> {{ $rate->name }}
                                        </p>
                                        <span class="category-availability">Available</span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="category-price">
                                        <small class="text-muted">Starting from</small>
                                        <p>{{ $rate->price }}€</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row pr15">
                                <ul class="zones-list">
                                @foreach(\App\Entities\Rate::listZones($rate->zones) as $zone)
                                    <li class="zone-item">
                                        <div class="row mr0">
                                            <div class="col-4 col-md-4 col-sm-12 text-center">
                                                <img src="/img/zone-images/thumbnails/{{ $zone }}.png" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-4 col-md-4 col-sm-12 pt15 text-center">
                                                @if($zone == 2161)
                                                    <p class="text-muted">216-A</p>
                                                @elseif($zone == 2162)
                                                    <p class="text-muted">216-B</p>
                                                @else
                                                    <p class="text-muted">{{ $zone }}</p>
                                                @endif
                                            </div>
                                            <div class="col-4 col-md-4 col-sm-12 p0 pt15 text-center">
                                                <a href="javascript:void(0)" onclick="getSeatsOf({{''. $zone .''}})" class="btn btn-custom-small btn-primary">Buy Now</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </li>
                @endforeach
            </ul>
        </div>
        <div class="categories-footer">

        </div>
    </div>
</div>