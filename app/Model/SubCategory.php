<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class SubCategory extends Model
{
    protected $fillable = ['category_id','sub_category_name',];

    public function user(){
       return $this->belongsTo(User::class,'created_by','id');
     }

    public function category(){
       return $this->belongsTo(Category::class);
    } 
}
