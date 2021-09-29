<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
class CartRemove extends Controller
{
    
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return response()->json($rowId);
    }
}
