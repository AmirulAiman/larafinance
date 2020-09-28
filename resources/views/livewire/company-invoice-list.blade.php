<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3>List of Invoices</h3>
            <button
                class="btn btn-secondary"
                type="button"
                data-toggle="modal"
                data-target="#newInvoice"
            >
                <span class="fas fa-plus"></span>
            </button>
            <div wire:ignore.self class="modal fade" id="newInvoice">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title"><h3>Create New Invoice</h3></div>
                            <button type="button" class="close" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#invoice">New Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#customer">New Customer</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane container active" id="invoice">
                                    <form wire:submit.prevent="createInvoiceOnly" class="form">
                                        <div class="form-group">
                                            <label for="customer_id">Customer: </label>
                                            <select
                                                wire:model="customer_id"
                                                name="customer_id"
                                                id="customer_id"
                                                class="form-control"
                                            >
                                                <option>Select Customer...</option>
                                                @foreach($customers as $c)
                                                    <option
                                                        value="{{$c->id}}"
                                                        key="{{$c->id}}"
                                                    >{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="invoice_title">Invoice Title: </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    wire:model="invoice_title"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="invoice_due">Due Date: </label>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    wire:model="invoice_due"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                Create Invoice
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane container fade" id="customer">
                                    <form wire:submit.prevent="createInvoiceWithCustomer">

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{--                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
                        </div>
                    </div>
                </div>
                </divwire:ignore.self>
            </div>
        </div>
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
                    <td>Outstanding(RM)</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @if(count($invoices) > 0)
                    @foreach($invoices as $invoice)
                        <tr class="@if($invoice->invoice_status == 'pending') alert alert-danger @endif">
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $invoice->customer->name }}</td>
                            <td>{{ $invoice->invoice_title }}</td>
                            <td>{{ $invoice->invoice_total }}</td>
                            <td>{{ ucfirst($invoice->invoice_status) }}</td>
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
</div>
