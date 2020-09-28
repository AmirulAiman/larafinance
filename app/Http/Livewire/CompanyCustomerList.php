<?php

namespace App\Http\Livewire;

use App\Models\CompanyCustomer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CompanyCustomerList extends Component
{
    public $name;
    public $email;
    public $username;
    public $password = '1234567890';
    public $role_id = 3;

    public $customers = [];

    public $showModal = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|min:6|email|unique:users,email',
        'username' => 'required|unique:users,username'
    ];

    public function render()
    {
        $this->customers = Auth::user()->company->customers;
        return view('livewire.company-customer-list');
    }

    private function clearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->username = '';
    }

    public function newCustomer()
    {
        $this->validate();
        $new = User::firstOrNew([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'password_unhash' =>$this->password,
            'role_id' => 3
        ]);
        $new->save();

        CompanyCustomer::create([
            'company_id' => Auth::user()->company_id,
            'customer_id' => $new->id,
        ]);

        $this->clearForm();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function viewPwd()
    {
        $this->showPwd = !$this->showPwd;
    }

    public function deleteCustomer(User $user)
    {
        dd($user->companies);
//        Auth::user()->company->customers()->detach($user->id);
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
