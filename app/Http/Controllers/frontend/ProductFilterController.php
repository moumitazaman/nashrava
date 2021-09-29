<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Brand;
use App\Model\ShippingCost;
use Illuminate\Support\Facades\Artisan;
class ProductFilterController extends Controller
{

     public function getShippingCost(Request $request){

                $cost_value = $request->shipping_area;
                $costs_value = ShippingCost::where('shipping_area' ,  $cost_value)->first();
               return response()->json($costs_value);
    }

    public function catProductList($id){
        if(request()->short == 'new-first'){
            $cat_products = Product::where('category_id',$id)->orderBy('created_at', 'desc');
        }else if(request()->short == 'low-to-high'){
            $cat_products = Product::where('category_id',$id)->orderBy('price', 'asc');
        }else if(request()->short == 'high-to-low'){
            $cat_products = Product::where('category_id',$id)->orderBy('price', 'desc');
        }else{
            $cat_products = Product::where('category_id',$id)->orderBy('created_at', 'desc');
        }

        $cat_products = $cat_products->paginate(request()->pagination ?? '20');

         return view('frontend.single_page.category-product-list',[
            'cat_products' => $cat_products,
            'categories' => Category::orderBy('id','desc')->get(),
            'cat_name' => Category::orderBy('id','desc')->where('id',$id)->first(),

            'sub_categories' => SubCategory::orderBy('id','desc')->get(),
            'brands' => Brand::orderBy('id','desc')->get(),
         ]);
    }


    public function catProductListShort(Request $request, $id){
         // return ($cat_product)->toArray();
         return view('frontend.single_page.category-product-list',[

            'cat_products' => Product::where('category_id',$id)->orderBy('id','desc')->paginate($request->pagination),
            'categories' => Category::orderBy('id','desc')->get(),
            'cat_name' => Category::orderBy('id','desc')->where('id',$id)->first(),

            'sub_categories' => SubCategory::orderBy('id','desc')->get(),
            'brands' => Brand::orderBy('id','desc')->get(),
         ]);
    }

    public function subCatProductList($id){
        if(request()->short == 'new-first'){
                $sub_cat_products = Product::where('sub_category_id',$id)->orderBy('created_at', 'desc');
            }else if(request()->short == 'low-to-high'){
                $sub_cat_products = Product::where('sub_category_id',$id)->orderBy('price', 'asc');
            }else if(request()->short == 'high-to-low'){
                $sub_cat_products = Product::where('sub_category_id',$id)->orderBy('price', 'desc');
            }else{
                $sub_cat_products = Product::where('sub_category_id',$id)->orderBy('created_at', 'desc');
            }
    
            $sub_cat_products = $sub_cat_products->paginate(request()->pagination ?? '20');


         // return ($cat_product)->toArray();
         return view('frontend.single_page.sub-category-product-list',[


            'sub_cat_products' =>  $sub_cat_products,

            'sub_categories' => SubCategory::orderBy('id','desc')->get(),
            'cat_name' => SubCategory::orderBy('id','desc')->where('id',$id)->first(),

            'categories' => Category::orderBy('id','desc')->get(),
            'brands' => Brand::orderBy('id','desc')->get(),
         ]);
    }


    public function subcatProductListShort(Request $request, $id){
        // return ($cat_product)->toArray();
        return view('frontend.single_page.sub-category-product-list',[

           'sub_cat_products' => Product::where('sub_category_id',$id)->orderBy('id','desc')->paginate($request->pagination),
           'categories' => Category::orderBy('id','desc')->get(),
           'cat_name' => SubCategory::orderBy('id','desc')->where('id',$id)->first(),

           'sub_categories' => SubCategory::orderBy('id','desc')->get(),
           'brands' => Brand::orderBy('id','desc')->get(),
        ]);
   }

    public function brandProductList($id){
        if(request()->short == 'new-first'){
                $brand_products = Product::where('brand_id',$id)->orderBy('created_at', 'desc');
            }else if(request()->short == 'low-to-high'){
                $brand_products = Product::where('brand_id',$id)->orderBy('price', 'asc');
            }else if(request()->short == 'high-to-low'){
                $brand_products = Product::where('brand_id',$id)->orderBy('price', 'desc');
            }else{
                $brand_products = Product::where('brand_id',$id)->orderBy('created_at', 'desc');
            }
    
            $brand_products = $brand_products->paginate(request()->pagination ?? '20');
    	    return view('frontend.single_page.brand_product_list',[
    	    'brand_products' => $brand_products,

            'categories' => Category::orderBy('id','desc')->get(),
            'cat_name' => Brand::orderBy('id','desc')->where('id',$id)->first(),

            'sub_categories' => SubCategory::orderBy('id','desc')->get(),
            'brands' => Brand::orderBy('id','desc')->get(),
        ]);
    }


    public function brandProductListShort(Request $request, $id){
        // return ($cat_product)->toArray();
        return view('frontend.single_page.brand_product_list',[

           'brand_products' => Product::where('brand_id',$id)->orderBy('id','desc')->paginate($request->pagination),
           'categories' => Category::orderBy('id','desc')->get(),
           'cat_name' =>Brand::orderBy('id','desc')->where('id',$id)->first(),

           'sub_categories' => SubCategory::orderBy('id','desc')->get(),
           'brands' => Brand::orderBy('id','desc')->get(),
        ]);
   }

