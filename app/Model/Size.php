<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Size extends Model
{
    protected $fillable = ['size_name',];

    public function user(){
       return $this->belongsTo(User::class,'created_by','id');
     }

     public function productSizes(){
       return $this->hasMany(ProductSize::class,'size_id','id');
     }
}
