<div>
    <div>
        <div class="">
            <div class="form-group">
                <label for="search">Search: </label>
                <input
                    class="form-control"
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Filter invoice list..."
                    wire:model="search"
                >
            </div>
        </div>
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
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $invoice->invoice_title }}</td>
                        <td>{{ $invoice->company->company_name }}</td>
                        <td>{{ $invoice->invoice_total }}</td>
                        <td>{{ ucfirst($invoice->invoice_status) }}</td>
                        <td>
                            <div class="form-inline">
                                <div class="input-group mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Amount..."
                                    >
                                    <div class="input-group-append">
                                        <button
                                            class="btn btn-success"
                                            type="button"
                                            wire:click="makePayment({{$invoice->id}})"
                                        >Pay</button>
                                    </div>
                                </div>
                            </div>
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

</div>
