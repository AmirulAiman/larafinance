<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    public  function status()
    {
        return $this->belongsTo('App\Models\InvoiceStatus','invoice_status');
    }
}
