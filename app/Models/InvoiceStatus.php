<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceStatus extends Model
{
    use HasFactory;

    public function invoide_detail()
    {
        return $this->hasMany('App/Models/InvoiceDetail','invoice_status');
    }
}
