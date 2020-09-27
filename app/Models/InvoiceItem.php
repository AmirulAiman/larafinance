<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_detail_id','invoice_item','invoice_item_amount','invoice_item_price'];
    public function invoice()
    {
        return $this->belongsTo('App\Models\InvoiceDetail');
    }
}
