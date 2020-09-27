<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyCustomer extends Pivot
{
    protected $table = 'companies_customers';

    public function invoice_details()
    {
        return $this->hasMany(
            'App\Models\InvoiceDetail',
            'company_customer_id'
        );
    }
}
