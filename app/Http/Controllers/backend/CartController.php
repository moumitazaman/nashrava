<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Model\Product;
use App\Model\Category;
use App\Model\Purchase;
class CartController extends Controller
{
   public function addToCart(Request $request){


         
         $product = Purchase::where('id' , $request->product_id)->first();
         $category = Category::where('id',$request->category_id)->first();


            Cart::add([
             
             'id' => $product->id,
             'qty' => $request->quantity,
             'price' => $request->price,
             'name' => $product->product_name,
             'weight' => 550,
             'options' => [
                   'category_id' => $request->category_id,
                   'category_name' =>  $category->category_name,
                   'date' => $request->date,
                   'invoice_no' =>  $request->invoice_no,
                  'chalan_no' => $request->chalan_no,
             ],


         ]);

          $data = Cart::content(); 
        

         return response()->json($data);

  }

  public function deleteCart($rowId){
      Cart::remove($rowId);
      return response()->json($rowId);
  }

 
}
