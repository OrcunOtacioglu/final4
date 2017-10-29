@extends('frontend.base')

@section('title', 'Complete Your Order')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <h1>Complete Your Order</h1>
                <p class="description-text">
                    Please complete your order by pressing "Pay Now" button. You will be redirected to bank payment page to make your payment. Please prepare your credit card.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 col-sm-12 col-xs-12">
                <h3>Your Order</h3>

                @foreach($order->items as $item)
                    <div class="col-12 item-card" style="border-left: 5px solid #f04f51; border-radius: 6px;">
                        <div class="row">
                            <div class="col-2">
                                <img src="#" class="img-fluid" alt="">
                            </div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12">
                                        <h5>EuroLeague Final Four 2018 Belgrade Weekend Pass</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="mb-0">Category: Central Lower Bowl</p>
                                        <p>Zone: 216</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="mb-0">Row: Z</p>
                                        <p>Seat: 6</p>
                                    </div>
                                    <div class="col-3">
                                        <p class="mb-0">Price: {{ $item->subtotal }}</p>
                                        <a href="#" class="text-danger">REMOVE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                <h3>Payment Options</h3>
                <p>By pressing "Pay Now" button or by using this website you agreed the <a href="#" target="_blank">Terms & Conditions</a></p>
                <form action="#" method="POST">
                    <input type="hidden" name="clientid">
                    <input type="hidden" name="amount">
                    <input type="hidden" name="oid">
                    <input type="hidden" name="okUrl">
                    <input type="hidden" name="failUrl">
                    <input type="hidden" name="islemtipi">
                    <input type="hidden" name="taksit">
                    <input type="hidden" name="rnd">
                    <input type="hidden" name="hash">

                    <input type="hidden" name="storetype" value="3d_pay_hosting" >

                    <input type="hidden" name="refreshtime" value="10" >
                    <input type="hidden" name="lang" value="tr">
                    <input type="hidden" name="currency" value="949">

                    <input type="hidden" name="firmaadi" value="FBB Entertainment">
                    <input type="hidden" name="Fismi" value="is">
                    <input type="hidden" name="faturaFirma" value="FBB Entertainment">
                    <input type="hidden" name="Fadres" value="FBB Entertainment Güzeloba Mah.">
                    <input type="hidden" name="Fadres2" value="Rauf Denktaş Cad. No:60/A">
                    <input type="hidden" name="Fil" value="ANTALYA">
                    <input type="hidden" name="Filce" value="Muratpaşa">
                    <input type="hidden" name="Fpostakodu" value="07040">
                    <input type="hidden" name="tel" value="+90 242 280 22 11">
                    <input type="hidden" name="fulkekod" value="tr">
                    <input type="hidden" name="nakliyeFirma" value="FBB Entertainment">
                    <input type="hidden" name="tismi" value="FBB Entertainment">
                    <input type="hidden" name="tadres" value="FBB Entertainment Güzeloba Mah.">
                    <input type="hidden" name="tadres2" value="Rauf Denktaş Cad. No:60/A">
                    <input type="hidden" name="til" value="ANTALYA">
                    <input type="hidden" name="tilce" value="Muratpaşa">
                    <input type="hidden" name="tpostakodu" value="07040">
                    <input type="hidden" name="tulkekod" value="tr">
                    <input type="submit" class="btn btn-block btn-detur" value="Pay Now">
                </form>
                <ul class="list-inline valign-midd ellipses text-center" style="margin-top: 10px;">
                    <li>
                        <img id="imgVisaLogo" src="{{ asset('img/visaMastercard.png') }}" alt="Visa">
                    </li>
                </ul>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ action('HotelController@all') }}" class="btn btn-primary">Add Another Hotel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom.html')
    @include('frontend.partials.footer')
@stop