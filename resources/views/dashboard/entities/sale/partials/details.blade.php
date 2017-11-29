{{--@foreach($sales as $sale)--}}
    {{--<div class="modal fade" id="{{ $sale->reference }}" tabindex="-1" role="dialog" aria-labelledby="{{ $sale->reference }}Modal" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-simple modal-center modal-lg" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="{{ $sale->reference }}Modal">{{ $sale->reference }} Sale Details</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<ul class="list-group">--}}
                        {{--@foreach($sale->order->items as $item)--}}
                            {{--<li class="list-group-item">--}}
                                {{--<p>{{ $item->name }}</p>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endforeach--}}

@foreach($sales as $sale)
    <div class="modal fade" id="{{ $sale->reference }}" tabindex="-1" role="dialog" aria-labelledby="{{ $sale->reference }}Modal" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-center modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $sale->reference }} Sale Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                            <td class="no-border text-center">{{ \App\Entities\Order::getTicketCount($sale->order) }}</td>
                        </tr>
                        @foreach(\App\Entities\Order::listTickets($sale->order) as $ticket)
                            <tr>
                                <td colspan="4" class="no-border">
                                    <p class="mb-0">{{ $ticket->name }}</p>
                                    <small>Section: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Zone') }} Row: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Row') }} Seat: {{ \App\Entities\OrderItem::listDetailOf($ticket, 'Number') }}</small>
                                    <hr class="mb-0">
                                </td>
                            </tr>
                        @endforeach
                        @if(\App\Entities\Order::hasHotel($sale->order))
                            <tr style="background: #fbfbfb;">
                                <td colspan="3">
                                    <i class="icon ti-home"></i> Hotel Accommodations
                                </td>
                                <td class="no-border text-center">{{ \App\Entities\Order::getHotelCount($sale->order) }}</td>
                            </tr>
                            @foreach(\App\Entities\Order::listHotels($sale->order) as $hotel)
                                <tr>
                                    <td colspan="4" class="no-border">
                                        <p class="mb-0">{{ $hotel->name }}</p>
                                        <small>{{ \App\Entities\OrderItem::listDetailOf($hotel, 'Use') }}</small>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        @if(\App\Entities\Order::hasHotel($sale->order))
                            <tfoot class="detur-details">
                            <tr>
                                <td colspan="3">Subtotal</td>
                                <td class="text-center">{{ $sale->order->subtotal }}€</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="no-border">Service Fees</td>
                                <td class="no-border text-center">{{ $sale->order->fee }}€</td>
                            </tr>
                            <tr class="detur-summary">
                                <td colspan="3">TOTAL</td>
                                <td class="text-center">{{ $sale->order->total }}€</td>
                            </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach