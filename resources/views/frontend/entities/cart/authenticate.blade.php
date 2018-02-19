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
                        <div class="col-sm-4 bs-wizard-step complete">
                            <div class="text-center bs-wizard-stepnum">Your Cart</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="/tr/booking/extras" class="bs-wizard-dot"></a>
                        </div>
                        <div class="col-sm-4 bs-wizard-step active">
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
                    <div id="general_info">
                        <div class="form_title">
                            @guest()
                                <!-- Login Modal Trigger -->
                                    <a data-toggle="modal" data-target="#loginModal" class="btn_1 green medium fr">User Login</a>
                                <!-- End Login Modal Trigger -->
                            @endguest
                            @auth()
                                <p class="fr" style="font-size: 15px;color: #333;">Logged in as {{ \Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->surname }}</p>
                            @endauth

                            <!-- Header Area -->
                            <h3><strong><i class="icon_set_1_icon-29 font-20"></i></strong>Your Details</h3>
                            <p>Your personal information</p>
                            <!-- End Header Area-->

                            <!-- Login Modal -->
                            <div class="user-login modal fade" id="loginModal" role="dialog">
                                <div class="modal-dialog" style="width:50%;">

                                    <!-- Modal content-->
                                    <div class="modal-content login-modal" style="padding: 35px;">
                                        <h3 class="modal-title">Login</h3>
                                        <hr>
                                        @include('auth.partials.login-form')
                                    </div>
                                </div>
                            </div>
                            <!-- End Login Modal -->
                        </div>

                        <div class="step">
                            @guest()
                                @include('auth.partials.register-form')
                            @endguest
                            @auth()
                                    <form id="register-form" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}

                                    <!-- Name and Surname Fields -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">
                                                        Name<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="name" type="text" readonly class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="surname" class="control-label">
                                                        Surname<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="surname" type="text" readonly class="form-control" name="surname" value="{{ $user->surname }}" required autofocus>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Email and Phone Fields -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">
                                                        E-Mail Address<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="email" type="email" readonly class="form-control" name="email" value="{{ $user->email }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="control-label">
                                                        Phone Number<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="phone" type="text" readonly class="form-control" name="phone" value="{{ $user->phone }}" required>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Citizenship and Address Fields -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="citizenship" class="control-label">
                                                        Citizenship<span class="red color-red">*</span>
                                                    </label>
                                                    <input type="text" name="citizenship" id="citizenship" readonly class="form-control" value="{{ $user->citizenship }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="identifier">
                                                        Citizenship | Passport Number<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="identifier" type="text" readonly class="form-control" name="identifier" value="{{ $user->identification_number }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ZIP Code and Province Fields -->
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="country" class="control-label">
                                                        Country<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="country" type="text" readonly class="form-control" name="country" value="{{ $user->country }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="province" class="control-label">
                                                        Province<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="province" type="text" readonly class="form-control" name="province" value="{{ $user->province }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="zip_code" class="control-label">
                                                        ZIP Code<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="zip_code" type="text" readonly class="form-control" name="zip_code" value="{{ $user->zip_code }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Country Field -->
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address" class="control-label">
                                                        Address<span class="red color-red">*</span>
                                                    </label>
                                                    <input id="address" type="text" readonly class="form-control" name="address" value="{{ $user->address }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                @endauth
                        </div>
                    </div>

                    <a type="button" style="padding-left:10px !important;" class="btn_1 outline medium fl mt3" href="/cart/extras"><span class="pe-7s-angle-left fl font-20 mr5"></span>Back to Extras</a>

                </div>
                <!-- End Left Side -->

                <!-- Right Side -->
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
                            </tfoot>
                        </table>
                        @guest()
                            <p>You need to login to prooceed payment</p>
                        @endguest()
                        @auth()
                            <a href="{{ action('CartController@authenticate') }}" class="btn_full">Continue To Payment</a>
                        @endauth()
                    </aside>
                </div>
                <!-- End Right Side -->
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script>
        $('#loginModal').on('shown.bs.modal', function () {})
    </script>
@stop