<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice_Payment extends Model
{
    public function customer() {
    	return $this->belongsTo(InvoiceCustomer::class,'customer_id','id');
    }

    public function invoice() {
    	return $this->belongsTo(Invoice::class,'invoice_id','id');
    }
}
