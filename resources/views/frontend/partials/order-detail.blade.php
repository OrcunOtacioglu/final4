<div id="order-detail">
    <table class="table text-left">
        <thead class="detur-thead">
        <tr>
            <th colspan="3">Item</th>
            <th class="text-center">Qty</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->items as $item)
            <tr>
                <td colspan="3" class="bt-none">{{ $item->name }}</td>
                <td class="bt-none text-center">{{ $item->quantity }}</td>
            </tr>
        @endforeach
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
</div>