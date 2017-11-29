<div class="page-aside">
    <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
    </div>
    <div class="page-aside-inner page-aside-scroll scrollable is-enabled scrollable-vertical" style="position: relative;">
        <div data-role="container" class="scrollable-container" style="height: 705px; width: 259px;">
            <div data-role="content" class="scrollable-content" style="width: 259px;">
                <section class="page-aside-section">
                    <h5 class="page-aside-title">Categories</h5>
                    <div class="list-group">
                        @foreach($rates as $rate)
                            @foreach(\App\Entities\Rate::listZones($rate->zones) as $zone)
                                <a class="list-group-item list-group-item-action" href="javascript:void(0)" onclick="getSeatsOf({{ $zone }})">
                                    <i class="icon ti-ticket" aria-hidden="true" style="color: #{{ $rate->color_code }}"></i>{{ $zone }}
                                </a>
                            @endforeach
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
        <div class="scrollable-bar scrollable-bar-vertical is-disabled scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle"></div></div></div>
    <!---page-aside-inner-->
</div>
