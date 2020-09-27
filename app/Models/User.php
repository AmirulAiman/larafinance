<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'password_unhash',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'password_unhash',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role','role_id','id');
    }

    public function company()
    {
        //reverse rel. for company's user grp.
        if (Auth::user()->role->role_title === 'Company')
        {
            return $this->belongsTo('App\Models\Company','company_id');
        }
    }

    public function companies()
    {
        if(Auth::user()->role->role_title === 'Customer'){
            return $this->belongsToMany(
                'App\Models\Company',
                'companies_customers',
                'customer_id',
                'company_id'
            )->withTimestamps();;
        }
    }

    public function customers()
    {
        if(Auth::user()->role->role_title === 'Company')
        {
            return $this->belongsToMany(
                'App\Models\Customer',
                'companies_customers',
                'company_id',
                'customer_id',
            )->withTimestamps();;
        }
    }

    public function invoices()
    {
        return $this->hasMany(
            'App\Models\InvoiceDetail',
            'customer_id',
            'id'
        );
    }

}
