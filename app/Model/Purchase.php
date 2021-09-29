<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    // protected $fillable = ['supplier_id','category_id','product_id','purchase_no','purchase_date','description','buying_qty','unit_price','buying_price'];
    public function supplier(){
    	return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
