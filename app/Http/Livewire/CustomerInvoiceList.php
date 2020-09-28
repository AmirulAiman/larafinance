<?php

namespace App\Http\Livewire;

use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerInvoiceList extends Component
{
    use WithPagination;

    public $search;
    public $invoices = [];
    public $payment;

    public function mount()
    {
        $this->invoices = InvoiceDetail::where('customer_id','=',Auth::id())->get();
    }

    public function render()
    {
        $this->invoices = InvoiceDetail::where('invoice_title','like','%'. $this->search.'%')->get();
        return view('livewire.customer-invoice-list');
    }

    public function makPayment($invoice)
    {

    }
}
