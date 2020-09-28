<div>
    <form wire:submit.prevent="updateInvoice">
        <input type="hidden" wire:model="invoice_id">
        <div class="form-group">
            <label for="customer_id">Issued To:</label>
            <select
                name="customer_id"
                class="form-control"
                wire:model="customer_id"
            >
                <option value="">Select invoice status...</option>
                @foreach($customers as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="invoice_title">Title: </label>
            <input
                name="invoice_title"
                type="text"
                class="form-control"
                wire:model="invoice_title"
            >
            @error('invoice_title') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <div class="form-group">
            <label for="invoice_due">Due Date: </label>
            <input
                name="invoice_due"
                type="date"
                class="form-control"
                wire:model="invoice_due"
            >
            @error('invoice_due') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <div class="form-group">
            <label for="invoice_due">Status: </label>
            <select
                name="invoice_status"
                id="invoice_status"
                class="form-control"
                wire:model="invoice_status"
            >
                <option value="">Select invoice status...</option>
                <option value="payed">Payed</option>
                <option value="pending">Pending</option>
                <option value="overdue">Overdue</option>
            </select>
            @error('invoice_status') <div class="invalid-feedback">{{$message}}</div> @enderror
        </div>
        <hr>
        <div>
            <div class="form-inline" style="margin-bottom: 10px;">
                <div class="form-group">
                    <label for="invoice_item" class="mr-sm-2">Item:</label>
                    <input
                        type="text"
                        class="form-control mb-2 mr-sm-2"
                        placeholder="Item name..."
                        id="invoice_item"
                        name="invoice_item"
                        wire:model="itemName"
                    >
                    @error('invoice_item') <div class="invalid-feedback">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="invoice_amount" class="mr-sm-2">Amount:</label>
                    <input
                        type="number"
                        class="form-control mb-2 mr-sm-2"
                        placeholder="Total item..."
                        id="invoice_amount"
                        name="invoice_amount"
                        wire:model="itemAmount"
                    >
                    @error('invoice_amount') <div class="invalid-feedback">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="invoice_price" class="mr-sm-2">Price:</label>
                    <input
                        type="text"
                        class="form-control mb-2 mr-sm-2"
                        placeholder="Item price..."
                        id="invoice_price"
                        name="invoice_price"
                        min="1"
                        wire:model="itemPrice"
                    >
                    @error('invoice_price') <div class="invalid-feedback">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <button
                        wire:click="addItem"
                        type="button"
                        class="btn btn-primary"
                    >Insert Item</button>
                </div>
            </div>
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Item</td>
                            <td>Amount</td>
                            <td>Price(RM)</td>
                            <td>Total</td>
                            <td>Remove?</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($items) > 0)
                            @foreach($items as $i)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $i->invoice_item }}</td>
                                    <td>{{ $i->invoice_item_amount }}</td>
                                    <td>{{ $i->invoice_item_price }}</td>
                                    <td>{{ $i->invoice_item_amount * $i->invoice_item_price }}</td>
                                    <td>
                                        <button
                                            class="btn btn-warning"
                                            type="button"
                                            wire:click="removeItem({{$i->id}})"
                                        >
                                            <span class="fas fa-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No Item added.</td>
                            </tr>
                        @endif
                    <tr>
                        <td colspan="4">Total:</td>
                        <td>{{$total}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" d-flex flex-row-reverse">
            <button
                class="btn btn-primary"
                type="submit"
            >Save Invoice</button>
        </div>
    </form>
</div>
