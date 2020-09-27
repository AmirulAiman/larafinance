<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Invoices</h3>
        <button
            type="button"
            class="btn btn-secondary"
        >
            <span class="fas fa-plus"></span>
        </button>
    </div>
    <div class="card-body">
        <div class="">
            <div class="form-group">
                <label for="search">Search: </label>
                <input
                    class="form-control"
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Filter list..."
                    wire:model="search"
                />
            </div>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr style="font-weight: bold;">
                    <td>#</td>
                    <td>Customers</td>
                    <td>Invoice No.</td>
                    <td>Amount(RM)</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @if(count($invoices) > 0)
                    @foreach($invoices as $invoice)
                        <tr class="">
                            <td>{{ $loop->index+1 }}</td>
                            <td>Amirul Aiman Bin Abdullah</td>
                            <td>Invoice #123</td>
                            <td>150.50</td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-info"><span class="fas fa-info"></span></button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            No invoice have been issued.
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
