<div>
    <table class="table">
        <thead>
        <tr style="font-weight: bold;">
            <td>#</td>
            <td>Invoice No.</td>
            <td class="">From</td>
            <td>Amount(RM)</td>
            <td>Status</td>
            <td>Make Payment</td>
        </tr>
        </thead>
        <tbody>
        @if(count($invoices) > 0)
            @foreach($invoices as $invoice)
                <tr class="">
                    <td>1</td>
                    <td>Invoice #123</td>
                    <td>Amirul Aiman Bin Abdullah</td>
                    <td>150.50</td>
                    <td>Pending</td>
                    <td>
                        <form wire:submit.prevent="pay" class="form-inline">
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Amount..."
                                >
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Pay</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach

        @else
            <tr>
                <td colspan="6">
                    No invoice issued.
                </td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
