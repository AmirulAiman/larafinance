<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','company_id','invoice_title','invoice_due'];

    public function customer()
    {
        return $this->belongsTo(
            'App\Models\Customer',
            'customer_id'
        );
    }

    public function company()
    {
        return $this->belongsTo(
            'App\Models\Company',
            'company_id'
        );
    }

    public function items()
    {
        return $this->hasMany('App\Models\InvoiceItem');
    }
}
