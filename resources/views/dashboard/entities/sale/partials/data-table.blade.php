<table id="saleTable" class="table table-hover">
    <thead class="thead-dark">
    <tr>
        <th>Reference</th>
        <th class="text-center">Cost</th>
        <th class="text-center">Tax</th>
        <th class="text-center">Income Before Tax</th>
        <th class="text-center">Net Income</th>
        <th class="text-center">Profit Margin</th>
        <th class="text-center">Total Sale</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->reference }}</td>
            <td class="text-center text-danger">{{ \Acikgise\Helpers\Helpers::formatMoney($sale->cost) }}</td>
            <td class="text-center">{{ \Acikgise\Helpers\Helpers::formatMoney($sale->tax) }}</td>
            <td class="text-center text-warning">{{ \Acikgise\Helpers\Helpers::formatMoney($sale->profit) }}</td>
            <td class="text-center text-success">{{ \Acikgise\Helpers\Helpers::formatMoney($sale->net_income) }}</td>
            <td class="text-center">{{ \App\Entities\Sale::calculateProfitMargin($sale->reference) }} %</td>
            <td class="text-center">{{ \Acikgise\Helpers\Helpers::formatMoney($sale->total) }}</td>
            <td class="text-nowrap">
                <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="modal" data-target="#{{ $sale->reference }}">
                    <i class="icon ti-eye"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>