<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminCompanyList extends Component
{
    public $search;
    public $edit = false;

    public $companies = [];

    public $company_id;
    public $company_name;
    public $address1;
    public $address2;
    public $postcode;
    public $city;
    public $state;

    public $name;
    public $email;
    public $username;
    private $password = '1234567890';
    private $role_id = 2;

    protected $rules = [
        'company_name' =>'required',
        'address1' => 'required',
        'postcode' => 'required',
        'city' => 'required',
        'state' => 'required',
        'name' =>'required',
        'email' =>'required|unique:users,email',
        'username' =>'required|unique:users,username',
    ];

    public function render()
    {
        $this->companies = Company::where('company_name','like','%'.$this->search.'%')->get();
        return view('livewire.admin-company-list');
    }

    private function clearForm()
    {
        $this->company_name = '';
        $this->address1 = '';
        $this->address2 = '';
        $this->postcode = '';
        $this->city = '';
        $this->state = '';

        $this->name = '';
        $this->email = '';
        $this->username = '';
    }

    public function newCompany()
    {
        $this->validate();
        $company = Company::create([
            'company_name' => $this->company_name,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'state' => $this->state
        ]);

        $user = User::create([
           'name' => $this->name,
           'username' => $this->username,
           'email' => $this->email,
           'password' => Hash::make($this->password),
           'password_unhash' => $this->password,
            'role_id' => $this->role_id
        ]);

        $company->users()->save($user);
        $this->closeModal();
    }

    public function editCompany(Company $company)
    {
        $this->edit = true;
        $this->company_id = $company->id;
        $this->company_name = $company->company_name;
        $this->address1 = $company->address1;
        $this->address2 = $company->address2;
        $this->postcode = $company->postcode;
        $this->city = $company->city;
        $this->state = $company->state;

        $this->name = $company->users[0]->name;
        $this->email = $company->users[0]->email;
        $this->username = $company->users[0]->username;
        $this->openModal();
    }

    public function updateCompany()
    {
        $company = Company::find($this->company_id);
        $user = $company->users[0];

        $company->company_name = $this->company_name;
        $company->address1 = $this->address1;
        $company->address2 =  $this->address2;
        $company->postcode = $this->postcode;
        $company->city = $this->city;
        $company->state = $this->state;
        $company->save();

        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->save();

        $this->closeModal();
        $this->edit = false;
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('openModal');
    }

    public function closeModal()
    {
        $this->clearForm();
        $this->dispatchBrowserEvent('closeModal');
    }

}
