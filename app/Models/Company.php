<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function customers()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'companies_customers',
            'company_id',
            'customer_id'
        )->withTimestamps();
    }

    public function invoices()
    {
        return $this->hasMany(
            'App\Models\InvoiceDetail',
            'company_id',
            'id'
        );
    }
}
