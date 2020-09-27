<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyInvoiceList extends Component
{
    public $search;
    public $invoices = [];
    public $customers = [];
    public $showModal = false;

    public function mount()
    {
        $this->invoices = Auth::user()->company->invoices;
    }

    public function render()
    {
        return view('livewire.company-invoice-list');
    }
}
