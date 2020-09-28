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
                <td>Invoice Name.</td>
                <td>From</td>
                <td>Outstanding(RM)</td>
                <td>Invoice Status</td>
                <td>Payment</td>
                <td>Action</td>
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
                        @if($invoice->payment_success)
                            <td>
                                {{$invoice->payment_success ? 'Success' : 'Failed'}}
                            </td>
                        @else
                            <td>
                                <div class="form-inline">
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Amount..."
                                            wire:model="payment"
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
                        @endif
                        <td>
                            <button class="btn btn-secondary">
                                <span class="fas fa-info">&nbsp;</span> Detail
                            </button>
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
