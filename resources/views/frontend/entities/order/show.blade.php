@extends('frontend.booking')

@section('title', 'Your Order')

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
                            <div class="text-center bs-wizard-stepnum">Sepetiniz</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="/tr/booking/extras" class="bs-wizard-dot"></a>
                        </div>
                        <div class="col-sm-4 bs-wizard-step disabled">
                            <div class="text-center bs-wizard-stepnum">Sepet Detayları</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="" class="bs-wizard-dot"></a>
                        </div>
                        <div class="col-sm-4 bs-wizard-step disabled">
                            <div class="text-center bs-wizard-stepnum">Ödeme</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="" class="bs-wizard-dot"></a>
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
                    <div class="panel-wrapper">
                        <div class="form_title col-sm-8 m0 hotel">
                            <h3 class="text-dot ng-binding">
                                <strong><i class="icon_set_1_icon-6 font-40"></i></strong>
                                NH Collection Barcelona Tower
                            </h3>
                            <p>Barcelona, Spain</p>
                            <div class="dates">
                                <div class="w100 p0 mb3 ng-binding">
                                    <i class="icon_set_1_icon-53 mr5 font-16"></i>
                                    <strong>Giriş:</strong> 29/12/2017
                                </div>
                                <div class="w100 p0 ng-binding">
                                    <i class="icon_set_1_icon-53 mr5 font-16"></i>
                                    <strong>Çıkış:</strong> 31/12/2017
                                </div>
                            </div>

                            <div class="clear"></div>
                            <div class="room-type ng-binding">
                                <i class="icon_set_2_icon-104 font-16 mr5"></i>DOUBLE WITH VIEWS - ROOM ONLY
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div id="loading-1640" style="display:none;">
                                <i class="font-50 loading-icon icon-spin6 animate-spin" style="position: absolute; z-index: 1;margin-left: -35px; margin-top: -10px;"></i>
                            </div>
                            <div class="remove options t-center fr">
                                <a class="">
                                    <i class="icon-trash"></i>
                                    <p class="font-12 m0">Kaldır</p>
                                </a>
                                <a data-toggle="modal" href="" data-target="#ModalHotelBookInfo1640">
                                    <i class="icon-info-circled"></i>
                                    <p class="font-12 m0">İptal Ücreti</p>
                                </a>

                                <button class="btn btn-default" style="padding: 4px 13px; font-size:12px; margin-top: 10px;" data-toggle="modal" href="" data-target="#ModalHotelDetailInfo1640">Detaylı Bilgi</button>

                            </div>
                        </div>

                        <div class="col-sm-2 t-center p0">
                            <div class="price-row font-18">
                                <strong>1388.76 TRY</strong>
                            </div>
                            <p class="font-12">Toplam Fiyat</p>
                        </div>

                        <div id="hotelextrawrapper1640" class="col-md-12 col-sm-12 col-xs-12" style="">
                            <div id="hotelreadbeforebook" class="">
                                <h4>Read Before Book</h4>
                                <p>["DOUBLE WITH VIEWS:  Estimated total amount of taxes &amp; fees for this booking:4.96 Euro payable on arrival. Car park NO."]</p>
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
                </div>
                <!-- End Left Side -->

                <!-- Right Side & Summary -->
                <aside class="col-md-4" id="sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                        <div class="box_style_1">
                            <h3 class="inner">Rezervasyon Özeti</h3>
                            <table class="table table_summary">
                                <tbody>
                                <tr>
                                    <td>
                                        <h5 class="mt0 mb3 font-13 ng-binding">NH Collection Barcelona Tower</h5>

                                        <ul class="list_ok">

                                        </ul>

                                    </td>
                                    <td class="text-right font-14">
                                        <strong class="ng-binding">1388.76 TRY</strong>
                                        <ul>

                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="mt0 mb3 font-14 fr">
                                            <strong>Toplam Fiyat</strong>
                                        </h5>
                                    </td>
                                    <td class="text-right font-14">
                                        <strong class="ng-binding">1388.76 TRY</strong>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            <div id="policy" class="p0">
                                <h4 class="font-16 font-600 mb5">İptal Şartları</h4>
                                <div class="form-group mb10">
                                    <label class="font-12">
                                        <input style="margin:0 5px 0 0;" data-required="checkbox" required="" name="policy_terms" id="policy_terms" type="checkbox">Kullanım koşulları ve şartlarını kabul ediyorum.
                                    </label>
                                </div>
                            </div>
                            <a class="btn_full">Continue Booking</a>
                            <div id="sendtosteploading" style="display:none;">
                                <h5 class="font-500 mb20 color-white">Lütfen bekleyin...</h5>
                                <i class="font-50 loading-icon icon-spin6 animate-spin"></i>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- End Summary -->
            </div>
        </div>
    </div>
@stop