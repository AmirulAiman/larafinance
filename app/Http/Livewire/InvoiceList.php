<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\InvoiceDetail;
use Livewire\WithPagination;

class InvoiceList extends Component
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
        return view('livewire.invoice-list');
    }

    public function pay()
    {

    }
}
