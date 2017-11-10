<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <div class="container" style="
        max-width: 1140px;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    ">
        <div class="row" style="
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        ">
            <div class="col-md-12" style="
                flex: 0 0 100%;
                max-width: 100%;
            ">
                <h1 style="
                    font-size: 22px;
                    margin-bottom: 8px;
                    font-weight: 500;
                    line-height: 1.2
                ">Thank You!</h1>
                <p style="
                    display: block;
                    margin-top: 0;
                    margin-bottom: 16px;
                    -webkit-margin-before: 16px;
                    -webkit-margin-after: 16px;
                    -webkit-margin-start: 0px;
                    -webkit-margin-end: 0px;
                ">Thank you for purchasing packages to the 2018 Turkish Airlines EuroLeague Final Four Belgrade!</p>
                <p style="
                    display: block;
                    margin-top: 0;
                    margin-bottom: 16px;
                    -webkit-margin-before: 16px;
                    -webkit-margin-after: 16px;
                    -webkit-margin-start: 0px;
                    -webkit-margin-end: 0px;
                ">We hope that you will enjoy the event and create unforgettable memories of the best weekend in basketball with your family, friends or business partners.</p>
                <div class="alert alert-info" style="
                    position: relative;
                    padding: 12px 20px;
                    margin-bottom: 16px;
                    border: 1px solid #bee5eb;
                    border-radius: 4px;
                    color: #0c5460;
                    background-color: #d1ecf1;
                ">
                    <p style="
                        display: block;
                        margin-top: 0;
                        margin-bottom: 16px;
                        -webkit-margin-before: 16px;
                        -webkit-margin-after: 16px;
                        -webkit-margin-start: 0px;
                        -webkit-margin-end: 0px;
                    ">Please be aware that you will be able to download your tickets at the beginning of May 2018. You will be informed with an email about the download instructions within a few weeks.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" style="
                    position: relative;
                    padding: 12px 20px;
                    margin-bottom: 16px;
                    border: 1px solid #bee5eb;
                    border-radius: 4px;
                    color: #155724;
                    background-color: #d4edda;
                    border-color: #c3e6cb;
                ">
                    <p style="
                        display: block;
                        margin-top: 0;
                        margin-bottom: 16px;
                        -webkit-margin-before: 16px;
                        -webkit-margin-after: 16px;
                        -webkit-margin-start: 0px;
                        -webkit-margin-end: 0px;
                    ">Your Order Reference: <strong>{{ $order->reference }}</strong></p>
                    <p style="
                        display: block;
                        margin-top: 0;
                        margin-bottom: 16px;
                        -webkit-margin-before: 16px;
                        -webkit-margin-after: 16px;
                        -webkit-margin-start: 0px;
                        -webkit-margin-end: 0px;
                    ">Please specify this reference identifier on your emails with our support team.</p>
                    <p style="
                        display: block;
                        margin-top: 0;
                        margin-bottom: 16px;
                        -webkit-margin-before: 16px;
                        -webkit-margin-after: 16px;
                        -webkit-margin-start: 0px;
                        -webkit-margin-end: 0px;
                    ">You can get in touch with us at info@deturf4.com</p>
                </div>
            </div>
        </div>
        <div class="row" style="
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        ">
            <div class="col-md-12" style="
                flex: 0 0 100%;
                max-width: 100%;
            ">
                <h2>Order Details</h2>
                <table class="table text-left" style="
                    width: 100%;
                    max-width: 100%;
                    margin-bottom: 1rem;
                    background-color: transparent;
                    border-collapse: collapse;
                    display: table;
                    border-spacing: 2px;
                    border-color: grey;
                    text-align: left!important;
                ">
                    <thead class="detur-thead" style="
                        display: table-header-group;
                        vertical-align: middle;
                        border-color: inherit;
                        background-color: #2c3e50;
                        color: rgba(255,255,255,.5);
                    ">
                    <tr style="
                        display: table-row;
                        vertical-align: inherit;
                        border-color: inherit;
                    ">
                        <th colspan="3" style="
                            vertical-align: bottom;
                            border-bottom: 2px solid #e9ecef;
                    ">Item</th>
                        <th class="text-center" style="
                            vertical-align: bottom;
                            border-bottom: 2px solid #e9ecef;
                            text-align: center!important;
                    ">Qty</th>
                    </tr>
                    </thead>
                    <tbody style="
                        display: table-row-group;
                        vertical-align: middle;
                        border-color: inherit;
                    ">
                    <tr style="
                        background: #fbfbfb;
                        display: table-row;
                        vertical-align: inherit;
                        border-color: inherit;
                    ">
                        <td colspan="3" style="
                            padding: 12px;
                            vertical-align: top;
                            border-top: 1px solid #e9ecef;
                            display: table-cell;
                        ">
                            <i class="icon ti-ticket"></i> Final Four Weekend Pass
                        </td>
                        <td class="bt-none text-center" style="
                            padding: 12px;
                            vertical-align: top;
                            border-top: 1px solid #e9ecef;
                            display: table-cell;
                            border-top: none !important;
                            text-align: center!important;
                        ">{{ \App\Entities\Order::getTicketCount($order) }}</td>
                    </tr>
                    @foreach(\App\Entities\Order::listTickets($order) as $ticket)
                        <tr style="
                            background: #fbfbfb;
                            display: table-row;
                            vertical-align: inherit;
                            border-color: inherit;
                        ">
                            <td colspan="4" class="bt-none" style="
                                padding: 12px;
                                vertical-align: top;
                                border-top: 1px solid #e9ecef;
                                display: table-cell;
                                border-top: none !important;
                            ">
                                <p class="mb-0" style="
                                    display: block;
                                    margin-top: 0;
                                    margin-bottom: 0;
                                    -webkit-margin-before: 16px;
                                    -webkit-margin-after: 16px;
                                    -webkit-margin-start: 0px;
                                    -webkit-margin-end: 0px;
                                ">{{ $ticket->name }}</p>
                                <small style="
                                    font-size: 13px;
                                    font-weight: 400;
                                ">Section: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Zone') }} Row: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Row') }} Seat: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Number') }}</small>
                            </td>
                        </tr>
                    @endforeach
                    @if(\App\Entities\Order::hasHotel($order))
                        <tr style="
                            background: #fbfbfb;
                            display: table-row;
                            vertical-align: inherit;
                            border-color: inherit;
                        ">
                            <td colspan="3" style="
                                padding: 12px;
                                vertical-align: top;
                                border-top: 1px solid #e9ecef;
                                display: table-cell;
                                border-top: none !important;
                            ">
                                <i class="icon ti-home"></i> Hotel Accommodations
                            </td>
                            <td class="bt-none text-center" style="
                                padding: 12px;
                                vertical-align: top;
                                border-top: 1px solid #e9ecef;
                                display: table-cell;
                                border-top: none !important;
                                text-align: center!important;
                            ">{{ \App\Entities\Order::getHotelCount($order) }}</td>
                        </tr>
                        @foreach(\App\Entities\Order::listHotels($order) as $hotel)
                            <tr style="
                                background: #fbfbfb;
                                display: table-row;
                                vertical-align: inherit;
                                border-color: inherit;
                            ">
                                <td colspan="4" class="bt-none" style="
                                    padding: 12px;
                                    vertical-align: top;
                                    border-top: 1px solid #e9ecef;
                                    display: table-cell;
                                    border-top: none !important;
                                ">
                                    <p class="mb-0" style="
                                        display: block;
                                        margin-top: 0;
                                        margin-bottom: 0;
                                        -webkit-margin-before: 16px;
                                        -webkit-margin-after: 16px;
                                        -webkit-margin-start: 0px;
                                        -webkit-margin-end: 0px;
                                    ">{{ $hotel->name }}</p>
                                    <small style="
                                        font-size: 13px;
                                        font-weight: 400;
                                    ">{{ \App\Entities\OrderItem::listDetailOf($hotel, 'Use') }}</small>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    @if(\App\Entities\Order::hasHotel($order))
                        <tfoot class="detur-details" style="
                            display: table-footer-group;
                            vertical-align: middle;
                            border-color: inherit;
                            background: #fbfbfb;
                        ">
                        <tr style="
                            display: table-row;
                            vertical-align: inherit;
                            border-color: inherit;
                        ">
                            <td colspan="3" style="
                                    padding: 12px;
                                    vertical-align: top;
                                    border-top: 1px solid #e9ecef;
                                    display: table-cell;
                            ">Subtotal</td>
                            <td class="text-center" style="
                                    padding: 12px;
                                    vertical-align: top;
                                    border-top: 1px solid #e9ecef;
                                    display: table-cell;
                                    border-top: none !important;
                                    text-align: center!important;
                            ">{{ $order->subtotal }}€</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="bt-none" style="
                                    padding: 12px;
                                    vertical-align: top;
                                    border-top: 1px solid #e9ecef;
                                    display: table-cell;
                                    border-top: none !important;
                            ">Service Fees</td>
                            <td class="bt-none text-center" style="
                                    padding: 12px;
                                    vertical-align: top;
                                    border-top: 1px solid #e9ecef;
                                    display: table-cell;
                                    border-top: none !important;
                                    text-align: center!important;
                            ">{{ $order->fee }}€</td>
                        </tr>
                        <tr class="detur-summary" style="
                            background: #16b7cd;
                            color: #fff;
                            font-weight: bold;
                        ">
                            <td colspan="3" style="
                                    padding: 12px;
                                    vertical-align: top;
                                    border-top: 1px solid #e9ecef;
                                    display: table-cell;
                                    border-top: none !important;
                            ">TOTAL</td>
                            <td class="text-center" style="
                                    padding: 12px;
                                    vertical-align: top;
                                    border-top: 1px solid #e9ecef;
                                    display: table-cell;
                                    border-top: none !important;
                            ">{{ $order->total }}€</td>
                        </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</body>
</html>