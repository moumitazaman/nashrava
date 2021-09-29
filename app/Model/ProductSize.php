<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    public function product(){
       return $this->belongsTo(product::class,'product_id','id');
    }

    public function size(){
       return $this->belongsTo(Size::class,'size_id','id');
    }
}
