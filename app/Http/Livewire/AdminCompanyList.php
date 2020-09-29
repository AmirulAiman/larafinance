<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class AdminCompanyList extends Component
{
    public $search;
    public $companies = [];
    public function render()
    {
        $this->companies = Company::where('company_name','like','%'.$this->search.'%')->get();
        return view('livewire.admin-company-list');
    }

    private function clearForm()
    {

    }

    public function newCompany()
    {

    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('openModal');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
}
