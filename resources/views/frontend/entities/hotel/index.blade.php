@extends('frontend.base')

@section('title', 'Choose your hotel')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/plugins/fotorama.css') }}">
@stop

@section('content')
    <div class="container" style="padding-top: 71px;">
        <div class="row">
            <div class="col-md-4">
                <div class="hotel-box">
                    <div class="hotel-header">
                        <div class="row">
                            <div class="col-md-7">
                                <h2 class="hotel-name">Crowne Plaza</h2>
                                <small class="text-muted">Novi Beograd</small>
                            </div>
                            <div class="col-md-5">
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span>9.0</span>
                            </div>
                            <div class="col-md-6">
                                <small class="user-reviews">Based on 442 reviews</small>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('img/hotel-images/crowne-plaza/1.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="#">
                                    <div class="row">
                                        <div class="col p5">
                                            <select name="check-in" id="" class="form-control">
                                                <option value="0">Check In</option>
                                                <option value="1">18 May</option>
                                                <option value="2">19 May</option>
                                            </select>
                                        </div>
                                        <div class="col p5">
                                            <select name="check-out" id="" class="form-control">
                                                <option value="0">Check Out</option>
                                                <option value="1">20 May</option>
                                                <option value="2">21 May</option>
                                            </select>
                                        </div>
                                        <div class="col p5">
                                            <select name="check-out" id="" class="form-control">
                                                <option value="1">Room Type</option>
                                                <option value="2">Single</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-light">More Info</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hotel-box">
                    <div class="hotel-header">
                        <div class="row">
                            <div class="col-md-7">
                                <h2 class="hotel-name">Holiday Inn Belgrade</h2>
                                <small class="text-muted">Novi Beograd</small>
                            </div>
                            <div class="col-md-5">
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span>8.9</span>
                            </div>
                            <div class="col-md-6">
                                <small class="user-reviews">Based on 287 reviews</small>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('img/hotel-images/holiday-inn/1.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="#">
                                    <div class="row">
                                        <div class="col p5">
                                            <select name="check-in" id="" class="form-control">
                                                <option value="0">Check In</option>
                                                <option value="1">18 May</option>
                                                <option value="2">19 May</option>
                                            </select>
                                        </div>
                                        <div class="col p5">
                                            <select name="check-out" id="" class="form-control">
                                                <option value="0">Check Out</option>
                                                <option value="1">20 May</option>
                                                <option value="2">21 May</option>
                                            </select>
                                        </div>
                                        <div class="col p5">
                                            <select name="check-out" id="" class="form-control">
                                                <option value="1">Room Type</option>
                                                <option value="2">Single</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-light">More Info</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hotel-box">
                    <div class="hotel-header">
                        <div class="row">
                            <div class="col-md-7">
                                <h2 class="hotel-name">Radisson Blu Old Mill Belgrade</h2>
                                <small class="text-muted">Savski Venac</small>
                            </div>
                            <div class="col-md-5">
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span>9.1</span>
                            </div>
                            <div class="col-md-6">
                                <small class="user-reviews">Based on 1,107 reviews</small>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('img/hotel-images/radisson-blu/1.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="#">
                                    <div class="row">
                                        <div class="col p5">
                                            <select name="check-in" id="" class="form-control">
                                                <option value="0">Check In</option>
                                                <option value="1">18 May</option>
                                                <option value="2">19 May</option>
                                            </select>
                                        </div>
                                        <div class="col p5">
                                            <select name="check-out" id="" class="form-control">
                                                <option value="0">Check Out</option>
                                                <option value="1">20 May</option>
                                                <option value="2">21 May</option>
                                            </select>
                                        </div>
                                        <div class="col p5">
                                            <select name="check-out" id="" class="form-control">
                                                <option value="1">Room Type</option>
                                                <option value="2">Single</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-light">More Info</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
