<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Unit extends Model
{
    protected $fillable = ['unit_name'];

    public function user(){
       return $this->belongsTo(User::class,'created_by','id');
    }
}
