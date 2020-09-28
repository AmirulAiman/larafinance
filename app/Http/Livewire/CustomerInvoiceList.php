<?php

namespace App\Http\Livewire;

use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

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
        $this->invoices = InvoiceDetail::where('invoice_title','like','%'. $this->search.'%')
            ->where('customer_id','=',Auth::id())
            ->get();

        return view('livewire.customer-invoice-list');
    }

    public function makePayment($invoice_id)
    {
        $success = (bool)random_int(0, 1);
        $invoice = InvoiceDetail::find($invoice_id);
        $invoice->payment_success = $success;
        if($success)
        {
            if($this->payment > intval($invoice->invoice_total))
            {
                $invoice->invoice_total = 0;
            } else {
                $invoice->invoice_total -= $this->payment;
            }
            $invoice->invoice_status = 'payed';
        }
        $invoice->save();
    }
}
