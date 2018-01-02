@extends('frontend.base')

@section('title', 'Special Events and Tours')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/general/custom.css') }}">
@stop

@section('content')
    @include('frontend.partials.hero-banner')

    <!-- Page Content -->
    <div class="container blockcontainer clearfix mt30">
        <div class="row">
            <div class="clear"></div>
            <div class="container-fuild custome-page-wrap">

                @include('frontend.partials.popular-events')

                <section>
                    <article>
                        <div class="clear"></div>
                        <hr style="margin-bottom:30px;margin-top:50px;">
                    </article>
                </section>

                @include('frontend.partials.why-us')

            </div>
        </div>
    </div>
    <!-- End Page Content -->
@stop