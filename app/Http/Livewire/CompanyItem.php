<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompanyItem extends Component
{
    public $company;

    public function render()
    {
        return view('livewire.company-item');
    }

    public function mount($company)
    {
        $this->company = $company;
    }
}
