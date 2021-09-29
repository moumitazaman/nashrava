<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SubCategory;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Unit;
use Auth;
use App\Model\Purchase;
use App\User;

class DefaultController extends Controller
{
    public function getSubCategory(Request $request){
       
        $category_id = $request->category_id;
	        $sub_category_id = SubCategory::where('category_id',$category_id)->get();
	        return response()->json($sub_category_id);

    }

    public function getCategory(Request $request){
           $supplier_id = $request->supplier_id;
           $category_id = Product::with(['category'])
                          ->select('category_id')
                          ->distinct()
                          ->where('supplier_id',$supplier_id)
                          ->get();
           return response()->json($category_id);
   }

   public function getProduct(Request $request){
          $category_id = $request->category_id;
          $product = Purchase::where('category_id',$category_id)->get();
          return response()->json($product);

   }

   public function checkProductStock(Request $request){

                $product_id = $request->product_id;
                $stock = Product::where('id',$product_id)->first()->quantity;
                return response()->json($stock);
    }    

    public function getProductPrice(Request $request){

        $product_id = $request->product_id;
        $product_price = Product::where('product_name',$product_id)->first()->price;
        return response()->json($product_price);

    }

    public function getProductQty(Request $request){
       $purchase_id = $request->purchase_id;
       $purchase_stock = Purchase::where('id' , $purchase_id)->first()->buying_qty;
       return response()->json($purchase_stock);
    }
   
}
