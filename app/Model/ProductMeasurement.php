<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductMeasurement extends Model
{
   protected $fillable = ['product_id','size_id','x_small','small','medium','large','x_large','xx_large'];


    public function product(){
       return $this->belongsTo(Product::class,'product_id','id');

    }

    public function sizeMeasurement(){
       return $this->belongsTo(SizeMeasurement::class,'size_id','id');

    }
}
