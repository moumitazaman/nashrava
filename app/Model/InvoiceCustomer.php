<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceCustomer extends Model
{
    protected $fillable = ['customer_name','mobile_no','email','address'];

    
}
