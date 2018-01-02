<!-- Popular Events -->
<section>
    <article>
        <div class="puzzle-content animated col-md-12 p0" style="margin-top:50px;margin-bottom:0;">
            <h2 class="t-center mb0">
                Popular&nbsp;
                <span style="color:orange">
                    <strong>EVENTS</strong>
                </span>
            </h2>
            <h3 class="t-center mt10 font-16">Start planning your event now!</h3>

            @foreach($events as $event)
                <div class="col-sm-6 col-lg-6">
                    <div class="content-box widget-general relative t-center">
                        <div class="widget-overlay transtation"></div>
                        <img src="/img/cover-photos/{{ $event->cover_photo }}" class="w100 p0">
                        <div class="text-container t-center">
                            <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}">
                                <h2 class="header text-shadow transtation">
                                    <strong></strong> {{ $event->name }}
                                </h2>
                            </a>
                            <div class="group-btn w100 p0">
                                <div class="seperator mt0 mb30"
                                     style="border-bottom: 1px solid rgba(255,255,255,0.4);"></div>
                                <ul>
                                    <li class="">
                                        <a href="{{ action('EventController@show', ['slug' => $event->slug]) }}" class="transtation flight"></a>
                                        <p class="m0 font-11">Buy Tickets</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </article>
</section>
<!-- End Popular Events -->