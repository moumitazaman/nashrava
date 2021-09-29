<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class SizeMeasurement extends Model
{
    protected $fillable = ['measurement'];

    public function user(){
       return $this->belongsTo(User::class,'created_by','id');
     }
}