     public function  priceProductList (Request $request){

        // return $request->price_range;
            if($request->price_range == '1'){
                $products = Product::whereBetween('price' , [ 0 , 1000])->get();
                return view('frontend.single_page.price-wise-product-list',[

                        'products' => $products,
                        'categories' => Category::orderBy('id','desc')->get(),
                        'sub_categories' => SubCategory::orderBy('id','desc')->get(),
                        'brands' => Brand::orderBy('id','desc')->get(),
                ]);
            }

            if($request->price_range == '2'){
                $products = Product::whereBetween('price' , [1000, 2000])->get();
                return view('frontend.single_page.price-wise-product-list',[
                        'products' => $products,
                        'categories' => Category::orderBy('id','desc')->get(),
                        'sub_categories' => SubCategory::orderBy('id','desc')->get(),
                        'brands' => Brand::orderBy('id','desc')->get(),
                ]);
             }

            if ($request->price_range == '3'){
                $products = Product::whereBetween('price' , [2000 , 3000])->get();
                return view('frontend.single_page.price-wise-product-list',[
                        'products' => $products,
                        'categories' => Category::orderBy('id','desc')->get(),
                        'sub_categories' => SubCategory::orderBy('id','desc')->get(),
                        'brands' => Brand::orderBy('id','desc')->get(),
                ]);
             }

            if ($request->price_range == '4'){
                $products = Product::whereBetween('price' , [ 3000 , 4000])->get();
                return view('frontend.single_page.price-wise-product-list',[
                        'products' => $products,
                        'categories' => Category::orderBy('id','desc')->get(),
                        'sub_categories' => SubCategory::orderBy('id','desc')->get(),
                        'brands' => Brand::orderBy('id','desc')->get(),
                ]);
             }

            if ($request->price_range == '5'){
                $products = Product::whereBetween('price' , [ 4000 , 5000 ])->get();
                return view('frontend.single_page.price-wise-product-list',[
                        'products' => $products,
                        'categories' => Category::orderBy('id','desc')->get(),
                        'sub_categories' => SubCategory::orderBy('id','desc')->get(),
                        'brands' => Brand::orderBy('id','desc')->get(),
                ]);
             }

            if ($request->price_range == '6'){
                $products = Product::whereBetween('price' , [ 5000 , 50000 ])->get();
                return view('frontend.single_page.price-wise-product-list',[
                        'products' => $products,
                        'categories' => Category::orderBy('id','desc')->get(),
                        'sub_categories' => SubCategory::orderBy('id','desc')->get(),
                        'brands' => Brand::orderBy('id','desc')->get(),
                ]);
             }



    }

    
    public function allProductList(){
        if(request()->short == 'new-first'){
            $products = Product::orderBy('created_at', 'desc');
        }else if(request()->short == 'low-to-high'){
            $products = Product::orderBy('price', 'asc');
        }else if(request()->short == 'high-to-low'){
            $products = Product::orderBy('price', 'desc');
        }else{
            $products = Product::orderBy('created_at', 'desc');
        }

        $products = $products->paginate(request()->pagination ?? '20');

         return view('frontend.single_page.product-list',[
            'products' => $products,
            'categories' => Category::orderBy('id','desc')->get(),

            'sub_categories' => SubCategory::orderBy('id','desc')->get(),
            'brands' => Brand::orderBy('id','desc')->get(),
         ]);
    }


    public function allProductListShort(Request $request){
         // return ($cat_product)->toArray();
         return view('frontend.single_page.product-list',[

            'products' => Product::orderBy('id','desc')->paginate($request->pagination),
            'categories' => Category::orderBy('id','desc')->get(),
            'cat_name' => Category::orderBy('id','desc')->where('id',$id)->first(),

            'sub_categories' => SubCategory::orderBy('id','desc')->get(),
            'brands' => Brand::orderBy('id','desc')->get(),
         ]);
    }

    public function bestProductList(){
        if(request()->short == 'new-first'){
            $products = Product::where('best_status','1')->orderBy('created_at', 'desc');
        }else if(request()->short == 'low-to-high'){
            $products = Product::where('best_status','1')->orderBy('price', 'asc');
        }else if(request()->short == 'high-to-low'){
            $products = Product::where('best_status','1')->orderBy('price', 'desc');
        }else{
            $products = Product::where('best_status','1')->orderBy('created_at', 'desc');
        }

        $products = $products->paginate(request()->pagination ?? '20');

         return view('frontend.single_page.bestseller',[
            'products' => $products,
            'categories' => Category::orderBy('id','desc')->get(),

            'sub_categories' => SubCategory::orderBy('id','desc')->get(),
            'brands' => Brand::orderBy('id','desc')->get(),
         ]);
    }

    public function bestProductListShort(Request $request){
        // return ($cat_product)->toArray();
        return view('frontend.single_page.bestseller',[

           'products' => Product::where('best_status','1')->orderBy('id','desc')->paginate($request->pagination),
           'categories' => Category::orderBy('id','desc')->get(),
           'cat_name' => Category::orderBy('id','desc')->where('id',$id)->first(),

           'sub_categories' => SubCategory::orderBy('id','desc')->get(),
           'brands' => Brand::orderBy('id','desc')->get(),
        ]);
   }
}
