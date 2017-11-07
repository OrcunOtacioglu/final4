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
                    <li onclick="getSeatsOf('1')" class="category-item mb-15" style="border-color: {{ '#' . $rate->color_code }};">
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
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="categories-footer">

        </div>
    </div>
</div>