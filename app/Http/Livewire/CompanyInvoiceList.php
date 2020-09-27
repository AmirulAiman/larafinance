<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class CompanyInvoiceList extends Component
{
    public $search;
    public $invoices = [];
    public $customers = [];
    public $showModal = false;

    public $customer_id;
    public $invoice_title;
    public $invoice_due;

    public function mount()
    {
        $this->invoices = Auth::user()->company->invoices;
        $this->customers = Auth::user()->company->customers;
    }

    public function clearForm()
    {
        $this->customer_id = '';
        $this->invoice_title = '';
        $this->invoice_due  = '';
    }

    public function render()
    {
        $this->invoices = Auth::user()->company->invoices;
        return view('livewire.company-invoice-list');
    }

    public function createInvoiceOnly()
    {
        $this->validate([
            'customer_id' => 'required',
            'invoice_title' => 'required',
            'invoice_due' => 'required|date'
        ]);

        $invoice = InvoiceDetail::create([
            'customer_id' => $this->customer_id,
            'company_id' => Auth::user()->company_id,
            'invoice_title' => $this->invoice_title,
            'invoice_due' => $this->invoice_due
        ]);
        $this->clearForm();
        return redirect()->route('company.new-invoice',['invoice' => $invoice->id]);
    }

    public function createInvoiceWithCustomer()
    {

    }


}
