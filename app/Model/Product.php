<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Product extends Model
{
   protected $fillable = ['category_id','sub_category_id','brand_id','product_name','title','slug','price','discount','qty','details'];


    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subCategory(){
    	return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }

    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function size(){
        return $this->belongsTo(Brand::class,'size_id','id');
    }

    public function purchase(){
        return $this->belongsTo(Purchase::class,'product_name','id');
    }

    public function productSizes(){
        return $this->hasMany(ProductSize::class,'product_id','id');
    }
}
