@extends('frontend.booking')

@section('title', 'Your Package')

@section('custom.css')
    <style>
        .pageName_HomePage .breadcrumbs, .pageName_HomePage .breadcrumbs-full{display:none;}

        #sendtosteploading {
            position: absolute;
            top: 0px;
            left: 0px;
            right: 0px;
            text-align: center;
            height: 100%;
            width: 100%;
            background: rgba(0,0,0,0.5);
            padding: 50% 0;
            z-index: 10;
        }

        .theiaStickySidebar:after {content: ""; display: table; clear: both;}

        .package {
            background-color: rgba(44,62,80,1);
            color: #fff;
            -webkit-border-top-left-radius: 3px;
            text-align: center;
            -webkit-border-top-right-radius: 3px;
            -moz-border-radius-topleft: 3px;
            -moz-border-radius-topright: 3px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            margin: 5px;
            font-size: 18px;
        }

        .summary {
            border-radius: 3px;
            border: 1px solid #ddd;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@stop

@section('content')
    <div class="bookingdatalayer" id="booking" style="transform: none;">

        <!-- Header Area -->
        <section id="banner">
            <div class="intro_title animated fadeInDown">
                <div class="container">
                    <div class="bs-wizard">
                        <div class="col-sm-4 bs-wizard-step active">
                            <div class="text-center bs-wizard-stepnum">Your Cart</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="/tr/booking/extras" class="bs-wizard-dot"></a>
                        </div>
                        <div class="col-sm-4 bs-wizard-step disabled">
                            <div class="text-center bs-wizard-stepnum">Your Details</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="bs-wizard-dot"></a>
                        </div>
                        <div class="col-sm-4 bs-wizard-step disabled">
                            <div class="text-center bs-wizard-stepnum">Payment</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="bs-wizard-dot"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Header Area -->

        <!-- Cart Detail -->
        <div id="basketitemsarea" class="container margin_60" style="transform: none;">
            <div class="row" style="transform: none;">

                <!-- Left Side -->
                <div class="col-md-8 add_bottom_15">
                    <!-- Single Item -->
                    @foreach($cart->items as $item)
                        <div class="panel-wrapper">
                            <div class="form_title col-sm-8 m0 hotel">
                                <h3 class="text-dot ng-binding">
                                    <strong><i class="icon_set_1_icon-6 font-40"></i></strong>
                                    {{ $item->details }}
                                </h3>
                                <p>Belgrade, Serbia</p>
                                <div class="dates">
                                    <div class="w100 p0 mb3 ng-binding">
                                        <i class="icon_set_1_icon-53 mr5 font-16"></i>
                                        <strong>Check In:</strong> 18/05/2018
                                    </div>
                                    <div class="w100 p0 ng-binding">
                                        <i class="icon_set_1_icon-53 mr5 font-16"></i>
                                        <strong>Check Out:</strong> 21/05/2018
                                    </div>
                                </div>

                                <div class="clear"></div>
                                <div class="room-type ng-binding">
                                    <i class="icon_set_2_icon-104 font-16 mr5"></i>{{ $item->name }} ROOM
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div id="loading-1640" style="display:none;">
                                    <i class="font-50 loading-icon icon-spin6 animate-spin" style="position: absolute; z-index: 1;margin-left: -35px; margin-top: -10px;"></i>
                                </div>
                                <div class="remove options t-center fr">
                                    <a data-toggle="modal" href="" data-target="#ModalHotelBookInfo1640">
                                        <i class="icon-info-circled"></i>
                                        <p class="font-12 m0">Cancellation Policy</p>
                                    </a>

                                    <button class="btn btn-default" style="padding: 4px 13px; font-size:12px; margin-top: 10px;" data-toggle="modal" href="" data-target="#ModalHotelDetailInfo1640">More Info</button>

                                </div>
                            </div>

                            <div id="hotelextrawrapper1640" class="col-md-12 col-sm-12 col-xs-12" style="">
                                <div id="hotelreadbeforebook" class="">
                                    <h4>Read Before Book</h4>
                                    <p>We do not offer any cancellation at any time.</p>
                                </div>

                            </div>

                            <div id="ModalHotelBookInfo1640" class="modal fade" role="dialog">
                                <div class="modal-dialog" style="width:50%;">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title t-center">
                                                <strong>İptal Ücreti</strong>
                                            </h4>
                                        </div>
                                        <div class="modal-body t-center">
                                            <div class="cancelationloading">
                                                <h5 class="font-300 mb20">Please wait... cancellation charge is being updated.</h5>
                                                <i class="font-50 loading-icon icon-spin6 animate-spin"></i>
                                            </div>

                                            <div class="nocancelation" style="display:none;">
                                                <h5 class="font-300 mb20">No cancellation charge has founded</h5>
                                            </div>

                                            <table class="cancellationtable table table-hover table-striped " style="display:none;">
                                                <thead>
                                                <tr>
                                                    <th>From</th>
                                                    <th>Upto</th>
                                                    <th>İptal Ücreti</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Single Item -->
                </div>
                <!-- End Left Side -->

                <div class="col-md-4">
                    <aside id="sidebar">
                        <table class="table text-left summary">
                            <thead class="detur-thead">
                            <tr>
                                <th colspan="4" class="text-center">
                                    <h3 class="package">PACKAGE SUMMARY</h3>
                                </th>
                            </tr>
                            </thead>
                            <tbody style="background: #ffffff;">
                            @foreach($cart->items as $item)
                                <tr>
                                    <td colspan="4" class="bt-none">
                                        <p class="mb-0">{{ $item->details }}</p>
                                        <small>{{ $item->name }}</small>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="detur-details">
                            <tr>
                                <td colspan="3">Subtotal</td>
                                <td class="text-center">{{ \Acikgise\Helpers\Helpers::formatMoney($cart->subtotal / 100) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="bt-none">Service Fees</td>
                                <td class="bt-none text-center">{{ \Acikgise\Helpers\Helpers::formatMoney($cart->fee / 100) }}</td>
                            </tr>
                            <tr class="detur-summary">
                                <td colspan="3">TOTAL</td>
                                <td class="text-center">{{ \Acikgise\Helpers\Helpers::formatMoney($cart->total / 100) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div id="policy" class="p0">
                                        <h4 class="font-16 font-600 mb5">Cancellation policy</h4>
                                        <div class="form-group mb10">
                                            <label class="font-12">
                                                <input style="margin:0 5px 0 0;" type="checkbox" name="policy_terms" id="policy_terms" checked>I accept terms and conditions and general policy.
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <a href="{{ action('CartController@authenticate') }}" class="btn_full">Confirm Booking</a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@stop