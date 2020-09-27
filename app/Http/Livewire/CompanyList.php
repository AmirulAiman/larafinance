<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CompanyList extends Component
{
    public $companies = [];
    public $selected = [];
    public $customerOf = [];
    public $searchText;

    public function render()
    {
        $this->companies = Company::where('company_name','like','%'.$this->searchText.'%')->get();
        return view('livewire.company-list');
    }

    public function mount()
    {
        $this->companies = Company::all();
        $this->selected = DB::table('companies_customers')
            ->select('company_id')
            ->where('customer_id',Auth::id())
            ->get();
    }

    public function save()
    {
        $currUser = Auth::id();
        foreach($this->selected as $c)
        {
            DB::table('companies_customers')->insert([
                ['company_id' => $c, 'customer_id' => $currUser]
            ]);
        }
    }
}
