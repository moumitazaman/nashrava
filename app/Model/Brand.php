<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Brand extends Model
{
    protected $fillable = ['brand_name',];

    public function user(){
       return $this->belongsTo(User::class,'created_by','id');
     }

   
}
