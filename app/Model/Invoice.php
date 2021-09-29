<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Invoice extends Model
{
    public function payment(){
            return $this->belongsTo(Invoice_Payment::class,'id','invoice_id');
    }

    public function user(){
            return $this->belongsTo(User::class,'created_by','id');
    }

    public function invoiceDetails(){
    	    return $this->hasMany(InvoiceDetail::class,'invoice_id','id');
    }

     public function invoicePaymentDetails(){
    	    return $this->belongsTo(Invoice_Payment_Detail::class,'invoice_id','id');
    }
}
