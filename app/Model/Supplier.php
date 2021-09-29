<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Supplier extends Model
{
	protected $fillable = ['company_name','mobile_no','email','address'];
    public function user(){

       return $this->belongsTo(User::class,'created_by','id');

   }
}
