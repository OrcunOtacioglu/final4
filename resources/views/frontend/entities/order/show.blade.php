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

                @include('frontend.partials.order-detail')
            </div>
            <div class="col-12 col-md-4 col-sm-12 col-xs-12">
                <h3>Payment Options</h3>
                <p>By pressing "Pay Now" button or by using this website you agreed the <a href="http://events.detur.com/terms-conditions" target="_blank">Terms & Conditions</a></p>
                <form action="https://www.fbwebpos.com/fim/est3Dgate" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="clientid" value="{{ $settings->client_id }}">
                    <input type="hidden" name="amount" value="{{ $paymentData['amount'] }}">
                    <input type="hidden" name="oid" value="{{ $paymentData['oid'] }}">
                    <input type="hidden" name="okUrl" value="{{ $paymentData['okUrl'] }}">
                    <input type="hidden" name="failUrl" value="{{ $paymentData['failUrl'] }}">
                    <input type="hidden" name="islemtipi" value="{{ $paymentData['islemtipi'] }}">
                    <input type="hidden" name="taksit" value="">
                    <input type="hidden" name="rnd" value="{{ $paymentData['rnd'] }}">
                    <input type="hidden" name="hash" value="{{ $paymentData['hash'] }}">

                    <input type="hidden" name="storetype" value="3d_pay_hosting" >

                    <input type="hidden" name="refreshtime" value="5" >
                    <input type="hidden" name="lang" value="en">
                    <input type="hidden" name="currency" value="{{ $settings->currency_code }}">

                    <input type="hidden" name="firmaadi" value="Tatil Seyahat Turizm A.S.">
                    <input type="hidden" name="Fismi" value="is">
                    <input type="hidden" name="faturaFirma" value="Tatil Seyahat Turizm A.S.">
                    <input type="hidden" name="Fadres" value="Buyukdere Cad. Ozsezen Is Merkezi">
                    <input type="hidden" name="Fadres2" value="No:123 C Blok Asmakat Detur">
                    <input type="hidden" name="Fil" value="ISTANBUL">
                    <input type="hidden" name="Filce" value="Sisli">
                    <input type="hidden" name="Fpostakodu" value="34394">
                    <input type="hidden" name="tel" value="+90 212 217 77 60">
                    <input type="hidden" name="fulkekod" value="tr">
                    <input type="hidden" name="nakliyeFirma" value="Tatil Seyahat Turizm A.S.">
                    <input type="hidden" name="tismi" value="Tatil Seyahat Turizm A.S.">
                    <input type="hidden" name="tadres" value="Buyukdere Cad. Ozsezen Is Merkezi">
                    <input type="hidden" name="tadres2" value="No:123 C Blok Asmakat Detur">
                    <input type="hidden" name="til" value="ISTANBUL">
                    <input type="hidden" name="tilce" value="Sisli">
                    <input type="hidden" name="tpostakodu" value="34394">
                    <input type="hidden" name="tulkekod" value="tr">
                    <input type="submit" class="btn btn-block btn-detur" value="Pay Now">
                </form>
                <ul class="list-inline valign-midd ellipses text-center" style="margin-top: 10px;">
                    <li>
                        <img id="imgVisaLogo" src="{{ asset('img/visaMastercard.png') }}" alt="Visa">
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop

@section('custom.html')
    @include('frontend.partials.footer')
@stop