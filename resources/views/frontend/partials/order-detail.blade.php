<div id="order-detail">
    <table class="table text-left">
        <thead class="detur-thead">
        <tr>
            <th colspan="3">Item</th>
            <th class="text-center">Qty</th>
        </tr>
        </thead>
        <tbody>
        <tr style="background: #fbfbfb;">
            <td colspan="3">
                <i class="icon ti-ticket"></i> Final Four Weekend Pass
            </td>
            <td class="bt-none text-center">{{ \App\Entities\Order::getTicketCount($order) }}</td>
        </tr>
        @foreach(\App\Entities\Order::listTickets($order) as $ticket)
            <tr>
                <td colspan="4" class="bt-none">
                    <p class="mb-0">{{ $ticket->name }}</p>
                    <small>Section: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Zone') }} Row: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Row') }} Seat: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Number') }}</small>
                </td>
            </tr>
        @endforeach
        @if(\App\Entities\Order::hasHotel($order))
            <tr style="background: #fbfbfb;">
                <td colspan="3">
                    <i class="icon ti-home"></i> Hotel Accommodations
                </td>
                <td class="bt-none text-center">{{ \App\Entities\Order::getHotelCount($order) }}</td>
            </tr>
            @foreach(\App\Entities\Order::listHotels($order) as $hotel)
                <tr>
                    <td colspan="4" class="bt-none">
                        <p class="mb-0">{{ $hotel->name }}</p>
                        <small>{{ \App\Entities\OrderItem::listDetailOf($hotel, 'Use') }}</small>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot class="detur-details">
        <tr>
            <td colspan="3">Subtotal</td>
            <td class="text-center">{{ $order->subtotal }}€</td>
        </tr>
        <tr>
            <td colspan="3" class="bt-none">Service Fees</td>
            <td class="bt-none text-center">{{ $order->fee }}€</td>
        </tr>
        <tr class="detur-summary">
            <td colspan="3">TOTAL</td>
            <td class="text-center">{{ $order->total }}€</td>
        </tr>
        </tfoot>
    </table>

    @if(!\App\Entities\Order::hasHotel($order))
        <div class="alert alert-warning" role="alert">
            <i class="wb-warning"></i> Please add at least one hotel to your package!
        </div>
    @else
        <a href="{{ action('OrderController@completeOrder', ['reference' => $order->reference]) }}" class="btn btn-block btn-success">Proceed to Checkout</a>
    @endif
</div>